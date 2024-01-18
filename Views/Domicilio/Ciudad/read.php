<?php
//Activar el almacenamiento en búfer de salida
ob_start();
?>

<!-- DataTable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

<section class="home">

    <div class="agregarbttn">
        <a href="/Funeraria/Views/Domicilio/Ciudad/create.php"><button type="button" class="bttn">Agregar</button></a>
    </div>
    
    <div class="main">

        <h2 class="title-h2">Información Ciudades</h2>


        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Ciudad</th>
                            <th class="text-center">Parroquia</th>
                            <th class="text-center">Municipio</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/CiudadModel.php");

                        $ciudades = CiudadModel::read();

                        foreach ($ciudades as $ciudad) { ?>

                            <tr>
                                <td class="text-center"><?= $ciudad["ciudad_codigo"] ?></td>
                                <td><?= $ciudad["ciudad"] ?></td>
                                <td><?= $ciudad["parroquia"] ?></td>
                                <td><?= $ciudad["municipio"] ?></td>
                                <td><?= $ciudad["estado"] ?></td>
                                <td class="text-center">
                                    <a href="/Funeraria/Views/Domicilio/Ciudad/update.php?ciudad_codigo=<?= $ciudad['ciudad_codigo']?>&ciudad=<?= $ciudad['ciudad'] ?>&parroquia_codigo=<?= $ciudad['parroquia_codigo'] ?>&parroquia=<?= $ciudad['parroquia'] ?>&municipio_codigo=<?= $ciudad['municipio_codigo'] ?>&municipio=<?= $ciudad['municipio'] ?>&estado_codigo=<?= $ciudad['estado_codigo'] ?>&estado=<?= $ciudad['estado'] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/Domicilio/Ciudad/index.php?ciudad_codigo=<?= $ciudad['ciudad_codigo'] ?>" onclick="return eliminarCiudad()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

                <?php
                    include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/CiudadModel.php");

                    if (isset($_GET['ciudad_codigo'])) {

                        $resultado = CiudadModel::delete($_GET['ciudad_codigo']);

                        if ($resultado) {
                            echo "<script>window.alert('La ciudad se ha eliminado exitosamente')</script>";
                            echo "<script>window.location.replace('/Funeraria/Views/Domicilio/Ciudad/index.php')</script>";
                        } else {
                            echo "<script>window.alert('La ciudad no pudo ser eliminado, verifique que no esté siendo utilizado por otras entidades')</script>";
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