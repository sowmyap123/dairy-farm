<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php");  
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['cid']))
{
	header("location:dashboard.php");
}
$reslt = mysqli_query($conn,"SELECT * from salescattle where cid ='".$_GET['cid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$cid = $_POST['cid'];
		$description = $_POST['description'];
		$rate = $_POST['rate'];
		$incharge = $_POST['incharge'];
		$reslt = mysqli_query($conn,"update `salescattle` set  `rate`='".$rate ."', `description`='".$description ."', `incharge`='".$incharge ."' where cid ='".$_GET['cid']."'  ");
	header("location:cattlesales_view.php?location=$location&cattleid=$cid");
	}
?>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Cattle Update</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
 <form action="cattlesales_edit.php" method="get">
<div class="card-body">
	Location<input  type="text" name="location">

	
	Cattle Id<input  type="text" name="cattleid">

	<input  type="submit" value="search">
	
	<a href="dashboard.php">back</a>
	</div>
</form>
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
						 
	<input class="form-control" type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input class="form-control" type="hidden" value="<?php echo $res['cid']  ;?>" name="cid">
	  
	  <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>stages</b></label>
	<div class="col-sm-9">
	<select class="select2 form-control custom-select" name="stage" >
										<option value="stage 1" <?php if($res['stage']=="stage 1") echo 'selected="selected"'; ?>>
										stage 1
										</option>
										<option value="stage 2" <?php if($res['stage']=="stage 2") echo 'selected="selected"'; ?>>
										stage 2
										</option>
										<option value="stage 3" <?php if($res['stage']=="stage 3") echo 'selected="selected"'; ?>>
										stage 3
										</option>
										<option value="stage 4" <?php if($res['stage']=="stage 4") echo 'selected="selected"'; ?>>
										stage 4
										</option>
										</select>
										</div>
									</div>
	<div class="form-group row">										
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>rate</b></label>
  <div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['rate'];?>" name="rate" required>
	</div>
	</div>
	
   <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label>
   <div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['description'];?>" name="description" required>
	</div>
	</div>

   <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge</b></label>
    <div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['incharge'];?>" name="incharge" required>
	</div>
	</div>

										
										 <div class="border-top">
        <div class="card-body">
            <input  name="submit" type="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
										
    
  </div>
   </div>
</form>
  </div>
    </div>
	  </div>
	  </div>
