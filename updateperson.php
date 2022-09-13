<?php
session_start();
include 'conn.php';

$id = $_POST['id'];
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

$query = "UPDATE persons SET firstname='$firstname', lastname='$lastname', gender='$gender', marital_st='$marital_st', dob='$dob', age='$age', barangay='$barangay', municipality='$municipality', province='$province', vaccine_name='$vaccine_name', firstdose='$firstdose', fullydose='$fullydose', boosterdose='$boosterdose', secondbooster='$secondbooster', vaccine_status='$vaccine_status' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['savechanges'] = "Data Edited Successfully";
  header('Location: viewall.php');
} else
{
  $_SESSION['errorupdate'] = "Data is not Edited";
  header('Location: viewall.php');
}
?>