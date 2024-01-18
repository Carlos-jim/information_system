<?php
class ParroquiaModel
{
    //Función para agregar una nueva parroquia
    public static function create()
    {
        $codigo_municipio = $_POST['codigo'];
        $descripcion_municipio = $_POST['descripcion'];
        $municipio_codigo = $_POST['slc_municipio'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_parroquia = "INSERT INTO domicilio_parroquia (codigo, descripcion, municipio_codigo) VALUES (?, ?, ?)";

        $stmt = $conexion->prepare($sql_parroquia);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi", $codigo_municipio, $descripcion_municipio, $municipio_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $conexion = Conectar::desconexion($conexion);
    }


    //Función para leer las parroquias
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_parroquia = "SELECT p.codigo AS parroquia_codigo, p.descripcion AS parroquia, m.codigo AS municipio_codigo, m.descripcion AS municipio, e.codigo AS estado_codigo, e.descripcion AS estado FROM domicilio_parroquia p
                        INNER JOIN domicilio_municipio m ON p.municipio_codigo = m.codigo INNER JOIN domicilio_estado e ON m.estado_codigo = e.codigo ORDER BY p.codigo ASC";

        if (!$result_parroquia = mysqli_query($conexion, $sql_parroquia)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_parroquia;
    }

    //Función para actualizar una parroquia
    public static function update()
    {
        $parroquia_codigo = $_POST['codigo'];
        $parroquia = $_POST['descripcion'];
        $municipio_codigo = $_POST['slc_municipio'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_estado = "UPDATE domicilio_parroquia SET descripcion = ?, municipio_codigo = ? WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_estado);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sii", $parroquia, $municipio_codigo, $parroquia_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar una parroquia
    public static function delete($codigo)
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_parroquia = "DELETE FROM domicilio_parroquia WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_parroquia);

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
