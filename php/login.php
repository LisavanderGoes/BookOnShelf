<?php session_start();
if(isset($_POST['submit'])){

//Get values from login.inc.php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

//Database
include_once "../db/connect.php";

//to prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);

// Query database for user
$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' AND password = '$password'")
            or die("Failed to query database");
$row = mysqli_fetch_array($result);



//Login
    if (($_POST['username'] == "" || $_POST['password'] == "") || ($row['username'] != $username && $row['password'] != $password)){
        header("Location:start.php");
        exit;
    } else{
        header("Location:../index.php");
        exit;
    }

}
?>
