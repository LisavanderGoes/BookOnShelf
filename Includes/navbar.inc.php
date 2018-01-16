<?php
$menuItems = array(
    array('home', 'Home'),
    array('boeken', 'Boeken'),
    array('terug', 'Inleveren'),
    array('reset', 'Wachtwoord wijzigen'),
    array('uitloggen', 'Uitloggen')
);

?>


<div id="menu">
    <ul>
        <?php
        foreach($menuItems as $menuItem){
            echo '<li><a href="index.php?page='.$menuItem[0].'">'.$menuItem[1].'</a></li>';
        }
        ?>
    </ul>
</div>