<?php


$result = $db->query('SELECT * FROM boeken');
?>
<?php

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

?>


<div class="table">
    <label>
        <div><input type="submit" name="submit" value="+"></div>
    </label>
<table>
    <tr>
        <th>Id</th>
        <th>Naam</th>
        <th>Auteur</th>
        <th>Aantal</th>
        <th>Beschrijving</th>
        <th>...</th>
    </tr>

    <?php while($product = $result->fetch()):;?>

    <form role="form" method="post" action="php/bedit.php?id=<?php echo $product['boekenID']; ?>" autocomplete="off">

                <tr>
                <td <?php echo $product[0] ?>><?php echo $product[0]?></td>
                <td><input type="text" value="<?php echo $product[1]?>" name="name"</td>
                <td><input type="text" value="<?php echo $product[2]?>" name="auteur"</td>
                <td><input type="text" value="<?php echo $product[3]?>" name="aantal"</td>
                <td><input type="text" value="<?php echo $product[4]?>" name="beschrijving"</td>
                <td><a class="red" href='php/bverwijderen.php?id=<?php echo $product['boekenID']?>'>Verwijderen</a>
                    &nbsp&nbsp<input type="submit" value="update" name="submit" class="green" />



                </td>
                </tr>
    </form>
    <?php endwhile; ?>
</table>
</div>



