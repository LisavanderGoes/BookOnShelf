<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

?>

<?php
$result = $db->query('SELECT memberID, username, password, status FROM users');
$i = 0;

?>



<div class="table">
    <form role="form" method="post" action="" autocomplete="off">
<table class="beheer">
    <tr>
        <th>Id</th>
        <th>Naam</th>
        <th>Wachtwoord</th>
        <th>Status</th>
        <th>...</th>
    </tr>

    <?php while($product = $result->fetch()):;?>



            <tr>
                <td><input id="id" type="text" value="<?php echo $product[0]?>" name="id<?php echo $i?>" readonly /></td>
                <td><input type="text" value="<?php echo $product[1]?>" name="username<?php echo $i?>"/></td>
                <td><input type="text" value="<?php echo $product[2]?>" name="password<?php echo $i?>" readonly/></td>
                <td><input type="text" value="<?php echo $product[3]?>" name="" readonly/>
                    <input type="radio" name="status<?php echo $i?>" value="admin">Admin</input>
                    <input type="radio" name="status<?php echo $i?>" value="normal">Normal</input></td>
                <td><a class="red" href='php/bverwijderen.php?id=<?php echo $product['memberID']?>&table=users&row=memberID&page=ledenbeheer'>Verwijderen</a>
                    &nbsp&nbsp<input type="submit" value="update" name="submit<?php echo $i?>" class="green" />

                    <?php
                    if(isset($_POST['submit'.$i.''])){

                        $answer = $_POST['status'.$i.''];
                        if ($answer == "admin") {
                            $status = "admin";
                        }
                        else if($answer == "normal"){
                            $status = "normal";
                        }


                        $id = $_POST['id'.$i.''];
                        $username = $_POST['username'.$i.''];
                        $password = $_POST['password'.$i.''];



                        $update = "UPDATE users SET username='$username', password='$password', status='$status' WHERE memberID='$id'";

                        $up = $db->prepare($update);
                        $up->execute();

                        header("Location:index.php?page=ledenbeheer");
                    }
                    ?>

                </td>
            </tr>

    <?php
    $i++;
    endwhile; ?>

    <td><input id="id" type="text" name="txtid" readonly/></td>
    <td><input type="text" name="txtusername"/></td>
    <td><input type="text" name="txtpassword"/></td>
    <td><input type="text" name="" readonly/>
        <input type="radio" name="txtstatus" value="admin">Admin</input>
        <input type="radio" name="txtstatus" value="normal">Normal</input></td>
    <td><input type="submit" name="kook" value="+">
        <?php
        if(isset($_POST['kook'])){

            $answer = $_POST['txtstatus'];
            if ($answer == "admin") {
                $txtstatus = "admin";
            }
            else if($answer == "normal"){
                $txtstatus = "normal";
            }

            $txtusername = $_POST['txtusername'];
            $txtpassword = $_POST['txtpassword'];
            $txthash = password_hash($txtpassword, PASSWORD_DEFAULT);


            $update = "INSERT INTO users (username, password, status) VALUES ('$txtusername','$txthash','$txtstatus')";

            $up = $db->prepare($update);
            $up->execute();

            header("Location:index.php?page=ledenbeheer");


        }
        ?>

    </td>

</table>
    </form>
</div>



