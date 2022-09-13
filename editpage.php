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
  <title>Edit Personal Information</title>
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
            <a href="logout.php" class="nav-link text-success">
              <i class="bi bi-box-arrow-right d-block mx-auto mb-1 text-center"></i>
              Logout
            </a>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <?php
  $id = $_GET['id'];
  //connection
  require 'conn.php';
  //select specific record
  $query = mysqli_query($conn, "SELECT * FROM persons WHERE id=$id") or die('Query Error');
  $row = mysqli_fetch_array($query) or die('fetch Error');
  ?>
  <div class="col-md-12">
    <div class="container">
      <div class="text-center">
       <div class="card mt-2">
        <div class="card-body">
          <div class="row">
            <div class="col-md-7">
              <div class="input-group mb-1">
                <button type="submit" class="btn btn-success" onclick="history.back()"><i class="bi bi-arrow-left-circle"></i> Back</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form action="updateperson.php" method="POST" class="shadow p-3 mb-5 bg-light rounded mt-3 text-center">
      <h1 class="h1 mb-3 display-2 text-center"><b>EDIT RECORD</b></h1>
      <div class="form-floating mb-3">
        <input type="hidden" class="form-control border-success border-2 rounded-pill" name="id" value="<?php echo $row['id'] ?>" />
      </div>
      <div class="form-floating mb-2">
        <input type="text" class="form-control border-success border-2 rounded-pill" name="firstname" placeholder="Enter First Name" value="<?php echo $row['firstname'] ?>" readonly="" />
        <label for="firstname">First Name</label>
      </div>
      <div class="form-floating mb-2">
        <input type="text" class="form-control border-success border-2 rounded-pill" name="lastname" placeholder="Enter Last Name" value="<?php echo $row['lastname'] ?>" readonly="" />
        <label for="lastname">Last Name</label>
      </div>
      <div class="row g-2">
        <div class="form-floating col">
          <select class="form-select border-success border-2 rounded-pill" name="gender" placeholder="Gender" value="<?php echo $row['gender'] ?>" required />
            <option value="">Choose from option</option>
            <option value="Male"
            <?php
            if ($row['gender'] == 'Male') {
              echo "selected";
            }
            ?>
            >Male</option>
            <option value="Female"
            <?php
            if ($row['gender'] == 'Female') {
              echo "selected";
            }
            ?>
            >Female</option>
          </select>
          <label for="gender">Gender</label>
        </div>
        <div class="form-floating col mb-1">
          <select class="form-select border-success border-2 rounded-pill" name="marital_st" placeholder="Marital Status" value="<?php echo $row['marital_st'] ?>" required />
            <option value="">Choose from option</option>
            <option value="Single"
            <?php
            if ($row['marital_st'] == 'Single') {
              echo "selected";
            }
            ?>
            >Single</option>
            <option value="Married"
            <?php
            if ($row['marital_st'] == 'Married') {
              echo "selected";
            }
            ?>
            >Married</option>
            <option value="Widowed"
            <?php
            if ($row['marital_st'] == 'Widowed') {
              echo "selected";
            }
            ?>
            >Widowed</option>
          </select>
          <label for="marital_st">Marital Status</label>
        </div>
        <div class="row g-1 mb-1">
          <div class="form-floating col">
            <input type="text" class="form-control border-success border-2 rounded-pill" name="dob" placeholder="Date of Birth" value="<?php echo $row['dob'] ?>"  readonly="" />
            <label for="dob">Date of Birth</label>
          </div>
          <div class="form-floating col">
            <input type="text" class="form-control border-success border-2 rounded-pill" name="age" placeholder="Age" maxlength="3" value="<?php echo $row['age'] ?>" />
            <label for="age">Age</label>
          </div>
        </div>
        <div class="text-start">
          <label for="address"><b>Address</b></label>
        </div>
        <div class="row g-1 mb-1">
          <div class="form-floating col">
            <input type="text" class="form-control border-success border-2 rounded-pill" name="barangay" placeholder="Barangay" value="<?php echo $row['barangay'] ?>" readonly="" />
            <label for="barangay">Barangay</label>
          </div>
          <div class="form-floating col">
            <input type="text" class="form-control border-success border-2 rounded-pill" name="municipality" placeholder="Municipality" value="<?php echo $row['municipality'] ?>" readonly="" />
            <label for="municipality">Municipality</label>
          </div>
          <div class="form-floating col">
            <input type="text" class="form-control border-success border-2 rounded-pill " name="province" placeholder="Province" value="<?php echo $row['province'] ?>" readonly="" />
            <label for="province">Province</label>
          </div>
        </div>
        <div class="form-floating mb-1">
          <?php
          $option = mysqli_query($conn, "SELECT * FROM vaccine_list");
          ?>
          <select class="form-select border-success border-2 rounded-pill" name="vaccine_name" placeholder="Brand of Vaccine" value="<?php echo $row['vaccine_name'] ?>" required />
            <option value="">Choose from option</option>
            <?php foreach($option as $rows):?>
              <option value="<?php echo $rows['vaccinebrands']; ?>"<?php if($row['vaccine_name'] == $rows['vaccinebrands']) echo 'selected="selected"'; ?>><?php echo $rows['vaccinebrands']; ?></option>
            <?php endforeach;?>
          </select>
          <label for="vaccine_brand">Brand of Vaccine</label>
        </div>
        <div class="text-start">
          <label for="vaccinedate"><b>Date of Vaccination</b></label>
        </div>
        <div class="row g-1 mb-1">
          <div class="form-floating col">
            <input type="date" class="form-control border-success border-2 rounded-pill" name="firstdose" placeholder="First Dose" value="<?php echo $row['firstdose'] ?>" required />
            <label for="firstdose">First Dose</label>
          </div>
          <div class="form-floating col">
            <input type="date" class="form-control border-success border-2 rounded-pill" name="fullydose" placeholder="Second Dose" value="<?php echo $row['fullydose'] ?>" />
            <label for="fullydose">Second Dose</label>
          </div>
        </div>
        <div class="form-floating col">
          <input type="date" class="form-control border-success border-2 rounded-pill" name="boosterdose" placeholder="First Booster" value="<?php echo $row['boosterdose'] ?>" />
          <label for="boosterdose">First Booster</label>
        </div>
        <div class="form-floating col">
          <input type="date" class="form-control border-success border-2 rounded-pill" name="secondbooster" placeholder="Second Booster" value="<?php echo $row['secondbooster'] ?>" />
          <label for="secondbooster">Second Booster</label>
        </div>
        <div class="form-floating mb-1">
          <select class="form-select border-success border-2 rounded-pill" name="vaccine_status" placeholder="Vaccination Status" value="<?php echo $row['vaccine_status'] ?>" required />
            <option value="">Choose from option</option>
            <option value="First Dose Only"
            <?php
            if ($row['vaccine_status'] == 'First Dose Only') {
              echo "selected";
            }
            ?>
            >First Dose Only</option>
            <option value="Fully Vaccinated"
            <?php
            if ($row['vaccine_status'] == 'Fully Vaccinated') {
              echo "selected";
            }
            ?>
            >Fully Vaccinated</option>
            <option value="Fully Vaccinated with First Booster"
            <?php
            if ($row['vaccine_status'] == 'Fully Vaccinated with First Booster') {
              echo "selected";
            }
            ?>
            >Fully Vaccinated with First Booster</option>
            <option value="Fully Vaccinated with Second Booster"
            <?php
            if ($row['vaccine_status'] == 'Fully Vaccinated with Second Booster') {
              echo "selected";
            }
            ?>
            >Fully Vaccinated with Second Booster</option>
          </select>
          <label for="vaccine_status">Vaccination Status</label>
        </div>
        <div class="row g-2 mb-1">
          <div class="col">
            <button type="submit" class="btn btn-success btn-md rounded-pill"><b><i class="bi bi-check-circle"></i> Save Changes</b> </button>
          </div>
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