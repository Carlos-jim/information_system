<?php 
    require($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
    $conexion = Conectar::conexion();

    $codigo =$_POST['codigo'];
    $sql_parroquia = $conexion->query("SELECT * FROM domicilio_parroquia WHERE municipio_codigo=$codigo ORDER BY descripcion");
    
    while ($datosP = $sql_parroquia->fetch_assoc()) {
        echo "<option value='".$datosP['codigo']."'>".$datosP['descripcion']."</option>";
    }

    
?>