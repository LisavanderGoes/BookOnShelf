<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

$selboeken = 'SELECT boekenID, name, writer FROM boeken';
$resboeken = $db->prepare($selboeken);
$resboeken->execute();


if(!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    if($message == "success"){
        echo '<script language="javascript">';
        echo 'if (confirm("Gelukt!")) {
           }';
        echo '</script>';
    } else if($message == 'fail'){
        echo '<script language="javascript">';
        echo 'alert("Helaas! Niet gelukt!")';
        echo '</script>';
    }
    unset($_SESSION['message']);
}

?>


<div id="list">
    <form role="form" method="post" action="" autocomplete="off">

            <input type="text" name="search" id="" placeholder="Zoeken..." tabindex="1">
            <input type="submit" name="submit" value="Zoek" tabindex="5">

    </form>
    <?php

    if(isset($_POST['submit'])) {

        $keyword = $_POST['search'];
        $selkeyword1 = "SELECT boekenID, name, writer FROM boeken WHERE name LIKE :keyword;";
        $reskeyword1 = $db->prepare($selkeyword1);
        $reskeyword1->bindValue(':keyword', '%' . $keyword . '%');
        $reskeyword1->execute();

        $selkeyword2 = "SELECT boekenID, name, writer FROM boeken WHERE writer LIKE :keyword;";
        $reskeyword2 = $db->prepare($selkeyword2);
        $reskeyword2->bindValue(':keyword', '%' . $keyword . '%');
        $reskeyword2->execute();


            while (($r = $reskeyword1->fetch(PDO::FETCH_ASSOC)) || ($r = $reskeyword2->fetch(PDO::FETCH_ASSOC))) {
                $boekenid = $r['boekenID'];
                $name = $r['name'];
                $writer = $r['writer'];

                ?>


                <form role="form" method="post" action="index.php?page=boek&id=<?php echo $boekenid; ?>"
                      autocomplete="off">

                    <input type="hidden" name="id" value="<?php echo $boekenid; ?>"/>

                    <button id="row" type="submit" name="submit1">
                        <h1>
                            <strong><?php echo $name ?></strong>
                        </h1>
                        <h2>
                            <?php echo "Auteur: " . $writer ?>
                        </h2>
                    </button>
                </form>
                <?php
            }
    }?>



    <?php if(!isset($_POST['submit'])) {

        while ($boeken = $resboeken->fetch()) {

            $boekenid = $boeken['boekenID'];
            $name = $boeken['name'];
            $writer = $boeken['writer'];

            ?>


            <form role="form" method="post" action="index.php?page=boek&id=<?php echo $boekenid; ?>" autocomplete="off">

                <input type="hidden" name="id" value="<?php echo $boekenid; ?>"/>

                <button id="row" type="submit" name="submit1">
                    <h1>
                        <strong><?php echo $name ?></strong>
                    </h1>
                    <h2>
                        <?php echo "Auteur: " . $writer ?>
                    </h2>
                </button>
            </form>

        <?php }
    }?>


</div>



