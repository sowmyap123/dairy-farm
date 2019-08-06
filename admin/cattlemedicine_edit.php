<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['cid']))
{
	header("location:dashboard.php");
}
 
$reslt = mysqli_query($conn,"SELECT * from cattlemedicine where cid ='".$_GET['cid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$cid = $_POST['cid'];
		$disease = $_POST['disease'];
		$healthevent = $_POST['healthevent'];
		$treatment = $_POST['treatment'];
		$startdate = $_POST['start'];
		$enddate = $_POST['end'];
		$days = $_POST['days'];
		$medicine = $_POST['medicine'];
		$quantity = $_POST['quantity'];
		$repetition = $_POST['repetition'];
		$health_condition = $_POST['health_condition'];
		$comments = $_POST['comments'];
		$incharge = $_POST['incharge'];
		$reslt = mysqli_query($conn,"update `cattlemedicine` set  `disease`='".$disease ."', `healthevent`='".$healthevent ."', `treatment`='".$treatment ."', `startdate`='".$startdate ."', `enddate`='".$enddate ."',days='".$days."',medicine_type='".$medicine."',quantity='".$quantity."',repetition='".$repetition."',health_condition='".$health_condition."',comments='".$comments."',incharge='".$incharge."' where cid ='".$_GET['cid']."'  ");
		header("location:cattlemedicine_view.php?location=$location&cattleid=$cid&status=update");
	}
	include("index.php");
?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Cattle medicine info</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
 
    <input class="form-control" type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input class="form-control" type="hidden" value="<?php echo $res['cid']  ;?>" name="cid">
	  
	
     <div class="form-group row">
  <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Name Of Disease</b></label>
     <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Disease Name" value="<?php echo $res['disease'];?>" name="disease" >
</div>
</div>

<div class="form-group row">
<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Health Event Types</b></label>
	<div class="col-sm-9">
	<select name="healthevent" class="select2 form-control custom-select" value="" >
										<option <?php if($res['healthevent']=="Medicine") echo 'selected="selected"'; ?>>
										Medicine
										</option>
										<option <?php if($res['healthevent']=="Vaccine") echo 'selected="selected"'; ?>>
										Vaccine
										</option>
										<option <?php if($res['healthevent']=="Accident") echo 'selected="selected"'; ?>>
										Accident
										</option>
										<option <?php if($res['healthevent']=="Others") echo 'selected="selected"'; ?>>
										Others
										</option> 
										</select></div>
</div>

   <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Treatment</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Treatment" value="<?php echo $res['treatment'];?>" name="treatment" >
</div>
</div>
   <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Start Date</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Start Date" value="<?php echo $res['startdate'];?>" name="start" >
</div>
</div>
	<div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>End Date</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter end Date" value="<?php echo $res['enddate'];?>" name="end" >
	</div>
</div>
	<div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Days</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Days" name="days" value="<?php echo $res['days'];?>">
</div>
</div>
	<div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Type Of Medicine</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Medicine" name="medicine" value="<?php echo $res['medicine_type'];?>">
</div>
</div>
	<div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Quantity" name="quantity" value="<?php echo $res['quantity'];?>">
</div>
</div>
	<div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Repetition</b></label><br>
	<div class="col-sm-9"><select  class="select2 form-control custom-select" name="repetition" value="" >
										<option <?php if($res['repetition']=="Daily") echo 'selected="selected"'; ?>>
										Daily
										</option>
										<option <?php if($res['repetition']=="Weakly") echo 'selected="selected"'; ?>>
										Weakly
										</option>
										<option <?php if($res['repetition']=="Monthly") echo 'selected="selected"'; ?>>
										Monthly
										</option>
										
										</select>
										</div>
</div>
								
	<div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Health Condition</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Health condition" name="health_condition" value="<?php echo $res['health_condition'];?>">
	</div>
</div> 					
   <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>comments</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter comments" name="comments" value="<?php echo $res['comments'];?>">
</div>
</div>
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge person</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Incharge person" name="incharge" value="<?php echo $res['incharge'];?>">
</div>
</div>
	<div class="border-top">
	  <div class="card-body">
   <input class="btn btn-primary" type="submit" class="registerbtn" name="submit" value="Update" >
	</div>
	</div>
	
	
  </div>
</form>
          </div>
                    </div>
                </div>
            </div>
			</div>
