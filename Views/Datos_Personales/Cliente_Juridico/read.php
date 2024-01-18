<div class="main">

    <div class="agregarbtn">
        <button type="button" class="btn btn-primary" class="tittle"><a href="/Funeraria/Views/Datos_Personales/persona_juridica/create.php">Agregar</a></button>
    </div>

    <div class="datos">

        <h2>Informacion persona juridica</h2>

        <!-- DataTable -->
        <div class="conta">
            <div class="container my-5">
                <div class="row">



                    <table id="example" class="table table-striped" style="width: 100%">

                        <thead>
                            <tr>
                                <th>Rif</th>
                                <th>Razon Social</th>
                                <th>Ciudad</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/PersonalModels/PersonaJuridicaModel.php");
                            $personasJuridicas = PersonaJuridicaModel::read();

                            foreach ($personasJuridicas as $personaJuridica) { ?>

                                <tr>
                                    <td class="text-center"> <?= $personaJuridica['rif'] ?> </td>
                                    <td> <?= $personaJuridica['razon_social'] ?> </td>
                                    <td> <?= $personaJuridica['ciudad'] ?></td>
                                    <td>
                                        <a href="/Funeraria/Views/DatosPersonales/ClienteNatural/update.php?codigo=<?= $estado["codigo"] ?>&descripcion=<?= $estado["descripcion"] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a href="/Funeraria/Views/DatosPersonales/ClienteNatural/index.php?codigo=<?= $estado["codigo"] ?>" onclick="return confirmarEliminarEstado()"> <button type="button" name="eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>

                        <tfoot>
                            <th>Rif</th>
                            <th>Razon Social</th>
                            <th>Ciudad</th>
                            <th>Acción</th>
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>