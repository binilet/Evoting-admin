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
class uploadImage {
    //put your code here
    public function uploadLogo() {
        $target_dir = "upload/";
        $fileType = $_FILES["partyLogo"]["type"];
        $getFileExt = explode(".", $fileType);
        $fileExt = $getFileExt[1];
        $target_file = $target_dir . basename($_FILES["partyLogo"]["name"]);
        $uploadOk = 1;
        echo "<h1 style='color:red;'>" . $target_file . "</h1>";
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["partyLogo"]["tmp_name"]);
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
        if ($_FILES["partyLogo"]["size"] > 900000) {
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
            if (move_uploaded_file($_FILES["partyLogo"]["tmp_name"], $target_file)) {
                echo "the File " . basename($_FILES["partyLogo"]["name"]) . "has been uploaded.";
                
                
            } else {
                echo "there was an error uploading your file.";
            }
            include_once("ResizeImage.php");
            $target = "upload/$target_file";
            $resized_file = "upload/resized_$target_file";
            $wmax = 700;
            $hmax = 600;
            $resize = new ResizeImage();
            $resize->ak_img_resize($target,$resized_file,$wmax,$hmax,$fileExt);
        }
        echo "<img src='upload/" . basename($_FILES["partyLogo"]["name"]) . "' alt='some image' width='30' height='30' />";
    }
}
