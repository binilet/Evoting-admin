<?php
include 'Connect.php';
//include 'party.php';
include 'uploadImage.php';

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
class update_party {
    //put your code here
    protected  $connection;
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
        
        
    }
    public function updt_party(){
        if(isset($_POST['update_party'])){
            echo "<h1> has to work big time !</h1>";
            $id = filter_input(INPUT_POST,'hidden_id');
            echo "<h1>the id is: " . $id. "</h1>";
            $pname = filter_Input(INPUT_POST,'partyName');
            echo "<h1>party name is: " . $pname. "</h1>";
            $pcode = filter_Input(INPUT_POST,'partyCode');
            $pregion = filter_Input(INPUT_POST,'region');
            $plogoname = filter_Input(INPUT_POST,'logoName');
            $plogopath = basename($_FILES['partyLogo']['name']); 
            $pcandidateno = filter_Input(INPUT_POST,'candidateNo');
            $pconstlist = filter_Input(INPUT_POST,'constList');
            $ppslist = filter_Input(INPUT_POST,'listOfPs');
            $pobjective = filter_Input(INPUT_POST,'objective');
            $img_query = "select LOGO_PATH from evoting_party where ID = ". $id;
            $result = mysqli_query($this->connection, $img_query) or die ("invalid query: 44". mysqli_error($this->connection));
            
            if(mysqli_affected_rows($this->connection)){
                $row = $result->fetch_array(MYSQL_ASSOC);
                $newImage = strtolower($plogopath);
                $originalImage = strtolower($row['LOGO_PATH']);
                if(strcmp($newImage, $originalImage) == 0){//if image is not updated
                    echo "<h1> image is unchanged</h1>";
                    //do nothing
                }else{
                    //if image is updated
                    echo "<h2> original image: ". $originalImage ."</h2>";
                    echo "</h2> new image: ". $newImage . "</h2>";
                    //prepare a query to update the logopath name
                    //$update_path = "update evoting_party set LOGO_PATH = '".$newImage."' where ID=".$id;
                    $update_path = "update evoting_party set PARTY_NAME = '".$pname;
                    $update_path.="',PARTY_CODE = '".$pcode;
                    $update_path.="',REGION = '".$pregion;
                    $update_path .= "',LOGO_NAME = '".$plogoname;
                    $update_path .= "',LOGO_PATH = '".$newImage;
                    $update_path.= "',NO_OF_CAN = ".$pcandidateno;
                    $update_path.= ",LIST_OF_CONST = '".$pconstlist;
                    $update_path.= "',LIST_OF_PS = '".$ppslist;
                    $update_path.= "',OBJECTIVE = '".$pobjective."' WHERE ID = ".$id;
                    $updateQuery = mysqli_query($this->connection,$update_path) or die ("invalid query: 67". mysqli_query($this->connection));
                    if($updateQuery){
                        echo "<h1> path is updated </h1>";
                    }
                    try{
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
                   $upload_image = new uploadImage();
                   $upload_image->uploadLogo();
                   header("Location: http://localhost/Evoting-admin/edit.php");
                }
            }
        }
        
    }
}
$up = new update_party();
$up->updt_party();
