<?php
session_start();
	if (!isset($_SESSION['aid'])) 
	{
		header('location: login.php');
	}
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM admin WHERE id='".$_SESSION['aid']."'";
			$results = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($results);
  ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <title>Admin Dashboard</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="admin/style.css" rel="stylesheet">
</head>

<body>
   
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon 
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />-->
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                         <h2>LOGO</h2>   <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    
					  <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             </a>
                           
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
					
					
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                   <div class="admin" style="color:#fff;padding-top: 20px" >
                             <!-- dark Logo text -->
                         <h4>welcome to Admin..</h4>   <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        </div>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/agent2.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i><?php echo $row['username'];?> </a>
                               
                               
                      <div class="dropdown-divider"></div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
		
		
		  <div class="container-fluid">
		    <div class="row">

         <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cattleprofile.php" aria-expanded="false"><i class="mdi mdi-github-face"></i><span class="hide-menu">Cattle Profile</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cattleweight.php" aria-expanded="false"><i class="mdi mdi-octagon"></i><span class="hide-menu">Cattle Weight</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cattlefood.php" aria-expanded="false"><i class="mdi mdi-nutrition"></i><span class="hide-menu">Cattle Food</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cattlemedicine.php" aria-expanded="false"><i class="mdi mdi-needle"></i><span class="hide-menu">Cattle Medicine</span></a></li>
						 <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cattlestage.php" aria-expanded="false"><i class="mdi mdi-nest-protect"></i><span class="hide-menu">Cattle Stage</span></a></li>
						  <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="milkproduction.php" aria-expanded="false"><i class="mdi mdi-flask-empty"></i><span class="hide-menu">Milk Production</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Employee</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="employeeprofile.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Employee Profile</span></a></li>
                                <li class="sidebar-item"><a href="employeeattendence.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Employee Attendance Sheet</span></a></li>
                            </ul>
                        </li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="store_register.php" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">storekepper Register</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="expenses.php" aria-expanded="false"><i class="mdi mdi-checkerboard"></i><span class="hide-menu">Expenses</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Stock.php" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">Stock</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sales.php" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Sales</span></a></li>
					    
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-server"></i><span class="hide-menu">Maintance</span></a>
						<ul aria-expanded="false" class="collapse  first-level">
						<li class="sidebar-item"><a href="suppliers.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Suppliers</span></a></li>
                         <li class="sidebar-item"><a href="production.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Production</span></a></li>
                            </ul>
							</li>
						
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reports.php" aria-expanded="false"><i class="mdi mdi-equal-box"></i><span class="hide-menu">Reports</span></a></li>
						</ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
		   </div>
   </div>
   
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
      <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
	 <script src="assets/libs/jquery/dist/jquery.min.js"></script>
<style>
.error
{
	color:red;
	font-size:12px;
}
</style>
</body>

</html>