<?php //checked

require "../../xprivate/config.inc.php";

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password2 = isset($_POST['2']) ? $_POST['2'] : '';
$hash = password_hash($password, PASSWORD_DEFAULT);

$selusers = 'SELECT memberID FROM users WHERE username = :NAME AND password = :PASS';
$resusers = $db->prepare($selusers);
$resusers->bindParam(':NAME', $username, PDO::PARAM_STR);
$resusers->bindParam(':PASS', $hash, PDO::PARAM_STR);


$insert1 = "INSERT INTO users (username, password)
                  VALUES ('$username', '$hash')";
$in1 = $db->prepare($insert1);


if(isset($_POST['submit'])) {

    try {

        if (($username == "" || $password == "") || ($password != $password2)) {
            header("Location:../index.php?page=registreren");
        } else {

            $in1->execute();


            $resusers->execute();
            $usersdb = $resusers->fetch();

            $id = $usersdb["memberID"];

            $_SESSION['userID'] = $id;
            $_SESSION['loggedin'] = true;
            header("Location:../index.php?page=home");

        }
    } catch (PDOException $e) {

        echo $del . "<br>" . $e->getMessage();
    }
}
?>
