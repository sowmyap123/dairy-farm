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
		$feed = $_POST['feed'];
		$quantity = $_POST['quantity'];
		$supplementary = $_POST['supplementary'];
		$extraquantity = $_POST['extraquantity'];
		$repeat = $_POST['repeat'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$sftstart = $_POST['sftstart'];
		$sftend = $_POST['sftend'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		
		date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
		$reslt = mysqli_query($conn,"INSERT INTO `cattlefood`(`cid`, `location`, `breed`, `sex`, `birth`, `feed`, `quantity`, `supplementary`, `extraquantity`, `repetiton`, `start`, `end`, `shiftstart`, `shiftend`, `description`, `incharge`)  VALUES ('".$cid ."','".$location ."','".$breed ."','".$sex ."','".$birth ."','".$feed ."','".$quantity ."','".$supplementary ."','".$extraquantity ."','".$repeat ."','".$start ."','".$end ."','".$sftstart ."','".$sftend ."','".$description ."','".$incharge ."')");
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cattle food has been updated success";
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

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Cattle Food</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

	
	<form action="cattlefood_view.php" method="get" autocomplete="off">
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
                        
<form action="" method="get" autocomplete="off">
  <div class="card-body">
  <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Cattle Id</b></label>
	<div class="col-sm-6">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Cattle Id" name="cid" value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">
	<div id="ciderror" class="error"></div>
		</div>
			<input class="btn" name="submit" type="submit" id="submit" value="click">
	</div>
	</div>

	</form>
	
	<form action="" onsubmit="return validateForm()" method="post" autocomplete="off">
	<div class="card-body">
  <input class="form-control" class="form-control" type="hidden" id="cid" name="cid" value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">

	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter location" id="location" name="location" value="<?php if(empty($res['location'])==""){ echo $res['location']; } ?>">
	 <div id="locationerror" class="error"></div>
	</div></div>

    
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Breed"  id="breed" name="breed" value="<?php if(empty($res['breed'])==""){ echo $res['breed']; } ?>">
	<div id="breederror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Sex</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Sex" id="sex" name="sex" value="<?php if(empty($res['sex'])==""){ echo $res['sex']; } ?>">
	<div id="sexerror" class="error"></div>
</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Birth Date</b></label>
	<div class="col-sm-9">
     <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" id="birth" name="birth" value="<?php if(empty($res['birthdate'])==""){ echo $res['birthdate']; } ?>">
<div id="birtherror" class="error"></div>
</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Feed Name</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Feed Name" name="feed" id="feed" >
<div id="feederror" class="error"></div>
</div></div>
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Quantity" name="quantity" id="quantity" >
	<div id="quantityerror" class="error"></div>
</div></div>
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Extra Supplementary</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter supplementary" name="supplementary" id="supplementary" >
	<div id="supplementaryerror" class="error"></div>
</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Extra Quantity</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Extra Quantity" name="extraquantity" id="extraquantity" >
	<div id="extraquantityerror" class="error"></div>
</div></div>

	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Repetition</b></label>
	<div class="col-sm-9">
	<select  class="select2 form-control custom-select" name="repeat" selected="selected" value="" >
										<option>
									     select
										</option>
										<option>
										daily
										</option>
										<option>
										weakly
										</option>
										<option>
										monthly
										</option>
										</select>
										</div></div>
										
	<div class="form-group row">									
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Start Time</b></label>
	<div class="col-sm-9">
    <input class="form-control"  type="text" placeholder="Enter Start Time" name="start" id="start" >
	<div id="starterror" class="error"></div>
	</div>
	</div>
	<div class="form-group row">									
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>End Time</b></label>
	<div class="col-sm-9">
    <input class="form-control"  type="text" placeholder="Enter End Time" name="end" id="end" >
	<div id="enderror" class="error"></div>
	</div>
	</div>
	<div class="form-group row">									
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Shift Start Time</b></label>
	<div class="col-sm-9">
    <input class="form-control"  type="text" placeholder="Enter Start Time" name="sftstart" id="sftstart" >
	<div id="sftstarterror" class="error"></div>
	</div>
	</div>
	<div class="form-group row">									
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Shift End Time</b></label>
	<div class="col-sm-9">
    <input class="form-control"  type="text" placeholder="Enter Start Time" name="sftend" id="sftend" >
	<div id="sftenderror" class="error"></div>
	</div>
	</div>
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
    <input class="btn btn-success" type="submit" class="btn btn-primary" name="submit" value="Register" >
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
	
	<script>
		function validateForm(){ 
var cid=document.getElementById("cid").value ;
var location=document.getElementById("location").value ;  
var breed=document.getElementById("breed").value ;
var sex=document.getElementById("sex").value ;  
var birth=document.getElementById("birth").value ; 
var feed=document.getElementById("feed").value ;
var supplementary=document.getElementById("supplementary").value ;
var extraquantity=document.getElementById("extraquantity").value ;
var start=document.getElementById("start").value ;
var end=document.getElementById("end").value ;
var sftstart=document.getElementById("sftstart").value ;
var sftend=document.getElementById("sftend").value ;
var quantity=document.getElementById("quantity").value ;
var description=document.getElementById("description").value ;
var incharge=document.getElementById("incharge").value ;


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
document.getElementById("birtherror").innerHTML  = "Please enter Birth.";
         document.getElementById("birth").focus();
return false; 
}else
{
	document.getElementById("birtherror").style.display = "none";
}
if (feed==null || feed==""){ 
document.getElementById("feederror").innerHTML  = "Please enter Feed .";
         document.getElementById("feed").focus();
return false; 
}else
{
	document.getElementById("feederror").style.display = "none";
}
if (quantity==null || quantity==""){ 
document.getElementById("quantityerror").innerHTML  = "Please enter Quantity.";
         document.getElementById("quantity").focus();
return false; 
}else
{
	document.getElementById("quantityerror").style.display = "none";
}

if (start==null || start==""){ 
document.getElementById("starterror").innerHTML  = "Please enter start time";
         document.getElementById("start").focus();
return false; 
}else
{
	document.getElementById("starterror").style.display = "none";
}

if (end==null || end==""){ 
document.getElementById("enderror").innerHTML  = "Please enter end time";
         document.getElementById("end").focus();
return false; 
}else
{
	document.getElementById("enderror").style.display = "none";
}
if (sftstart==null || sftstart==""){ 
document.getElementById("sftstarterror").innerHTML  = "Please enter shift start time";
         document.getElementById("sftstart").focus();
return false; 
}else
{
	document.getElementById("sftstarterror").style.display = "none";
}
if (sftend==null || sftend==""){ 
document.getElementById("sftenderror").innerHTML  = "Please enter shift end time";
         document.getElementById("sftend").focus();
return false; 
}else
{
	document.getElementById("sftenderror").style.display = "none";
}

if (description==null || description==""){ 
document.getElementById("descriptionerror").innerHTML  = "Please enter description";
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



