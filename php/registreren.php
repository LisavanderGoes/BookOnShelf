<?php
require "config.php";

if(isset($_POST['submit'])){

    //Get values from registreren.inc.php
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['2']) ? $_POST['2'] : '';

    $result = $db->prepare("SELECT * FROM users WHERE username =? AND password =? ");
    $result->execute(array($username, $password));
    $row = $result->fetch();


    if(($username == "" || $password == "") || ($password != $password2)){
        header("Location:../index.php?page=registreren");
        exit;
    } else {

        //Exec database
        $db->exec("INSERT INTO users (username, password)
                  VALUES ('$username', '$password')");
        $_SESSION['userID'] = $row["memberID"];
        $_SESSION['loggedin'] = true;
        header("Location:../index.php?page=home");

    }
}
?>
