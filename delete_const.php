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
 * Description of delete
 *
 * @author BiNI
 */
class delete_const {
    //put your code here
    protected $connection;
    
    public function __construct() {
        $con= new Connect();
        $this->connection = $con->connect();
    }
    public function delete(){
        $id = filter_input(INPUT_POST,'submit_const');
        echo "the const id is: ".$id;
        $delete_query = "delete from evoting_const where id = ". $id;
        $result = mysqli_query($this->connection, $delete_query) or die("Envalid delete query 30: ".  mysqli_query($this->connection));
        if($result){
            echo "delete operation successfull";
        }else{
            echo "something went wrong during delete operation";
        }
        header("Location: http://localhost/Evoting-admin/delete.php");
        exit();
        
    }
}
$del = new delete_const();
$del->delete();
echo "delete in progress";