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
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$location = $_POST['location'];
		$gender = $_POST['gender'];
		$birth = $_POST['dob'];
		$department = $_POST['department'];
		$addar = $_POST['addar'];
		$pan = $_POST['pan'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$pin = $_POST['pin'];
		$landmark = $_POST['landmark'];
		$joiningdate = $_POST['joiningdate'];
		$refid = $_POST['refid'];
		$bloodgroup = $_POST['bloodgroup'];
				if(is_uploaded_file($_FILES['image']['tmp_name']))
				{
					$filename1=$_FILES['image']['name'];
					$size1=$_FILES['image']['size'];
					$type1=$_FILES['image']['type'];
					$tmp1=$_FILES['image']['tmp_name'];
					$error1=$_FILES['image']['error'];
					$ext1=substr($filename1,strpos($filename1,"."));
					$str="1234567890abcdefghijklmnopqrstuvwxyz";
					$uq1=substr(str_shuffle($str),10,16)."_".time();
					date_default_timezone_set('Asia/Kolkata');
					$curtime= date('Y-m-d H:i:s');
					if($size1<(1024*1024))
					{
						if($ext1==".jpg" || $ext1==".png" || $ext1==".gif" || $ext1==".jpeg" )
						{
							if(move_uploaded_file($tmp1,"img/".$uq1.$filename1))
							{
								$reslt = mysqli_query($conn,"INSERT INTO `employee`(`employeeid`, `name`, `email`, `mobile`, `location`, `department`, `gender`, `dob`, `addar`, `pan`, `address`,`landmark`, `city`, `pin`, `profilepic`, `joiningdate`, `bloodgroup`, `refid`) VALUES ('".$eid ."','".$name ."','".$email ."','".$mobile ."','".$location ."','".$department ."','".$gender ."','".$birth ."','".$addar ."','".$pan ."','".$address ."','".$landmark ."','".$city ."','".$pin ."','".$uq1.$filename1."','".$joiningdate ."','".$bloodgroup ."','".$refid ."')");
	        echo "Employee has been register successfully";
							}
							else
							{
								echo "<p>Sorry Unable to Upload</p>";
							}
						}
						else
						{
							echo "<p>Please Select a valid Image like 
							jpg, png, gif</p>";
						}
					}
					else
					{
						echo "<p>FIle size should below 1MB</p>";
					}
				}
				else
				{
					echo "Please select a file to upload";
				}
	
	}


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'eid') !== false) {
    	$reslt = mysqli_query($conn,"SELECT * from employee where employeeid ='".$_GET['eid']."' ");
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
                           <h4 class="card-title">Employee Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                
                             <form action="employeeprofile_view.php" method="get" autocomplete="off">
	<div class="card-body">
	<div class="serchone">
	<input type="text" placeholder="Location" name="location">
	<input type="text" placeholder="Employee Id" name="eid">
	<input class="btn btn-primary" type="submit" value="search"><h3 style="float:right;" > <a class="arro" href="dashboard.php"><i style="color:#A9A9A9" class="mdi mdi-arrow-left-bold-circle-outline"></i></a></h3>
	</div>
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
	


<form action="" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateform()">
  <div class="card-body">
  
  
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="email"><b>Employee Id</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Employee Id " name="eid" id="eid">
	<div id="eiderror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Name</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Name" name="name" id="name">
		<div id="nameerror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Email Id</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Email Id" name="email" id="email">
			<div id="emailerror" class="error"></div>

	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Mobile Number</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" id="mobile">
			<div id="mobileerror" class="error"></div>

	</div></div>

  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Work Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Work Location" name="location" id="location">
			<div id="locationerror" class="error"></div>

	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Gender</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Gender" name="gender" id="gender">
			<div id="gendererror" class="error"></div>

	</div></div>
	
	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Birth</b></label>
	 <div class="col-sm-9">
   <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy"  name="dob" id="dob">
			<div id="doberror" class="error"></div>

	</div></div>

  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Department</b></label>
	 <div class="col-sm-9">
   <select class="select2 form-control custom-select" name="department" selected="selected" value="" id="department">
										<option>
										Select
										</option>
										<option>
										stage 1
										</option>
										<option>
										stage 2
										</option><option>
										stage 3
										</option><option>
										stage 4
										</option>
										</select>
												<div id="departmenterror" class="error"></div>

	</div></div>
	
	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Addhar Number</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Addhar Number" name="addar" id="addar">
			<div id="addarerror" class="error"></div>

	</div></div>
	
	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Pan Card Number</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter pan no" name="pan" id="pan">
			<div id="panerror" class="error"></div>

	</div></div>
	
		  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Address</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Address" name="address" id="address">
			<div id="addresserror" class="error"></div>

	</div></div>
	
		  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Landmark</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter landmark" name="landmark" id="landmark">
	</div></div>
	 
	 	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>City</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter city" name="city" id="city">
	</div></div>
	 
	 	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Pin code</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Pin code" name="pin" id="pin">
			<div id="pinerror" class="error"></div>

	</div></div>
	 
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label"><b>Upload Profile</b></label>
	 <div class="col-sm-9">
				<input class="form-control"type="file" name="image" class="form-control" id="profile">
				 		<div id="profileerror" class="error"></div>

				 </div>
				
		
	</div>
											
<div class="form-group row">										
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Joining</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter date of joining" name="joiningdate" id="joining">
		<div id="joiningerror" class="error"></div>

</div>
</div>


<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Blood Group</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Blood Group" name="bloodgroup" id="blood">
			<div id="blooderror" class="error"></div>

	</div>
	</div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Reference Id</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Reference Id" name="refid">
			

	</div>
	</div>
	
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
var eid=document.getElementById("eid").value ;  
var name=document.getElementById("name").value ;  
var email=document.getElementById("email").value ;  
var mobile=document.getElementById("mobile").value ;  
var gender=document.getElementById("gender").value ;  
var dob=document.getElementById("dob").value ;  
var addar=document.getElementById("addar").value ;  
var pan=document.getElementById("pan").value ;  
var pin=document.getElementById("pin").value ;	  
var profile=document.getElementById("profile").value ;	  
var address=document.getElementById("address").value ;  
var joining=document.getElementById("joining").value ;  
var blood=document.getElementById("blood").value ;  



if (eid==null || eid==""){ 
document.getElementById("eiderror").innerHTML  = "Please enter Employee id.";
         document.getElementById("eid").focus();
return false; 
}
else if (!/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/g.test(document.getElementById("eid").value)) 
{
        document.getElementById("eiderror").innerHTML  = "Please Enter letters and numbers .";
        document.getElementById("eid").focus();
        return false;
}
else
{
	document.getElementById("eiderror").style.display = "none";
}

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
if (email==null || email==""){ 
document.getElementById("emailerror").innerHTML  = "Please enter email.";
         document.getElementById("email").focus();
return false; 
}else if (!/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/g.test(document.getElementById("email").value)) 
{
        document.getElementById("emailerror").innerHTML  = "Invalid Email.";
        document.getElementById("email").focus();
        return false;
}
else
{
	document.getElementById("emailerror").style.display = "none";
}
if (mobile==null || mobile==""){ 
document.getElementById("mobileerror").innerHTML  = "Please enter mobile.";
         document.getElementById("mobile").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("mobile").value)) 
{
        document.getElementById("mobileerror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("mobile").focus();
        return false;
}
else if(mobile.length < 10)
	  
  {
	 document.getElementById("mobileerror").innerHTML  = "mobile should be 10 characters";
	  return false;
  }
else
{
	document.getElementById("mobileerror").style.display = "none";
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
if (gender==null || gender==""){ 
document.getElementById("gendererror").innerHTML  = "Please enter gender.";
         document.getElementById("gender").focus();
return false; 
}
else
{
	document.getElementById("gendererror").style.display = "none";
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
		if (addar==null || addar==""){ 
document.getElementById("addarerror").innerHTML  = "Please enter addar.";
         document.getElementById("addar").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("addar").value)) 
{
        document.getElementById("addarerror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("addar").focus();
        return false;
}
		else
{
	document.getElementById("addarerror").style.display = "none";
}
if (pan==null || pan==""){ 
document.getElementById("panerror").innerHTML  = "Please enter pan.";
         document.getElementById("pan").focus();
return false; 
}
		else
{
	document.getElementById("panerror").style.display = "none";
}
		if (address==null || address==""){ 
document.getElementById("addresserror").innerHTML  = "Please enter address.";
         document.getElementById("address").focus();
return false; 
}
		else
{
	document.getElementById("addresserror").style.display = "none";
}
if (pin==null || pin==""){ 
document.getElementById("pinerror").innerHTML  = "Please enter pin.";
         document.getElementById("pin").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("pin").value)) 
{
        document.getElementById("pinerror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("pin").focus();
        return false;
}
	else
{
	document.getElementById("pinerror").style.display = "none";
}
if (profile==null || profile==""){ 
document.getElementById("profileerror").innerHTML  = "Please select image.";
         document.getElementById("profile").focus();
return false; 
}

else
{
	        var selection = document.getElementById('profile');
		
for (var i=0; i<selection.files.length; i++) {
    var ext = selection.files[i].name.substr(-3);
    if(ext== "jpg" || ext== "png" || ext== "gif")  {
       	document.getElementById("profileerror").style.display = "none";

    }
	else
	{
		 document.getElementById("profileerror").innerHTML  = "please select Only jpg.png.gif images";
        return false;
	}
} 
}
if (joining==null || joining==""){ 
document.getElementById("joiningerror").innerHTML  = "Please enter joining date.";
         document.getElementById("joining").focus();
return false; 
}
if (blood==null || blood==""){ 
document.getElementById("blooderror").innerHTML  = "Please enter blood.";
         document.getElementById("blood").focus();
return false; 
}

}
</script>


