<?php

class User {
    public function logout(){
        session_destroy();
    }
    public function is_logged_in(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }
    }
}
?>