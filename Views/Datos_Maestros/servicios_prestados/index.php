<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="/Funeraria/Styles/Bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="/Funeraria/Styles/style.css">

    <title>Estado</title>

</head>
<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/View/Nav/nav_usuario.html");
    ?>

    <!-- Main -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/View/Datos_Maestros/servicios_prestados/read.php");
    ?>

    <!-- Icons and Alerts-->
    <script src="https://kit.fontawesome.com/6ce5fbca39.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap-->
    <script src="/Funeraria/Js/Bootstrap/bootstrap.bundle.min.js"></script>

    <!--Script of the Icons-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- DataTable-->
    <script src="/Funeraria/Js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/Funeraria/Js/datatable.js"></script>

    <!-- Icons and Alerts-->
    <script src="https://kit.fontawesome.com/6ce5fbca39.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/Funeraria/Js/alerts.js"></script>
</body>
</html>