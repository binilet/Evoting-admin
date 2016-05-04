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
 * Description of update_ps
 *
 * @author BiNI
 */
class update_ps {
    //put your code here
    protected $connection;
    public function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
    }
    
    public function updt_ps(){
        if(isset($_POST['submit_ps']) != null){
            $id = filter_input(INPUT_POST,'hidden_id3');
            $pscode = filter_input(INPUT_POST,'psCode');
            $psName = filter_input(INPUT_POST,'psName');
            $psConCode = filter_input(INPUT_POST,'conCode');
            $psregion = filter_input(INPUT_POST,'region');
            $pssub_zone = filter_input(INPUT_POST,'subcity_zone');
            $psworeda = filter_input(INPUT_POST,'woreda');
            $pskebele = filter_input(INPUT_POST,'kebele');
            $psremarks = filter_input(INPUT_POST,'remarks');
            
            echo "id: " . $id;
            echo "</br>pscode: ". $pscode;
            echo "</br>remarks: ". $psremarks;
            
            
            
            $update_ps = "UPDATE evoting_ps SET PS_CODE = '".$pscode;
            $update_ps.="',PS_NAME = '".$psName;
            $update_ps.="',CONST_CODE = '".$psConCode;
            $update_ps.="',REGION = '".$psregion;
            $update_ps.="',SUBCITY = '".$pssub_zone;
            $update_ps.="',WOREDA = ".$psworeda;
            $update_ps.=",KEBELE = ".$pskebele;
            $update_ps.=",REMRAKS = '".$psremarks."' WHERE ID = ".$id;
            echo "<h1>".$update_ps."</h1>";
            
            $updateQuery = mysqli_query($this->connection,$update_ps) or die("Invalid Query: @ps 53". mysqli_error($this->connection));
            if(mysqli_affected_rows($this->connection)){
                echo "rows got affected";
            }else{
                echo "update ps unsccssesfull";
            }
            
            header("Location: http://localhost/Evoting-admin/edit.php");
        }
    }
}
$up_ps = new update_ps();
$up_ps->updt_ps();