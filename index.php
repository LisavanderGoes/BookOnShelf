<?php
if (isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page='home';
}
?>

<!DOCTYPE html PUBLIC>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">

<head>
    <!-- meta data -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- title -->
    <title>BoekOnShelf</title>

    <!-- Koppel extern stijlblad bestand -->
    <link href="css/stijl.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- set layout -->
<div id="layout">

    <!-- header -->
    <div id="header">
        <h1>BoekOnShelf</h1>
    </div>

    <!-- menu -->

    <?php include 'Includes/navbar.inc.php'; ?>


    <!-- content -->
    <?php include 'Includes/'.$page.'.inc.php'; ?>


    <!-- footer -->
    <div id="footer">
        <em>BoekOnShelf</em>
    </div>

</div> <!-- end layout -->
</body>
</html>

