<?php
//Activar el almacenamiento en búfer de salida
ob_start();
?>

<!-- DataTable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

<section class="home">

    <div class="agregarbttn">
        <a href="/Funeraria/Views/Domicilio/Estado/create.php"><button type="button" class="bttn" class="tittle">Agregar</button></a>
    </div>
    
    <div class="main">

        <h2 class="title-h2">Información Estados</h2>

        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");

                        $estados = EstadoModel::read();

                        foreach ($estados as $estado) { ?>

                            <tr>
                                <td class="text-center"><?= $estado["codigo"] ?></td>
                                <td><?= $estado["descripcion"] ?></td>
                                <td class="text-center">
                                    <a href="/Funeraria/Views/Domicilio/Estado/update.php?codigo=<?= $estado["codigo"] ?>&descripcion=<?= $estado["descripcion"] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/Domicilio/Estado/index.php?codigo=<?= $estado["codigo"] ?>" onclick="return eliminarEstado()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php
                //Incluir el archivo EstadoModel.php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");

                //Verificar si se recibió el parámetro codigo por el método POST
                if (isset($_GET['codigo'])) {
                    //Llamar al método delete() de la clase EstadoModel pasando el código del estado
                    $resultado = EstadoModel::delete($_GET['codigo']);

                    //Verificar el resultado y mostrar un mensaje al usuario
                    if ($resultado) {
                        echo "<script>window.alert('El estado se ha eliminado exitosamente')</script>";
                        echo "<script>window.location.replace('/Funeraria/Views/Domicilio/Estado/index.php')</script>";
                    } else {
                        echo "<script>window.alert('El estado no pudo ser eliminado, verifique que no esté siendo utilizado por otras entidades')</script>";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>

<!-- DataTable-->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="/Funeraria/Js/datatable.js"></script>

<?php
//Terminar el almacenamiento en búfer de salida y enviarlo al navegador
ob_end_flush();
?>