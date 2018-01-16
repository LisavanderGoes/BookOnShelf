<?php session_start();

if(isset($_POST['submit'])){
    $logins = array('Alex' => '123456',
        'username1' => 'password1',
        'username2' => 'password2',
        'lisa' => 'ww');

    $Username = isset($_POST['username']) ? $_POST['username'] : '';
    $Password = isset($_POST['password']) ? $_POST['password'] : '';
    $Password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

    if (isset($logins[$Username]) && $logins[$Username] == $Password){
        $_SESSION['UserData']['Username']=$logins[$Username];
        header("Location:../index.php");
        exit;
    } else {
        header("Location:start.php");

    }
}
?>
