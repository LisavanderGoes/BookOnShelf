<?php
if(isset($_POST['submit'])) {


//Database
    require "config.php";

    $boekid = $_GET['id'];



                    $name = $_POST['name'];
                    $auteur = $_POST['auteur'];
                    $aantal = $_POST['aantal'];
                    $beschrijving = $_POST['beschrijving'];

                    $update= "UPDATE boeken SET name=' . $name . ' AND writer=' . $auteur . ' AND aantal=' . $aantal . ' AND beschrijving=' . $beschrijving . ' WHERE boekenID='. $boekid.'";

                    $up = $db->prepare($update);
                    $up->execute();

    header("Location:../index.php?page=home");


}



?>
