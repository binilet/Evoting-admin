<?php

include 'Connect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aggregate
 *
 * @author BiNI
 */
class aggregate {

    //put your code here
    protected $connection;

    public function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
    }

    public function agg() {
        if (isset($_POST['aggregate'])) {
            $this->truncate();
            $hand = opendir('./results/');
            if ($hand) {
                while (false !== ($entry = readdir($hand))) {
                    if ($entry != "." && $entry != "..") {
                        $file = array(file_get_contents('./results/' . $entry));
                        $tostring = implode(',', $file);
                        $decoded = json_decode($tostring, true);

                        foreach ($decoded as $pdetail) {
                            $vtcount = $pdetail['vote_count'];
                            $pname = $pdetail['party_name'];
                            $concode = $pdetail['const_code'];

                            $query = "select * from const_result where party_name = '" . $pname . "' and const_code = '" . $concode . "'";
                            $result = mysqli_query($this->connection, $query) or die("Invalid query tester.php 32: " . mysql_error($this->connection));
                            if (mysqli_affected_rows($this->connection) == 0) {
                                $query = "insert into const_result values(0,'" . $pname . "','" . $concode . "'," . $vtcount . ")";
                                mysqli_query($this->connection, $query);
                            } else {
                                $query = "UPDATE const_result "
                                        . "SET result = result + $vtcount"
                                        . " WHERE party_name = '$pname' AND const_code = '$concode'";
                            }
                            mysqli_query($this->connection, $query) or die("Invalid query: update_query " . mysqli_error($this->connection));
                            if (mysqli_affected_rows($this->connection) >= 1) {
                                echo "result updated";
                            } else {
                                echo "Result not updated";
                            }
                        }
                    }
                }
            }
        } else {
            echo "Error not set";
        }
    }
    
    public function truncate(){
        $query = "truncate table const_result";
        mysqli_query($this->connection,$query);
    }

}

$ag = new aggregate();
$ag->agg();
