<?php
include 'Connect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aggregateParty
 *
 * @author BiNI
 */
class aggregateParty {

    //put your code here
    protected $connection;

    public function __construct() {
        $con = new Connect();
        $this->connection = $con->connect();
    }

    public function aggTotal() {
        if (isset($_POST['tally'])) {
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

                            $query = "select * from total_result where party_name = '$pname'";
                            $result = mysqli_query($this->connection, $query) or die("Invalid query tester.php 32: " . mysqli_error($this->connection));
                            if (mysqli_affected_rows($this->connection) == 0) {
                                $query = "insert into total_result values(0,'" . $pname . "'," . $vtcount . ")";
                                mysqli_query($this->connection, $query) or die("Invalid query: " . mysqli_error($this->connection));
                            } else {
                                $query = "UPDATE total_result "
                                        . "SET result = result + $vtcount"
                                        . " WHERE party_name = '$pname'";
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
            header("Location: http://localhost/evoting-admin/form.php");
        }
    }

    public function truncate() {
        $query = "truncate table total_result";
        mysqli_query($this->connection, $query);
    }

}
$ap = new aggregateParty();
$ap->aggTotal();