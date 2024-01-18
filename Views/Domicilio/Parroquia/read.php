<?php
//Activar el almacenamiento en búfer de salida
ob_start();
?>

<!-- DataTable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

<section class="home">
    <div class="agregarbttn">
        <a href="/Funeraria/Views/Domicilio/Parroquia/create.php"><button type="button" class="bttn">Agregar</button></a>
    </div>

    <div class="main">

        <h2 class="title-h2">Información Parroquias</h2>



        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Parroquia</th>
                            <th class="text-center">Municipio</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/ParroquiaModel.php");

                        $parroquias = ParroquiaModel::read();

                        foreach ($parroquias as $parroquia) { ?>

                            <tr>
                                <td class="text-center"><?= $parroquia["parroquia_codigo"] ?></td>
                                <td><?= $parroquia["parroquia"] ?></td>
                                <td><?= $parroquia["municipio"] ?></td>
                                <td><?= $parroquia["estado"] ?></td>
                                <td class="text-center">
                                    <a href="/Funeraria/Views/Domicilio/Parroquia/update.php?parroquia_codigo=<?= $parroquia['parroquia_codigo'] ?>&parroquia=<?= $parroquia['parroquia'] ?>&municipio_codigo=<?= $parroquia['municipio_codigo'] ?>&municipio=<?= $parroquia['municipio'] ?>&estado_codigo=<?= $parroquia['estado_codigo'] ?>&estado=<?= $parroquia['estado'] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/Domicilio/Parroquia/index.php?parroquia_codigo=<?= $parroquia['parroquia_codigo'] ?>" onclick="return eliminarParroquia()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/ParroquiaModel.php");

                if (isset($_GET['parroquia_codigo'])) {

                    $resultado = ParroquiaModel::delete($_GET['parroquia_codigo']);

                    if ($resultado) {
                        echo "<script>window.alert('La parroquia se ha eliminado exitosamente')</script>";
                        echo "<script>window.location.replace('/Funeraria/Views/Domicilio/Parroquia/index.php')</script>";
                    } else {
                        echo "<script>window.alert('La parroquia no pudo ser eliminado, verifique que no esté siendo utilizado por otras entidades')</script>";
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