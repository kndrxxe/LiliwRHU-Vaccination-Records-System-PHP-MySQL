<?php
session_start();

if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
  $_SESSION['erroruser'] = "User Saving Error";
  header('Location: adminmanageusers.php');
} else {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO users(name, username, password)VALUES('$name', '$username', '$password')") or die('Query Error');

  $_SESSION['saveduser'] = "User Saved Successfully";
  header('Location: adminmanageusers.php');
}
?>