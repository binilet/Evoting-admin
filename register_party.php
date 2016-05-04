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
    protected $_ListOfConst;
    protected $_ListOfPs;
    protected $_Objective;

    function __construct() {
        
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
            $p = new Connect();
            $connection = $p->connect();

            $pname = $this->_partyName;
            $pcode = $this->_partyCode;
            $pregion = $this->_region;
            $plogoName = $this->_logoName;
            $plogoPath = $this->_logoPath;
            $pnoOfCan = $this->_noOfCan;
            $pListConst = $this->_ListOfConst;
            $pListPs = $this->_ListOfPs;
            $pobjective = $this->_Objective;


            $query = "insert into evoting_party(ID,PARTY_NAME,PARTY_CODE,REGION,LOGO_NAME,LOGO_PATH,NO_OF_CAN,LIST_OF_CONST,LIST_OF_PS,OBJECTIVE)"
                    . " values(0,'$pname','$pcode','$pregion','$plogoName','$plogoPath',$pnoOfCan,'$pListConst','$pListPs','$pobjective')";
            mysqli_query($connection, $query) or die("envalid query: " . mysqli_error($connection));
            if (mysqli_affected_rows($connection) >= 1) {
                echo "<h2>rows got affected</h2>";
            } else {
                echo "some error";
            }
        } catch (Exception $ex) {
            echo 'Error Message: ' . $ex->getMessage();
        }
        $upload_image = new uploadImage();
        $upload_image->uploadLogo();
        header('Location: http://localhost/Evoting-admin/register.php');
    }   

}

$p = new register_party();
$p->evoting_registerParty();
