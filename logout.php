<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author BiNI
 */
class logout {
    //put your code here
    public function logout(){
        session_start();
        $_SESSION['login'] = false;
        session_unset('uname');
        session_unset('password');
        header("Location: login.php");
        
    }
}
$lo = new logout();
$lo->logout();
