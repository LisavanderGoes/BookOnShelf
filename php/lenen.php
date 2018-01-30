<?php
if(isset($_POST['submit'])) {


//Database
    require "config.php";

    $boekid = $_GET['id'];
    $userID = $_SESSION['userID'];


//Query database
    $result = $db->prepare('SELECT * FROM boeken WHERE boekenID=?');
    $result->execute(array($boekid));
    $product = $result->fetch();
    $uresult = $db->prepare('SELECT * FROM users WHERE memberID=?');
    $uresult->execute(array($userID));
    $userrow = $uresult->fetch();

    $boeknewaantal = $product['aantal'] - 1;


    $name = $product['name'];
    $writer = $product['writer'];
    $leen_date = date("Y-m-d");


    if ($product['aantal'] != 0) {
        $db->exec('UPDATE boeken SET aantal=' . $boeknewaantal . ' WHERE boekenID=' . $boekid);
        $db->exec("INSERT INTO lenen (userID, boekID)
                  VALUES ('$userID', '$boekid')");


        header("Location:../index.php?page=boeken&message=success");
    } else {
        header("Location:../index.php?page=boeken&message=fail");


    }

}



?>
