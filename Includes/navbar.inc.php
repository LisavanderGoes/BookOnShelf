<?php
$menuItems = array(
    array('account', 'Account'),
    array('inleveren', 'Inleveren'),
    array('boeken', 'Boeken'),
    array('home', 'Home')
);

?>


<div id="menu">
    <ul>
        <?php
        echo '<li><a href="../index.php">Uitloggen</a></li>';
        foreach($menuItems as $menuItem) {
            echo '<li><a href="../php/dashboard.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
        }
        ?>
    </ul>
</div>