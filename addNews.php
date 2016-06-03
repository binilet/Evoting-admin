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
class addNews {
    //put your code here
    protected $connection;
    protected $title;
    protected $news;
    
    public function __construct(){
        $con = new Connect();
        $this->connection = $con->connect();
        
        if(isset($_POST['submit'])){
            $this->title = filter_input(INPUT_POST,'title');
            $this->news = filter_input(INPUT_POST,'news');
            
        }
    }
    
    public function addNews(){
        $query = "Insert into news values(0,'".$this->title."','".$this->news."')";
        echo "title: ".$this->title;
        echo "</br>news: ".$this->news;
        mysqli_query($this->connection, $query) or die ("Invalid Query: addNews.php: " .mysqli_error($this->connection));
        header("Location: http://10.5.55.71/evoting-admin/addinfo.php");
    }
}
 $add = new addNews();
 $add->addNews();
