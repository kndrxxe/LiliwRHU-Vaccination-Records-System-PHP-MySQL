<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
  header("location:index.php");
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
  <title>Home</title>
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
              <a class="nav-link text-secondary">
                <i class="bi bi-house-door d-block mx-auto mb-1 text-center"></i>
                Home
              </a>
            </li>
            <li>
              <a href="vaccinepage.php" class="nav-link text-success">
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
      <h1 class="text-center mb-4">Hello "<?php echo $_SESSION['user']; ?>"</h1>
      <h1 class="text-center mb-3 display-3">VACCINATION UPDATES</h1>
    </div>
    <div class="row mb-4">
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-primary order-card text-white">
          <div class="card-block">
            <h5 class="mt-3 m-b-20">Vaccinated First Dose</h6>
            <h2 class="text-right"><i class="fa-solid fa-1 mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_status = 'First Dose Only' ORDER BY id";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-secondary order-card text-white">
          <div class="card-block">
            <h5 class="mt-3 m-b-20">Fully Vaccinated</h6>
            <h2 class="text-right"><i class="fa-solid fa-2 mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_status = 'Fully Vaccinated' ORDER BY id";
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
            <h5 class="mt-3 m-b-20">First Booster Shot</h6>
            <h2 class="text-right"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-1 mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_status = 'Fully Vaccinated with First Booster' ORDER BY id";
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
            <h5 class="mt-3 m-b-20">Second Booster Shot</h6>
            <h2 class="text-right"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-2 mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE vaccine_status = 'Fully Vaccinated with Second Booster' ORDER BY id";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
    </div>
    <!--Age Groups-->
    <div class="container">
      <h1 class="text-center mb-3 display-3">VACCINATED PER AGE GROUP</h1>
    </div>
    <div class="row mt-2">
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-success order-card text-white">
          <div class="card-block">
            <h5 class="mt-3 mb-20">Childrens<br>(0 - 14 Years Old)</h6>
            <h2 class="text-right"><i class="fa-solid fa-child-reaching mb-3"></i></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE age BETWEEN 0 AND 14 ORDER BY id";
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
            <h5 class="mt-3 mb-20">Youths<br>(15 - 24 Years Old)</h6>
            <h2 class="text-right"><i class="fa-solid fa-children mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE age BETWEEN 15 AND 24 ORDER BY id";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h2> '.$row.'</h2>';
              ?>
            </span></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3 text-center">
        <div class="card bg-secondary order-card text-white">
          <div class="card-block">
            <h5 class="mt-3 mb-20">Adults<br>(25 - 64 Years Old)</h6>
            <h2 class="text-right"><i class="fa-solid fa-people-group mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE age BETWEEN 25 AND 64 ORDER BY id";
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
            <h5 class="mt-3 mb-20">Seniors<br>(65 Years Old - Above)</h6>
            <h2 class="text-right"><i class="fa-solid fa-person-cane mb-3"></i><span>
              <?php
              include 'conn.php';
              $query = "SELECT id FROM persons WHERE age BETWEEN 65 AND 125 ORDER BY id";
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
  <div class="container">
    <div class="col-md-12">
      <div class="card mt-2">
        <h3 class="card-header text-center">LATEST INDIVIDUALS VACCINATED FIRST DOSE</h3>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Vaccine Brand</th>
                  <th>Date and Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conn.php';
                $query = "SELECT * FROM persons WHERE vaccine_status = 'First Dose Only' LIMIT 5";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    ?>
                    <tr>
                      <td><?= $items['firstname']; ?></td>
                      <td><?= $items['lastname']; ?></td>
                      <td><?= $items['vaccine_name']; ?></td>
                      <td><?= $items['time']; ?></td>

                    </tr>
                    <?php
                  }
                } else
                {
                  ?>
                  <tr>
                    <td colspan="4">No Records Found</td>
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
  <div class="container">
    <div class="col-md-12">
      <div class="card mt-2">
        <h3 class="card-header text-center">LATEST INDIVIDUALS FULLY VACCINATED</h3>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Vaccine Brand</th>
                  <th>Date and Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conn.php';
                $query = "SELECT * FROM persons WHERE vaccine_status = 'Fully Vaccinated' LIMIT 5";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    ?>
                    <tr>
                      <td><?= $items['firstname']; ?></td>
                      <td><?= $items['lastname']; ?></td>
                      <td><?= $items['vaccine_name']; ?></td>
                      <td><?= $items['time']; ?></td>
                    </tr>
                    <?php
                  }
                } else
                {
                  ?>
                  <tr>
                    <td colspan="4">No Records Found</td>
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
  <div class="container">
    <div class="col-md-12">
      <div class="card mt-2">
        <h3 class="card-header text-center">LATEST VACCINATED WITH FIRST BOOSTER</h3>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Vaccine Brand</th>
                  <th>Date and Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conn.php';
                $query = "SELECT * FROM persons WHERE vaccine_status = 'Fully Vaccinated with First Booster' LIMIT 5";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    ?>
                    <tr>
                      <td><?= $items['firstname']; ?></td>
                      <td><?= $items['lastname']; ?></td>
                      <td><?= $items['vaccine_name']; ?></td>
                      <td><?= $items['time']; ?></td>
                    </tr>
                    <?php
                  }
                } else
                {
                  ?>
                  <tr>
                    <td colspan="4">No Records Found</td>
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
  <div class="container">
    <div class="col-md-12">
      <div class="card mt-2">
        <h3 class="card-header text-center">LATEST VACCINATED WITH SECOND BOOSTER</h3>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Vaccine Brand</th>
                  <th>Date and Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conn.php';
                $query = "SELECT * FROM persons WHERE vaccine_status = 'Fully Vaccinated with Second Booster' LIMIT 5";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    ?>
                    <tr>
                      <td><?= $items['firstname']; ?></td>
                      <td><?= $items['lastname']; ?></td>
                      <td><?= $items['vaccine_name']; ?></td>
                      <td><?= $items['time']; ?></td>
                    </tr>
                    <?php
                  }
                } else
                {
                  ?>
                  <tr>
                    <td colspan="4">No Records Found</td>
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
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>