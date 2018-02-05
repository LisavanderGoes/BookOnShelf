<?php

if ($user->is_logged_in()) {
    $user->logout();
}




?>

<form id="login" role="form" method="post" action="php/email.php" autocomplete="off">
    <div id="box">

    <label>
        <input type="text" name="email" id="password" placeholder="Email" tabindex="3" required>
    </label>
        </p>


    <label>
        <div><input type="submit" name="submit" value="Stuur" tabindex="5"></div>
    </label>
        </p>
    </div>
</form>



