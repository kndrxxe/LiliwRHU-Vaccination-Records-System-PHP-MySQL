<?php
session_start();

if (empty($_POST['firstname']) || empty($_POST['lastname'])) {
  $_SESSION['error'] = "All fields are required";
  header('Location: addpage.php');
} else {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $marital_st = $_POST['marital_st'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $barangay = $_POST['barangay'];
  $municipality = $_POST['municipality'];
  $province = $_POST['province'];
  $vaccine_name = $_POST['vaccine_name'];
  $firstdose = $_POST['firstdose'];
  $fullydose = $_POST['fullydose'];
  $boosterdose = $_POST['boosterdose'];
  $secondbooster = $_POST['secondbooster'];
  $vaccine_status = $_POST['vaccine_status'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO persons(firstname, lastname, gender, marital_st, dob, age, barangay, municipality, province, vaccine_name, firstdose, fullydose, boosterdose, secondbooster, vaccine_status)VALUES('$firstname','$lastname','$gender','$marital_st','$dob', '$age', '$barangay', '$municipality', '$province', '$vaccine_name', '$firstdose', '$fullydose', '$boosterdose', '$secondbooster', '$vaccine_status')") or die('Query Error');

  $_SESSION['success'] = "Data Inserted Successfully";
  header('Location: addpage.php');
}
?>