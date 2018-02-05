<?php //checked

require "../../xprivate/config.inc.php";

        $userID = $_SESSION['userID'];

        $pass = isset($_POST['ww']) ? $_POST['ww'] : '';;
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $update1 = 'UPDATE users SET password= :PASS WHERE memberID = :ID';
        $up1 = $db->prepare($update1);
        $up1->bindParam(':PASS', $hash, PDO::PARAM_STR);
        $up1->bindParam(':ID', $userID, PDO::PARAM_INT);

        try {
            $up1->execute();
            header("Location:../index.php?page=account");


        }   catch (PDOException $e) {

            echo $up1 . "<br>" . $e->getMessage();
        }

?>
