<?php
require "php/config.php";

if($user->is_logged_in()){

    $result = $db->prepare("SELECT * FROM users WHERE memberID =? ");
    $result->execute(array($_SESSION['userID']));
    $row = $result->fetch();

    if($row['status'] == 'admin') {
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

        $account = $row['username'];

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
        array('login', 'Login')

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