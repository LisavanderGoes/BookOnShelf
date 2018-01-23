<?php session_start();

if(isset($_POST['submit'])){

    //Get values from registreren.inc.php
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['2']) ? $_POST['2'] : '';

    //Database
    include_once "../db/connect.php";


    if(($username == "" || $password == "") || ($password != $password2)){
        header("Location:start.php?page=registreren");
        exit;
    } else {

        //Exec database
        $db->exec("INSERT INTO users (username, password)
                  VALUES ('$username', '$password')");
        header("Location:../index.php");

    }
}
?>
