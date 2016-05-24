<?php

/*$file = array(file_get_contents('results/testps1.json'));
$file1 = array(file_get_contents('results/testps2.json'));
$tostring = implode(',',$file);
$decoded = json_decode($tostring,true);

$tostring1 = implode(',',$file1);
$decoded1 = json_decode($tostring1,true);*/
include 'Connect.php';
$d = new Connect();
$con = $d->connect();
$hand = opendir('./results/');
if($hand){
    while(false !== ($entry = readdir($hand))){
        if($entry != "." && $entry != ".."){
            /*echo "<br />file name is: ". $entry."<br/>";
            echo "************<br/>";*/
            
            $file = array(file_get_contents('./results/'.$entry));
            $tostring = implode(',',$file);
            $decoded = json_decode($tostring,true);
           
             foreach($decoded as $pdetail){
                 $vtcount = $pdetail['vote_count'];
                 $pname = $pdetail['party_name'];
                 $concode = $pdetail['const_code'];
                 
                 $query = "select * from const_result where party_name = '".$pname."' and const_code = '".$concode."'";
                 $result = mysqli_query($con, $query) or die("Invalid query tester.php 32: ".mysql_error($con));
                 if(mysqli_affected_rows($con) == 0){
                     $query = "insert into const_result values(0,'".$pname."','".$concode."',".$vtcount.")";
                     mysqli_query($con, $query);
                 }else{
                     $query = "UPDATE const_result "
                        . "SET result = result + $vtcount"
                        . " WHERE party_name = '$pname' AND const_code = '$concode'";
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
/*
echo "</br>************************************************************<br>";
echo $decoded[1]['party_name'];
echo "&nbsp";
$output = "<ul>";
foreach($decoded as $pdetail){
    $output.= "<h4>".$pdetail['party_name']."</h4>";
    $output.="<li>".$pdetail['const_code']."</li>";
    $output.="<li>".$pdetail['ps_code']."</li>";
    $output.="<li>".$pdetail['vote_count']."</li>";
}
$output.= "</ul>";
echo $output;
echo "</br>************************************************************<br>";
echo "</br>************************************************************<br>";
echo $decoded1[1]['party_name'];
echo "&nbsp";
$output = "<ul>";
foreach($decoded1 as $pdetail){
    $output.= "<h4>".$pdetail['party_name']."</h4>";
    $output.="<li>".$pdetail['const_code']."</li>";
    $output.="<li>".$pdetail['ps_code']."</li>";
    $output.="<li>".$pdetail['vote_count']."</li>";
}
$output.= "</ul>";
echo $output;
echo "</br>(((((((((((())))))))))))))))))))</br>";
echo $tostring1;
echo "</br>((((((((((((((((()))))))))))))))))</br>";
echo "</br>************************************************************<br>";*/
//include "Connect.php";
   /* error_reporting(E_ALL);
    if(isset($_POST['submit'])){
        $name = filter_input(INPUT_POST,'name');
        echo "name is: ". $name;
        $txtarea = filter_input(INPUT_POST,'txtarea');
        echo "</br>txtarea: " . $txtarea;
        
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
        $uploadOk = 1;
        echo "<h1 style='color:red;'>".$target_file."</h1>";
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
        if($check !== false){
            echo "file is an image - ". $check["mime"] . ".";
            $uploadOk = 1;
        }else{
            echo "File is not an image";
            $uploadOk = 0;
        }
        
        //check if file already exists
        if(file_exists($target_file)){
            echo "file already exists";
            $uploadOk = 0;
        }
        //check file size
        if($_FILES['fileUpload']['size'] > 900000){
            echo "file is too big needs to be <= 900kb";
            $uploadOk = 0;
        }
        //limit file type
        if($imageFileType != "jpg" && $imageFileType != "png" &&
                $imageFileType != "jpeg"){
            echo "error: file types allowed .jpg,.png,.jpeg";
            $uploadOk = 0;
        }
        
        if($uploadOk == 0){
            echo "sorry your file wasn't uploaded";
        }else{
            //try uploading the file
            if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$target_file)){
                echo "the File ".basename($_FILES['fileUpload']['name']). "has been uploaded.";
            }else{
                echo "there was an error uploading your file.";
            }
        }
    }else{
        echo "error";
    }
    $val = "me you and her";
    //$d = array();
    $real = explode(' ',$val);
    foreach($real as $vals){
        echo "<h1>$vals</h1>";
    }
    //comment
    echo "********************************************************************************<br>";
    $localip = gethostbyname(gethostname());
    echo 'the ip address of current system is: '.$_SERVER['SERVER_ADDR'];
    echo 'the ip address of current system: '.$localip;
    
    
    
    $allData = array();
    $count = 0;
    $handle = opendir('./results/');
    if($handle){
        while(false !== ($entry = readdir($handle))){
            if($entry != "." && $entry !=".."){
                echo $entry."<br />";
                $sourcefile = array(file_get_contents('results/'.$entry));
                $imploded = implode(',',$sourcefile);
                $data = json_decode($imploded,true);
                /*if(!$data != null){
                    $allData = array_merge($allData,$data);
                    print_r($allData);
                }else{
                    echo "envalid json";
                }*/
          /*   $allData = array_merge($allData,$data);
             print_r ($data);
             
            }
            echo "(((((((((((((())))))))))))))))))";
            print_r ($allData);
            
        }
        closedir($handle);
        echo "<br /><br /></br> !!!!!!!<br/><br/><br/>";
        print_r($allData);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body>
        <form action="tester.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" />
            <textarea name="txtarea" cols="60" rows="10" id="txtarea"></textarea>
            <input type="file" name="fileUpload" id="fileUpload" />
            <input type="submit" name="submit" />
            <table id="dataTables-example">
                <thead>
                    <tr>
                        <th>Party Name</th>
                        <th>Party Code</th>
                        <th>Logo Name</th>
                        <th># of Candidates</th>
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $p = new Connect();
                    $connection = $p->connect();
                    $sql = "SELECT * FROM evoting_party";
                    $result = mysqli_query($connection, $sql) or die("envlalid query " . mysqli_error($connection));
                    $rowsReturned = mysqli_affected_rows($connection);
                    echo "<h1 style='color:red;'>" . $rowsReturned . " rows returned</h1>";
                    while ($party = mysqli_fetch_row($result)) {
                    echo "<tr class='odd gradeX'>";
                    echo "<td>" . $party[1] . "</td>";
                    echo "<td>" . $party[2] . "</td>";
                    echo "<td>" . $party[4] . "</td>";
                    echo "<td>" . $party[6] . "</td>";
                    //for delete
                    echo "<td class='center'><form action='delete_party.php' method='post'><button "
                    . "type='submit' name='submit' class='btn btn-info' "
                    . "value='" . $party[0] . "' data-toggle='modal' "
                    . "data-target='#deleteModal'>Delete</button></form></td>";

                    }
                    ?>
                </tbody>
            </table>
        </form>
        <h1>Another Form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="radio" name="gender" value="male" checked>Male</br>
            <input type="radio" name="gender" value="female">Female
            </br><button type="submit" name="submit">Submit</button>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $var = $_POST['gender'];
                echo "the selected item is: " . $var;
            }
        ?>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
        </script>
    </body>
</html>
    */