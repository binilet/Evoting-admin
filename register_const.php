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
 * Description of register_const
 *
 * @author BiNI
 */
class register_const {
    //put your code here
    protected $_constCode;
    protected $_constName;
    protected $_constRegion;
    protected $_noOfPs;
    protected $_listOfPs;
    protected $_remarks;
    
    protected $connection;


    public function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
        
        if(isset($_POST['submit'])){
            $this->_constCode = filter_input(INPUT_POST,'conCode',FILTER_SANITIZE_STRING);
            $this->_constName = filter_input(INPUT_POST,'conName',FILTER_SANITIZE_STRING);
            $this->_constRegion = filter_input(INPUT_POST,'region',FILTER_SANITIZE_STRING);
            $this->_noOfPs = filter_input(INPUT_POST,'Nops',FILTER_SANITIZE_NUMBER_INT);
            $this->_listOfPs = filter_input(INPUT_POST,'listOfPs');
            $this->_remarks = filter_input(INPUT_POST,'remarks',FILTER_SANITIZE_STRING);
        }
    }
    public function register_const(){
        $ccode = $this->_constCode;
        $cname = $this->_constName;
        $cregion = $this->_constRegion;
        $cNoPs = $this->_noOfPs;
       
        $cremarks = $this->_remarks;
        
        $query = "INSERT INTO evoting_const(ID,CONST_CODE,CON_NAME,REGION,NO_OF_PS,REMARKS) "
                . "VALUES(0,'$ccode','$cname','$cregion',$cNoPs,'$cremarks')";
        $result = mysqli_query($this->connection,$query) or die ("Invalid Query:53 ". mysqli_error($this->connection));
        if($result){
            echo "<h1>Query Executed. list of ps: ". $cListPs ."</h1>";
        }
        $this->const_ps();
        header("Location: http://localhost/Evoting-admin/register.html");
    }
    
    //this function will handle the one to many relationship between pollstations and constituencies
    public function const_ps(){
         $cListPs = $this->_listOfPs;
         $ccode = $this->_constCode;
         $myarray = explode(' ', $cListPs);
         foreach($myarray as $val){
            $query = "insert into const_ps(id,const_code,ps_code) values(0,'$ccode','$val')";
            mysqli_query($this->connection, $query) or die("Invalid Query: 105". mysqli_error($this->connection));
        }
    }
}
$reg_const = new register_const();
$reg_const->register_const();