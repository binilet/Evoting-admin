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
 * Description of ajax_response
 *
 * @author BiNI
 */
class party_ajax_response {
    //put your code here
    protected $connection;
   
    public function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
    }
    
    function handle_request(){
        $_id = filter_input(INPUT_GET,'id');
        $this->select($_id);
    }
    function select($id){
        $partyArray = Array();
        $sql =  "select * from evoting_party where ID = ". $id;
        $result = mysqli_query($this->connection,$sql) or die ("Invalid Query: ". mysqli_error($this->connection));
        while($row = $result->fetch_array(MYSQL_ASSOC)){
            $partyArray[] = $row;
        }
        $jsonObj = json_encode($partyArray);   
        
        echo $jsonObj;
        
    }
}
$aR = new party_ajax_response();
$aR->handle_request();
