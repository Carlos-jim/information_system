<?php
//Activar el almacenamiento en búfer de salida
ob_start();
?>

<!-- DataTable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

<section class="home">
    
    <div class="agregarbttn">
        <a href="/Funeraria/Views/Domicilio/Municipio/create.php"><button type="button" class="bttn" class="tittle">Agregar</button></a>
    </div>

    <main class="main">

        <h2 class="title-h2">Información Municipios</h2>

        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Municipio</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/MunicipioModel.php");

                        $municipios = MunicipioModel::read();

                        foreach ($municipios as $municipio) { ?>

                            <tr>
                                <td class="text-center"><?= $municipio["codigo"] ?></td>
                                <td><?= $municipio["descripcion"] ?></td>
                                <td><?= $municipio["estado"] ?></td>
                                <td class="text-center">
                                    <a href="/Funeraria/Views/Domicilio/Municipio/update.php?codigo=<?= $municipio["codigo"] ?>&descripcion=<?= $municipio["descripcion"] ?>&estado=<?= $municipio["estado"] ?>&estado_codigo=<?= $municipio["estado_codigo"] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/Domicilio/Municipio/index.php?codigo=<?= $municipio["codigo"] ?>" onclick="return eliminarMunicipio()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/MunicipioModel.php");

                if (isset($_GET['codigo'])) {

                    $resultado = MunicipioModel::delete($_GET['codigo']);

                    if ($resultado) {
                        echo "<script>window.alert('El municipio se ha eliminado exitosamente')</script>";
                        echo "<script>window.location.replace('/Funeraria/Views/Domicilio/Municipio/index.php')</script>";
                    } else {
                        echo "<script>window.alert('El municipio no pudo ser eliminado, verifique que no esté siendo utilizado por otras entidades')</script>";
                    }
                }
                ?>

            </div>
        </div>
    </main>
</section>

<!-- DataTable-->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="/Funeraria/Js/datatable.js"></script>

<?php
//Terminar el almacenamiento en búfer de salida y enviarlo al navegador
ob_end_flush();
?>