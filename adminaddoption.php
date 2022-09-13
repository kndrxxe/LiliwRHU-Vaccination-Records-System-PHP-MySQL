<?php
session_start();

if (empty($_POST['vaccinebrands'])) {
  $_SESSION['erroroption'] = "Option not Saved";
  header('Location: adminmanageforms.php');
} else {

  $vaccinebrands = $_POST['vaccinebrands'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO vaccine_list(vaccinebrands)VALUES('$vaccinebrands')") or die('Query Error');

  $_SESSION['savedoption'] = "Option Saved Successfully";
  header('Location: adminmanageforms.php');
}
?>