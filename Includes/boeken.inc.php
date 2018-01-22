<?php

//Database
    require "db/connect.php";

$result = $db->query('SELECT * FROM boeken');
?>

<div id="content">
    <?php while($product = $result->fetch()){ ?>
    <div id="row">


        <p>
            <label>
                <a id="boek" href="php/boek.php?id=<?php echo $product['id']; ?>">Boek: <?php echo $product['name']?></a>
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

