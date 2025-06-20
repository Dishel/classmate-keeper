<?php require_once "../config/connection.php";

class Login
{
  // Constructor
  public function __construct() {}

  public function login($username)
  {
    $sql = "SELECT *
    FROM users u
    WHERE u.email = '{$username}'";
    return ejecutarConsultaSimpleFila($sql);
  }
}
