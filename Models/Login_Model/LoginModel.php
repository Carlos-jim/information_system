<?php
class LoginModel
{

  public static function verificarAccesoAdmin()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $admin_cfg  = require($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Config/admin.php");

      $login = $_POST["login"];
      $contrasena = $_POST["contrasena"];
      if ($login === $admin_cfg["user"] && $contrasena === $admin_cfg["pass"]) {
        return true;
      } else {
        return false;
      }
    }
  }

  public static function verificarAccesoUser()
  {
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Core/conexion.php");
    $conexion = Conectar::conexion();

    $login = $_POST["login"];
    $contrasena = $_POST["contrasena"];

    // Consulta para verificar las credenciales
    $sql = "SELECT * FROM usuario WHERE login = '$login' AND password = '$contrasena'";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
      return true;
    } else {
      return false;
    }
  }
}
