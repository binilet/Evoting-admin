<?php
include 'Connect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notification4android
 *
 * @author BiNI
 */
class Notification4android {
    //put your code here
    protected $connection;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
    }
    public function getNotification(){
        $query = "Select * from notification where status = 'false'";
        $result = mysqli_query($this->connection,$query) or die("Error at news4android line 23: ". mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) >= 1){
            $row = mysqli_fetch_array($result);
            $news = $row[2];
            $updateQuery = "Update notification set status = 'true' where id = $row[0]";
            mysqli_query($this->connection,$updateQuery);
            return $news;
        }else{
            return "Sorry currently ther are no unsent notifications";
        }
    }
    public function getPhoneNumbers(){
        $tmpphonenumbers = "";
        $query = "select phone_number from voters";
        $result = mysqli_query($this->connection,$query) or die("Error at news4android line 38: ". mysqli_error($this->connection));
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

    public function postNotification(){
        $notification = $this->getNotification();
        $recievers = $this->getPhoneNumbers();
        
        $data = array("rcvr"=>"$recievers","txt"=>"$notification");
        $json = json_encode($data);
        echo $json;
    }
}
$no4a = new Notification4android();
$no4a->postNotification();