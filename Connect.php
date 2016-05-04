<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connect
 *
 * @author BiNI
 */
class Connect {
    //put your code here
    protected $connection;   
    public function connect(){
        if(!isset(self::$connection)){
            
            //load config.ini file for reading db credentials
            $filename = 'config.ini';
            $config = parse_ini_file($filename);
            $this->connection =new mysqli($config['dbAddress'], $config['username'], $config['password'], $config['dbname']);
            if(mysqli_ping($this->connection)){
                //echo "<h1>Connected to DB</h1>";
            }else{
                throw new Exception("unable to Connecte to DB");
            }
           
        }
        
        return $this->connection;
    }
   

}
 