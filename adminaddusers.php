<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
  header('Location: adminlogin.php');
}
?>
<!DOCTYPE html>
<head>
  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css" type="text/css" />
  <title>Add User</title>
  <link rel = "icon" href = "LILIW.png" type = "image/x-icon">
</head>
<body>
  <header>
    <div class="px-3 py-2 bg-light mb-3">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="adminmanageschedule.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img class="navbar-brand" src="LILIW.png" alt="LILIW LOGO" height="60" />
            <h4 class="text-dark">SYSTEM ADMIN</h4>
          </a>
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="adminmanageschedule.php" class="nav-link text-success">
                <i class="bi bi-calendar-event d-block mx-auto mb-1 text-center"></i>
                Manage Schedule
              </a> 
            </li>
            <li>
              <a href="adminmanageusers.php" class="nav-link text-success">
                <i class="bi bi-people d-block mx-auto mb-1 text-center"></i>
                Manage Users
              </a>
            </li>
            <li>
              <a href="adminmanageforms.php" class="nav-link text-success">
                <i class="bi bi-file-ruled d-block mx-auto mb-1 text-center"></i>
                Manage Forms
              </a>
            </li>
            <li>
              <a href="adminlogout.php" class="nav-link text-success">
                <i class="bi bi-box-arrow-right d-block mx-auto mb-1 text-center"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="text-center">
     <div class="card mt-2">
      <div class="card-body">
        <div class="row">
          <div class="col-md-7">
            <div class="input-group mb-1">
              <button type="submit" class="btn btn-success" onclick="history.back()"><i class="bi bi-arrow-left-circle"></i> Back </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <form action="admincreateuser.php" method="POST" class="shadow p-3 mb-5 bg-light rounded mt-3 needs-validation" novalidate>
      <h1 class="h1 mb-2 display-2"><b>ADD USER</b></h1>
      <div class="row g-1 mb-2">
        <div class="form-floating">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="name" placeholder="Name" required />
          <label for="name">Name</label>
          <div class="invalid-feedback mt-1 text-start container">
            Name is required!
          </div>
        </div>
        <div class="form-floating col mt-2">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="username" placeholder="Username" required />
          <label for="username">Username</label>
          <div class="invalid-feedback mt-1 text-start container">
            Username is required!
          </div>
        </div>
      </div>
      <div class="form-floating col mb-2">
        <input type="password" class="form-control border-success border-2 rounded-pill" name="password" placeholder="Password" minlength="4" maxlength="32" required />
        <label for="password">Password</label>
        <div class="invalid-feedback mt-1 text-start container">
          Password is required!
        </div>
      </div>
      <div class="row g-2 mb-1">
        <div class="col">
          <button type="submit" class="btn btn-success btn-md rounded-pill"><b><i class="bi bi-check-circle"></i> Confirm</b> </button>
        </div>
      </div>
    </form>
  </div>
</div>
<footer class="bg-light d-flex flex-wrap justify-content-between align-items-center px-3 py-3 my-4 border-top">
  <p class="col-md-4 mb-0 text-muted">
    © 2022 ASTRO Systems Co.
  </p>

  <a href="home.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <img src="LILIW.png" width="50">
  </a>

  <ul class="nav col-md-4 justify-content-end">
    <li class="nav-item"><a href="adminmanageschedule.php" class="nav-link px-2 text-muted">Manage Schedule</a></li>
    <li class="nav-item"><a href="adminmanageusers.php" class="nav-link px-2 text-muted">Manage Users</a></li>
    <li class="nav-item"><a href="adminmanageforms.php" class="nav-link px-2 text-muted">Manage Forms</a></li>
  </ul>
</footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script >
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>