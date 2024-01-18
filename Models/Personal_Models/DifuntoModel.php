<?php
class DifuntoModel
{
    //Función para agregar un nuevo difunto
    public static function create()
    {
        $codigo_difunto = $_POST['codigo_difunto'];
        $causa_muerte = $_POST['causa_muerte'];
        $lugar_muerte = $_POST['lugar_muerte'];
        $fecha_muerte = $_POST['fecha_muerte'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $cedula = $_POST['cedula'];#viene de persona natural
        $cementerio = $_POST['cementerio'];#viene de cementerio
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $ciudad_codigo = $_POST['slc_ciudad'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //PRIMERO SE INSERTA EN LA TABLA PERSONA_NATURAL
        $sql_difunto = "INSERT INTO persona_natural (cedula_id, nombre, apellido, direccion, telefono, correo, ciudad_codigo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql_difunto);

        //Vincular los parámetros con los valores
        $stmt->bind_param("ssssssi",  $cedula, $nombre, $apellido, $direccion, $telefono, $correo, $ciudad_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            $sql_difunto = "INSERT INTO difunto (codigo, causa_muerte, lugar_muerte, fecha_muerte, fecha_nacimiento, cedula_natural, cementerio_rif_juridico) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql_difunto);

            //Vincular los parámetros con los valores
            $stmt->bind_param("issssss", $codigo_difunto, $causa_muerte, $lugar_muerte, $fecha_muerte, $fecha_nacimiento, $cedula, $cementerio);

            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "difunto agregado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al agregar el difunto: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el difunto: " . $stmt->error;
        }

        

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }


    //Función para leer los difuntos
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        # NO SE Q ES ESTO 
        //Consulta SQL para obtener los campos deseados de las tablas MUNICIPIO Y ESTADO 
        $sql_difunto = "SELECT * FROM difunto ORDER BY codigo ASC";

        if (!$result_difunto = mysqli_query($conexion, $sql_difunto)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_difunto;
    }

    //Función para actualizar un difunto
    public static function update()
    {
        $codigo_difunto = $_POST['codigo_difunto'];
        $causa_muerte = $_POST['causa_muerte'];
        $lugar_muerte = $_POST['lugar_muerte'];
        $fecha_muerte = $_POST['fecha_muerte'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $cedula = $_POST['cedula'];#viene de persona natural
        $cementerio = $_POST['cementerio'];#viene de cementerio

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();
        //consulta sql a persona natural
        $sql_difunto = "UPDATE persona_natural SET nombre=?, apellido=?, direccion=?, telefono=?, correo=?, ciudad_codigo=? WHERE cedula_id=?";
        $stmt = $conexion->prepare($sql_difunto);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sssssis", $nombre, $apellido, $direccion, $telefono, $correo, $ciudad_codigo, $cedula);

        if ($stmt->execute()) {
            //Consulta SQL para actualizar la tabla difunto
            $sql_difunto = "UPDATE difunto SET codigo=?, causa_muerte=?, lugar_muerte=?, fecha_muerte=?, fecha_nacimiento=?, cementerio_rif_juridico=? WHERE cedula_natural = ?";
            $stmt = $conexion->prepare($sql_difunto);

            //Vincular los parámetros con los valores
            $stmt->bind_param("issssss", $codigo_difunto, $causa_muerte, $lugar_muerte, $fecha_muerte, $fecha_nacimiento, $cementerio, $cedula);

            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "difunto actualizado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al actualizar el difunto: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al actualizar el difunto: " . $stmt->error;
        }

        
        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar un difunto
    public static function delete($cedula)
    {
        //Establecer la conexión con la base de datos
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_difunto = "DELETE FROM difunto WHERE cedula_natural = ?";
        $stmt = $conexion->prepare($sql_difunto);

        //Vincular el parámetro con el valor
        $stmt->bind_param("s", $cedula);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            $sql_difunto = "DELETE FROM persona_natural WHERE cedula_natural = ?";
            $stmt = $conexion->prepare($sql_difunto);

            //Vincular el parámetro con el valor
            $stmt->bind_param("s", $cedula);
            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "difunto actualizado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al actualizar el difunto: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al eliminar el difunto: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
}
