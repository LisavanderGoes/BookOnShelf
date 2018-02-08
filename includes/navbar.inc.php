<?php

if($user->is_logged_in()){

    $userID = $_SESSION['userID'];

    $selusers = 'SELECT username, status FROM users WHERE memberID = :ID';
    $resusers = $db->prepare($selusers);
    $resusers->bindParam(':ID', $userID, PDO::PARAM_INT);
    $resusers->execute();
    $users = $resusers->fetch();

    $status = $users['status'];
    $account = $users['username'];


    if($status == 'admin') {
        $menuItems = array(
            array('ledenbeheer', 'Ledenbeheer'),
            array('boekenbeheer', 'Boekenbeheer'),
            array('adminhome', 'Home')
        );

        ?>


        <div id="menu">
            <ul>
                <?php
                echo '<li><a href="php/logout.php">Uitloggen</a></li>';
                foreach ($menuItems as $menuItem) {
                    echo '<li><a href="index.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <?php
    }else {

        $menuItems = array(
            array('terugbrengen', 'Terugbrengen'),
            array('boeken', 'Boeken'),
            array('home', 'Home')
        );

        ?>

        <div id="menu">
            <ul>
                <?php
                echo '<li><a href="php/logout.php">Uitloggen</a></li>';
                echo '<li id="account"><a href="index.php?page=account">' . $account . '</a></li>';
                foreach ($menuItems as $menuItem) {
                    echo '<li><a href="index.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';

                }
                ?>
            </ul>
        </div>

        <?php
    }
} else {

    $menuItems = array(
        array('registreren', 'Registreren'),
        array('login', 'Login'),
        array('boeken', 'Boeken')

    );

    ?>


    <div id="menu">
        <ul>
            <?php
            foreach ($menuItems as $menuItem) {
                echo '<li><a href="index.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
            }
            ?>
        </ul>
    </div>

    <?php
}
?>