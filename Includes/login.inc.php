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


    <div>
        <div>
            <a href=''>Forgot your Password?</a>
        </div>
    </div>

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


