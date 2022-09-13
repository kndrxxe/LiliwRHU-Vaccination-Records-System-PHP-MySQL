<?php
session_start();

if (empty($_POST['vaccine_brand']) || empty($_POST['vaccine_vials']) || empty($_POST['vaccine_venue']) || empty($_POST['vaccine_date'])) {
  $_SESSION['errorschedule'] = "Schedule not Saved";
  header('Location: adminmanageschedule.php');
} else {

  $vaccine_brand = $_POST['vaccine_brand'];
  $vaccine_vials = $_POST['vaccine_vials'];
  $vaccine_venue = $_POST['vaccine_venue'];
  $vaccine_date = $_POST['vaccine_date'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO vaccines(vaccine_brand, vaccine_vials, vaccine_venue, vaccine_date)VALUES('$vaccine_brand', '$vaccine_vials', '$vaccine_venue', '$vaccine_date')") or die('Query Error');

  $_SESSION['savedschedule'] = "Schedule Saved Successfully";
  header('Location: adminmanageschedule.php');
}
?>