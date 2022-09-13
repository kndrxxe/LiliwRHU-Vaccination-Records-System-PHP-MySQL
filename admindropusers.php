<?php
session_start();

 $id = $_GET['id'];
 //connection
 include 'conn.php';
 //delete query
 $query = "DELETE FROM users WHERE id = $id";
 $query_run = mysqli_query($conn, $query);

 if ($query_run) {
    $_SESSION['successuserdelete'] = "User Deleted Successfully!";
    header('Location: adminmanageusers.php');
 } else {
    $_SESSION['erroruserdelete'] = "User Deletion Error";
    header('Location: adminmanageusers.php');
 }
?>