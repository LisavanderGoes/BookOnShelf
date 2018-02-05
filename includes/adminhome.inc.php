<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

$i = 1;

$selusers = 'SELECT username FROM users ORDER BY memberID DESC LIMIT 5';
$resusers = $db->prepare($selusers);
$resusers->execute();


?>

<div class="text">
<p>
    <b>Laatst toegevoegde leden:</b> <br>
    <?php



    while($users = $resusers->fetch()){

        $name = $users['username'];

        echo $i."- &nbsp&nbsp".$name;
        echo '<br>';

        $i++;
    }
    ?>
</p>

</div>



