<?php

if ($user->is_logged_in()) {
    $user->logout();
}

if(!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    if($message == "success"){
        echo '<script language="javascript">';
        echo 'if (confirm("Gelukt!")) {
           }';
        echo '</script>';
    } else if($message == 'fail'){
        echo '<script language="javascript">';
        echo 'alert("Helaas! Niet gelukt!")';
        echo '</script>';
    }
    unset($_SESSION['message']);
}

?>

<form id="login" role="form" method="post" action="php/login.php" autocomplete="off">
    <div id="box">
        <p>
    <label>
        <input type="text" name="username" id="username" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" required>
    </label>
        </p>
        <p>

    <label>
        <input type="password" name="password" id="password" placeholder="Password" tabindex="3" required>
    </label>
        </p>
        

    <hr>
        <p>
    <label>
        <div><input type="submit" name="submit" value="Login" tabindex="5"></div>
    </label>
        </p>
    </div>
</form>

</br>
<h3>
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</h3>


