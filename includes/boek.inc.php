<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$selboeken = 'SELECT aantal, name, writer, aantal, beschrijving, gereserveerd FROM boeken WHERE boekenID= :ID';
$resboeken = $db->prepare($selboeken);
$resboeken->bindParam(':ID', $id, PDO::PARAM_INT);
$resboeken->execute();
$boeken = $resboeken->fetch();

/*$result = $db->prepare('SELECT * FROM boeken WHERE boekenID=?');
$result->execute(array($kookie));
$product = $result->fetch();*/

if(isset($id)) {
    $name = $boeken['name'];
    $writer = $boeken['writer'];
    $aantal = $boeken['aantal'];
    $beschrijving = $boeken['beschrijving'];
    $gereserveerd = $boeken['gereserveerd'];
}

?>

<div class="text">
        <form name="lenen" method="post" action="php/lenen.php?id=<?php echo $id; ?>" >

            <p>
                <label>
                    Naam: <?php echo $name?>
                </label>
            </p>
            <p>
            <label>
                Auteur: <?php echo $writer?>
            </label>
<br>
            <label>
                Aantal: <?php echo $aantal?>
            </label>
<br>
                <label>
                    Gereserveerd: <?php
                    if($gereserveerd == 'true'){
                        echo 'Ja';
                    }else{
                        echo 'Nee';
                    }?>
                </label>
                <br>

            <label>
            Beschrijving: <br/><?php
                if($beschrijving != ''){
                echo $beschrijving;
                } else{
                    echo 'Geen beschrijving beschikbaar!';
                }
                ?>
            </label>
        </p>
        <br />
            <input id="lenen" class="button" type="submit" value="Lenen" name="submit">
            <input id="lenen" class="button" type="submit" value="Reserveren" name="reserveren">

        </form>
</div>



