<?php require_once '../layouts/header.php'; ?>
<main class="login">
  <div class="d-flex flex-column justify-content-center min-vh-100 px-3 py-5 px-lg-5">
    <div class="mx-auto mb-4" style="max-width: 400px;">
      <img class="d-block mx-auto mb-3" src="" alt="Your Company" style="height: 40px;">
      <h2 class="text-center fs-4 fw-bold text-dark">Classmate Keeper</h2>
    </div>
    <div class="mx-auto w-100" style="max-width: 400px;">
      <div class="alert alert-danger" id="error-message" style="display: none;"></div>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <label for="password" class="form-label mb-0">Password</label>
            <a href="#" class="small text-primary text-decoration-none">Forgot password?</a>
          </div>
          <input type="password" class="form-control mt-2" id="password" name="password" autocomplete="current-password" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>

      <p class="text-center text-muted small mt-4">
        Not a member?
        <a href="#" class="fw-semibold text-primary text-decoration-none">Register here</a>
      </p>
    </div>
  </div>
</main>

<?php require_once '../layouts/footer.php'; ?>
<script src="/src/js/login.js"></script>