<?php
include 'Connect.php';

ini_set("display_errors","1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delete_ps
 *
 * @author BiNI
 */
class delete_ps {
    //put your code here
    protected $connection;
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
    }
    public function delete_ps(){
        $id = filter_input(INPUT_POST,'submit_ps');
        $delete_query = "delete from evoting_ps where id = ".$id;
        $result = mysqli_query($this->connection,$delete_query) or die("INVALID QUERY @deletePs.php 26".mysqli_query($this->connection));
        header("Location: http://localhost/Evoting-admin/delete.php");
        exit();
    }
}
$del_ps = new delete_ps();
$del_ps->delete_ps();