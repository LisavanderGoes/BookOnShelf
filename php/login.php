<?php
require "config.php";

//check if already logged in move to home page
//if( $user->is_logged_in() ){ header('Location: index.php'); exit(); }

if(isset($_POST['submit'])){

//Get values from login.inc.php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';



//Query database
$result = $db->prepare("SELECT * FROM users WHERE username =? AND password =? ");
$result->execute(array($username, $password));
$row = $result->fetch();

    //Login
    if (($username == "" || $password == "") || ($row['username'] != $username && $row['password'] != $password)){
        header("Location:../index.php");
        exit;
    } else{
        if($row['status'] == 'admin') {
            $_SESSION['userID'] = $row["memberID"];
            $_SESSION['loggedin'] = true;
            header("Location:../index.php?page=adminhome");
            exit;
        } else {
            $_SESSION['userID'] = $row["memberID"];
            $_SESSION['loggedin'] = true;
            header("Location:../index.php?page=home");
            exit;
        }
    }

}

?>