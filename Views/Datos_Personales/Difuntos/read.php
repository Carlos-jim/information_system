<?php
    //Activar el almacenamiento en búfer de salida
    ob_start();
?>

<div class="main">

    <div class="agregarbtn">
        <button type="button" class="btn btn-primary" class="tittle"><a href="/Funeraria/Views/Datos_Personales/difuntos/create.php">Agregar</a></button>
    </div>

    <div class="datos">

        <h2>Información Difunto</h2>

        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Causa Muerte</th>
                            <th>Lugar Muerte</th>
                            <th>Fecha Muerte</th>
                            <th>Fecha Nacimiento</th>
                            <th>Cedula Natural</th>
                            <th>Rif Cementerio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/PersonalModels/DifuntoModel.php");

                        $difuntos = DifuntoModel::read();

                        foreach ($difuntos as $difunto) { ?>

                            <tr>
                                <!--AQUI COMIENZA LA TABLA NO SE COMO HACER QUE CORRAN LOS CAMPOS DE DIFUNTO-->
                                <td class="text-center"><?= $difunto["codigo"] ?></td>
                                <td><?= $difunto["causa_muerte"] ?></td>
                                <td><?= $difunto["lugar_muerte"] ?></td>
                                <td><?= $difunto["fecha_muerte"] ?></td>
                                <td><?= $difunto["fecha_nacimiento"] ?></td>
                                <td><?= $difunto["cedula_natural"] ?></td>
                                <td><?= $difunto["cementerio_rif_juridico"] ?></td>
                                <td>
                                    <a href="/Funeraria/Views/DatosPersonales/ClienteNatural/update.php?codigo=<?= $estado["codigo"] ?>&descripcion=<?= $estado["descripcion"] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/DatosPersonales/ClienteNatural/index.php?codigo=<?= $estado["codigo"] ?>" onclick="return confirmarEliminarEstado()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Causa Muerte</th>
                            <th>Lugar Muerte</th>
                            <th>Fecha Muerte</th>
                            <th>Fecha Nacimiento</th>
                            <th>Cedula Natural</th>
                            <th>Rif Cementerio</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>

                <?php
                //Incluir el archivo EstadoModel.php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/PersonalModels/DifuntoModel.php");

                //Verificar si se recibió el parámetro cedula por el método POST
                if (isset($_GET['cedula'])) {
                    //Llamar al método delete() de la clase EstadoModel pasando el código del estado
                    $resultado = DifuntoModel::delete($_GET['cedula']);

                    //Verificar el resultado y mostrar un mensaje al usuario
                    if ($resultado) {
                        header("Location: /Funeraria/Views/View/Datos_Personales/difuntos/index.php");
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