<?php require_once '../config/connection.php';

class Students
{
  public function __construct() {}

  public function getAllStudents()
  {
    $query = "SELECT *
    FROM students s
    ORDER BY s.name;";
    return ejecutarConsulta($query);
  }

  public function getStudentById($id)
  {
    $query = "SELECT *
    FROM students
    WHERE id = {$id}";
    return ejecutarConsultaSimpleFila($query);
  }

  public function addStudent($name, $lastName, $phone)
  {
    $query = "INSERT INTO students (name, lastname, phone) 
    VALUES (
    '{$name}',
    '{$lastName}',
    '{$phone}'
    )";
    return ejecutarConsulta($query);
  }

  public function updateStudent($id, $name, $lastName, $phone)
  {
    $query = "UPDATE students 
    SET name = '{$name}',
    lastname = '{$lastName}',
    phone = '{$phone}'
    WHERE id = {$id}";
    return ejecutarConsulta($query);
  }

  public function deleteStudent($id)
  {
    $query = "DELETE FROM students
    WHERE id = {$id}";
    return ejecutarConsulta($query);
  }
}
