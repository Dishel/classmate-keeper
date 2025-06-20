<?php
require_once "../config/session.php";
require_once "../models/coursesModel.php";

$course = new Course();

$error = false;
$message = array();
$hostmessage = "";
$dbmessage = "";
$output = array();

switch ($_GET['op']) {
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
              <div class='d-flex justify-content-between'>
                <div>
                  <h3 class='card-title'>{$fetch->name}</h3>
                  <p class='subtitle text-muted'>{$fetch->code}</p>
                </div>
                <div>
                  <i class='bi bi-three-dots-vertical'></i>
                </div>
              </div>
              <p class='card-text'>{$fetch->description}</p>
              <ul class='list-unstyled'>
                <li><i class='bi bi-people'></i> {$fetch->enrolled_students} students enrolled</li>
                <li><i class='bi bi-calendar'></i> {$fetch->shceduled_sessions} sessions scheduled</li>
              </ul>
              <div class='d-grid gap-2'>
                <button class='btn btn-primary'>View Course Details</button>
              </div>
            </div>
          </div>
        </div>";
      }
      $message[] = "Courses loaded successfully.";
    }
    break;
}

$output["error"] = $error;
$output["message"] = $message;
$output["hostmessage"] = $hostmessage;
$output["dbmessage"] = $dbmessage;

echo json_encode($output);
