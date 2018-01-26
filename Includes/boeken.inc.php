<?php


$result = $db->query('SELECT * FROM boeken');
?>
<?php

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

if(!empty($_GET['message'])) {
$message = $_GET['message'];
if($message == "success"){
    echo '<script language="javascript">';
    echo 'alert("Gelukt! U kunt het boek nu meenemen.")';
    echo '</script>';
} else if($message == 'fail'){
    echo '<script language="javascript">';
    echo 'alert("Helaas! Dit boek kan niet geleend worden.")';
    echo '</script>';
}
}

?>


<div id="list">
    <?php while($product = $result->fetch()){ ?>


        <form role="form" method="post" action="index.php?page=boek&id=<?php echo $product['boekenID']; ?>" autocomplete="off">

            <!--<input type = "hidden" name = "id" value = "<?php echo $product['boekenID']; ?>" />-->

            <button id="row" type="submit" name="submit1">
                <h1>
                    <strong><?php echo $product['name']?></strong>
                </h1>
                <h2>
                <?php echo "Auteur: ".$product['writer']?>
                </h2>
            </button>


        </form>



    <?php } ?>
</div>



