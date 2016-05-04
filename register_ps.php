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
 * Description of register_ps
 *
 * @author BiNI
 */
class register_ps {
    //put your code here
    protected $psCode;
    protected $psName;
    protected $conCode; //the constitiuency where this ps resides
    protected $region;
    protected $zone_subcity;
    protected $woreda;
    protected $kebele;
    protected $remark;
    
    protected $connection;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
        
        //all post values 
        if(isset($_POST['submit']) != null){
            $this->psCode = filter_input(INPUT_POST,'psCode');
            $this->psName = filter_input(INPUT_POST,'psName');
            $this->conCode = filter_input(INPUT_POST,'conCode');
            $this->region = filter_input(INPUT_POST,'region');
            $this->zone_subcity = filter_input(INPUT_POST,'subcity_zone');
            $this->woreda = filter_input(INPUT_POST,'woreda');
            $this->kebele = filter_input(INPUT_POST,'kebele');
            $this->remark = filter_input(INPUT_POST,'remarks');
        }else{
            echo "error submit not set in ps submit 46 </BR>";
        }
    }
    public function evoting_registerPS(){
        try{
            $ps_code = $this->psCode;
            $ps_name = $this->psName;
            $ps_con = $this->conCode;
            $ps_region = $this->region;
            $ps_zonsub = $this->zone_subcity;
            $ps_woreda = $this->woreda;
            $ps_kebele = $this->kebele;
            $ps_remark = $this->remark;
            
            echo $ps_code.",".$ps_name.",".$ps_con.",".$ps_region.",".$ps_zonsub.",".$ps_woreda.",".$ps_kebele.",".$ps_remark;
            
            $query = "INSERT INTO evoting_ps (ID,PS_CODE,PS_NAME,CONST_CODE,REGION,SUBCITY,WOREDA,KEBELE,REMRAKS) "
                    . "VALUES(0,'$ps_code','$ps_name','$ps_con','$ps_region','$ps_zonsub',$ps_woreda,$ps_kebele,'$ps_remark')";
            mysqli_query($this->connection, $query) or die("Invalid Query: 62 ". mysqli_error($this->connection));
            if(mysqli_affected_rows($this->connection) > 0 ){
                echo "<h1> rows created</h1>";
            }else{
                echo "<h1>error inserting</h1>";
            }
        } catch (Exception $ex) {
            echo "Exception:60 " . $ex->getMessage();
        }
    }
}
$r_ps = new register_ps();
$r_ps->evoting_registerPS();