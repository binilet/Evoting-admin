<?php
include 'Connect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nresult4android
 *
 * @author BiNI
 */
class nresult4android {
    //put your code here
    protected $connection;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
    }
    public function getResult(){
        $first3Results = "";
        $query = "Select * from composed_result where status = 'false' LIMIT 3";
        $result = mysqli_query($this->connection,$query) or die("Error at nresult4android line 23: ". mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) >= 1){
            while($row = mysqli_fetch_array($result)){
                $first3Results .= $row[1]."|*|";
                $updateQuery = "Update composed_result set status = 'true' where id = $row[0]";
                mysqli_query($this->connection,$updateQuery);
            }
            return $first3Results;
        }else{
            return "Sorry currently there are no unsent results";
        }
    }
    public function getPhoneNumbers(){
        $tmpphonenumbers = "";
        $query = "select phone_number from voters";
        $result = mysqli_query($this->connection,$query) or die("Error at nresult4android line 38: ". mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) >= 1){
            while($row = mysqli_fetch_array($result)){
                $tmpphonenumbers .= $row[0].",";
            }
        }else{
            return "Currently there are no phone numbers registerd in the db";
        }
        $phonenumbers = rtrim($tmpphonenumbers,",");
        return $phonenumbers;
    }

    public function postResult(){
        $result = $this->getResult();
        $recievers = $this->getPhoneNumbers();
        
        $data = array("rcvr"=>"$recievers","txt"=>"Total Number of seats 546 |*|$result");
        $json = json_encode($data);
        echo $json;
    }
}
$r4a = new nresult4android();
$r4a->postResult();