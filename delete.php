<?php

include 'Connect.php';

ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start();

if(isset($_SESSION['login']) !== true){
    header("Location: login.php");
}    
?>


 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Free Bootstrap Admin Template : Binary Admin</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">E-Voting</a> 
                </div>
                <div style="color: white;
                     padding: 15px 50px 5px 50px;
                     float: right;
                     font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
            </nav>   
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                        </li>


                        <li>
                            <a  href="index.php"><i class="fa fa-dashboard fa"></i> Dashboard</a>
                        </li>
                        <li>
                            <a  href="register.php"><i class="fa fa-edit fa"></i>Registration</a>
                        </li>
                        <li>
                            <a  href="edit.php"><i class="fa fa-qrcode fa"></i> Edit Data</a>
                        </li>
                        <li  >
                            <a  href="#"><i class="fa fa-bar-chart-o fa"></i> Delete Data</a>
                        </li>	
                        <li  >
                            <a  href="#"><i class="fa fa-table fa"></i> View Data</a>
                        </li>
                        <li  >
                            <a  href="#"><i class="fa fa-edit fa"></i> Stats </a>
                        </li>				


                        <li>
                            <a href="#"><i class="fa fa-sitemap fa"></i> Information Medium<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Add Information</a>
                                </li>
                                <li>
                                    <a href="#">Edit Information</a>
                                </li>
                                <li>
                                    <a href="#">View and Send Information<span class="fa arrow"></span></a>


                                </li>
                            </ul>
                        </li>  
                        <li  >
                            <a class="active-menu"  href="#"><i class="fa fa-square-o fa"></i> Blank Page</a>
                        </li>	
                    </ul>

                </div>

            </nav>  
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>E-voting Admin Delete Page</h2>   
                            <h5>Welcome Admin, Enjoy! . </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Party, Constituency, PollStation and Candidate Delete Tabs
                                    </div>
                                    <div class="panel-body">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#home" data-toggle="tab">Party</a>
                                            </li>
                                            <li class=""><a href="#profile" data-toggle="tab">Constituency</a>
                                            </li>
                                            <li class=""><a href="#messages" data-toggle="tab">Poll Station</a>
                                            </li>
                                            <li class=""><a href="#settings" data-toggle="tab">Candidate</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="home">
                                                <h1>Party</h1>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <!-- Advanced Tables -->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Advanced Tables
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="table-responsive">

                                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--End Advanced Tables -->
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="profile">
                                                <h1>Constituency</h1>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <!-- Advanced Tables -->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Advanced Tables
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="table-responsive">

                                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Const Code</th>
                                                                                <th>Const Name</th>
                                                                                <th>Region</th>
                                                                                <th># of pollstations</th>
                                                                                <th>Remarks</th>
                                                                                <th>action</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                            $p = new Connect();
                                                                            $connection = $p->connect();
                                                                            $sql = "SELECT * FROM evoting_const";
                                                                            $result = mysqli_query($connection, $sql) or die("envlalid query 297 " . mysqli_error($connection));
                                                                            $rowsReturned = mysqli_affected_rows($connection);
                                                                            echo "<h1 style='color:red;'>" . $rowsReturned . " rows returned</h1>";
                                                                            while ($const = mysqli_fetch_row($result)) {
                                                                                echo "<tr class='odd gradeX'>";
                                                                                echo "<td>" . $const[1] . "</td>";
                                                                                echo "<td>" . $const[2] . "</td>";
                                                                                echo "<td>" . $const[3] . "</td>";
                                                                                echo "<td>" . $const[4] . "</td>";
                                                                                echo "<td>" . $const[6] . "</td>";
                                                                                //for delete
                                                                                
                                                                                echo "<td class='center'><form action='delete_const.php' method='post'><button "
                                                                                . "type='submit' name='submit_const' class='btn btn-info' "
                                                                                . "value='" . $const[0] . "' data-toggle='modal' "
                                                                                        . "data-target='#deleteModal'>Delete</button></form></td>";
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--End Advanced Tables -->
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="messages">
                                                <h1>PollStation</h1>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <!-- Advanced Tables -->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Advanced Tables
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="table-responsive">

                                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>PollStation Code</th>
                                                                                <th>PollStation Name</th>
                                                                                <th>Const Code</th>
                                                                                <th>Region</th>
                                                                                <th>Woreda</th>
                                                                                <th>kebele</th>
                                                                                <th>Action</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                            $p = new Connect();
                                                                            $connection = $p->connect();
                                                                            $sql = "SELECT * FROM evoting_ps";
                                                                            $result = mysqli_query($connection, $sql) or die("envlalid query " . mysqli_error($connection));
                                                                            $rowsReturned = mysqli_affected_rows($connection);
                                                                            echo "<h1 style='color:red;'>" . $rowsReturned . " rows returned</h1>";
                                                                            while ($ps = mysqli_fetch_row($result)) {
                                                                                echo "<tr class='odd gradeX'>";
                                                                                echo "<td>" . $ps[1] . "</td>";
                                                                                echo "<td>" . $ps[2] . "</td>";
                                                                                echo "<td>" . $ps[3] . "</td>";
                                                                                echo "<td>" . $ps[4] . "</td>";
                                                                                echo "<td>" . $ps[6] . "</td>";
                                                                                echo "<td>" . $ps[7] . "</td>";
                                                                                //for delete
                                                                                //echo "<td class='center'><form action='edit_values.php' method='post'><button type='submit' name='submit' class='btn btn-info' value='" . $party[0] . "' data-toggle='modal' data-target='#editModal'>Edit</button></form></td>";
                                                                                 echo "<td class='center'><form action='delete_ps.php' method='post'><button "
                                                                                . "type='submit' name='submit_ps' class='btn btn-info' "
                                                                                . "value='" . $ps[0] . "'"
                                                                                        . ">Delete</button></form></td>";  
                                                                                    
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--End Advanced Tables -->
                                                        <!--</div>-->
                                                    </div>
                                            </div>

                                            </div>
                                            <div class="tab-pane fade" id="settings">
                                                <h1>Candidate</h1>
                                                 <div class="row">

                                                    <div class="col-md-12">
                                                        <!-- Advanced Tables -->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Advanced Tables
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="table-responsive">

                                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>DOB</th>
                                                                                <th>Birth place</th>
                                                                                <th>Education Level</th>
                                                                                <th>Promises</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                            $p = new Connect();
                                                                            $connection = $p->connect();
                                                                            $sql = "SELECT * FROM evoting_can";
                                                                            $result = mysqli_query($connection, $sql) or die("envlalid query 297 " . mysqli_error($connection));
                                                                            $rowsReturned = mysqli_affected_rows($connection);
                                                                            echo "<h1 style='color:red;'>" . $rowsReturned . " rows returned</h1>";
                                                                            while ($can = mysqli_fetch_row($result)) {
                                                                                echo "<tr class='odd gradeX'>";
                                                                                echo "<td>" . $can[1] . "</td>";
                                                                                echo "<td>" . $can[2] . "</td>";
                                                                                echo "<td>" . $can[4] . "</td>";
                                                                                echo "<td>" . $can[5] . "</td>";
                                                                                echo "<td>" . $can[6] . "</td>";
                                                                                //for delete
                                                                                //echo "<td class='center'><form action='edit_values.php' method='post'><button type='submit' name='submit' class='btn btn-info' value='" . $party[0] . "' data-toggle='modal' data-target='#editModal'>Edit</button></form></td>";
                                                                                echo "<td class='center'><form action='delete_can.php' method='post'><button "
                                                                                . "type='submit' name='submit_can' class='btn btn-info' "
                                                                                . "value='" . $can[0] . "'"
                                                                                        . ">Delete</button></form></td>";  
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--End Advanced Tables -->
                                                        <!--</div>-->
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> 

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- DATA TABLE SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                $('#dataTables-example2').dataTable();
                $('#dataTables-example3').dataTable();
                $('#dataTables-example4').dataTable();
            });
        </script>

        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>


    </body>
</html>


