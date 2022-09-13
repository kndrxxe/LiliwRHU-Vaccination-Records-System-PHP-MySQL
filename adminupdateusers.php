<?php
session_start();

include 'conn.php';

$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE users SET name='$name', username='$username', password='$password' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['successuserupdate'] = "User Updated Successfully";
  header('Location: adminmanageusers.php');
} else
{
  $_SESSION['erroruserupdate'] = "User Not Updated";
  header('Location: adminmanageusers.php');
}
?>