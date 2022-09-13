<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
  header('Location: adminmanageschedule.php');
} else {

  if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $sql = "SELECT * FROM admin WHERE username='$username' AND password ='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = $username;
        header('Location: adminmanageschedule.php');
        exit();
      }
    }
    else {
      $_SESSION['loginstatus'] = "The Username/Password you entered is incorrect. Please try again.";
    }
  }
}
?>
<!DOCTYPE html>
<head>
  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="signin.css" type="text/css" />
  <title>Admin Login</title>
  <link rel = "icon" href = "LILIW.png" type = "image/x-icon">
</head>

<body>
  <main class="form-signin w-100 m-auto text-center">
    <form class="needs-validation" action="adminlogin.php" method="POST" novalidate="">
      <img class="mb-3" src="LILIW.png" alt="Liliw Logo" width="100">
      <h1 class="h1 mb-3 fw-normal">ADMIN LOGIN</h1>
      <?php
      if(isset($_SESSION['loginstatus']))
      {
        ?>
        <div class="alert alert-danger text-center" role="alert">
          <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
          <?= $_SESSION['loginstatus']; ?>  
        </div>
        <?php 
        unset($_SESSION['loginstatus']);
      }
      ?>
      <div class="form-floating mb-2">
        <input type="text" class="form-control border-success border-2 rounded-pill" name="username" id="username" placeholder="Username" required="">
        <label for="username">Username</label>
        <div class="invalid-feedback mt-2">
          Username is required!
        </div>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control border-success border-2 rounded-pill" name="password" id="password" placeholder="Password" minlength="4" maxlength="32" required="">
        <label for="password">Password</label>
        <div class="invalid-feedback mt-2">
          Password is required!
        </div>
      </div>
      <div class="container mb-2 text-start">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" onclick="myFunction()" id="flexCheckDefault">
          <label class="form-check-label text-dark" for="flexCheckDefault">
            Show Password
          </label>
        </div>
      </div>
      <button class="w-30 btn btn-md btn-success rounded-pill" type="submit"><i class="bi bi-check2-circle"></i><b> Login</b></button>
      <button class="w-30 btn btn-md btn-secondary rounded-pill" type="reset"><i class="bi bi-eraser"></i><b> Clear</b></button>
      <div class="container mt-4">
        <a class="w-100 btn btn-md btn-success rounded-pill" href="index.php"><i class="bi bi-arrow-left-circle"></i><b> Login as User</b>
        </a>
      </div>
      <p class="mt-5 mb-3 text-dark">
        © 2022 ASTRO Systems Co.
      </p>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
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