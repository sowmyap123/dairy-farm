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
		$reslt = mysqli_query($conn,"INSERT INTO `cattlemedicine`(`cid`, `location`, `breed`, `sex`, `birth`, `disease`, `healthevent`, `treatment`, `startdate`, `enddate`, `days`, `medicine_type`, `quantity`, `repetition`, `health_condition`, `comments`, `incharge`) VALUES ('".$cid ."','".$location ."','".$breed ."','".$sex ."','".$birth ."','".$disease ."','".$healthevent ."','".$treatment ."','".$startdate ."','".$enddate ."','".$days ."','".$medicine ."','".$quantity ."','".$repetition ."','".$health_condition ."','".$comments ."','".$incharge ."')");
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cattle medicine has been updated success";
	

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
                        <h4 class="page-title">Cattle Medicine</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               
                                    <form action="cattlemedicine_view.php" method="get" autocomplete="off">
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
    <label class="col-sm-3 text-right control-label col-form-label"  for="psw"><b>Cattle Id</b></label>
		 <div class="col-sm-6">
    <input  class="form-control" type="text" placeholder="Enter Cattle Id" name="cid" id="cid"  value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">
	<div id="ciderror" class="error"></div>
		</div>
		
		<input class="btn" type="submit" id="submit" value="click">
		</div>
		
		</div>
	</form>
	<form action="" onsubmit="return validateForm()" method="post" autocomplete="off">
  <div class="card-body">
  
    <input  type="hidden" name="cid" value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">
	
	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter location" id="location" name="location" value="<?php if(empty($res['location'])==""){ echo $res['location']; } ?>">
	<div id="locationerror" class="error"></div>
	</div></div>
    
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Breed" id="breed" name="breed" value="<?php if(empty($res['breed'])==""){ echo $res['breed']; } ?>">
<div id="breederror" class="error"></div>
</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Sex</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Sex" name="sex" id="sex" value="<?php if(empty($res['sex'])==""){ echo $res['sex']; } ?>">
<div id="sexerror" class="error"></div>
</div></div>

	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Birth</b></label>
    <div class="col-sm-9"><input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="birth" id="birth"  value="<?php if(empty($res['birthdate'])==""){ echo $res['birthdate']; } ?>">
	<div id="birtherror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Name Of Disease</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Disease Name" name="disease" id="disease" >
	<div id="diseaseerror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Health Event Types</b></label>
	<div class="col-sm-9">
	<select class="select2 form-control custom-select" name="healthevent" selected="selected" value="" >
										<option>
										select
										</option>
										<option>
										Medicine
										</option>
										<option>
										Vaccine
										</option>
										<option>
										Accident
										</option>
										<option>
										Others
										</option>
										</select>
										</div></div>

    <div class="form-group row">
	<label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Treatment</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Treatment" name="treatment" id="treatment" >
	<div id="treatmenterror" class="error"></div>
</div></div>
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Start Date</b></label>
    <div class="col-sm-9"><input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="start" id="start" >
<div id="starterror" class="error"></div>
</div></div>
	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>End Date</b></label>
    <div class="col-sm-9"><input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="end" id="end" >
	<div id="enderror" class="error"></div>
</div></div>
	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Days</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Days" name="days" id="days"  >
	<div id="dayserror" class="error"></div>
</div></div>
	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Type Of Medicine</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Medicine" name="medicine" id="medicine" >
<div id="medicineerror" class="error"></div>
</div></div>

	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter quantity" name="quantity" id="quantity" >
	<div id="quantityerror" class="error"></div>
</div></div>

	<div class="form-group row">
	<label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Repetition</b></label>
	
	
	  <div class="col-sm-9">
	  <select class="select2 form-control custom-select" name="repetition" selected="selected" value="" >
										<option>
										select
										</option>
										<option>
										Daily
										</option>
										<option>
										Weakly
										</option>
										<option>
										Monthly
										</option>
										
										</select> </div></div>
			<div class="form-group row">							
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Health Condition</b></label>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter Health condition" name="health_condition" id="health_condition" >
	<div id="health_conditionerror" class="error"></div>

	</div></div>
	
    	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>comments</b></label><br>
    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Enter comments" name="comments" id="comments" >
<div id="commentserror" class="error"></div>
</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge person</b></label><br>
    <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Incharge person" name="incharge" id="incharge" >
	<div id="inchargeerror" class="error"></div>
</div>
  </div>
  
  <div class="border-top">
	  <div class="card-body">
    <input  class="btn btn-success" type="submit" name="submit" value="Register" >
	</div>
	</div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$("#one").click(function () {
   alert(45);
});
</script>

<script>
		function validateForm(){ 
var cid=document.getElementById("cid").value ;
var location=document.getElementById("location").value ;  
var breed=document.getElementById("breed").value ;
var sex=document.getElementById("sex").value ;  
var birth=document.getElementById("birth").value ; 
var disease=document.getElementById("disease").value ;
var treatment=document.getElementById("treatment").value ;
var start=document.getElementById("start").value ;
var end=document.getElementById("end").value ;
var days=document.getElementById("days").value ;
var medicine=document.getElementById("medicine").value ;
var quantity=document.getElementById("quantity").value ;
var health_condition=document.getElementById("health_condition").value ;
var comments=document.getElementById("comments").value ;
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
document.getElementById("birtherror").innerHTML  = "Please enter birth id.";
         document.getElementById("birth").focus();
return false; 
}else
{
	document.getElementById("birtherror").style.display = "none";
}
if (disease==null || disease==""){ 
document.getElementById("diseaseerror").innerHTML  = "Please enter disease name.";
         document.getElementById("disease").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("disease").value)) 
{
        document.getElementById("diseaseerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("disease").focus();
        return false;
}else
{
	document.getElementById("diseaseerror").style.display = "none";
}

if (treatment==null || treatment==""){ 
document.getElementById("treatmenterror").innerHTML  = "Please enter treatment";
         document.getElementById("treatment").focus();
return false; 
}
else
{
	document.getElementById("treatmenterror").style.display = "none";
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
if (days==null || days==""){ 
document.getElementById("dayserror").innerHTML  = "Please enter days";
         document.getElementById("days").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("days").value)) 
{
        document.getElementById("dayserror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("days").focus();
        return false;
}else
{
	document.getElementById("dayserror").style.display = "none";
}
if (medicine==null || medicine==""){ 
document.getElementById("medicineerror").innerHTML  = "Please enter medicine";
         document.getElementById("medicine").focus();
return false; 
}else
{
	document.getElementById("medicineerror").style.display = "none";
}
if (quantity==null || quantity==""){ 
document.getElementById("quantityerror").innerHTML  = "Please enter quantity.";
         document.getElementById("quantity").focus();
return false; 
}else
{
	document.getElementById("quantityerror").style.display = "none";
}


if (health_condition==null || health_condition==""){ 
document.getElementById("health_conditionerror").innerHTML  = "Please enter health condition";
         document.getElementById("health_condition").focus();
return false; 
}else
{
	document.getElementById("health_conditionerror").style.display = "none";
}


if (comments==null || comments==""){ 
document.getElementById("commentserror").innerHTML  = "Please enter comments";
         document.getElementById("comments").focus();
return false; 
}else
{
	document.getElementById("commentserror").style.display = "none";
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

