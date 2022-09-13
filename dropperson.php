<?php
session_start();

$id = $_GET['id'];
 //connection
include 'conn.php';
 //delete query
$query = "DELETE FROM persons WHERE id = $id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['successdatadelete'] = "Data Deleted Successfully!";
  header('Location: viewall.php');
} else {
  $_SESSION['errordatadelete'] = "Data Deletion Error";
  header('Location: viewall.php');
}
?>