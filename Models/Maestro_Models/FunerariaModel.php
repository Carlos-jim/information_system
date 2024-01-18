<?php
class FunerariaModel
{
    //Función para agregar un nuevo funeraria
    public static function create()
    {
        $tipo = $_POST['tipo'];
        $RIF = $_POST['rif'];
        $razon_social = $_POST['nombre'];
        $ciudad_codigo = $_POST['ciudad_codigo'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //PRIMERO SE INSERTA EN LA TABLA PERSONA_juridica
        $sql_funeraria = "INSERT INTO persona_juridica (rif, razon_social, ciudad_codigo) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql_funeraria);

        //Vincular los parámetros con los valores
        $stmt->bind_param("isi",  $RIF, $razon_social, $ciudad_codigo);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            $sql_funeraria = "INSERT INTO funeraria (tipo, rif_juridico) VALUES (?, ?)";
            $stmt = $conexion->prepare($sql_funeraria);

            //Vincular los parámetros con los valores
            $stmt->bind_param("isi", $tipo, $RIF);

            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "funeraria agregado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al agregar el funeraria: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al agregar el funeraria: " . $stmt->error;
        }

        

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }


    //Función para leer los funerarias
    public static function read()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        # NO SE Q ES ESTO 
        //Consulta SQL para obtener los campos deseados de las tablas MUNICIPIO Y ESTADO 
        $sql_funeraria = "SELECT * FROM funeraria ORDER BY funeraria.rif_juridico ASC";

        if (!$result_funeraria = mysqli_query($conexion, $sql_funeraria)) die();

        $conexion = Conectar::desconexion($conexion);

        return $result_funeraria;
    }

    //Función para actualizar un funeraria
    public static function update()
    {
        $tipo = $_POST['tipo'];
        $RIF = $_POST['rif'];
        $razon_social = $_POST['nombre'];
        $ciudad_codigo = $_POST['ciudad_codigo'];

        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();
        //consulta sql a persona juridica
        $sql_funeraria = "UPDATE persona_juridica SET razon_social=?, ciudad_codigo=? WHERE rif=?";
        $stmt = $conexion->prepare($sql_funeraria);

        //Vincular los parámetros con los valores
        $stmt->bind_param("sii",$razon_social, $ciudad_codigo, $RIF);

        if ($stmt->execute()) {
            //Consulta SQL para actualizar la tabla funeraria
            $sql_funeraria = "UPDATE funeraria SET tipo=? WHERE rif_juridico = ?";
            $stmt = $conexion->prepare($sql_funeraria);

            //Vincular los parámetros con los valores
            $stmt->bind_param("sii", $tipo, $RIF);

            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "funeraria actualizado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al actualizar el funeraria: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al actualizar el funeraria: " . $stmt->error;
        }

        
        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }

    //Función para eliminar un funeraria
    public static function delete($RIF)
    {
        //Establecer la conexión con la base de datos
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
        $conexion = Conectar::conexion();

        //Preparar la consulta SQL
        $sql_funeraria = "DELETE FROM funeraria WHERE rif_juridico= ?";
        $stmt = $conexion->prepare($sql_funeraria);

        //Vincular el parámetro con el valor
        $stmt->bind_param("i", $RIF);

        //Ejecutar la consulta
        if ($stmt->execute()) {
            $sql_funeraria = "DELETE FROM persona_juridica WHERE rif = ?";
            $stmt = $conexion->prepare($sql_funeraria);

            //Vincular el parámetro con el valor
            $stmt->bind_param("i", $RIF);
            //Ejecutar la consulta
            if ($stmt->execute()) {
                //Devolver un valor verdadero o un mensaje de confirmación
                return true;
                //echo "funeraria actualizado correctamente";
            } else {
                //Devolver un valor falso o un mensaje de error
                return false;
                //echo "Error al actualizar el funeraria: " . $stmt->error;
            }
        } else {
            //Devolver un valor falso o un mensaje de error
            return false;
            //echo "Error al eliminar el funeraria: " . $stmt->error;
        }

        //Cerrar la conexión con la base de datos
        $conexion = Conectar::desconexion($conexion);
    }
}
