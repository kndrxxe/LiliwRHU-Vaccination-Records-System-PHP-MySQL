<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
  header('Location: adminlogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script src="https://kit.fontawesome.com/8c6de87254.js" crossorigin="anonymous"></script>
  <title>Manage Users</title>
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
              <a class="nav-link text-secondary">
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
</div>
<div class="container">
  <h1 class="text-center mb-3 display-3">MANAGE USERS</h1>
  <?php
  if(isset($_SESSION['successuserupdate']))
  {
    ?>
    <div class="alert alert-success alert-dismissible fade show text-start mt-2" role="alert">
      <i class="bi bi-check-circle-fill" width="24" height="24"></i>
      <?= $_SESSION['successuserupdate']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['successuserupdate']);
  }
  ?>
  <?php
  if(isset($_SESSION['erroruserupdate']))
  {
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-start mt-2" role="alert">
      <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
      <?= $_SESSION['erroruserupdate']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['errorsuserupdate']);
  }
  ?>
  <?php
  if(isset($_SESSION['successuserdelete']))
  {
    ?>
    <div class="alert alert-success alert-dismissible fade show text-start mt-2" role="alert">
      <i class="bi bi-check-circle-fill" width="24" height="24"></i>
      <?= $_SESSION['successuserdelete']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['successuserdelete']);
  }
  ?>
  <?php
  if(isset($_SESSION['erroruserdelete']))
  {
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-start mt-2" role="alert">
      <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
      <?= $_SESSION['erroruserdelete']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['erroruserdelete']);
  }
  ?>
  <?php
  if(isset($_SESSION['erroruser']))
  {
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
      <i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
      <?= $_SESSION['erroruser']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['erroruser']);
  }
  ?>
  <?php
  if(isset($_SESSION['saveduser']))
  {
    ?>
    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
      <i class="bi bi-check-circle-fill" width="24" height="24"></i>
      <?= $_SESSION['saveduser']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['saveduser']);
  }
  ?>
  <div class="col-md-12">
    <div class="card mt-2">
      <div class="card-body text-end">
        <div class="btn-group">
          <a class="btn btn-md btn-success" href="adminaddusers.php"><i class="bi bi-plus-circle"></i> Add User</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card mt-2">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'conn.php';
              $query = "SELECT * FROM users";
              $query_run = mysqli_query($conn, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $items) {
                  ?>
                  <tr>
                    <td><?= $items['name']; ?></td>
                    <td><?= $items['username']; ?></td>
                    <td class="text-right">
                      <a href="admineditusers.php?id=<?= $items['id']; ?>" class="btn btn-success btn-sm" style="width: 40px;"><i class="bi bi-pencil-square"></i></a>
                      <a href="admindropusers.php?id=<?= $items['id']; ?>" class="btn btn-danger btn-sm" style="width: 40px;"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                }
              } else
              {
                ?>
                <tr>
                  <td colspan="3">No Users Found</td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
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
</body>
</html>