<?php


include 'Connect.php';
include 'uploadImage.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of party
 *
 * @author BiNI
 */
class register_party {

    //protected $_id;
    protected $_partyName;
    protected $_partyCode;
    protected $_region;
    protected $_logoName;
    protected $_logoPath;
    protected $_noOfCan;
    protected $_ListOfConst;//this
    protected $_ListOfPs;//this
    protected $_Objective;
    protected $connection;
    
    function __construct() {  
        $p = new Connect();
        $this->connection = $p->connect();
        
        if (isset($_POST['submit']) != null) {
            $this->_partyName = filter_input(INPUT_POST, 'partyName', FILTER_SANITIZE_STRING);
            $this->_partyCode = filter_input(INPUT_POST, 'partyCode', FILTER_SANITIZE_STRING);
            $this->_region = filter_input(INPUT_POST, 'region', FILTER_SANITIZE_STRING);
            $this->_logoName = filter_input(INPUT_POST, 'logoName', FILTER_SANITIZE_STRING);

            //$this->_logoPath = filter_input(INPUT_FILES, 'partyLogo', FILTER_SANITIZE_STRING);
            $this->_logoPath = basename($_FILES['partyLogo']['name']); 
            $this->_noOfCan = filter_input(INPUT_POST, 'candidateNo', FILTER_SANITIZE_NUMBER_INT);
            $this->_ListOfConst = filter_input(INPUT_POST, 'constList');
            $this->_ListOfPs = filter_input(INPUT_POST, 'listOfPs');
            $this->_Objective = filter_input(INPUT_POST, 'objective');
        } else {
            echo "<h1>Error 47</h1>";
        }
    }

    

    public function evoting_registerParty() {
        try {
            $pname = $this->_partyName;
            $pcode = $this->_partyCode;
            $pregion = $this->_region;
            $plogoName = $this->_logoName;
            $plogoPath = $this->_logoPath;
            $pnoOfCan = $this->_noOfCan;            
            $pobjective = $this->_Objective;

            $query = "insert into evoting_party(ID,PARTY_NAME,PARTY_CODE,TYPE,LOGO_NAME,LOGO_PATH,NO_OF_CAN,OBJECTIVE)"
                    . " values(0,'$pname','$pcode','$pregion','$plogoName','$plogoPath',$pnoOfCan,'$pobjective')";
            
            mysqli_query($this->connection, $query) or die("envalid query: 71" . mysqli_error($this->connection));
            $this->evoting_pname_con();
            $this->evoting_pname_ps();
        } catch (Exception $ex) {
            echo 'Error Message: ' . $ex->getMessage();
        }
        $upload_image = new uploadImage();
        $upload_image->uploadLogo();
        header('Location: http://localhost/Evoting-admin/register.php');
    }  
    
    //this function will add party name with each its running constiutuencies 
    public function evoting_pname_con(){
        $pListConst = $this->_ListOfConst;
        $pname = $this->_partyName;
        
        $myarray = explode(' ', $pListConst);
        foreach($myarray as $val){
            $query = "insert into vote_con(id,pname,con_code) values(0,'$pname','$val')";
            mysqli_query($this->connection, $query) or die("Invalid Query: 95" . mysqli_error($this->connection));
        }
    }
    //party_name with each its running pollstations into database
    public function evoting_pname_ps(){
        $pListPs = $this->_ListOfPs;
        $pname = $this->_partyName;
        $myarray = explode(' ', $pListPs);
        foreach($myarray as $val){
            $query = "insert into vote_ps(id,pname,ps_code) values(0,'$pname','$val')";
            mysqli_query($this->connection, $query) or die("Invalid Query: 105". mysqli_error($this->connection));
        }
    }

}

$p = new register_party();
$p->evoting_registerParty();
