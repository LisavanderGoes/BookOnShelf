<?php
if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}

if(!empty($_GET['message'])) {
    $message = $_GET['message'];
    if($message == "success"){
        echo '<script language="javascript">';
        echo 'alert("Gelukt!")';
        echo '</script>';
    } else if($message == 'fail'){
        echo '<script language="javascript">';
        echo 'alert("Helaas er is iets misgegeaan!")';
        echo '</script>';
    }
}

?>



<form id="login" name="login" method="post" action="php/terugbrengen.php">

    <p>

        <label>
            <input type="text" name="boekname" id="username" placeholder="Naam boek...">
        </label>
    </p>
    <p>
        <label>
            <input type="text" name="writer" id="password" placeholder="Auteur...">
        </label>
    </p>


    <input class="button" type="submit" value="Terugbrengen" name="submit">
</form>