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
 * This class will perform the rudimentary business logic of updating the party information
 *
 * @author BiNI
 */
class update_const {
    //put your code here
    protected  $connection;
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
        
        
    }
    public function updt_const(){
        if(isset($_POST['update_const'])){
           
            $id = filter_input(INPUT_POST,'hidden_id2');
            $ccode = filter_Input(INPUT_POST,'conCode');
            $cname = filter_Input(INPUT_POST,'conName');
            $cregion = filter_Input(INPUT_POST,'region');
            $cnoOfPs = filter_Input(INPUT_POST,'Nops');
            $cpslist = filter_Input(INPUT_POST,'listOfPs');
            $cremarks = filter_Input(INPUT_POST,'remarks');
            
            echo "<h1> ID is: ".$id."</h1>";
            echo "$id,$ccode,$cname,$cregion,$cnoOfPs,$cpslist,$cremarks";
            
            $update_const = "UPDATE evoting_const SET CONST_CODE = '".$ccode;
            $update_const.="',CON_NAME = '".$cname;
            $update_const.="',REGION = '".$cregion;
            $update_const.= "',NO_OF_PS = ".$cnoOfPs;
            $update_const.= ",lIST_OF_PS = '".$cpslist;
            $update_const.= "',REMARKS = '".$cremarks."' WHERE ID = ".$id;
            
            $updateQuery = mysqli_query($this->connection,$update_const) or die ("invalid query:update_const.php ". mysqli_query($this->connection));
            
            if(mysqli_affected_rows($this->connection)){
                echo "rows affected";
            }else{
                echo "error update_const";
            }
            header("Location: http://localhost/Evoting-admin/edit.php");
        }
        
    }
}
$up = new update_const();
$up->updt_const();
