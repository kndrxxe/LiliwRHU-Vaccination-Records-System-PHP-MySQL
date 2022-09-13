<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
  header("location:index.php");
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
  <title>Vaccines</title>
  <link rel = "icon" href = "LILIW.png" type = "image/x-icon">
</head>
<body>
  <header>
    <div class="px-3 py-2 bg-light mb-3">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="home.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img class="navbar-brand" src="LILIW.png" alt="LILIW LOGO" height="60" />
            <h4 class="text-dark">LILIW RHU VACCINATION RECORDS SYSTEM</h4>
          </a>
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="home.php" class="nav-link text-success">
                <i class="bi bi-house-door d-block mx-auto mb-1 text-center"></i>
                Home
              </a>
            </li>
            <li>
              <a class="nav-link text-secondary">
                <i class="bi bi-list d-block mx-auto mb-1 text-center"></i>
                Vaccines
              </a>
            </li>
            <li>
              <a href="searchpage.php" class="nav-link text-success">
                <i class="bi bi-search d-block mx-auto mb-1 text-center"></i>
                Search
              </a>
            </li>
            <li>
              <a href="addpage.php" class="nav-link text-success">
                <i class="bi bi-plus-circle d-block mx-auto mb-1 text-center"></i>
                Add
              </a>
            </li>
            <li>
              <a href="logout.php" class="nav-link text-success">
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
    <div class="container">
      <h1 class="text-center mb-3 display-3">VACCINES ADMINISTERED</h1>
    </div>
    <div class="row">
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-danger order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">SINOVAC</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'Sinovac'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-primary order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">PFIZER</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'Pfizer'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-info order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">MODERNA</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'Moderna'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-success order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">JANSSEN</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'Janssen'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-success order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">SPUTNIK V</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';

              $query = "SELECT id FROM persons WHERE vaccine_name = 'Sputnik V'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-info order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">NOVAVAX</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'Novavax'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-primary order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">ASTRA-Z</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'AstraZeneca'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-danger order-card text-white">
          <div class="card-block">
            <h1 class="mt-3 m-b-20">BIOTECH</h1>
            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_name = 'BioTech'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="container">
      <h1 class="text-center mt-4 mb-2 display-3">VACCINATION SCHEDULE</h1>
    </div>
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Vaccine Brand</th>
                  <th>Vials</th>
                  <th>Venue</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conn.php';
                $query = "SELECT * FROM vaccines ORDER BY id DESC";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    ?>
                    <tr>
                      <td><?= $items['vaccine_brand']; ?></td>
                      <td><?= $items['vaccine_vials']; ?></td>
                      <td><?= $items['vaccine_venue']; ?></td>
                      <td><?= $items['vaccine_date']; ?></td>
                    </tr>
                    <?php
                  }
                } else
                {
                  ?>
                  <tr>
                    <td colspan="5">No Scheduled Vaccination</td>
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
</div>
<footer class="bg-light d-flex flex-wrap justify-content-between align-items-center px-3 py-3 my-4 border-top">
  <p class="col-md-4 mb-0 text-muted">
    © 2022 ASTRO Systems Co.
  </p>

  <a href="home.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <img src="LILIW.png" width="50">
  </a>

  <ul class="nav col-md-4 justify-content-end">
    <li class="nav-item"><a href="home.php" class="nav-link px-2 text-muted">Home</a></li>
    <li class="nav-item"><a href="vaccinepage.php" class="nav-link px-2 text-muted">Vaccines</a></li>
    <li class="nav-item"><a href="searchpage.php" class="nav-link px-2 text-muted">Search</a></li>
  </ul>
</footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>