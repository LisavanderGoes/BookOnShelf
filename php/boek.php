<?php
session_start();
require "../db/connect.php";
$result = $db->query('SELECT * FROM boeken WHERE id='.$_GET['id']);
$product = $result->fetch();

class Item{
    var $id;
    var $name;
    var $writer;
    var $aantal;
    var $beschrijving;
}

if(isset($_GET['id'])) {
    $item = new Item();
    $item->id = $product['id'];
    $item->name = $product['name'];
    $item->writer = $product['writer'];
    $item->aantal = $product['aantal'];
    $item->beschrijving = $product['beschrijving'];
    $_SESSION['boek'][] = $item;
}
?>


<!DOCTYPE html PUBLIC>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>BoekOnShelf</title>
    <link rel="icon" href="../images/icon.png" />
    <link href="../css/stijl2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

    <div id="banner">
        <?php include '../includes/navbar.inc.php'; ?>
        <img src="../images/icon005.png" alt="Icon" height="55" width="55">
        <h1><?php echo $item->name ?></h1>
    </div>


    <!-----page---->
    <div id="content">



        <form name="lenen" method="post" action="lenen.php?id=<?php echo $product['id']; ?>" >



        <p>
            <label>
                Auteur: <?php echo $item->writer?>
            </label>
        </p>
        <p>
            <label>
                Aantal: <?php echo $item->aantal?>
            </label>

        <p>
            <label>
            Beschrijving: <br/><?php
                if($product['beschrijving'] != ''){
                echo $item->beschrijving;
                } else{
                    echo 'Geen beschrijving beschikbaar!';
                }
                ?>
            </label>
        </p>

        </p>
        <br />
            <input id="lenen" class="button" type="submit" value="Lenen" name="submit">

        </form>
    </div>


    <!-----footer----->
    <div id="footer">
        <em>BoekOnShelf</em>
    </div>

</div>
</body>
</html>



