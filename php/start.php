<?php
if (isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page='login';
}
?>

<!DOCTYPE html PUBLIC>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>BoekOnShelf</title>
    <link rel="icon" href="../images/icon.png" />
    <link href="../css/stijl.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

    <div id="banner">
        <h1>WELKOM</h1>
    </div>

<!---Menu---->
    <?php include '../Includes/navbar_login.inc.php'; ?>


<!----page--->
    <?php include '../Includes/'.$page.'.inc.php'; ?>



<!-------footer---->
    <div id="footer">
        <em>BoekOnShelf</em>
    </div>

</div>
</body>
</html>

