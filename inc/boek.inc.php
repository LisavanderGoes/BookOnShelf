<?php

$kookie = $_GET['id'];

$result = $db->prepare('SELECT * FROM boeken WHERE boekenID=?');
$result->execute(array($kookie));
$product = $result->fetch();

if(isset($kookie)) {
    $id = $product['boekenID'];
    $name = $product['name'];
    $writer = $product['writer'];
    $aantal = $product['aantal'];
    $beschrijving = $product['beschrijving'];
}

?>

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
            Beschrijving: <br/><?php
                if($product['beschrijving'] != ''){
                echo $beschrijving;
                } else{
                    echo 'Geen beschrijving beschikbaar!';
                }
                ?>
            </label>
        </p>


        <br />
            <input id="lenen" class="button" type="submit" value="Lenen" name="submit">

        </form>



