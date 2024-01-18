<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Funeraria/Styles/general.css">

    <title>Ciudad</title>

</head>

<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/Nav/nav_admin.php");
    ?>

    <!-- Main -->

    <section class="home">
        <div class="main">

            <h2 class="title-h2">Actualizar usuario</h2>

            <h3 class="title-h3">Datos de persona</h3>

            <form class="formulario" method="POST">

                <div class="form-2">
                    <?php
                    include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");
                    $sql_estado = EstadoModel::read();
                    ?>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Cédula</label>
                        <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese la cédula" required name="cedula">

                    </div>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Nombre</label>
                        <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el nombre" required name="nombre">

                    </div>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Apellido</label>
                        <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el apellido" required name="apellido">

                    </div>

                    <!--Estados-->
                    <div class="secc-form-2">
                        <label for="validationCustom02" class="label-form">Estado</label>
                        <select class="select-form" name="slc_estado" id="slc_estado">
                            <option value="0">Seleccione el estado</option>
                            <?php
                            while ($datosE = $sql_estado->fetch_assoc()) { ?>
                                <option value="<?php echo $datosE['codigo'] ?>"> <?php echo $datosE['descripcion'] ?> </option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <!-- Municipio -->
                    <div class="secc-form-2">
                        <label for="validationCustom02" class="label-form">Municipio</label>
                        <select class="select-form" name="slc_municipio" id="slc_municipio">
                            <option value="0">Seleccione el municipio</option>
                        </select>
                    </div>

                    <!-- Parroquia -->
                    <div class="secc-form-2">
                        <label for="validationCustom02" class="label-form">Parroquia</label>
                        <select class="select-form" name="slc_parroquia" id="slc_parroquia">
                            <option value="0">Seleccione la parroquia</option>
                        </select>
                    </div>

                    <!-- Ciudad -->
                    <div class="secc-form-2">
                        <label for="validationCustom02" class="label-form">Ciudad</label>
                        <select class="select-form" name="slc_ciudad" id="slc_ciudad">
                            <option value="0">Seleccione la ciudad</option>
                        </select>
                    </div>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Dirección</label>
                        <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese la dirección" required name="direccion">

                    </div>

                </div>


            </form>

            <h3 class="title-h3">Datos de usuario</h3>

            <form class="formulario" method="POST">
                <div class="form-2">
                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">No. Identificación</label>
                        <input type="number" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el número de identificación" required name="nid">

                    </div>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Nombre de usuario</label>
                        <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el nombre de usuario" required name="login">

                    </div>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Contraseña</label>
                        <input type="password" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese la contraseña" required name="password">

                    </div>

                    <!-- Rif Funeraria -->
                    <div class="secc-form-2">
                        <label for="validationCustom02" class="label-form">Funeraria</label>
                        <select class="select-form" name="slc_funeraria" id="slc_funeraria">
                            <option value="0">Seleccione la funeraria</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="bttn" name="actualizar">Actualizar</button>
            </form>



            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/CiudadModel.php");

            if (isset($_POST['guardar'])) {

                $resultado = CiudadModel::create();

                if ($resultado) {
                    echo "<script>window.alert('La ciudad se ha agregado exitosamente')</script>";
                } else {
                    echo "<script>window.alert('La ciudad no pudo ser agregado, verifique que los datos sean correctos e inténtelo nuevamente')</script>";
                }
            }
            ?>
        </div>
    </section>

</body>

</html>