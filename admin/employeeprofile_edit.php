<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php"); 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['eid']))
{
	header("location:dashboard.php");
}
$reslt = mysqli_query($conn,"SELECT * from employee where employeeid ='".$_GET['eid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$eid = $_POST['eid'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$department = $_POST['department'];
		
		$reslt = mysqli_query($conn,"update `employee` set  `mobile`='".$mobile ."', `email`='".$email ."', `address`='".$address ."', `department`='".$department ."' where employeeid ='".$_GET['eid']."'  ");

	}
?>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                             <form action="employeeprofile_view.php" method="get">
		<div class="card-body">
	<div class="serchone">
	<input type="text" placeholder="Location" name="location">
	<input type="text" placeholder="Employee Id" name="eid">
	<input class="btn btn-primary" type="submit" value="search"><h3 style="float:right;" > <a class="arro" href="dashboard.php"><i style="color:#A9A9A9" class="mdi mdi-arrow-left-bold-circle-outline"></i></a></h3>
	</div>
	</div>
</form>		
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			
			     
       <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
            <div class="row">
                    <div class="col-md-8">
                        <div class="card">		
	


<form action="" method="post">
  <div class="card-body">
  
    <input type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input type="hidden" value="<?php echo $res['employeeid']  ;?>" name="eid">
	  
	 <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Mobile</b></label><br>
     <div class="col-sm-9">
	 <input  class="form-control" type="text" value="<?php echo $res['mobile'];?>" name="mobile" required>
</div>
  </div>
  
    <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Email</b></label><br>
     <div class="col-sm-9">
	 <input class="form-control" type="text" value="<?php echo $res['email'];?>" name="email" required>
	</div>
  </div>
  
    <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Work Location</b></label><br>
     <div class="col-sm-9">
	 <input class="form-control" type="text" value="<?php echo $res['location'];?>" name="location" required>
	 </div>
  </div>
	
	 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label"  for="psw-repeat"><b>Address</b></label>
  <div class="col-sm-9">
  <input  class="form-control" type="text" value="<?php echo $res['address'];?>" name="address" required>
  </div>
  </div>
									 <div class="form-group row">
										<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Department</b></label>
	<div class="col-sm-9">
	<select class="select2 form-control custom-select" name="department">
										<option value="stage 1" <?php if($res['department']=="stage 1") echo 'selected="selected"'; ?>>
										stage 1
										</option>
										<option value="stage 2" <?php if($res['department']=="stage 2") echo 'selected="selected"' ;  ?>>
										stage 2
										</option>
										<option value="stage 3" <?php if($res['department']=="stage 3") echo 'selected="selected"' ;  ?>>
										stage 3
										</option>
										<option value="stage 4" <?php if($res['department']=="stage 4") echo 'selected="selected"' ;  ?>>
										stage 4
										</option>
										
										</select>
										</div>
										</div>
										
										
    <input type="submit" class="btn btn-success" name="submit" value="Update" >
  </div>
</form>

</div>
</div>
</div>
</div>
</div>

