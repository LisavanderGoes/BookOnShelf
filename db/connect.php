<?php

// vars for database
$servername = 'localhost';
$user = 'root';
$pass = '';
$db = 'boekonshelf';

//connect to server and select database
$db = new mysqli($servername, $user, $pass, $db)
        or die("Unable to connect");

?>