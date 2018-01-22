<?php session_start();
if(isset($_POST['submit'])){

//Get values from login.inc.php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

//Database
include_once "../db/connect.php";

//Query database
$result = $db->prepare("SELECT * FROM users WHERE username =? AND password =? ");
$result->execute(array($username, $password));
$row = $result->fetch();

    //Login
    if (($username == "" || $password == "") || ($row['username'] != $username && $row['password'] != $password)){
        header("Location:start.php");
        exit;
    } else{
        if($row['status'] == 'b') {
            echo "admin mode coming soon!";
        } else {
            header("Location:../index.php");
            exit;
        }
    }

}

?>