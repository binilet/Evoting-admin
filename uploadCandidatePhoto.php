<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadImage
 *
 * @author BiNI
 */
class uploadCandidatePhoto {
    //put your code here
    public function upload_can_photo() {
        $target_dir = "pht/";
        $target_file = $target_dir . basename($_FILES["pht"]["name"]);
        $uploadOk = 1;
        echo "<h1 style='color:red;'>" . $target_file . "</h1>";
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["pht"]["tmp_name"]);
        if ($check !== false) {
            echo "file is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image";
            $uploadOk = 0;
        }

        //check if file already exists
        if (file_exists($target_file)) {
            echo "file already exists";
            $uploadOk = 0;
        }
        //check file size
        if ($_FILES["pht"]["size"] > 900000) {
            echo "file is too big needs to be <= 900kb";
            $uploadOk = 0;
        }
        //limit file type
        if (strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" &&
                strtolower($imageFileType) != "jpeg") {
            echo "error: file types allowed .jpg,.png,.jpeg";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "sorry your file wasn't uploaded";
        } else {
            //try uploading the file
            if (move_uploaded_file($_FILES["pht"]["tmp_name"], $target_file)) {
                echo "the File " . basename($_FILES["pht"]["name"]) . "has been uploaded.";
            } else {
                echo "there was an error uploading your file.";
            }
        }
        echo "<img src='upload/" . basename($_FILES["pht"]["name"]) . "' alt='some image' width='30' height='30' />";
    }
}
