<?php
require_once "../config/session.php";
require_once "../models/loginModel.php";

$login = new Login();

$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$password = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";

$rpsta = $login->login($email);

$error = false;
$message = array();
$hostmessage = "";
$dbmessage = "";
$output = array();

if (!empty($rpsta)) {
  if ($rpsta["password"] == $password) {
    $_SESSION["name"] = $rpsta["name"];
    $message[] = "Acceso correcto.";
  } else {
    $error = true;
    $hostmessage = error_get_last();
    $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
    $message[] = "Contraseña incorrecta";
    $message[] = "password";
  }
} else {
  $error = true;
  $hostmessage = error_get_last();
  $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
  $message[] = "No pudimos encontrar al usuario <strong>'{$email}'</strong>.";
  $message[] = "email";
}

$output["error"] = $error;
$output["host"] = $hostmessage;
$output["db"] = $dbmessage;
$output["message"] = $message;

echo json_encode($output);
