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
  <title>Add New Individual</title>
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
              <a class="nav-link text-secondary">
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
  <div class="container">
    <div class="text-center">
      <form action="addnew.php" method="POST" class="shadow p-3 mb-5 bg-light rounded needs-validation" novalidate>
        <?php
        if(isset($_SESSION['error']))
        {
          ?>
          <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
            <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
            <?= $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php 
          unset($_SESSION['error']);
        }
        ?>
        <?php
        if(isset($_SESSION['success']))
        {
          ?>
          <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
            <i class="bi bi-check-circle-fill" width="24" height="24"></i>
            <?= $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php 
          unset($_SESSION['success']);
        }
        ?>
        <h1 class="h1 mb-3 display-3"><b>ADD NEW</b></h1>
        <div class="form-floating mb-2">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="firstname" placeholder="Enter First Name" required />
          <label for="firstname">First Name</label>
          <div class="invalid-feedback mt-1 text-start container">
            First Name is required!
          </div>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="lastname" placeholder="Enter Last Name" required />
          <label for="lastname">Last Name</label>
          <div class="invalid-feedback mt-1 text-start container">
            Last Name is required!
          </div>
        </div>
        <div class="row g-2">
          <div class="form-floating col">
            <select class="form-select border-success border-2 rounded-pill" name="gender" placeholder="Gender"/>
            <option value="">Choose from option</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <label for="gender">Gender</label>
        </div>
        <div class="form-floating col mb-1">
          <select class="form-select border-success border-2 rounded-pill" name="marital_st" placeholder="Marital Status" />
          <option value="">Choose from option</option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Widowed">Widowed</option>
        </select>
        <label for="marital_st">Marital Status</label>
      </div>
      <div class="row g-1 mb-1">
        <div class="form-floating col">
          <input type="date" class="form-control border-success border-2 rounded-pill" name="dob" placeholder="Date of Birth" required />
          <label for="dob">Date of Birth</label>
          <div class="invalid-feedback mt-1 text-start container">
            Input the Date of Birth!
          </div>
        </div>
        <div class="form-floating col">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="age" placeholder="Age" maxlength="3" required />
          <label for="age">Age</label>
          <div class="invalid-feedback mt-1 text-start container">
            Input the Age!
          </div>
        </div>
      </div>
      <div class="text-start">
        <label for="address"><b>Address</b></label>
      </div>
      <div class="row g-1 mb-1">
        <div class="form-floating col">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="barangay" placeholder="Month" required />
          <label for="barangay">Barangay</label>
          <div class="invalid-feedback mt-1 text-start container">
            Input the Barangay!
          </div>
        </div>
        <div class="form-floating col">
          <input type="text" class="form-control border-success border-2 rounded-pill" name="municipality" placeholder="Day" required />
          <label for="municipality">Municipality</label>
          <div class="invalid-feedback mt-1 text-start container">
            Input the Municipality!
          </div>
        </div>
        <div class="form-floating col">
          <input type="text" class="form-control border-success border-2 rounded-pill " name="province" placeholder="Year" required />
          <label for="province">Province</label>
          <div class="invalid-feedback mt-1 text-start container">
            Input the Province!
          </div>
        </div>
      </div>
      <div class="form-floating mb-2">
        <?php
        $option = mysqli_query($conn, "SELECT * FROM vaccine_list");
        ?>
        <select class="form-select border-success border-2 rounded-pill" name="vaccine_name" placeholder="Brand of Vaccine" required>
          <option value="">Choose from option</option>
          <?php foreach($option as $key => $value){ ?>
            <option value="<?=$value['vaccinebrands'] ;?>"><?=$value['vaccinebrands'] ;?></option>
          <?php } ?>
        </select>
        <label for="vaccine_brand">Brand of Vaccine</label>
         <div class="invalid-feedback mt-1 text-start container">
            Select Vaccine Brand!
          </div>
      </div>
      <div class="text-start">
        <label for="vaccinedate"><b>Date of Vaccination</b></label>
      </div>
      <div class="row g-1 mb-1">
        <div class="form-floating col">
          <input type="date" class="form-control border-success border-2 rounded-pill" name="firstdose" placeholder="First Dose"/>
          <label for="firstdose">First Dose</label>
        </div>
        <div class="form-floating col">
          <input type="date" class="form-control border-success border-2 rounded-pill" name="fullydose" placeholder="Second Dose" />
          <label for="fullydose">Second Dose</label>
        </div>
      </div>
      <div class="form-floating col">
        <input type="date" class="form-control border-success border-2 rounded-pill" name="boosterdose" placeholder="First Booster" />
        <label for="boosterdose">First Booster</label>
      </div>
      <div class="form-floating col">
        <input type="date" class="form-control border-success border-2 rounded-pill" name="secondbooster" placeholder="Second Booster" />
        <label for="secondbooster">Second Booster</label>
      </div>
      <div class="form-floating mb-1">
        <select class="form-select border-success border-2 rounded-pill" name="vaccine_status" placeholder="Vaccination Status" required />
        <option value="">Choose from option</option>
        <option value="First Dose Only">First Dose Only</option>
        <option value="Fully Vaccinated">Fully Vaccinated</option>
        <option value="Fully Vaccinated with First Booster">Fully Vaccinated with First Booster</option>
        <option value="Fully Vaccinated with Second Booster">Fully Vaccinated with Second Booster</option>
      </select>
      <label for="vaccine_status">Vaccination Status</label>
      <div class="invalid-feedback mt-1 text-start container">
        Input the Vaccination Status!
      </div>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success btn-md rounded-pill"><b><i class="bi bi-check-circle"></i> Confirm</b> </button>
      <button type="reset" class="btn btn-secondary btn-md rounded-pill"><b><i class="bi bi-eraser-fill"></i> Reset</b> </button>
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