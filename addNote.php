<?php
include 'Connect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addNews
 *
 * @author BiNI
 */
class addNote {
    //put your code here
    protected $connection;
    protected $title;
    protected $note;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
        
        if(isset($_POST['submit'])){
            $this->title = filter_input(INPUT_POST,'title');
            $this->note = filter_input(INPUT_POST,'note');
            
        }
    }
    
    public function addNote(){
        
        $query = "Insert into notification values(0,'".$this->title."','".$this->note."')";
        mysqli_query($this->connection, $query) or die ("Invalid Query: addNews.php: " .mysqli_error($this->connection));
        header("Location: http://10.5.55.71/evoting-admin/addinfo.php");
    }
}
 $add = new addNote();
 $add->addNote();
