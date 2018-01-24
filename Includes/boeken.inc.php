<?php

$result = $db->query('SELECT * FROM boeken');
?>

<div id="list">
    <?php while($product = $result->fetch()){ ?>
    <div id="row">


        <p>
            <label>
                <a id="boek" href="../php/boek.php?id=<?php echo $product['id']; ?>">Boek: <b> <?php echo $product['name']?></b></a>
            </label>
        </p>
        <p>
            <label>
                Auteur: <?php echo $product['writer']?>
            </label>
         <!--      </p>
        <p>
            <label>
                Aantal: <?php echo $product['aantal']?>
            </label>
        </p>-->
    </div>
    <?php } ?>
</div>

