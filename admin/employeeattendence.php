<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php"); 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit']))
	{
		$eid = $_POST['eid'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$department = $_POST['department'];
		$location = $_POST['location'];
		$joiningdate = $_POST['joiningdate'];
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reslt = mysqli_query($conn,"INSERT INTO `employeeattend`(`eid`, `name`, `gender`,location, `dob`, `department`, `joiningdate`, `date`, `startdate`, `enddate`) VALUES ('".$eid ."','".$name ."','".$gender ."','".$location ."','".$dob ."','".$department ."','".$joiningdate ."','".$date ."','".$start ."','".$end ."')");
	echo "Employee has been register successfully";
	}
	
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'eid') !== false) {
    	$reslt = mysqli_query($conn,"SELECT * from employeeattend where eid ='".$_GET['eid']."' ");
$res = mysqli_fetch_array($reslt);
}




?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Employee attandance</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            

<form action="employeeattend_view.php" method="get" autocomplete="off">
<div class="card-body">
	<input  type="text" name="location" placeholder="Location">

	
	<input type="text" name="eid" placeholder="Employee Id">
	
	<input type="text" name="start"  class="datepicker" placeholder="Start Date">
	
	<input type="text" name="end"  class="datepicker"   placeholder="End date">

	
<input class="btn btn-primary" type="submit" value="search"><h3 style="float:right;" > <a class="arro" href="dashboard.php"><i style="color:#A9A9A9" class="mdi mdi-arrow-left-bold-circle-outline"></i></a></h3>
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
<form action="" method="get" autocomplete="off" >
  <div class="card-body">
  <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label"   for="psw"><b>Employee Id</b></label>
    <div class="col-sm-6">
	<input  class="form-control" type="text" placeholder="Enter employee Id" name="eid" id="eid" value="<?php if(empty($res['employeeid'])==""){ echo $res['employeeid']; } ?>">
		<!--<input type="text" placeholder="Enter Location" name="location" > -->
	
	</div>
	<input type="submit" id="submit"  class="btn" value="click">
	</div>
	</div>
	</form>
	
<form action="" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateform()">
  <div class="card-body">
       <input type="hidden" name="eid" value="<?php if(empty($res['employeeid'])==""){ echo $res['employeeid']; } ?>">

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Name</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Name" name="name" id="name" value="<?php if(empty($res['name'])==""){ echo $res['name']; } ?>">
	<div id="nameerror" class="error"></div>
	</div></div>
	
   	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Birth</b></label>
	 <div class="col-sm-9">
   <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="dob" id="dob"  value="<?php if(empty($res['dob'])==""){ echo $res['dob']; } ?>">
		<div id="doberror" class="error"></div>

	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Gender</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Gender" name="gender" id="gender" value="<?php if(empty($res['gender'])==""){ echo $res['gender']; } ?>">
		<div id="gendererror" class="error"></div>

	</div></div>
	
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Work Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Work Location" name="location" id="location" value="<?php if(empty($res['location'])==""){ echo $res['location']; } ?>">
			<div id="locationerror" class="error"></div>

	</div></div>
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Department</b></label>
	 <div class="col-sm-9">
   <select class="select2 form-control custom-select" name="department" selected="selected" value="" id="department">
										<option >
										Select
										</option>
										<option >
										stage 1
										</option>
										<option>
										stage 2
										</option>
										<option>
										stage 3
										</option>
										<option >
										stage 4
										</option>
										</select>
											<div id="departmenterror" class="error"></div>

	</div></div>
	
											
<div class="form-group row">										
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Joining</b></label>
	 <div class="col-sm-9">
    <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="joiningdate" id="joining"  value="<?php if(empty($res['joiningdate'])==""){ echo $res['joiningdate']; } ?>">
	<div id="joiningerror" class="error"></div>

</div>
</div>

	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date</b></label>
	 <div class="col-sm-9">
    <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="date" id="date">
		<div id="dateerror" class="error"></div>

	</div></div>

	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Start Time</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Start Time" name="start" id="start">
		<div id="starterror" class="error"></div>

	</div></div>
	
	
	
		  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>End Time</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter End Time" name="end" id="end">
		<div id="enderror" class="error"></div>

	</div></div>
	 
	 	  	    <input type="submit" class="btn btn-success" name="submit" value="Register" >

</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
function validateform()
{
var location=document.getElementById("location").value ;  
var name=document.getElementById("name").value ;  
var dob=document.getElementById("dob").value ;  
var gender=document.getElementById("gender").value ;  
var department=document.getElementById("department").value ;  
var joining=document.getElementById("joining").value ;  
var date=document.getElementById("date").value ;  
var start=document.getElementById("start").value ;  
var end=document.getElementById("end").value ;  

if (name==null || name==""){ 
document.getElementById("nameerror").innerHTML  = "Please enter name.";
         document.getElementById("name").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("name").value)) 
{
        document.getElementById("nameerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("name").focus();
        return false;
}
else
{
	document.getElementById("nameerror").style.display = "none";
}
if (dob==null || dob==""){ 
document.getElementById("doberror").innerHTML  = "Please enter dob.";
         document.getElementById("dob").focus();
return false; 
}
else
{
	document.getElementById("doberror").style.display = "none";
}
if (gender==null || gender==""){ 
document.getElementById("gendererror").innerHTML  = "Please enter gender.";
         document.getElementById("gender").focus();
return false; 
}
else
{
	document.getElementById("gendererror").style.display = "none";
}

if (location==null || location==""){ 
document.getElementById("locationerror").innerHTML  = "Please select your location.";
         document.getElementById("location").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("location").value)) 
{
        document.getElementById("locationerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("location").focus();
        return false;
}
else
{
	document.getElementById("locationerror").style.display = "none";
}
var sta = document.getElementById("department");
        if(sta.selectedIndex <=0)
        {
         document.getElementById("departmenterror").innerHTML  = "Please Select Valid Value";
		  return false;
        }
		else
{
	document.getElementById("departmenterror").style.display = "none";
}
if (joining==null || joining==""){ 
document.getElementById("joiningerror").innerHTML  = "Please enter joining date.";
         document.getElementById("joining").focus();
return false; 
}
else
{
	document.getElementById("joiningerror").style.display = "none";
}
if (date==null || date==""){ 
document.getElementById("dateerror").innerHTML  = "Please enter date.";
         document.getElementById("date").focus();
return false; 
}
else
{
	document.getElementById("dateerror").style.display = "none";
}
if (start==null || start==""){ 
document.getElementById("starterror").innerHTML  = "Please enter start time.";
         document.getElementById("start").focus();
return false; 
}
else
{
	document.getElementById("starterror").style.display = "none";
}
if (end==null || end==""){ 
document.getElementById("enderror").innerHTML  = "Please enter end time.";
         document.getElementById("end").focus();
return false; 
}
else
{
	document.getElementById("enderror").style.display = "none";
}
}
</script>