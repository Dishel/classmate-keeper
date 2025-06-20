<?php
require_once "../config/session.php";
require_once "../models/dashboardModel.php";

$dashboard = new Dashboard();

$error = false;
$message = array();
$hostmessage = "";
$dbmessage = "";
$output = array();

switch ($_GET['op']) {
  case 'loadDashboardData':
    $totalStudents = $dashboard->getTotalStudents();
    $activeCourses = $dashboard->getActiveCourses();
    $upcomingClases = $dashboard->upcomingClasses();
    if (isset($totalStudents) && isset($activeCourses) && isset($upcomingClases)) {
      $output["totalStudents"] = $totalStudents["total"];
      $output["activeCourses"] = $activeCourses["total"];
      while ($fetch = $upcomingClases->fetch_object()) {
        $output["upcomingClasses"][] = "<div class='mb-2 p-3 border rounded bg-white'>
          <div class='fw-semibold'>{$fetch->name} - {$fetch->topic}</div>
          <div class='text-muted'>
          <p class='small mb-0'>{$fetch->date}</p>
          <p class='small'>{$fetch->timeStart} - {$fetch->timeFinish}</p>
          </div>
        </div>";
      }
    } else {
      $error = true;
      $message[] = "Error fetching dashboard data.";
      $hostmessage = error_get_last();
      $dbmessage = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
    }
    break;
}

$output["error"] = $error;
$output["message"] = $message;
$output["hostmessage"] = $hostmessage;
$output["dbmessage"] = $dbmessage;

echo json_encode($output);
