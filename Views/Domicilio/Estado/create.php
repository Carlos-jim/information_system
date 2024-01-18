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

            <h2 class="title-h2">Agregar Estado</h2>
            
            <h3 class="title-h3">Localidad - Estado</h3>
            
            <form class="formulario" method="POST">

                <div class="secc-form-2">

                    <label for="validationCustom02" class="label-form">Código</label>
                    <input type="number" pattern="[0-9]*" title="Solo se perminen números" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el código" required name="codigo">

                </div>


                <div class="secc-form-2">

                    <label class="label-form" for="input-estados">Estado</label>
                    <input type="text" autocomplete="off" class="input-form" id="validationCustom02" placeholder="Ingrese el nombre del estado" required name="descripcion">

                </div>

                <button type="submit" class="bttn" name="guardar">Guardar</button>

            </form>

            <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");

                if (isset($_POST['guardar'])) {

                    $resultado = EstadoModel::create();

                    if ($resultado) {
                        echo "<script>window.alert('El estado se ha agregado exitosamente')</script>";
                    } else {
                        echo "<script>window.alert('El estado no pudo ser agregado, verifique que los datos sean correctos e inténtelo nuevamente')</script>";
                    }
                }
            ?>

        </div>
    </section>

</body>

</html>