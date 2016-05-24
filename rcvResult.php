<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$uploaddir = realpath("results");
$uploaddir = realpath('./results').'/';
$uploadfile = $uploaddir.basename($_FILES['jsonResult']['name']);
if(move_uploaded_file($_FILES['jsonResult']['tmp_name'], $uploadfile)){
    echo "file_uploaded";
}else{
    echo "error uploading";
}
echo 'here is some debuggin info';
print_r($_FILES);
echo "<hr/>";
print_r($_POST);