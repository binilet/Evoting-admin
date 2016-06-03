<?php
include 'Connect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addNews
 *
 * @author BiNI
 */
class getObjective {
    //put your code here
    protected $connection;
    protected $pname;
    protected $objective;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
    }
    
    public function findObjecive(){
        $query = "select party_name,objective from evoting_party";
        $result = mysqli_query($this->connection, $query) or die ("Invalid Query: addNews.php: " .mysqli_error($this->connection));
        $this->truncate();
        while($row = mysqli_fetch_row($result)){
            $pname = $row[0];
            $obj = $row[1];
            $query = "insert into objective values(0,'$pname','$obj')";
            mysqli_query($this->connection, $query) or die("Invalid Query: " .  mysqli_error(($this->connection)));
        }
        header("Location: http://localhost/evoting-admin/addinfo.php");
    }
    
    public function truncate(){
        $query = "truncate table objective";
        mysqli_query($this->connection,$query) or die("Invalid Query: getObj.php".mysqli_error($this->connection));
    }
}
 $obj = new getObjective();
 $obj->findObjecive();
