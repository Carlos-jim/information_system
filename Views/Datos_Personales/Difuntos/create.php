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
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/nav_admin.php");
    ?>

    <div class="main">
        <div class="datos">

            <h2>Datos difuntos</h2>
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
            $conexion = Conectar::conexion();
            $sql_estado = $conexion->query("SELECT * FROM domicilio_estado ORDER BY descripcion");
            ?>

            <div class="form" method="POST">
                <form class="row g-3">

                   
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom01" class="form-label">Cedula de identidad</label>
                        <input type="text" class="form-control" name="cedula" id="validationCustom01" value="" required>
                    </div>


                    <!--Nombre -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="validationCustom02" value="" required>
                    </div>

                    <!-- Apellido -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom03" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="validationCustom03" value="" required>
                    </div>

                    <!-- Direccion -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom04" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="validationCustom06" value="" required>
                    </div>

                    <!-- Telefono -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom06" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" name="telefono" id="validationCustom06" required>
                    </div>

                    <!-- Correo -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom07" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" name="correo" id="validationCustom07" required>
                    </div>

                    <!--Estados-->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Estado</label>
                        <select class="form-select" name="slc_estado" id="slc_estado">
                            <option value="0">Seleccione el estado</option>
                            <?php
                            while ($datosE = $sql_estado->fetch_assoc()) { ?>
                                <option value="<?php echo $datosE['codigo'] ?>"> <?php echo $datosE['descripcion'] ?> </option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <!-- Municipio -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Municipio</label>
                        <select class="form-select" name="slc_municipio" id="slc_municipio">
                            <option value="0">Seleccione el municipio</option>
                        </select>
                    </div>

                    <!-- Parroquia -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Parroquia</label>
                        <select class="form-select" name="slc_parroquia" id="slc_parroquia">
                            <option value="0">Seleccione la parroquia</option>
                        </select>
                    </div>

                    <!-- Ciudad -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Ciudad</label>
                        <select class="form-select" name="slc_ciudad" id="slc_ciudad">
                            <option value="0">Seleccione la ciudad</option>
                        </select>
                    </div>

                    
                    </br>
                    </br>

                    <!-- Campos difuntos-->

                    <div class="col-md-6 mt-3">
                        <label for="." class="form-label">Codigo</label>
                        <input type="number" name= 'codigo_difunto' class="form-control" id="." required>
                    </div>

                    <!-- Causa de muerte-->
                    <div class="col-md-6 mt-3">
                        <label for="causa" class="form-label">Causa de muerte</label>
                        <input type="text" name= 'causa_muerte' class="form-control" id="causa" value="" required>
                    </div>

                    <!-- Lugar de deceso -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom0" class="form-label">Lugar de deceso</label>
                        <input type="text" name= 'lugar_muerte' class="form-control" id="validationCustom0" value="" required>
                    </div>

                    <!-- Fecha de deceso -->
                    <div class="col-md-6 mt-3">
                        <label for="deceso" class="form-label">Fecha de deceso</label>
                        <input type="date" name= 'fecha_muerte' class="form-control" id="deceso" required>
                    </div>

                    <!-- fecha de nacimiento -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom07" class="form-label">Fecha de nacimiento</label>
                        <input type="date" name= 'fecha_nacimiento' class="form-control" id="validationCustom07" required>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3" name="agregar">Agregar</button>

                    <?php
                        //Incluir el archivo EstadoModel.php
                        include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/PersonalModels/DifuntoModel.php");

                        //Verificar si se envió el formulario
                        if (isset($_POST['agregar'])) {
                            //Llamar al método create() de la clase EstadoModel
                            $resultado = DifuntoModel::create();

                            //Verificar el resultado y mostrar un mensaje al usuario
                            if ($resultado) {
                                echo "<script>window.alert('El difunto se ha agregado exitosamente')</script>";
                            } else {
                                echo "<script>window.alert('El difunto no pudo ser agregado')</script>";
                            }
                        }
                        ?>

            </div>
            </form>
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

    <script src="/Funeraria/Js/select_dinamico.js"></script>

</body>

</html>