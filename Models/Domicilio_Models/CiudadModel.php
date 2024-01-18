<?php
class CiudadModel
{
    //Función para agregar una nueva parroquia
    public static function create()
    {
        $codigo_ciudad = $_POST['codigo'];
        $descripcion_ciudad = $_POST['descripcion'];
        $parroquia_codigo = $_POST['slc_parroquia'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_ciudad = "INSERT INTO domicilio_ciudad (codigo, descripcion, parroquia_codigo) VALUES (?, ?, ?)";
        
        $stmt = $conexion->prepare($sql_ciudad);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi", $codigo_ciudad, $descripcion_ciudad, $parroquia_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            //Devolver un valor verdadero o un mensaje de confirmación
            return true;
            //echo "Municipio agregado correctamente";
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el municipio: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }


    //Función para leer las parroquias
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Consulta SQL para obtener los campos deseados de las tablas municipio y estado
        $sql_ciudad = "SELECT c.codigo AS ciudad_codigo, c.descripcion AS ciudad, p.codigo AS parroquia_codigo, p.descripcion AS parroquia, m.codigo AS municipio_codigo, m.descripcion AS municipio, e.codigo AS estado_codigo, e.descripcion AS estado FROM domicilio_ciudad c INNER JOIN domicilio_parroquia p
                            ON c.parroquia_codigo = p.codigo INNER JOIN domicilio_municipio m ON p.municipio_codigo = m.codigo INNER JOIN domicilio_estado e ON m.estado_codigo = e.codigo";

        if (!$result_parroquia = mysqli_query($conexion, $sql_ciudad)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_parroquia;
    }

    //Función para actualizar una ciudad
    public static function update()
    {
        $ciudad_codigo = $_POST['codigo'];
        $ciudad = $_POST['descripcion'];
        $parroquia_codigo = $_POST['slc_parroquia'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_ciudad = "UPDATE domicilio_ciudad SET descripcion = ?, parroquia_codigo = ? WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_ciudad);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sii", $ciudad, $parroquia_codigo, $ciudad_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar una ciudad
    public static function delete($codigo)
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_ciudad = "DELETE FROM domicilio_ciudad WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_ciudad);

        //Vincular el parámetro con el valor
        $stmt->bind_param("i", $codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $conexion = Conectar::desconexion($conexion);
    }

}
