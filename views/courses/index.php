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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="text-center w-100">
          <h1 class="modal-title fs-6" id="newCourseLabel">Create New Course</h1>
          <p class="text-muted"><small>Fill in the form to create a new course</small></p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group mb-3">
            <label for="courseTitle" class="form-label fs-6">Course Title</label>
            <input type="text" class="form-control" id="courseTitle" placeholder="Enter course title" required>
          </div>
          <div class="form-group mb-3">
            <label for="courseCode" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="courseCode" placeholder="Enter course code" required>
          </div>
          <div class="form-group mb-3">
            <label for="courseDescription" class="form-label">Description (optional)</label>
            <textarea class="form-control" id="courseDescription" rows="3" placeholder="Enter course description"></textarea>
          </div>
          <div class="form-group mb-3">
            <label for="courseStatus" class="form-label">Course Status</label>
            <select class="form-select" id="courseStatus">
              <option selected>Select status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="concluded">Concluded</option>
            </select>
          </div>
          <div class="row mb-3">
            <div class="form-group col-6">
              <label for="courseStartDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="courseStartDate">
            </div>
            <div class="form-group col-6">
              <label for="courseEndDate" class="form-label">End Date</label>
              <input type="date" class="form-control" id="courseEndDate">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php require_once '../layouts/footer.php'; ?>