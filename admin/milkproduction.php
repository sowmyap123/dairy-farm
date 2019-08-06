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
		$location = $_POST['location'];
		$breed = $_POST['breed'];
		$sex = $_POST['sex'];
		$birth = $_POST['birth'];
		$stage = $_POST['stage'];
		$date = $_POST['date'];
		$shift = $_POST['shift'];
		$type = $_POST['type'];
		$quantity = $_POST['quantity'];
		$lactition = $_POST['lactition'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		
		
		date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
		$reslt = mysqli_query($conn,"INSERT INTO `milkproduction`(`location`, `breed`, `sex`, `birth`,stage, `date`, `shifttime`, `type`, `quantity`, `last_lactition`, `description`, `incharge`) VALUES ('".$location ."','".$breed ."','".$sex ."','".$birth ."','".$stage ."','".$date ."','".$shift ."','".$type ."','".$quantity ."','".$lactition ."','".$description ."','".$incharge ."')");
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;milkproduction has been updated success";
	}


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'breed') !== false) {
    	$reslt = mysqli_query($conn,"SELECT * from milkproduction where breed ='".$_GET['breed']."' ");
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
                        <h4 class="page-title">Milk Production</h4>
                        
                         <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

	
	<form action="milkproduction_view.php" method="get" autocomplete="off">
<div class="card-body">
<div class="serchone">
<input placeholder="Location" type="text" name="location">

	
	<input placeholder="Breed" type="text" name="breed">

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
<?php if(isset($_GET['status']) && $_GET['status'] == 'remove') { ?>
<div class="col-group"><h5> Milk Production data has removed succesfully!</h5></div>
<?php } ?>
<form action=""  method="post" enctype="multipart/form-data" onsubmit="return validateForm()" autocomplete="off">
  <div class="card-body">
    
 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Work Location" name="location" id="location" >
	 <div id="locationerror" class="error"></div>
	</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Breed" name="breed" id="breed" >
	 <div id="breederror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Gender</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Gender" name="sex" id="sex" >
	 <div id="sexerror" class="error"></div>
	</div></div>
	
	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Birth</b></label>
	 <div class="col-sm-9">
    <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="birth" id="birth" >
	 <div id="birtherror" class="error"></div>
	</div></div>
	
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Stage</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Stage" name="stage" id="stage" >
	 <div id="stageerror" class="error"></div>
	</div></div>


 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date</b></label>
	 <div class="col-sm-9">
    <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="date" id="date" >
	 <div id="dateerror" class="error"></div>
	</div></div>

  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Shift Time</b></label>
	 <div class="col-sm-9">
   <select class="select2 form-control custom-select" name="shift" selected="selected" value="" >
										<option>
										morning
										</option>
										<option>
										evening
										</option>
										<option>
										others
										</option>
										</select>
	</div></div>
	
	   <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Types</b></label>
	 <div class="col-sm-9">
   <select class="select2 form-control custom-select" name="type" selected="selected" value="" >
										<option>
										Hand made
										</option>
										<option>
										Machine made
										</option>
										
										</select>
	</div></div>
	
	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Quantity" name="quantity" id="quantity" >
	 <div id="quantityerror" class="error"></div>
	</div></div>
	
		  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Last Lactition</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Last Lactition" name="lactition"  id="lactition" >
	 <div id="lactitionerror" class="error"></div>
	</div></div>
	
		  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Description" name="description"  id="description" >
	 <div id="descriptionerror" class="error"></div>
	</div></div>
	 
	 	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Incharge" name="incharge" id="incharge" >
	 <div id="inchargeerror" class="error"></div>
	</div></div>
	 
	
	    <input type="submit" class="btn btn-success"  name="submit" value="Register" >

</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
		function validateForm(){ 
var location=document.getElementById("location").value ;  
var breed=document.getElementById("breed").value ;
var sex=document.getElementById("sex").value ;  
var birth=document.getElementById("birth").value ; 
var stage=document.getElementById("stage").value ; 
var date=document.getElementById("date").value ;
var quantity=document.getElementById("quantity").value ; 
var lactition=document.getElementById("lactition").value ; 
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
if (date==null || date==""){ 
document.getElementById("dateerror").innerHTML  = "Please enter date";
         document.getElementById("date").focus();
return false; 
}else
{
	document.getElementById("dateerror").style.display = "none";
}
if (quantity==null || quantity==""){ 
document.getElementById("quantityerror").innerHTML  = "Please enter quantity";
         document.getElementById("quantity").focus();
return false; 
}else
{
	document.getElementById("quantityerror").style.display = "none";
}
if (lactition==null || lactition==""){ 
document.getElementById("lactitionerror").innerHTML  = "Please enter last lactition time";
         document.getElementById("lactition").focus();
return false; 
}else
{
	document.getElementById("lactitionerror").style.display = "none";
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
}else
{
	document.getElementById("inchargeerror").style.display = "none";
}

}


</script>

