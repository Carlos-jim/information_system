<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Funeraria/Styles/general.css">

    <title>Ciudades</title>

</head>

<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/Nav/nav_admin.php");
    ?>

    <!-- Main -->

    <section class="home">
        <div class="main">

            <h2 class="title-h2">Agregar Ciudad</h2>

            <h3 class="title-h3">Localidad - Ciudad</h3>
            
            <form class="formulario" method="POST">

                

                <div class="form-2">
                    <?php
                    include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");
                    $sql_estado = EstadoModel::read();
                    ?>

                    <div class="secc-form-2">

                        <label for="validationCustom02" class="label-form">Código</label>
                        <input type="number" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el código" required name="codigo">

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

                        <label class="label-form" for="input-estados">Ciudad</label>
                        <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el nombre de la ciudad" required name="descripcion">

                    </div>

                </div>

                <button type="submit" class="bttn" name="guardar">Guardar</button>
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