<?php
require_once "../config/session.php";
require_once "../models/coursesModel.php";

$course = new Course();

$error = false;
$message = array();
$hostmessage = "";
$dbmessage = "";
$output = array();

$op = isset($_GET['op']) ? $_GET['op'] : $_POST['op'];
$output["post"] = $_POST;
$output["get"] = $_GET;

switch ($op) {
  case 'getCourses':
    $courses = $course->getAllCourses();
    if ($courses->num_rows === 0) {
      $error = true;
      $message[] = "No courses found.";
    } else {
      while ($fetch = $courses->fetch_object()) {
        $output["courses"][] = "<div class='col-sm-4'>
          <div class='card'>
            <div class='card-body'>
            <div class='options'>
              <div class='dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-three-dots-vertical'></i></div>
              <ul class='dropdown-menu'>
                <li><a class='dropdown-item btn-details' data-course-id='{$fetch->id}' href='javascript:void(0)'><i class='bi bi-eye'></i> View Details</a></li>
                <li><a class='dropdown-item btn-edit' data-course-id='{$fetch->id}' href='javascript:void(0)'><i class='bi bi-pencil'></i> Edit</a></li>
                <li><a class='dropdown-item btn-delete text-danger' data-course-id='{$fetch->id}' href='javascript:void(0)'><i class='bi bi-trash'></i> Delete</a></li>
              </ul>
            </div>
              <div class='d-flex justify-content-between'>
                <div>
                  <h3 class='card-title'>{$fetch->name}</h3>
                  <p class='subtitle text-muted'>{$fetch->code}</p>
                </div>
              </div>
              <p class='card-text'>{$fetch->description}</p>
              <ul class='list-unstyled'>
                <li><i class='bi bi-people'></i> {$fetch->enrolled_students} students enrolled</li>
                <li><i class='bi bi-calendar'></i> {$fetch->shceduled_sessions} sessions scheduled</li>
              </ul>
              <div class='d-grid gap-2'>
                <button class='btn btn-primary' data-course-id='{$fetch->id}'>View Course Details</button>
              </div>
            </div>
          </div>
        </div>";
      }
      $message[] = "Courses loaded successfully.";
    }
    break;

  case 'addCourse':
    if (empty($_POST["id"])) {
      $rspta = $course->addCourse($_POST['name'], $_POST['code'], $_POST['description'], $_POST['startDate'], $_POST['endDate'], $_POST['status']);
    } else {
      $rspta = $course->updateCourse($_POST['id'], $_POST['name'], $_POST['code'], $_POST['description'], $_POST['startDate'], $_POST['endDate'], $_POST['status']);
    }
    $output["rspta"] = $rspta;
    if ($rspta) {
      $message[] = "Course added successfully.";
    } else {
      $error = true;
      $message[] = "Failed to add course.";
      $hostmessage = error_get_last();
      $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
    }
    break;
  case 'getCourse':
    $getcourse = $course->getCourse($_GET['id']);
    $output["course"] = $getcourse;
    break;
}

$output["error"] = $error;
$output["message"] = $message;
$output["hostmessage"] = $hostmessage;
$output["dbmessage"] = $dbmessage;

echo json_encode($output);
