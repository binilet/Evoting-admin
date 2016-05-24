<?php
    include 'Connect.php';
    include 'ConstResult.php';
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
                        <a class="active-menu"  href="#"><i class="fa fa-dashboard fa"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="register.php"><i class="fa fa-desktop fa"></i> Registration</a>
                    </li>
                    <li>
                        <a  href="edit.php"><i class="fa fa-qrcode fa"></i> Edit Data</a>
                    </li>
						   <li  >
                        <a   href="delete.php"><i class="fa fa-bar-chart-o fa"></i> Delete Data</a>
                    </li>	
                      <li  >
                        <a  href="view.html"><i class="fa fa-table fa"></i> View Data</a>
                    </li>
                    <li  >
                        <a  href="form.php"><i class="fa fa-edit fa"></i> Results </a>
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
                  <li>
                        <a  href="register.html"><i class="fa fa-square-o fa"></i> Blank Page</a>
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
                            Results
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Constituency Results</h3>
                                    <form action="aggregate.php" method="post">
                                        <button type="submit" name="aggregate" class="btn btn-primary">Aggregate</button>
                                    </form>
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <?php
                                        $c = new Connect();
                                        $connection = $c->connect();
                                        $query = "select const_code from evoting_const";
                                        $result = mysqli_query($connection, $query) or die("Invalid Query: ".  mysqli_error($connection));
                                        
                                        while($row = mysqli_fetch_row($result)){
                                            echo "<div class='container col-md-12'>"
                                            . "<div class='panel'>"
                                            . "<div class='panel panel-success'>"
                                            . "<div class='panel-heading'>"
                                            . "<h4 class='panel-title'>";
                                            echo "<a data-toggle='collapse' href='#conResults$row[0]'>".$row[0].""
                                            . "</a>"
                                            . "</h4>"
                                            . "</div>";
                                            echo "<div id='conResults$row[0]' class='panel-collapse collapse'>";
                                            $constResult = new ConstResult($row[0]);
                                            $res = $constResult->conResult();
                                            echo "<div class='panel-body'>".$res."</div>";
                                            echo "<div class='panel-footer'>"
                                            . "<button type='submit' class='btn btn-success'>Print</button></div>";
                                            echo "</div></div></div></div>";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    <h3>Total Results</h3>
                                    <form action="aggregateParty.php" method="post">
                                        <button type="submit" name="Tally" class="btn btn-primary">Tally Total Result</button>
                                    </form>
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                     <tr>
                                                        <th>Party Name</th>
                                                        <th>Party Result</th>
                                                    </tr>
                                                </thead>
                                        <tbody>
                                        </div>
                                    
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
    
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    
     <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            }
    </script>
   
</body>
</html>
