<?php
include 'Connect.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerAdmin
 *
 * @author BiNI
 */
class registerAdmin {
    //put your code here
    protected $connection;
    protected $pscode;
    protected $uname;
    protected $pswd;
    
    public function __construct() {
        $connect = new Connect();
        $this->connection = $connect->connect();
        if(isset($_POST['submit'])){
            $this->pscode = filter_input(INPUT_POST,'pscode');
            $this->uname = filter_input(INPUT_POST,'username');
            $this->pswd = filter_input(INPUT_POST,'password');
        }else{
            echo "admin register submit button not set";
        }
    }
    public function register(){
        $hashed_password = password_hash($this->pswd, PASSWORD_DEFAULT);
        $username = $this->uname;
        $pscode = $this->pscode;
        $query = "insert into admins(id,ps_code,user_name,password)values(0,'$pscode','$username','$hashed_password')";
        $result = mysqli_query($this->connection, $query) or die("Invalid Query: registerAdmin.php ".mysqli_error($this->connection));
        header("Location: http://localhost/evoting-admin/index.php");
    }
}
$ra = new registerAdmin();
$ra->register();