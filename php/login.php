<?php //checked

require "../../xprivate/config.inc.php";

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


$selusers = 'SELECT memberID, password, username, status FROM users WHERE username = :NAME';
$resusers = $db->prepare($selusers);
$resusers->bindParam(':NAME', $username, PDO::PARAM_STR);
//$resusers->bindParam(':PASS', $password, PDO::PARAM_STR);
$resusers->execute();
$usersdb = $resusers->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['submit'])){

    try {

        if ($usersdb == false) {
            header("Location:../index.php");
        } else {

            $validPassword = password_verify($password, $usersdb['password']);

            if ($validPassword) {

                $id = $usersdb["memberID"];

                $_SESSION['userID'] = $id;
                $_SESSION['loggedin'] = true;


                $status = $usersdb['status'];

                if ($status == 'admin') {
                    header("Location:../index.php?page=adminhome");
                } else {
                    header("Location:../index.php?page=home");
                }
            } else{
                header("Location:../index.php");
            }
        }
    } catch (PDOException $e) {

        echo $del . "<br>" . $e->getMessage();
    }
}
?>