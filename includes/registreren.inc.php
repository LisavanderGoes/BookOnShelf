<?php

if ($user->is_logged_in()) {
    $user->logout();
}

?>

<form id="login" name="login" method="post" action="php/registreren.php">
    <div id="box">
    <p>

        <label>
            <input type="text" name="username" id="username" placeholder="Naam...">
        </label>
    </p>
    <p>
        <label>
            <input type="password" name="password" id="password" placeholder="Wachtwoord...">
        </label>
    </p>
    <p>
        <label>
            <input type="password" name="2" id="password2" placeholder="Wachtwoord(2e x)...">
        </label>
    </p>
    </div>
    <input class="button" type="submit" value="Registreren" name="submit">
</form>