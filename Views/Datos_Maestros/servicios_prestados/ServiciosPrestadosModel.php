<?php
class ServiciosPrestadosModel
{
    //Función para agregar un nuevo servicios
    public static function create()
    {
        $funeraria_rif = $_POST['funeraria_rif'];
        $servicio_prestado_codigo = $_POST['servicio'];
        $monto = $_POST['monto'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //PRIMERO SE INSERTA EN LA TABLA PERSONA_juridica
        $sql_servicios = "INSERT INTO funeraria_has_servicio_prestado (funeraria_rif_juridico, servicio_prestado_codigo, monto) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql_servicios);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi", $funeraria_rif, $servicio_prestado_codigo, $monto);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el servicios: " . $stmt->error;
        }

        

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
    // me permite agregar a la tabla de servicios prestados general 
    public static function create2()
    {
        $funeraria_rif = $_POST['funeraria_rif'];
        $nombre = $_POST['rif'];
        $servicio_prestado_codigo = $_POST['servicio'];
        $monto = $_POST['monto'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //PRIMERO SE INSERTA EN LA TABLA de servicios general 
        $sql_servicios = "INSERT INTO servicio_prestado (codigo, nombre) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql_servicios);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi", $servicio_prestado_codigo, $nombre);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            
            $sql_servicios = "INSERT INTO funeraria_has_servicio_prestado (funeraria_rif_juridico, servicio_prestado_codigo, monto) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql_servicios);

            //Vincular los parámetros con los valores
            $stmt->bind_param("isi", $funeraria_rif, $servicio_prestado_codigo, $monto);
            
            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "servicios agregado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al agregar el servicios: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el servicios: " . $stmt->error;
        }

        

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
    //Función para leer los servicioss
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        # NO SE Q ES ESTO 
        //Consulta SQL para obtener los campos deseados de las tablas MUNICIPIO Y ESTADO 
        $sql_servicios = "SELECT m.codigo, m.descripcion, e.descripcion AS estado, e.codigo AS estado_codigo FROM domicilio_servicios m
                        INNER JOIN domicilio_estado e ON m.estado_codigo = e.codigo ORDER BY m.codigo ASC";

        if (!$result_servicios = mysqli_query($conexion, $sql_servicios)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_servicios;
    }

    //Función para actualizar un servicios
    public static function update()
    {
        $funeraria_rif = $_POST['funeraria_rif'];
        $servicio_prestado_codigo = $_POST['servicio'];
        $monto = $_POST['monto'];


        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();
        //consulta sql a persona juridica
        $sql_servicios = "UPDATE funeraria_has_servicio_prestado SET monto=? WHERE funeraria_rif_juridico=? AND servicio_prestado_codigo=?";
        $stmt = $conexion->prepare($sql_servicios);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sii",$monto, $funeraria_rif, $servicio_prestado_codigo);

        if ($stmt->execute()) {
            return true;
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al actualizar el servicios: " . $stmt->error;
        }

        
        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar un servicios
    public static function delete($funeraria_rif, $servicio_prestado_codigo)
    {
        //Establecer la conexión con la base de datos
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_servicios = "DELETE FROM funeraria_has_servicio_prestado WHERE funeraria_rif_juridico= ? AND servicio_prestado_codigo=?";
        $stmt = $conexion->prepare($sql_servicios);

        //Vincular el parámetro con el valor
        $stmt->bind_param("i", $funeraria_rif, $servicio_prestado_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al eliminar el servicios: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
}
