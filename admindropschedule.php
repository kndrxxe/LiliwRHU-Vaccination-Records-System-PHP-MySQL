<?php
session_start();

 $id = $_GET['id'];
 //connection
 include 'conn.php';
 //delete query
 $query = "DELETE FROM vaccines WHERE id = $id";
 $query_run = mysqli_query($conn, $query);

 if ($query_run) {
    $_SESSION['successscheduledelete'] = "Schedule Deleted Successfully!";
    header('Location: adminmanageschedule.php');
 } else {
    $_SESSION['errorscheduledelete'] = "Schedule Deletion Error";
    header('Location: adminmanageschedule.php');
 }
?>