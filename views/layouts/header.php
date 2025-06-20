<?php require_once "../../config/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classmate Keeper</title>
  <link rel="stylesheet" href="../../src/plugins/bootstrap-icons-1.13.1/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../src/plugins/bootstrap-5.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../src/css/main.css">
</head>

<body>
  <?php
  $currentUrl = $_SERVER['REQUEST_URI'];
  $segments = explode('/', trim($currentUrl, '/'));
  $lastSegment = end($segments);
  if ($lastSegment !== "login") { ?>
    <div class="d-flex">
      <!-- Sidebar (Desktop) -->
      <nav class="sidebar bg-white border-end p-3 d-none d-md-block">
        <div class="d-flex align-items-center mb-4">
          <img src="/src/img/logo.png" alt="Classmate Keeper Logo" style="width:32px;height:32px;" class="me-2">
          <span class="fw-bold fs-5">Classmate Keeper</span>
        </div>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link active d-flex align-items-center" href="../dashboard/"><i class="bi bi-house-door me-2"></i>Dashboard</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="../students/"><i class="bi bi-people me-2"></i>Students</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="../courses/"><i class="bi bi-journal-bookmark me-2"></i>Courses</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="../attendance/"><i class="bi bi-person-check me-2"></i>Attendance</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="../reports/"><i class="bi bi-bar-chart me-2"></i>Reports</a>
          </li>
        </ul>
      </nav>
      <!-- Mobile Bottom Nav -->
      <nav class="mobile-nav d-md-none bg-white border-top fixed-bottom">
        <ul class="nav justify-content-around py-2 mb-0">
          <li class="nav-item text-center">
            <a class="nav-link d-flex flex-column active" href="../dashboard/">
              <i class="bi bi-house-door fs-4"></i>
              <span class="small">Dashboard</span>
            </a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link d-flex flex-column" href="../students/">
              <i class="bi bi-people fs-4"></i>
              <span class="small">Students</span>
            </a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link d-flex flex-column" href="../courses/">
              <i class="bi bi-journal-bookmark fs-4"></i>
              <span class="small">Courses</span>
            </a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link d-flex flex-column" href="../attendance/">
              <i class="bi bi-person-check fs-4"></i>
              <span class="small">Attendance</span>
            </a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link d-flex flex-column" href="../reports/">
              <i class="bi bi-bar-chart fs-4"></i>
              <span class="small">Reports</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- Main Content Wrapper -->
      <div class="flex-grow-1">
        <!-- Header -->
        <header class="bg-white border-bottom px-4 py-3 d-flex align-items-center justify-content-between position-relative">
          <div class="d-flex align-items-center">
            <img src="/src/img/logo.png" alt="Classmate Keeper Logo" style="width:32px;height:32px;" class="me-2">
            <span class="fw-bold fs-5">Classmate Keeper</span>
          </div>
          <div class="d-flex align-items-center">
            <div class="dropdown">
              <button class="btn p-0 border-0 bg-transparent" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://via.placeholder.com/50x50.png?text=50x+50" alt="User Avatar" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;">
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userMenu" style="min-width:200px;">
                <li>
                  <h6 class="dropdown-header fw-bold">Teacher</h6>
                </li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item d-flex align-items-center text-danger" href="/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Log out</a></li>
              </ul>
            </div>
          </div>
        </header>
      <?php } ?>
      <!-- ...main content will be here... -->