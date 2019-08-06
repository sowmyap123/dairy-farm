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
		$stage = $_POST['stage'];
		$rate = $_POST['rate'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		
		
		date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
		$reslt = mysqli_query($conn,"INSERT INTO `salescattle`(`cid`, `location`, `breed`, `sex`, `birth`, `stage`, `rate`, `description`, `incharge`) VALUES('".$cid ."','".$location ."','".$breed ."','".$sex ."','".$birth ."','".$stage ."','".$rate ."','".$description ."','".$incharge ."')");
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cattle stage has been updated success";
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
                        
						<div class=" text-left">
						<div class="card-body">
<a class="btn btn-primary" href="feedsales.php">feed</a>
<a class="btn btn-primary" href="cattlesales.php">cattle</a>
<a class="btn btn-primary" href="milkproductssales.php">milk products</a>
</div>
</div>
<div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                              <form action="cattlesales_view.php" method="get" autocomplete="off">
<div class="card-body">
	<input  type="text" placeholder="Location" name="location">
<input  type="text" placeholder="Cattle Id" name="cattleid">
<input class="btn btn-primary" type="submit" value="search"><h3 style="float:right;" > <a class="arro" href="dashboard.php"><i style="color:#A9A9A9" class="mdi mdi-arrow-left-bold-circle-outline"></i></a></h3>
	</div>
</form></nav>
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
  <h4 class="page-title">Cattle sale</h4>
  <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Cattle Id</b></label>
	<div class="col-sm-6">
    <input class="form-control" class="form-control" type="text" placeholder="Enter Cattle Id" name="cid" id="cid" value="<?php if(empty($res['cid'])==""){ echo $res['cid']; } ?>">
		<div id="ciderror" class="error"></div>
		</div>
		<input class="btn btn-primary" name="submit" type="submit" id="submit" value="click">
	</div>
	</div>

	</form>

<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" autocomplete="off">

  <div class="card-body">
      <input type="hidden" name="cid" value="<?php  if(empty($res['cid'])==""){ echo $res['cid']; } ?>">


  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Work Location" name="location" id="location"   value="<?php if(empty($res['location'])==""){ echo $res['location']; } ?>">
	<div id="locationerror" class="error"></div>
	</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Breed" name="breed" id="breed"  value="<?php if(empty($res['breed'])==""){ echo $res['breed']; } ?>">
	<div id="breederror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Gender</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Gender" name="sex" id="sex" value="<?php if(empty($res['sex'])==""){ echo $res['sex']; } ?>">
	<div id="sexerror" class="error"></div>
	</div></div>
	
	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Birth</b></label>
	 <div class="col-sm-9">
    <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" id="birth" name="birth"  value="<?php if(empty($res['birthdate'])==""){ echo $res['birthdate']; } ?>">
	<div id="birtherror" class="error"></div>
	</div></div>
	
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Stage</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Stage" name="stage" id="stage" value="<?php if(empty($res['stage'])==""){ echo $res['stage']; } ?>">
	<div id="stageerror" class="error"></div>
	</div></div>

		  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>rate</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter rate" name="rate" id="rate" >
	<div id="quantityerror" class="error"></div>
	</div></div>
	
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Description" name="description" id="description" >
	<div id="descriptionerror" class="error"></div>
	</div></div>
	 
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge person</b></label><br>
    <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Incharge person" name="incharge" id="incharge" >
	<div id="inchargeerror" class="error"></div>
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
		function validateForm(){ 
var cid=document.getElementById("cid").value ;
var location=document.getElementById("location").value ;  
var breed=document.getElementById("breed").value ;
var sex=document.getElementById("sex").value ;  
var birth=document.getElementById("birth").value ; 
var birth=document.getElementById("stage").value ; 
var quantity=document.getElementById("rate").value ;
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
document.getElementById("birtherror").innerHTML  = "Please enter birth id.";
         document.getElementById("birth").focus();
return false; 
}else
{
	document.getElementById("birtherror").style.display = "none";
}
if (stage==null || stage==""){ 
document.getElementById("stageerror").innerHTML  = "Please enter stage";
         document.getElementById("stage").focus();
return false; 
}else
{
	document.getElementById("stageerror").style.display = "none";
}
if (quantity==null || quantity==""){ 
document.getElementById("quantityerror").innerHTML  = "Please enter quantity.";
         document.getElementById("quantity").focus();
return false; 
}else
{
	document.getElementById("quantityerror").style.display = "none";
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