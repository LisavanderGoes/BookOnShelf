<?php //checked

require "../../xprivate/config.inc.php";


        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $new = "new123";

        $to = $email;
        $subject = "Wachtwoord vergeten!";
        $txt = "Nieuw wachtwoord : ". $new;
        $headers = "From: webmaster@example.com";




        /*$update1 = 'UPDATE users SET password= :PASS WHERE memberID = :ID';
        $up1 = $db->prepare($update1);
        $up1->bindParam(':PASS', $hash, PDO::PARAM_STR);
        $up1->bindParam(':ID', $userID, PDO::PARAM_INT);*/

        try {
            mail($to,$subject,$txt,$headers);
            //$up1->execute();
            echo 'gelukt';


        }   catch (PDOException $e) {

            echo $up1 . "<br>" . $e->getMessage();
        }

?>
