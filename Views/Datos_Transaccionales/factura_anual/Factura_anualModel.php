<?php
class Factura_anualModel
{
    //Función para agregar un nuevo factura_anual
    public static function create()
    {
        $numero_factura = $_POST['numero'];
        $fecha = $_POST['fecha'];
        $monto = $_POST['monto'];
        $poliza_funerario_numero= $_POST['numero_poliza_seguro'];
        $us_cedula_natural = $_POST['cedula_usuario'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //PRIMERO SE INSERTA EN LA TABLA factura
        $sql_factura_anual = "INSERT INTO factura_anual (numero, fecha, monto, poliza_funerario_numero, us_cedula_natural) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql_factura_anual);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi",  $RIF, $razon_social, $ciudad_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el factura_anual: " . $stmt->error;
        }

        

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }


    //Función para leer los factura_anuals
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        # NO SE Q ES ESTO 
        //Consulta SQL para obtener los campos deseados de las tablas MUNICIPIO Y ESTADO 
        $sql_factura_anual = "SELECT m.codigo, m.descripcion, e.descripcion AS estado, e.codigo AS estado_codigo FROM domicilio_factura_anual m
                        INNER JOIN domicilio_estado e ON m.estado_codigo = e.codigo ORDER BY m.codigo ASC";

        if (!$result_factura_anual = mysqli_query($conexion, $sql_factura_anual)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_factura_anual;
    }

    //Función para actualizar un factura_anual
    public static function update()
    {
        $numero_factura = $_POST['numero'];
        $fecha = $_POST['fecha'];
        $monto = $_POST['monto'];
        $poliza_funerario_numero= $_POST['numero_poliza_seguro'];
        $us_cedula_natural = $_POST['cedula_usuario'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();
        //consulta sql a persona juridica
        $sql_factura_anual = "UPDATE factura_anual SET fecha=?, monto=?, us_cedula_natural=? WHERE numero=? AND poliza_funerario_numero=?";
        $stmt = $conexion->prepare($sql_factura_anual);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sii", $fecha, $monto, $us_cedula_natural, $numero_factura, $poliza_funerario_numero );

        if ($stmt->execute()) {
           return true;
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al actualizar el factura_anual: " . $stmt->error;
        }

        
        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar un factura_anual
    public static function delete($numero_factura, $poliza_funerario_numero )
    {
        //Establecer la conexión con la base de datos
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_factura_anual = "DELETE FROM factura_anual WHERE numero=? AND poliza_funerario_numero=?";
        $stmt = $conexion->prepare($sql_factura_anual);

        //Vincular el parámetro con el valor
        $stmt->bind_param("i", $numero_factura, $poliza_funerario_numero );

        //Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al eliminar el factura_anual: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
}
