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
    <title>BookOnShelf</title>
    <link rel="icon" href="images/icon.png" />
    <link href="css/stijl.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">


        <div id="banner">
            <?php include 'includes/navbar.inc.php'; ?>
            <img id="imgbanner" src="images/book002.png" alt="Icon" height="55" width="55"><?php echo $page ?>
        </div>



<!----page--->
    <div id="content">
    <!--<img id="circle" src="images/icon005.png" alt="Icon" height="400" width="400">-->
    <?php include 'includes/'.$page.'.inc.php'; ?>
    </div>


<!-------footer---->
    <div id="footer">
        <em>BookOnShelf</em>
    </div>

</div>
</body>
</html>

