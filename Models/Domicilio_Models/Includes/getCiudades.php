<?php 
    require($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
    $conexion = Conectar::conexion();

    $codigo =$_POST['codigo'];
    $sql_ciudad = $conexion->query("SELECT * FROM domicilio_ciudad WHERE parroquia_codigo=$codigo ORDER BY descripcion");
    
    while ($datosC = $sql_ciudad->fetch_assoc()) {
        $html = "<option value='".$datosC['codigo']."'>".$datosC['descripcion']."</option>";
        echo $html;
    }

    
?>