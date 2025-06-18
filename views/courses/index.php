<?php
if (!defined('BASE_URL')) {
  define('BASE_URL', '/'); // Set this to your actual base URL
}
require_once '../layouts/header.php'; ?>
<main class="courses-main">
  <div class="row">
    <div class="col-12 col-sm-6">
      <h1 class="fw-bold mb-3">Courses</h1>
    </div>
    <div class="col-12 col-sm-6">
      <div class="d-flex justify-content-md-end justify-content-sm-start">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newCourse"><i class="bi bi-plus-circle me-2"></i>Add New Course</button>
      </div>
    </div>
  </div>
  <div class="form-group mb-5">
    <input type="text" class="form-control" id="search" placeholder="Search for courses...">
  </div>
  <div class="row g-4">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <h3 class="card-title">Title</h3>
              <p class="subtitle text-muted">sub</p>
            </div>
            <div>
              <i class="bi bi-three-dots-vertical"></i>
            </div>
          </div>
          <p class="card-text">Description</p>
          <ul class="list-unstyled">
            <li><i class="bi bi-people"></i> 2 students enrolled</li>
            <li><i class="bi bi-calendar"></i> 2 sessions scheduled</li>
          </ul>
          <div class="d-grid gap-2">
            <button class="btn btn-primary">View Course Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div class="modal fade" id="newCourse" tabindex="-1" aria-labelledby="newCourseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newCourseLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php require_once '../layouts/footer.php'; ?>