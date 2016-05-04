<?php
include 'Connect.php';
include 'uploadCandidatePhoto.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register_candidate
 *
 * @author BiNI
 */
class register_candidate {
    //put your code here
    protected $_canFname;
    protected $_canLname;
    protected $_canGender;
    protected $_canDOB;
    protected $_canBirthPlace;
    protected $_canEduLevel;
    protected $_phtPath;
    protected $_canType;
    protected $_canCode;
    protected $_canPromise;
    
    protected $connection;
    
            
    function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
        
        
        
        if(isset($_POST['submit_candidate']) != null){
            $this->_canFname = filter_input(INPUT_POST,'canFName',FILTER_SANITIZE_STRING);
            $this->_canLname = filter_input(INPUT_POST,'canLName',FILTER_SANITIZE_STRING);
            $this->_canGender = filter_input(INPUT_POST,'gender');
            $this->_canDOB = filter_input(INPUT_POST,'dob');
            $this->_canBirthPlace = filter_input(INPUT_POST,'birthPlace',FILTER_SANITIZE_STRING);
            $this->_canEduLevel = filter_input(INPUT_POST,'eduLevel',FILTER_SANITIZE_STRING);
            $this->_phtPath = basename($_FILES['pht']['name']);
            $this->_canType = filter_input(INPUT_POST,'candidateType');
            $this->_canCode = filter_input(INPUT_POST,'canCode',FILTER_SANITIZE_STRING);
            $this->_canPromise = filter_input(INPUT_POST,'promise',FILTER_SANITIZE_STRING);
        }else{
            echo "<h1>Error @registerCandidate.php sumbit not set</h1>";
        }
    }
    
    public function evoting_registerCandidate(){
        try{
            $cfname = $this->_canFname;
            $clname = $this->_canLname;
            $cgender = $this->_canGender;
            $cdob = $this->_canDOB;
            $cbirthplace = $this->_canBirthPlace;
            $cedulev = $this->_canEduLevel;
            $cphoto = $this->_phtPath;
            $ctype = $this->_canType;
            $ccode = $this->_canCode;
            $cpromise = $this->_canPromise;
            
            echo "fname: ".$cfname;
            echo "</br>lname: ".$clname;
            echo "</br>cgender: ".$cgender;
            echo "</br>cdob: ". $cdob;
            echo "</br>birrthplace: ". $cbirthplace;
            echo "</br>education: ".$cedulev;
            echo "</br> candidate photo: ".$cphoto;
            echo "</br> can type: ".$ctype;
            echo "</br> ccode: ".$ccode;
            echo "</br> promise: ".$cpromise;
            
            $query = "insert into evoting_can(ID,FIRST_NAME,LAST_NAME,GENDER,DOB,BIRTH_PLACE,EDUCATION_LEVEL,PHOTO_PATH,CAN_TYPE,
                RUNNING_CODE,PROMISES) VALUES(0,'$cfname','$clname','$cgender','$cdob AS DATE','$cbirthplace','$cedulev','$cphoto','$ctype',
                    '$ccode','$cpromise')";
            echo "<h1>$query</h1>";
            
            mysqli_query($this->connection,$query) or die("Invalid Query: ".mysqli_error($this->connection));
            
            $uploadPhoto = new uploadCandidatePhoto();
            $uploadPhoto->upload_can_photo();
            //header("Location: http://localhost/Evoting-admin/register.html");
            
            
        } catch (Exception $ex) {
            echo "Error: ".$ex->getMessage();
        }
    }
}
$r_can = new register_candidate();
$r_can->evoting_registerCandidate();