<?php session_start();

if(isset($_POST['submit'])){

    //Database
    include_once "../db/connect.php";

    //Get values from registreren.inc.php
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['2']) ? $_POST['2'] : '';

    if(($username == "" || $password == "") || ($password != $password2)){
        header("Location:start.php?page=registreren");
        exit;
    } else {

        //Add new records
        $sql = "INSERT INTO users (username, password)
                  VALUES ('$username', '$password')";


        if ($db->query($sql) === TRUE) {
            header("Location:../index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }


        $db->close();
    }
}
?>
