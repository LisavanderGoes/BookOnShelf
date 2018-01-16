<?php session_start();

if(isset($_POST['submit'])){
    $logins = array('Alex' => '123456',
        'username1' => 'password1',
        'username2' => 'password2',
        'lisa' => 'ww');

    $message = "WRONG!";

    $Username = isset($_POST['username']) ? $_POST['username'] : '';
    $Password = isset($_POST['password']) ? $_POST['password'] : '';

    if (isset($logins[$Username]) && $logins[$Username] == $Password){
        $_SESSION['UserData']['Username']=$logins[$Username];
        header("Location:../index.php");
        exit;
    } else {
        header("Location:start.php");
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
