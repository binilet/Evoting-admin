<?php
session_start();
if (isset($_SESSION['login']) !== true) {
    header("Location: login.php");
}
?>
﻿<!DOCTYPE html>
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
                            <a  href="register.edit"><i class="fa fa-edit fa"></i>Registration</a>
                        </li>
                        <li>
                            <a  href="edit.php"><i class="fa fa-qrcode fa"></i>Edit Data</a>
                        </li>
                        <li  >
                            <a  href="delete.php"><i class="fa fa-bar-chart-o fa"></i> Delete Data</a>
                        </li>	
                        <li  >
                            <a  href="View.html"><i class="fa fa-table fa"></i> View Data</a>
                        </li>
                        <li  >
                            <a  href="statistics.html"><i class="fa fa-edit fa"></i> Stats </a>
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
                                    <a href="#">View and Send Information</a>
                                </li>
                            </ul>
                        </li>  
                        <li  >
                            <a class="active-menu"  href="register.html"><i class="fa fa-square-o fa"></i> Blank Page</a>
                        </li>	
                    </ul>

                </div>

            </nav>  
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>E-voting Admin Page for Registration</h2>   
                            <h5>Welcome <?php echo $_SESSION['uname'] ?>, Enjoy! . </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="well">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Party, Constituency, PollStation and Candidate Registration Tabs
                                    </div>
                                    <div class="panel-body">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#home" data-toggle="tab">Party</a>
                                            </li>
                                            <li class=""><a href="#constituencey" data-toggle="tab">Constituency</a>
                                            </li>
                                            <li class=""><a href="#pollStation" data-toggle="tab">Poll Station</a>
                                            </li>
                                            <li class=""><a href="#candidate" data-toggle="tab">Candidate</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="home">
                                                <form class="form" action="register_party.php" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="nameField">Party Name<em>*</em></label>
                                                        <input type="text" class="form-control" name="partyName" id="partyName" placeholder="Party Name" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Party Code<em>*</em></label>
                                                        <input type="text" class="form-control" name="partyCode" id="partyCode" placeholder="Party Code" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phoneField">Region<em>*</em></label>
                                                        <input type="text" class="form-control" name="region" id="region" placeholder="Base Region" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phoneField">Logo Name<em>*</em></label>
                                                        <input type="text" class="form-control" name="logoName" id="logoName" placeholder="Logo Name" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uploadLogo">Party Logo<em>*</em></label>
                                                        <label class="btn btn-info" for="my-file-selector">
                                                            <input id="my-file-selector" type="file" name="partyLogo" style="display:none;">
                                                                Upload image
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phoneField">Number of Candidates<em>*</em></label>
                                                        <input type="number" class="form-control" name="candidateNo" id="candidateNo" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="const">List of Constituencies the party runs<em>*</em></label>
                                                        <textarea class="form-control" name="constList" id="listConst" placeholder="use space to separate" ></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="or">OR</label>
                                                    </div>
                                                    <!--<div class="form-group">
                                                        <label class="btn btn-info" for="my-file-selector">
                                                            <input id="my-file-selector" type="file" name="listConstEx" style="display:none;">
                                                                Upload an Excel file
                                                        </label>
                                                    </div>-->
                                                    <div class="form-group">
                                                        <label for="ps">List of Poll Stations the party runs<em>*</em></label>
                                                        <textarea class="form-control" name="listOfPs" id="listPs" placeholder="use space to separate" ></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="or">OR</label>
                                                    </div>
                                                   <!-- <div class="form-group">
                                                        <label class="btn btn-info" for="my-file-selector">
                                                            <input id="my-file-selector" type="file" name="listPsEx" style="display:none;">
                                                                Upload an Excel file
                                                        </label>
                                                    </div>-->
                                                    <div class="form-group">
                                                        <label for="objective">Objective</label>
                                                        <textarea class="form-control" name="objective" id="objective" placeholder="Short Description of Party Objective"></textarea>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="constituencey">

                                                <form class="form" action="register_const.php" method="post">
                                                    <div class="form-group">
                                                        <label for="conCode">Constituencey Code<em>*</em></label>
                                                        <input type="text" class="form-control" name="conCode"  id="conCode" placeholder="Constituencey Code"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="conName">Constituencey Name<em>*</em></label>
                                                        <input type="text" class="form-control" name="conName"  id="conName" placeholder="Constituencey Name"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="region">Region<em>*</em></label>
                                                        <input type="text" class="form-control" name="region"  id="region" placeholder="region"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NOps">Number of PollStations<em>*</em></label>
                                                        <input type="number" class="form-control" name="Nops" id="Nops" placeholder="# of poll station"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="ps">List of Poll Stations(within this constituency)<em>*</em></label>
                                                        <textarea class="form-control" name="listOfPs" id="listPs" placeholder="use space to separate" ></textarea>
                                                    </div>

                                                   <!-- <div class="form-group">
                                                        <label for="listPS">List of Poll Stations<em>*</em></label>
                                                        <label class="btn btn-info" for="my-file-selector">
                                                            <input id="my-file-selector" type="file" style="display:none;">
                                                                Upload an Excel file
                                                        </label>
                                                    </div>-->
                                                    <div class="form-group">
                                                        <label for="description">Remark</label>
                                                        <textarea class="form-control" name="remarks" id="remark" placeholder="any remarks ..."></textarea>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button><button type="reset" class="btn btn-default">Reset</button>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="pollStation">
                                                <form class="form" action="register_ps.php" method="post">
                                                    <div class="form-group">
                                                        <label for="psCode">PollStation Code<em>*</em></label>
                                                        <input type="text" class="form-control" name="psCode"  id="psCode" placeholder="poll station code"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="psName">PollStation Name<em>*</em></label>
                                                        <input type="text" class="form-control"name="psName"  id="psName" placeholder="poll station name"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="constCode">Constituencey Code</label>
                                                        <input type="text" class="form-control" name="conCode"  id="conCode" placeholder="constituencey code where the poll station resides"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="region">Region<em>*</em></label>
                                                        <input type="text" class="form-control" name="region"  id="region" placeholder="region"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subCity">Sub City/Zone</label>
                                                        <input type="text" class="form-control" name="subcity_zone" id="subcity_zone" placeholder="sub city or zone"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="woreda">Woreda</label>
                                                        <input type="number" min="1" max="99" class="form-control" name="woreda"  id="woreda" placeholder="Woreda"></input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Kebele">Kebele<em>*</em></label>
                                                        <input type="number" min="1" max="99" class="form-control" name="kebele" id="kebele" placeholder="kebele"></input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="remark">Remark</label>
                                                        <textarea class="form-control" name="remarks"  id="remarks" placeholder="any remarks ..."></textarea>
                                                    </div>
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button><button type="reset" class="btn btn-default">Reset</button>
                                                </form>

                                            </div>
                                            <div class="tab-pane fade" id="candidate">
                                                <form class="form" action="register_candidate.php" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="candidateFname">Candidate First Name<em>*</em></label>
                                                        <input type="text" class="form-control" name="canFName" id="canFName" placeholder="Candidate First Name"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="candidateLname">Candidate Last Name<em>*</em></label>
                                                        <input type="text" class="form-control" name="canLName" id="canLName" placeholder="Your Email here"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Gender<em>*</em></label>
                                                        </br><input type="radio" name="gender" id="genMale" value="male" checked>Male</br>
                                                         <input type="radio" name="gender" id="genFemale" value="female">Female
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dob">Date of Birth<em>*</em></label>
                                                        <input type="date" name="dob" id="dob" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="birthPlace">Birth Place<em>*</em></label>
                                                        <input type="text" class="form-control" name="birthPlace" id="birthPlace" placeholder="candidate birth place"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="eduLevel">Education Level<em>*</em></label>
                                                        <input type="text" class="form-control" name="eduLevel" id="eduLevel" placeholder="Education Level"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="uploadLogo">Party Logo<em>*</em></label>
                                                        <label class="btn btn-info" for="my-file-selector">
                                                            <input id="my-file-selector" type="file" name="pht" id="pht" style="display:none;">
                                                                Upload image
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="candidateType">Candidate Type</label>
                                                        </br><input type="radio" name="candidateType" id="canParty" value="Party Based" checked>Party Based</br>
                                                            <input type="radio" name="candidateType" id="canPrivate" value="Private">Private
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="partyCode">Party Code/ Candidate Code<em>*</em></label>
                                                        <input type="text" class="form-control" name="canCode" id="canCode" placeholder="party/candidate code"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="remark">Promises</label>
                                                        <textarea class="form-control"  name="promise" id="promise" placeholder="any promises ..."></textarea>
                                                    </div>
                                                    <button type="submit" name="submit_candidate" id="submit_candidate" class="btn btn-primary">Submit</button><button type="reset" class="btn btn-default">Reset</button>
                                                    </form>
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
                                                                            <!-- CUSTOM SCRIPTS -->
                                                                            <script src="assets/js/custom.js"></script>


                                                                            </body>
                                                                            </html>
