<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConstResult
 *
 * @author BiNI
 */
class ConstResult {
    //put your code here
    protected $connection;
    protected $constituency;
    
    public function __construct($constituency){
        $this->constituency = $constituency;
        $con = new Connect();
        $this->connection = $con->connect();
    }
    
   /* public function conResult(){
        $query = "Select distinct party_name,result from const_result where const_code = '$this->constituency'";
        $res = mysqli_query($this->connection, $query);
        echo "<table><thead>"
        . "<tr>"
                . "<th>Party Name</th>"
                . "<th>Result</th>"
        . "</tr></thead><tbody>";
        while($rw = mysqli_fetch_row($res)){
            echo "<tr><td>".$rw[0]."</td>";
            echo "<td>">$rw[1]."</td></tr>";
        }
        echo "</tbody></table>";
    }*/
    public function conResult(){
        echo "<div class=table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
        echo "<thead>
                <tr>
                   <th>Party Name</th>
                   <th>Const Code</th>
               </tr>
           </thead>";
        echo "<tbody>";
        $query = "Select distinct party_name,result from const_result where const_code = '$this->constituency'";
        $res = mysqli_query($this->connection, $query);
        while($rw = mysqli_fetch_row($res)){
            echo "<tr class='odd gradeX'>";
            echo "<td>".$rw[0]."</td>";
            echo "<td>".$rw[1]."</td>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
}
