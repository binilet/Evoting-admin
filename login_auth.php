<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_auth
 *
 * @author BiNI
 */
class login_auth {
    //put your code here
    protected $user_name;
    protected $password;
    
    public function authenticate(){
        $this->user_name = 'admin';
        $this->password = '1234';
        
        $entered_user_name = filter_input(INPUT_POST,'user_name');
        $entered_password = filter_input(INPUT_POST,'password');
        
        if(isset($_POST['login']) && $_SESSION['login'] !== true){
                    echo "<script type='text/javascript'>"
                    . "document.getElementById('error').innerHTML = 'envalid username or password';</script>";
                    header("Location: login.php");
                    
        }
        
        
        if(isset($_POST['login'])){
            session_start();
            if($entered_user_name === $this->user_name && $entered_password === $this->password){
                $_SESSION['login'] = true;
                $_SESSION['uname'] = $this->user_name;
                $_SESSION['password'] = $this->password;
                header("Location: index.php");
            }else{
                header("Location: login.php"); 
            }
            
        }
    }
}
$login = new login_auth();
$login->authenticate();
