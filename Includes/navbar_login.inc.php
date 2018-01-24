<?php
$menuItems = array(
    array('registreren', 'Registreren'),
    array('login', 'Login')

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