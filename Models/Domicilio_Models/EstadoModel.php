<?php

class EstadoModel
{

    //Función para agregar un nuevo estado
    public static function create()
    {
        $codigo = $_POST['codigo'];
        $estado = $_POST['descripcion'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_estado = "INSERT INTO domicilio_estado (codigo, descripcion) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql_estado);

        //Vincular los parámetros con los valores
        $stmt->bind_param("is", $codigo, $estado);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            //Devolver un valor verdadero o un mensaje de confirmación
            return true;
            //echo "Estado agregado correctamente";
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el estado: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }


    //Función para leer los estados
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_estado = "SELECT * FROM domicilio_estado ORDER BY codigo asc";

        if (!$result_estado = mysqli_query($conexion, $sql_estado)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_estado;
    }

    //Función para actualizar un estado
    public static function update()
    {
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_estado = "UPDATE domicilio_estado SET descripcion = ? WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_estado);

        //Vincular los parámetros con los valores
        $stmt->bind_param("si", $descripcion, $codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            //Devolver un valor verdadero o un mensaje de confirmación
            return true;
            //echo "Estado actualizado correctamente";
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al actualizar el estado: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar un estado
    public static function delete($codigo)
    {
        //Establecer la conexión con la base de datos
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_estado = "DELETE FROM domicilio_estado WHERE codigo = ?";
        $stmt = $conexion->prepare($sql_estado);

        //Vincular el parámetro con el valor
        $stmt->bind_param("i", $codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            //Devolver un valor verdadero o un mensaje de confirmación
            return true;
            //echo "Estado eliminado correctamente";
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al eliminar el estado: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
}
