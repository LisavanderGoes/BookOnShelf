<?php
if(isset($_POST['submit'])) {


//Database
    require "config.php";

    $boekid = $_GET['id'];
    $user = $_SESSION['username'];


//Query database
    $result = $db->prepare('SELECT * FROM boeken WHERE boekenID=?');
    $result->execute(array($boekid));
    $product = $result->fetch();
    $uresult = $db->prepare('SELECT * FROM users WHERE username=?');
    $uresult->execute(array($user));
    $userrow = $uresult->fetch();

    $memberid = $userrow["memberID"];
    $boeknewaantal = $product['aantal'] - 1;


    $name = $product['name'];
    $writer = $product['writer'];
    $leen_date = date("Y-m-d");


    if ($product['aantal'] != 0) {
        $db->exec('UPDATE boeken SET aantal=' . $boeknewaantal . ' WHERE boekenID=' . $boekid);
        $db->exec("INSERT INTO lenen (userID, boekID)
                  VALUES ('$memberid', '$boekid')");


        header("Location:../index.php?page=boeken&message=success");
    } else {
        header("Location:../index.php?page=boeken&message=fail");


    }

}



?>
