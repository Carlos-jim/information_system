<?php

class PersonaJuridicaModel
{

    //Función para agregar un nuevo estado
    public static function create()
    {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $estado = $_POST['correo'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        $sql_estado = "INSERT INTO persona_natural (cedula_id, nombre, apellido, direccion, telefono, correo, ciudad_codigo) VALUES (?, ?)";
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

        $sql_juridico = "SELECT p.rif AS rif, p.razon_social AS razon_social, p.ciudad_codigo, c.codigo, c.descripcion AS ciudad FROM persona_juridica p INNER JOIN domicilio_ciudad c ON p.ciudad_codigo = c.codigo";

        if (!$result_juridico = mysqli_query($conexion, $sql_juridico)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_juridico;
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
