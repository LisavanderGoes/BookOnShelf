<?php //checked

require "../../xprivate/config.inc.php";

        $boekID = $_GET['id'];
        $table = $_GET['table'];
        $row = $_GET['row'];
        $page = $_GET['page'];

        $delete = "DELETE FROM $table WHERE $row= :ID LIMIT 1";

        $del = $db->prepare($delete);
        $del->bindParam(':ID', $boekID, PDO::PARAM_INT);





        try {
            $del->execute();
            header("Location:../index.php?page=$page");


        }   catch (PDOException $e) {

            echo $del . "<br>" . $e->getMessage();
        }


?>
