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
    <div class="main">

        <div class="datos">

            <h2>Agregar Estado</h2>

            <div class="form">
                <form class="row g-3" method="POST">

                    <div class="Estado">

                        <h3>Localidad - Estado</h3>

                        <div class="col-md-4">

                            <label for="validationCustom02" class="form-label">Código</label>
                            <input type="number" autocomplete="off" class="form-control" id="validationCustom02" placeholder="Ingrese el código" required name="codigo">

                        </div>

                        <!--Estados-->
                        <div class="col-md-4">

                            <label class="form-label" for="input-estados">Estado</label>
                            <input type="text" autocomplete="off" class="form-control" id="validationCustom02" placeholder="Ingrese el nombre del estado" required name="descripcion">

                        </div>

                        <button type="submit" class="btn btn-primary" class="tittle" name="guardar" value="ok">Guardar</button>

                        <?php
                            //Incluir el archivo DifuntoModel.php
                            include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/PersonalModels/DifuntoModel.php");

                            //Verificar si se envió el formulario
                            if (isset($_POST['guardar'])) {
                                //Llamar al método create() de la clase EstadoModel
                                $resultado = DifuntoModel::create();

                                //Verificar el resultado y mostrar un mensaje al usuario
                                if ($resultado) {
                                    echo "<script>alert('El muerto se ha agregado exitosamente')</script>";
                                } else {
                                    echo "<script>alert('El muerto no pudo ser agregado, verifique los datos e intentelo de nuevo')</script>";
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

</body>

</html>