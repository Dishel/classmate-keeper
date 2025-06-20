<?php require_once '../layouts/header.php'; ?>
<main class="dashboard-main">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Welcome Back, <span class="text-primary"><?php echo $_SESSION["name"]; ?>!</span></h3>
  </div>
  <h1 class="fw-bold mb-3">Dashboard</h1>
  <div class="row mb-4 g-4">
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title mb-2">Quick Actions</h5>
          <p class="text-muted mb-3">Common tasks at your fingertips.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-light border text-start"><i class="bi bi-people me-2"></i>Manage Students</button>
            <a href="../courses/" class="btn btn-light border text-start"><i class="bi bi-journal-bookmark me-2"></i>Manage Courses</a>
            <button class="btn btn-light border text-start"><i class="bi bi-person-check me-2"></i>Mark Attendance</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-3">
        <div class="col-12 col-sm-6">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-people fs-4 me-2 text-primary"></i>
                <div>
                  <div class="fw-bold fs-5" id="total-students">4</div>
                  <div class="text-muted small">Total Students</div>
                </div>
              </div>
              <div class="text-muted small">Registered in the system</div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-journal-bookmark fs-4 me-2 text-success"></i>
                <div>
                  <div class="fw-bold fs-5" id="active-courses">2</div>
                  <div class="text-muted small">Active Courses</div>
                </div>
              </div>
              <div class="text-muted small">Currently being offered</div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-bell fs-4 me-2 text-warning"></i>
                <div>
                  <div class="fw-bold fs-5" id="pending-notifications">1</div>
                  <div class="text-muted small">Pending Notifications</div>
                </div>
              </div>
              <a href="#" class="small">View all notifications</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <h5 class="card-title mb-2"><i class="bi bi-calendar-event me-2"></i>Upcoming Classes</h5>
          <p class="text-muted mb-3">Your next few scheduled classes.</p>
          <div id="upcoming-classes">
            <div class="mb-2 p-3 border rounded bg-white">
              <div class="fw-semibold">Quantum Physics Fundamentals - Wave-Particle Duality</div>
              <div class="text-muted">Friday, June 13, 2025</div>
              <div class="small">10:00 - 11:30</div>
            </div>
            <div class="mb-2 p-3 border rounded bg-white">
              <div class="fw-semibold">Creative Writing Workshop - The Art of Storytelling</div>
              <div class="text-muted">Saturday, June 14, 2025</div>
              <div class="small">14:00 - 15:30</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require_once '../layouts/footer.php'; ?>
<script src="/src/js/dashboard.js"></script>