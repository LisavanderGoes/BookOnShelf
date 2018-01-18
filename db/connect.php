<?php

// vars for database
$user = 'root';
$pass = '';
$db = 'boekonshelf';

//connect to server and select database
$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

?>