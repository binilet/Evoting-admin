<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Connect.php';
$d = new Connect();
$con = $d->connect();
$hand = opendir('./results/');
if($hand){
    while(false !== ($entry = readdir($hand))){
        if($entry != "." && $entry != ".."){
           // echo "<br />file name is: ". $entry."<br/>";
            //echo "************<br/>";
            
            $file = array(file_get_contents('./results/'.$entry));
            $tostring = implode(',',$file);
            $decoded = json_decode($tostring,true);
            foreach($decoded as $pdetail){
                 
                 $vtcount = $pdetail['vote_count'];
                 $pname = $pdetail['party_name'];
                // $concode = $pdetail['const_code'];
                 
                 $query = "select * from total_result where party_name = '$pname'";
                 $result = mysqli_query($con, $query) or die("Invalid query tester.php 32: ".mysqli_error($con));
                 if(mysqli_affected_rows($con) == 0){
                     $query = "insert into total_result values(0,'".$pname."',".$vtcount.")";
                     mysqli_query($con, $query) or die("Invalid query: ". mysqli_error($con));
                 }else{
                     $query = "UPDATE total_result "
                        . "SET result = result + $vtcount"
                        . " WHERE party_name = '$pname'";
                         }
                         mysqli_query($con, $query) or die ("Invalid query: update_query ".mysqli_error($con));
                         if(mysqli_affected_rows($con) >=1 ){
                             echo "result updated";
                         }else{
                             echo "Result not updated";
                         }
                             
             }
            }
            
    }
}
