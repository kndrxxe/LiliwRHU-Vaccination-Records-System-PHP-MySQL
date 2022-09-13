<?php
session_start();

include 'conn.php';

$id = $_POST['id'];
$vaccine_brand = $_POST['vaccine_brand'];
$vaccine_vials = $_POST['vaccine_vials'];
$vaccine_venue = $_POST['vaccine_venue'];
$vaccine_date = $_POST['vaccine_date'];

$query = "UPDATE vaccines SET vaccine_brand='$vaccine_brand', vaccine_vials='$vaccine_vials', vaccine_venue='$vaccine_venue', vaccine_date='$vaccine_date' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['successscheduleupdate'] = "Schedule Updated Successfully";
  header('Location: adminmanageschedule.php');
} else
{
  $_SESSION['errorscheduleupdate'] = "Schedule Not Updated";
  header('Location: adminmanageschedule.php');
}
?>