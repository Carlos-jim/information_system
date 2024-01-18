<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Funeraria/Styles/general.css">

    <title>Estados</title>

</head>

<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/Nav/nav_admin.php");
    ?>

    <!-- Main -->
    <section class="home">

        <div class="main">

            <h2 class="title-h2">Actualizar Estado</h2>

            <h3 class="title-h3">Localidad - Estado</h3>
            
            <form class="formulario" method="POST">
                
                <div class="secc-form-2">

                    <label for="validationCustom02" class="label-form">Código</label>
                    <input type="hidden" class="input-form" id="validationCustom02" value="<?= $_GET['codigo'] ?>" name="codigo">
                    <input type="text" class="input-form" id="validationCustom02" value="<?= $_GET['codigo'] ?>" disabled>

                </div>

                <!--Estados-->
                <div class="secc-form-2">

                    <label class="label-form" for="input-estados">Estado</label>
                    <input type="text" autocomplete="off" class="input-form" id="validationCustom02" value="<?= $_GET['descripcion'] ?> " required name="descripcion">

                </div>

                <button type="submit" class="bttn" name="actualizar">Actualizar</button>

            </form>

            <?php
                //Incluir el archivo EstadoModel.php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");

                //Verificar si se envió el formulario
                if (isset($_POST['actualizar'])) {
                    //Llamar al método update() de la clase EstadoModel
                    $resultado = EstadoModel::update();

                    //Verificar el resultado y mostrar un mensaje al usuario
                    if ($resultado) {
                        echo "<script>window.alert('El estado se ha actualizado exitosamente')</script>";
                        echo "<script>window.location.replace('/Funeraria/Views/Domicilio/Estado/index.php')</script>";
                    } else {
                        echo "<script>window.alert('El estado no pudo ser actualizado, verifique que los datos sean correctos e inténtelo nuevamente')</script>";
                    }
                }
                ?>

        </div>
    </section>

</body>

</html>