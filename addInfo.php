<?php

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
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                            <a  href="form.php"><i class="fa fa-edit fa"></i> Results </a>
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-sitemap fa"></i> Information Medium<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addInfo.php">Add Information</a>
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
                     <h2>Forms Page</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Informations
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Add News</h3>
                                    <div class="well wel-sm">
                                        <form action="addNews.php" method="post">
                                            <div class="form-group">
                                                <label for="nameField">Title<em>*</em></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="News Title" />
                                            </div>
                                            <div class="form-group">
                                                <label for="const">News<em>*</em></label>
                                                <textarea class="form-control" name="news" id="news" placeholder="Main News Body" ></textarea>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>    
                                </div>
                                
                                <div class="col-md-6">
                                    <h3>Add Notifications</h3>
                                    <div class="well wel-sm">
                                        <form action="addNote.php" method="post">
                                            <div class="form-group">
                                                <label for="nameField">Title</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Notification Title" />
                                            </div>
                                            <div class="form-group">
                                                <label for="const">Notification</label>
                                                <textarea class="form-control" name="note" id="note" placeholder="Notifications"></textarea>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>   
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Party Objective</h3>
                                    <div class="well wel-sm">
                                        <form action="getObjective.php" method="post">
                                             <button class="btn btn-lg btn-primary">Get Objective</button>
                                        </form>
                                    </div>   
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    <h3>Results</h3>
                                    <div class="well wel-sm">
                                        <form action="getResults.php" method="post">
                                             <button name='submit' id='submit' class="btn btn-lg btn-primary">Get Results</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <h3>More Customization</h3>
                         <p>
                        For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank">click here</a> . We hope you will enjoy our template. This template is easy to use, light weight and made with love by binarycart.com 
                        </p>
                    </div>
                </div>
                <!-- /. ROW  -->
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


