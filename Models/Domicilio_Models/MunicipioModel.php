<?php
class MunicipioModel
{
    //Función para agregar un nuevo municipio
    public static function create()
    {
        $codigo_municipio = $_POST['codigo'];
        $descripcion_municipio = $_POST['descripcion'];
        $estado_codigo = $_POST['slc_estado'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_municipio = "INSERT INTO domicilio_municipio (codigo, descripcion, estado_codigo) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql_municipio);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi", $codigo_municipio, $descripcion_municipio, $estado_codigo);

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


    //Función para leer los municipios
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Consulta SQL para obtener los campos deseados de las tablas municipio y estado
        $sql_municipio = "SELECT m.codigo, m.descripcion, e.descripcion AS estado, e.codigo AS estado_codigo FROM domicilio_municipio m
                        INNER JOIN domicilio_estado e ON m.estado_codigo = e.codigo ORDER BY m.codigo ASC";

        if (!$result_municipio = mysqli_query($conexion, $sql_municipio)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_municipio;
    }

    //Función para actualizar un municipio
    public static function update()
    {
        $codigo_municipio = $_POST['codigo'];
        $descripcion_municipio = $_POST['municipio'];
        $estado_codigo = $_POST['slc_estado'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Consulta SQL para actualizar la tabla municipio
        $sql_municipio = "UPDATE domicilio_municipio SET descripcion = ?, estado_codigo = ? WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_municipio);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sii", $descripcion_municipio, $estado_codigo, $codigo_municipio);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            //Devolver un valor verdadero o un mensaje de confirmación
            return true;
            //echo "Municipio actualizado correctamente";
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al actualizar el municipio: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar un municipio
    public static function delete($codigo)
    {
        //Establecer la conexión con la base de datos
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_municipio = "DELETE FROM domicilio_municipio WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_municipio);

        //Vincular el parámetro con el valor
        $stmt->bind_param("i", $codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            //Devolver un valor verdadero o un mensaje de confirmación
            return true;
            //echo "Municipio eliminado correctamente";
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al eliminar el municipio: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
}
