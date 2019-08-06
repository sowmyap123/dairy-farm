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
		$cid = $_POST['cid'];
		$location = $_POST['location'];
		$breed = $_POST['breed'];
		$sex = $_POST['sex'];
		$birth = $_POST['birth'];
		$length = $_POST['length'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		$status = $_POST['status'];
		date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
		$reslt = mysqli_query($conn,"INSERT INTO `cattleweight`(location,`cid`, `breed`, `sex`,`birth`,date,length,height,weight,description, `status`,incharge) VALUES ('".$location ."','".$cid ."','".$breed ."','".$sex ."','".$birth ."','".$curtime ."','".$length ."','".$height ."','".$weight ."','".$description ."','".$status ."','".$incharge ."')");
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cattle weight has been updated success";
	}


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'cid') !== false) {
    	$reslt = mysqli_query($conn,"SELECT * from cattleprofile where cid ='".$_GET['cid']."' ");
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
	
            
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Cattle Weight</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
     <form action="cattleweight_view.php" method="get" autocomplete="off">
<div class="card-body">
<div class="serchone">
<input placeholder="Location" type="text" name="location">

	
	<input placeholder="Cattle Id" type="text" name="cattleid">

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
<div class="row">
<div class="col-md-8">
 <div class="card">        
 <div class="card-body">
 
 <form  action="" method="get" autocomplete="off">
<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Cattle Id</b></label>
	<div class="col-sm-6">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Cattle Id" name="cid" id="cid" value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">
		 <div id="ciderror" class="error"></div>
		</div>
		<input class="btn" name="submit" type="submit" id="submit" value="click">
	</div>
</form>
	
	<form action="" onsubmit="return validateForm()" method="post" autocomplete="off">
	<div class="card-body">
  <input class="form-control" class="form-control" type="hidden" name="cid" value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">

<div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter location" id="location" name="location" value="<?php if(empty($res['location'])==""){ echo $res['location']; } ?>">
	 <div id="locationerror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Breed" id="breed" name="breed" value="<?php if(empty($res['breed'])==""){ echo $res['breed']; } ?>">
	 <div id="breederror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Sex</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Sex"  id="sex" name="sex" value="<?php if(empty($res['sex'])==""){ echo $res['sex']; } ?>">
<div id="sexerror" class="error"></div>
</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Birth Date</b></label>
	<div class="col-sm-9">
    <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" id="birth" name="birth" value="<?php if(empty($res['birthdate'])==""){ echo $res['birthdate']; } ?>">
<div id="birtherror" class="error"></div>
</div></div>
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Status</b></label>
	<div class="col-sm-9">
	<select  class="select2 form-control custom-select" name="status" selected="selected" value="" >
										<option>
										live
										</option>
										<option>
										dead
										</option>
										<option>
										sick
										</option>
										<option>
										sold
										</option>
										<option>
										stolen
										</option>
										</select>
										</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Length</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter length" name="length"  id="length">
	<div id="lengtherror" class="error"></div>
</div></div>


    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Height</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter height" name="height" id="height" >
	<div id="heighterror" class="error"></div>
</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Weight</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Weight" name="weight"  id="weight" >
	<div id="weighterror" class="error"></div>
</div></div>

	
										
	<div class="form-group row">									
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label>
	<div class="col-sm-9">
    <input class="form-control"  type="text" placeholder="Enter Description" name="description" id="description" >
	<div id="descriptionerror" class="error"></div>
	</div>
	</div>
	
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge </b></label>
	<div class="col-sm-9">
    <input  class="form-control" type="text" placeholder="Enter Incharge person" name="incharge" id="incharge" >
		<div id="inchargeerror" class="error"></div>
	</div>
	</div>
	
	<div class="border-top">
	  <div class="card-body">
    <input class="btn btn-success" type="submit" class="btn btn-success" name="submit" value="Register" >
	</div>
	</div>
	
	 
   
</div>
</form>

                </div>
               
            </div>
	</div>
	

           
            <footer class="footer text-center">
                All Rights Reserved by Integra. Designed and Developed by <a href="#">Integra</a>.
            </footer>
            
        </div>
        </div>
		</div>

<script>
		function validateForm(){ 
var cid=document.getElementById("cid").value ;
var location=document.getElementById("location").value ;  
var breed=document.getElementById("breed").value ;
var sex=document.getElementById("sex").value ;  
var birth=document.getElementById("birth").value ; 
var length=document.getElementById("length").value ;
var height=document.getElementById("height").value ;
var weight=document.getElementById("weight").value ;
var description=document.getElementById("description").value ;
var incharge=document.getElementById("incharge").value ;

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

if (cid==null || cid==""){ 
document.getElementById("ciderror").innerHTML  = "Please enter cid.";
        document.getElementById("cid").focus();
		return false; 
}
else if (!/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/g.test(document.getElementById("cid").value)) 
{
        document.getElementById("ciderror").innerHTML  = "Please Enter letters and numbers.";
        document.getElementById("cid").focus();
        return false;
}
else
{
	document.getElementById("ciderror").style.display = "none";
}
if (breed==null || breed==""){ 
document.getElementById("breederror").innerHTML  = "Please enter breed.";
         document.getElementById("breed").focus();
		return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("breed").value)) 
{
        document.getElementById("breederror").innerHTML  = "Please Enter letters only.";
        document.getElementById("breed").focus();
        return false;
}
else
{
	document.getElementById("breederror").style.display = "none";
}
if (sex==null || sex==""){ 
document.getElementById("sexerror").innerHTML  = "Please enter sex.";
         document.getElementById("sex").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("sex").value)) 
{
        document.getElementById("sexerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("sex").focus();
        return false;
}
else
{
	document.getElementById("sexerror").style.display = "none";
}
if (birth==null || birth==""){ 
document.getElementById("birtherror").innerHTML  = "Please enter birth.";
         document.getElementById("birth").focus();
return false; 
}
if (length==null || length==""){ 
document.getElementById("lengtherror").innerHTML  = "Please enter length.";
         document.getElementById("length").focus();
return false;
} 
else if (!/^[0-9]*$/g.test(document.getElementById("length").value)) 
{
        document.getElementById("lengtherror").innerHTML  = "Please Enter letters only.";
        document.getElementById("length").focus();
        return false;
}
else
{
	document.getElementById("lengtherror").style.display = "none";
}
if (height==null || height==""){ 
document.getElementById("heighterror").innerHTML  = "Please enter height.";
         document.getElementById("height").focus();
return false; 
} 
else if (!/^[0-9]*$/g.test(document.getElementById("height").value)) 
{
        document.getElementById("heighterror").innerHTML  = "Please Enter letters only.";
        document.getElementById("height").focus();
        return false;
}
else
{
	document.getElementById("heighterror").style.display = "none";
}
if (weight==null || weight==""){ 
document.getElementById("weighterror").innerHTML  = "Please enter weight";
         document.getElementById("weight").focus();
return false; 
} 
else if (!/^[0-9]*$/g.test(document.getElementById("weight").value)) 
{
        document.getElementById("weighterror").innerHTML  = "Please Enter letters only.";
        document.getElementById("weight").focus();
        return false;
}
else
{
	document.getElementById("weighterror").style.display = "none";
}
if (description==null || description==""){ 
document.getElementById("descriptionerror").innerHTML  = "Please enter description.";
         document.getElementById("description").focus();
return false; 
}else
{
	document.getElementById("descriptionerror").style.display = "none";
}
if (incharge==null || incharge==""){ 
document.getElementById("inchargeerror").innerHTML  = "Please enter incharge.";
         document.getElementById("incharge").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("incharge").value)) 
{
        document.getElementById("inchargeerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("incharge").focus();
        return false;
}
else
{
	document.getElementById("inchargeerror").style.display = "none";
}
}
</script>


