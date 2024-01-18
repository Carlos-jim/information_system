<?php
    //Activar el almacenamiento en búfer de salida
    ob_start();
?>

<div class="main">

    <div class="agregarbtn">
        <button type="button" class="btn btn-primary" class="tittle"><a href="/Funeraria/Views/View/Datos_Maestros/Servicios/create.php">Agregar</a></button>
    </div>

    <div class="datos">

        <h2>Servicioss Registrados</h2>

        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Domicilio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/MaestroModels/ServiciosPrestadosModel.php");

                        $servicios = ServiciosPrestadosModel::read();

                        foreach ($servicios as $Servicio) { ?>

                            <tr>
                                <!--AQUI COMIENZA LA TABLA NO SE COMO HACER QUE CORRAN LOS CAMPOS DE Servicios-->
                                <td class="text-center"><?= $Servicio["rif_juridico"] ?></td>
                                <td><?= $Servicio["tipo"] ?></td>
                                <td><!--                                                                                  NO SE QUE HACE AQUI PERO DESCRIPCION NO ES UN CAMPO DE DIFUNTO-->
                                    <a href="/Funeraria/Views/View/Datos_Maestros/servicios_prestados/update.php?funeraria_rif=<?= $Servicios["funeraria_rif_juridico"] ?>&descripcion=<?= $Servicios["descripcion"] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/View/Datos_Maestros/servicios_prestados/index.php?funeraria_rif=<?= $Servicios["funeraria_rif_juridico"] ?>" onclick="return confirmarEliminarEstado()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Causa de Muerte</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>

                <?php
                //Incluir el archivo EstadoModel.php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/MaestroModels/ServiciosPrestadosModel.php");

                //Verificar si se recibió el parámetro rif por el método POST
                if (isset($_GET['funeraria_rif'])) {
                    //Llamar al método delete() de la clase EstadoModel pasando el código del estado
                    $resultado = ServiciosPrestadosModel::delete($_GET['funeraria_rif']);

                    //Verificar el resultado y mostrar un mensaje al usuario
                    if ($resultado) {
                        header("Location: /Funeraria/Views/View/Datos_Maestros/servicios_prestados/index.php");
                        echo "<script>alert('El estado se ha eliminado exitosamente')</script>";
                        exit();
                    } else {
                        echo "<script>alert('El estado no pudo ser eliminado, verifique que no este siendo utilizado por otras entidades')</script>";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php
    //Terminar el almacenamiento en búfer de salida y enviarlo al navegador
    ob_end_flush();
?>