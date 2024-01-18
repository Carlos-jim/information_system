<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="/Funeraria/Styles/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="container" onclick="onclick">
    <form method="POST">
      <div class="top"></div>
      <div class="bottom"></div>
      <div class="center">
        <h2>Iniciar Sesión</h2>
        <input autocomplete="off" type="text" required name="login" placeholder="Nombre" />
        <input autocomplete="off" type="password" required name="contrasena" placeholder="Contraseña" />
        <h2>&nbsp;</h2>

        <!-- partial:index.partial.html -->
        <button name="iniciar">Iniciar</button>

        <!-- partial -->

      </div>
    </form>


  </div>

  <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Login_Model/LoginModel.php");
    $validacionAdmin = LoginModel::verificarAccesoAdmin();

    if (isset($_POST['iniciar'])){
      if ($validacionAdmin) {
        echo "<script>window.location.replace('/Funeraria/Views/Principal/principal_admin.php')</script>";
      } else {
        $validacionUser = LoginModel::verificarAccesoUser();

        if ($validacionUser) {
          echo "<script>window.location.replace('/Funeraria/Views/Principal/principal_user.php')</script>";
        } else {
          echo "<script>window.alert('Usuario o contraseña incorrectos, intentelo nuevamente.')</script>";
        }
      }
    }
    
  ?>
  <!-- partial -->
  <script src='https://codepen.io/banik/pen/ReNNrO/3f837b2f0085b5125112fc455941ea94.js'></script>
</body>

</html>