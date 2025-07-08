<?php include_once '../layouts/header.php'; ?>
<link rel="stylesheet" href="/src/plugins/DataTables/datatables.min.css">

<main>
  <div class="row">
    <div class="col-12 col-sm-6">
      <h1 class="fw-bold mb-3">Manage Students</h1>
    </div>
    <div class="col-12 col-sm-6">
      <div class="d-flex justify-content-md-end justify-content-sm-start">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalStudent"><i class="bi bi-plus-circle me-2"></i>Add New Students</button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h2>Student List</h2>
    </div>
    <div class="card-body">
      <table id="studentTable" class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Student rows will be populated here -->
        </tbody>
      </table>
    </div>
  </div>


</main>

<div class="modal fade" id="modalStudent" tabindex="-1" aria-labelledby="modalStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="text-center w-100">
          <h1 class="modal-title fs-6" id="modalStudentLabel">Add New Student</h1>
          <p class="text-muted"><small>Fill in the form to add a new student.</small></p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="mb-3">
            <label for="studentName" class="form-label fs-6">Name</label>
            <input type="text" class="form-control" id="studentName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="studentLastName" class="form-label fs-6">Last Name</label>
            <input type="text" class="form-control" id="studentLastName" name="studentLastName" required>
          </div>
          <div class="mb-3">
            <label for="studentPhone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="studentPhone" name="phone" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include_once '../layouts/footer.php'; ?>
<script src="/src/plugins/DataTables/datatables.min.js"></script>
<script src="/src/js/students.js"></script>