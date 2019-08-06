<?php
session_start();
	if (!isset($_SESSION['sid'])) 
	{
		header('location: login.php');
	}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	include("index.php");
  ?>
  <div class="page-wrapper">
<div class="page-breadcrumb">
                <div class="row">
                    
</div>
</div>
 <div class="container-fluid">
<div class="row">
                    <div class="col-md-8">
                       
<h4 class="page-title">Store keeper Dash Board</h4>

 <div class="card-body">
  <div class="form-group row">
   
	</div>
	</div>
	
	</div>
	

	</div>
		
	</div>
	</div>
