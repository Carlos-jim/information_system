<?php
    //Activar el almacenamiento en búfer de salida
    ob_start();
?>

<div class="main">

    <div class="agregarbtn">
        <button type="button" class="btn btn-primary" class="tittle"><a href="/Funeraria/Views/Datos_Personales/ClienteNatural/create.php">Agregar</a></button>
    </div>

    <div class="datos">

        <h2>Información Cliente Natural</h2>

        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">

                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombra</th>
                            <th>Apellido</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/PersonalModels/ClienteNaturalModel.php");

                        $clientesNaturales = ClienteNaturalModel::read();

                        foreach ($clientesNaturales as $clienteNatural) { ?>

                            <tr>
                                <td><?= $clienteNatural["cedula_natural"] ?></td>
                                <td><?= $clienteNatural["nombre"] ?></td>
                                <td><?= $clienteNatural["apellido"] ?></td>
                                <td>
                                    <a href="/Funeraria/Views/DatosPersonales/ClienteNatural/update.php?codigo=<?= $estado["codigo"] ?>&descripcion=<?= $estado["descripcion"] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="/Funeraria/Views/DatosPersonales/ClienteNatural/index.php?codigo=<?= $estado["codigo"] ?>" onclick="return confirmarEliminarEstado()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
    //Terminar el almacenamiento en búfer de salida y enviarlo al navegador
    ob_end_flush();
?>