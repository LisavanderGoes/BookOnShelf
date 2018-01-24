<?php
$result = $db->prepare("SELECT * FROM users WHERE username =? ");
$result->execute(array($_SESSION['username']));
$row = $result->fetch();

$account = $row['username'];

$menuItems = array(
    array('inleveren', 'Inleveren'),
    array('boeken', 'Boeken'),
    array('home', 'Home')
);

?>


<div id="menu">
    <ul>
        <?php
        echo '<li><a href="../php/logout.php">Uitloggen</a></li>';
        echo '<li id="account"><a href="../includes/account.php">'.$account.'</a></li>';
        foreach($menuItems as $menuItem) {
            echo '<li><a href="../php/dashboard.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
        }
        ?>
    </ul>
</div>