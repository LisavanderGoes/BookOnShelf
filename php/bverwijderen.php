<?php

require "config.php";

        $boekID = $_GET['id'];

        $delete = "DELETE FROM boeken WHERE boekenID= :boekenID LIMIT 1";
        $del = $db->prepare($delete);
        $del->bindParam(':boekenID', $boekID, PDO::PARAM_INT);





        try {
            $del->execute();
            header("Location:../index.php?page=boekenbeheer");


        } catch (PDOException $e) {

            echo $del . "<br>" . $e->getMessage();
        }


?>
