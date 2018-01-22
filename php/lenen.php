<?php session_start();
if(isset($_POST['submit'])){

//Database
    include_once "../db/connect.php";

//Query database
    $result = $db->prepare("SELECT * FROM users WHERE username =? AND password =? ");
    $result->execute(array($username, $password));
    $row = $result->fetch();



}

?>
