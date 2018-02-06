<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

$userID = $_SESSION['userID'];

$selusers = 'SELECT username, status FROM users WHERE memberID = :ID';
$resusers = $db->prepare($selusers);
$resusers->bindParam(':ID', $userID, PDO::PARAM_INT);
$resusers->execute();
$users = $resusers->fetch();

$status = $users['status'];
$account = $users['username'];
?>

<div class="text">
    <div class="textbox">
<p>
    <b>Naam: </b> &nbsp; <?php echo $account ?>
</p>
    <p>
        <b>Wachtwoord:</b>

        <form role="form" method="post" action="php/reset.php" autocomplete="off">

            <input type="password" name="ww" id="" tabindex="1">
            <input type="submit" name="submit" value="Reset" tabindex="5">

        </form>
</p>
    <p>
        <b>Status:</b> &nbsp; <?php echo $status ?>
</p>
    </div>
    <p>
    Boekenlijst:
        <a href='index.php?page=boekenlijst'>Bekijken</a>
</p>
</div>