<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

$selboeken = 'SELECT aantal, name, writer, aantal, beschrijving, gereserveerd FROM boeken';
$resboeken = $db->prepare($selboeken);
$resboeken->bindParam(':ID', $id, PDO::PARAM_INT);
$resboeken->execute();


$i = 0;

?>



<div class="table">
    <form role="form" method="post" action="" autocomplete="off">
<table class="beheer">
    <tr>
        <th>Id</th>
        <th>Naam</th>
        <th>Auteur</th>
        <th>Aantal</th>
        <th>Beschrijving</th>
        <th>...</th>
    </tr>

    <?php while($product = $resboeken->fetch()):;?>

            <tr>
                <td><input id="id" type="text" value="<?php echo $product[0]?>" name="id<?php echo $i?>" readonly /></td>
                <td><input type="text" value="<?php echo $product[1]?>" name="name<?php echo $i?>"/></td>
                <td><input type="text" value="<?php echo $product[2]?>" name="auteur<?php echo $i?>"/></td>
                <td><input type="text" value="<?php echo $product[3]?>" name="aantal<?php echo $i?>"/></td>
                <td><input type="text" value="<?php echo $product[4]?>" name="beschrijving<?php echo $i?>"/></td>
                <td><a class="red" href='php/bverwijderen.php?id=<?php echo $product['boekenID']?>&table=boeken&row=boekenID&page=boekenbeheer'>Verwijderen</a>
                    &nbsp&nbsp<input type="submit" value="update" name="submit<?php echo $i?>" class="green" />

                    <?php
                    if(isset($_POST['submit'.$i.''])){
                        $id = $_POST['id'.$i.''];
                        $name = $_POST['name'.$i.''];
                        $auteur = $_POST['auteur'.$i.''];
                        $aantal = $_POST['aantal'.$i.''];
                        $beschrijving = $_POST['beschrijving'.$i.''];


                        $update = "UPDATE boeken SET name='$name', writer='$auteur', aantal='$aantal', beschrijving='$beschrijving' WHERE boekenID='$id'";

                        $up = $db->prepare($update);
                        $up->execute();

                        header("Location:index.php?page=boekenbeheer");
                    }
                    ?>

                </td>
            </tr>

    <?php
    $i++;
    endwhile; ?>

    <td><input id="id" type="text" name="txtid" readonly/></td>
    <td><input type="text" name="txtname"/></td>
    <td><input type="text" name="txtauteur"/></td>
    <td><input type="text" name="txtaantal"/></td>
    <td><input type="text" name="txtbeschrijving"/></td>
    <td><input type="submit" name="kook" value="+">
        <?php
        if(isset($_POST['kook'])){
            $txtname = $_POST['txtname'];
            $txtauteur = $_POST['txtauteur'];
            $txtaantal = $_POST['txtaantal'];
            $txtbeschrijving = $_POST['txtbeschrijving'];


            $update = "INSERT INTO boeken (name, writer, aantal, beschrijving) VALUES ('$txtname','$txtauteur','$txtaantal','$txtbeschrijving')";

            $up = $db->prepare($update);
            $up->execute();

            header("Location:index.php?page=boekenbeheer");


        }
        ?>

    </td>

</table>
    </form>
</div>



