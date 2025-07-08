<?php require_once '../models/studentsModel.php';

$op = isset($_GET['op']) ? $_GET['op'] : $_POST['op'];

$student = new Students();

$error = false;
$message = array();
$hostmessage = "";
$dbmessage = "";
$output = array();

switch ($op) {
  case 'listStudents':
    $students = $student->getAllStudents();
    if ($students->num_rows === 0) {
      $error = true;
      $message[] = "No students found.";
      $hostmessage = error_get_last();
      $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
    } else {
      while ($fetch = $students->fetch_object()) {
        $output["students"][] = $fetch;
      }
      $message[] = "Students loaded successfully.";
    }
    break;

  case 'getStudent':
    $id = $_GET['id'];
    $studentData = $student->getStudentById($id);
    break;

  case 'addStudent':
    $id = $_POST['id'] ? limpiarCadena($_POST['id']) : null;
    $name = $_POST['name'] ? limpiarCadena($_POST['name']) : null;
    $lastName = $_POST['lastName'] ? limpiarCadena($_POST['lastName']) : null;
    $phone = $_POST['phone'] ? limpiarCadena($_POST['phone']) : null;
    if (isset($id) && !empty($id)) {
      $result = $student->updateStudent($id, $name, $lastName, $phone);
    } else {
      $result = $student->addStudent($name, $lastName, $phone);
    }
    $output["result"] = $result;
    if ($result) {
      $message[] = "Student added successfully.";
    } else {
      $error = true;
      $message[] = "Failed to add student.";
      $hostmessage = error_get_last();
      $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
    }
    break;

  case 'deleteStudent':
    $id = $_POST['id'];
    $result = $student->deleteStudent($id);
    if ($result) {
      $message[] = "Student deleted successfully.";
    } else {
      $error = true;
      $message[] = "Failed to delete student.";
      $hostmessage = error_get_last();
      $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
    }
    break;

  default:
    echo json_encode(["error" => "Invalid operation"]);
    break;
}

$output["error"] = $error;
$output["message"] = $message;
$output["hostmessage"] = $hostmessage;
$output["dbmessage"] = $dbmessage;

echo json_encode($output);
