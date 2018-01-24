<?php
ob_start();
session_start();

// vars for database
$servername = 'localhost';
$user = 'root';
$pass = '';
$db = 'boekonshelf';

//connect to server and select database
try {
$db = new PDO('mysql:host='.$servername.';dbname='.$db.';charset=utf8mb4',


    $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

?>