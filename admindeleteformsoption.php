<?php
session_start();

$v_id = $_GET['id'];
 //connection
include 'conn.php';
 //delete query
$query = "DELETE FROM vaccine_list WHERE v_id = $v_id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['successoptiondelete'] = "Option Deleted Successfully!";
  header('Location: adminmanageforms.php');
} else {
  $_SESSION['erroroptiondelete'] = "Option Deletion Error";
  header('Location: adminmanageforms.php');
}
?>