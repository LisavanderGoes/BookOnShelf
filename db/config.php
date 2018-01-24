<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','boekonshelf');



    //create PDO connection
try {
    $db = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8mb4',
        DBUSER, DBPASS, array(
            PDO::ATTR_PERSISTENT => true
        ));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

//include the user class, pass in the database connection
include('../classes/users.php');
//include('classes/phpmailer/mail.php');
$user = new User($db);


?>
