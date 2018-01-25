<?php
if (isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page='home';
}
?>

<?php require('../db/config.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){
    header('Location: ../index.php'); exit();
}
?>

<!DOCTYPE html PUBLIC>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>BoekOnShelf</title>
    <link rel="icon" href="../images/icon.png" />
    <link href="../css/stijl2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

    <div id="banner">
        <?php include '../includes/navbar.inc.php'; ?>
        <img src="../images/icon005.png" alt="Icon" height="55" width="55">
        <h1><?php echo $page ?></h1>
    </div>


<!-----page----->
    <div id="content">
    <?php include '../includes/'.$page.'.inc.php'; ?>
    </div>


<!-----footer----->
    <div id="footer">
        <em>BoekOnShelf</em>
    </div>

</div>
</body>
</html>

