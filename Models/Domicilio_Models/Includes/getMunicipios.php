<?php 
    require($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
    $conexion = Conectar::conexion();

    $codigo =$_POST['codigo'];
    $sql_municipio = $conexion->query("SELECT * FROM domicilio_municipio WHERE estado_codigo=$codigo ORDER BY descripcion");

    while ($datosM = $sql_municipio->fetch_assoc()) {
        echo "<option value='".$datosM['codigo']."'>".$datosM['descripcion']."</option>";
    }

?>