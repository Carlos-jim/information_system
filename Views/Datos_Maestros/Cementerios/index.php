<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Funeraria/Styles/general.css">

    <title>Cementerios</title>

</head>
<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/Nav/nav_admin.php");
    ?>

    <!-- Main -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Datos_Maestros/Cementerios/read.php");
    ?>

</body>
</html>