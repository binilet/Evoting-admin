<?php
include 'Connect.php';
include 'uploadCandidatePhoto.php';

ini_set("display_errors","1");
error_reporting(E_ALL);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of update_candidate
 *
 * @author BiNI
 */
class update_candidate {
    //put your code here
    protected $connection;
    public function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
    }
    
    public function updt_candidate(){
        if(isset($_POST['update_candidate']) != null){
            $id = filter_input(INPUT_POST,'hidden_id4');
            $canFname = filter_input(INPUT_POST,'canFName',FILTER_SANITIZE_STRING);
            $canLname = filter_input(INPUT_POST,'canLName',FILTER_SANITIZE_STRING);
            $canGender = filter_input(INPUT_POST,'gender');
            $canDOB = filter_input(INPUT_POST,'dob');
            $canBirthPlace = filter_input(INPUT_POST,'birthPlace',FILTER_SANITIZE_STRING);
            $canEduLevel = filter_input(INPUT_POST,'eduLevel',FILTER_SANITIZE_STRING);
            $canPhotoPath = basename($_FILES['candidatePhoto']['name']);
            $canType = filter_input(INPUT_POST,'candidateType');
            $canCode = filter_input(INPUT_POST,'canCode',FILTER_SANITIZE_STRING);
            $canPromise = filter_input(INPUT_POST,'promise',FILTER_SANITIZE_STRING);
            
            $img_query = "select PHOTO_PATH from evoting_can where ID = ". $id;
            $result = mysqli_query($this->connection, $img_query) or die ("invalid query: 44". mysqli_error($this->connection));
            
            if(mysqli_affected_rows($this->connection)){
                $row = $result->fetch_array(MYSQL_ASSOC);
                $newImage = strtolower($canPhotoPath);
                $originalImage = strtolower($row['PHOTO_PATH']);
                if(strcmp($newImage, $originalImage) == 0){//if image is not updated
                    echo "<h1> image is unchanged</h1>";
                    //do nothing
                }else{
                    try{
                        echo "<h2> original image: ". $originalImage ."</h2>";
                        echo "</h2> new image: ". $newImage . "</h2>";
                        $imageToDelete = "upload/".$originalImage;
                        $deleted = unlink($imageToDelete);
                        if($deleted){
                            echo "<h1> The file".$imageToDelete . " is Deleted</h1>";
                        }
                        else{
                            echo "<h1> error deleting the file</h1>";
                        }
                    } catch (Exception $ex) {
                         echo $ex->getMessage();
                    } 
                }
                //if image is updated
                    
                    //prepare a query to update the logopath name
                    //$update_path = "update evoting_party set LOGO_PATH = '".$newImage."' where ID=".$id;
                    $update_path = "update evoting_can set FIRST_NAME = '".$canFname;
                    $update_path.="',LAST_NAME = '".$canLname;
                    $update_path.="',GENDER = '".$canGender;
                    $update_path .= "',DOB = '".$canDOB;
                    $update_path .= "',BIRTH_PLACE = '".$canBirthPlace;
                    $update_path.= "',EDUCATION_LEVEL = '".$canEduLevel;
                    $update_path.= "',PHOTO_PATH = '".$canPhotoPath;
                    $update_path.= "',CAN_TYPE = '".$canType;
                    $update_path.= "',RUNNING_CODE = '".$canCode;
                    $update_path.= "',PROMISES = '".$canPromise."' WHERE ID = ".$id;
                    $updateQuery = mysqli_query($this->connection,$update_path) or die ("invalid query: 67". mysqli_query($this->connection));
                    if($updateQuery){
                        echo "<h1> path is updated </h1>";
                    }
                    
                   $upload_image = new uploadCandidatePhoto();
                   $upload_image->uploadPhoto();
                   header("Location: http://localhost/Evoting-admin/edit.php");
            }
            
        }
    }
}
$up_can = new update_candidate();
$up_can->updt_candidate();