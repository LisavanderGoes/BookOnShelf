<?php
$menuItems = array(
    array('login', 'Login'),
    array('registreren', 'Registreren')
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