<?php //checked

require "../../xprivate/config.inc.php";


        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $new = "new123";

        $to = $email;
        $subject = "Wachtwoord vergeten!";
        $txt = "Je wachtwoord is tijdelijk verranderd naar: ". $new . ".\r\nLog is met dit wachtwoord om daar je wachtwoord te resetten.\r\nAls dit niet lukt naar aan de admin.";
        $headers = "From: jullievandergoof@gmail.com";




        $update1 = 'UPDATE users SET password= :PASS WHERE memberID = :ID';
        $up1 = $db->prepare($update1);
        $up1->bindParam(':PASS', $hash, PDO::PARAM_STR);
        $up1->bindParam(':ID', $userID, PDO::PARAM_INT);

        try {
            mail($to,$subject,$txt,$headers);
            //$up1->execute();
            $_SESSION['message'] = "success";
            header("Location:../index.php");


        }   catch (PDOException $e) {

            echo $up1 . "<br>" . $e->getMessage();
        }

?>
