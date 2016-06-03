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
class getResults {
    //put your code here
    protected $connection;
    protected $pname;
    protected $result;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
    }
    
    public function getRes(){
        $this->truncate();
        $query = "select distinct party_name,result from total_result order by result desc";
        $result = mysqli_query($this->connection, $query) or die ("Invalid Query: addNews.php: " .mysqli_error($this->connection));
        while($row = mysqli_fetch_row($result)){
            $pname = $row[0];
            $res = $row[1];
            $final = "$pname $res seats";
            $query = "insert into composed_result values(0,'$final','false')";
            mysqli_query($this->connection, $query)  or die("Invalid Query: ". mysqli_error($$this->connection));
        }
        header("Location: http://localhost/evoting-admin/addinfo.php");
    }
    
    public function truncate(){
        $query = "truncate table composed_result";
        mysqli_query($this->connection, $query);
    }
}
 $getres = new getResults();
 $getres->getRes();
