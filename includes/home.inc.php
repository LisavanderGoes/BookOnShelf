<?php

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

$userID = $_SESSION['userID'];

$i = 1;

$sellenen = 'SELECT boekID, date FROM lenen WHERE userID= :ID ORDER BY boekID DESC LIMIT 5 ';
$reslenen = $db->prepare($sellenen);
$reslenen->bindParam(':ID', $userID, PDO::PARAM_INT);
$reslenen->execute();

?>

<div class="text">

<p>
    <b>Laatste 5 boeken in bezit:</b> <br>
    Boeken kun je 28 dagen lenen! <br>
    <table>
        <tr class="home">
            <th></th>
            <th>Boek</th>
            <th>Leendatum</th>
            <th>Inleverdatum</th>
            <th>Dagen over</th>
        </tr>
    <?php


    while($lenen = $reslenen->fetch()){

        $boekID = $lenen['boekID'];
        $leen_date = $lenen['date'];
        $newdate = date('Y-m-d', strtotime($leen_date. ' + 28 days'));
        $date = date('Y-m-d', strtotime($leen_date. ' + 28 days'));
        $datetime1 = date_create(date("Y-m-d"));
        $datetime2 = date_create($newdate);
        $interval = date_diff($datetime1, $datetime2);
        $days = $interval->format('%a dagen');


        $selboeken = 'SELECT name FROM boeken WHERE boekenID= :ID';
        $resboeken = $db->prepare($selboeken);
        $resboeken->bindParam(':ID', $boekID, PDO::PARAM_INT);
        $resboeken->execute();
        $boeken = $resboeken->fetch();

        $bookname = $boeken['name'];


        ?>

        <tr class="home">
                <td id="id"><?php echo $i . "-"?></td>
                <td><?php echo $bookname ?></td>
                <td><?php echo $leen_date ?></td>
                <td><?php echo $newdate ?></td>
                <td><?php echo $days; ?></td>
        </tr>

<?php
        $i++;
    }
    ?>
    </table>
    <a href='index.php?page=boekenlijst'>Meer bekijken</a>



    <br><b>Gereserveerd:</b> <br>
    <table>
    <?php

    $i = 1;

    $selboeken2 = "SELECT boekenID, aantal, name FROM boeken WHERE reserverenID= :ID";
    $resboeken2 = $db->prepare($selboeken2);
    $resboeken2->bindParam(':ID', $userID, PDO::PARAM_INT);
    $resboeken2->execute();



    while($boeken = $resboeken2->fetch()){

    $boekenID = $boeken['boekenID'];
    $aantal = $boeken['aantal'];
    $resname = $boeken['name'];
    ?>

    <tr class="home">
        <td id="id"><?php echo $i . "-" ?></td>
        <td><?php echo $resname ?></td>
        <td><?php if($aantal > 0){
                echo '&nbsp&nbsp Kan geleend worden!';
            }
            echo '<br>'; ?></td>
    </tr>

    <?php
        $i++;
    }
    ?>
    </table>
</p>
</div>




