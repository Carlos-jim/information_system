<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente Juridica</title>
    <link rel="stylesheet" href="/Funeraria/Styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/nav_admin.php");
    ?>

    <div class="main">
        <div class="datos">
            <h2>Persona Juridica</h2>
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
            $conexion = Conectar::conexion();
            $sql_estado = $conexion->query("SELECT * FROM domicilio_estado ORDER BY descripcion");
            ?>

            <div class="form">
                <form class="row g-3">

                    <!-- Campos para persona juridica-->

                    <!--RIF-->
                    <div class="col-md-6 mt-3">
                        <label for="rif" class="form-label">RIF:</label>
                        <input type="text" id="rif" name="rif" class="form-control" pattern="[VEJG]-\d{8}-\d" required>
                        <span id="rifError" style="color:red; display:none;">Formato de RIF inválido</span>
                    </div>

                    <!-- Razon Social -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom03" class="form-label">Razon Social</label>
                        <input type="text" class="form-control" id="validationCustom03" value="" required>
                    </div>

                    <!-- Telefono-->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom06" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="validationCustom06" required>
                    </div>

                    <!-- Correo -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom07" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="validationCustom07" required>
                    </div>

                    <!--Estados-->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Estado</label>
                        <select class="form-select" name="slc_estado" id="slc_estado">
                            <option value="0">Seleccione el estado</option>
                            <?php
                            while ($datosE = $sql_estado->fetch_assoc()) { ?>
                                <option value="<?php echo $datosE['codigo'] ?>"> <?php echo $datosE['descripcion'] ?> </option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <!-- Municipio -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Municipio</label>
                        <select class="form-select" name="slc_municipio" id="slc_municipio">
                            <option value="0">Seleccione el municipio</option>
                        </select>
                    </div>

                    <!-- Parroquia -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Parroquia</label>
                        <select class="form-select" name="slc_parroquia" id="slc_parroquia">
                            <option value="0">Seleccione la parroquia</option>
                        </select>
                    </div>

                    <!-- Ciudad -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Ciudad</label>
                        <select class="form-select" name="slc_ciudad" id="slc_ciudad">
                            <option value="0">Seleccione la ciudad</option>
                        </select>
                    </div>

                    <!-- Direccion -->
                    <div class="col-md-6 mt-3">
                        <label for="validationCustom02" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" required placeholder="Ej. Calle Luis Fernando">
                    </div>




                    <BR></BR>
                    <button type="submit" class="btn btn-primary mb-3">Enviar</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Icons and Alerts-->
    <script src="https://kit.fontawesome.com/6ce5fbca39.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap-->
    <script src="/Funeraria/Js/Bootstrap/bootstrap.bundle.min.js"></script>

    <!--Script of the Icons-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- DataTable-->
    <script src="/Funeraria/Js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/Funeraria/Js/datatable.js"></script>

    <!-- Icons and Alerts-->
    <script src="https://kit.fontawesome.com/6ce5fbca39.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="/Funeraria/Js/select_dinamico.js"></script>
</body>

</html>