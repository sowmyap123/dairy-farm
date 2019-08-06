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
		$date = $_POST['date'];
		$location = $_POST['location'];
		$group = $_POST['group'];
		$supplier = $_POST['supplier'];
		$quantity = $_POST['quantity'];
		$status = $_POST['status'];
		$remarks = $_POST['remarks'];
		
		$reslt = mysqli_query($conn,"INSERT INTO `productionfeeding`(`date`, `suppliersname`, `groupname`, `location`, `quantity`, `status`, `remarks`) VALUES ('".$date ."','".$supplier ."','".$group ."','".$location ."','".$quantity ."','".$status ."','".$remarks ."')");
	echo "Cattle stage has been updated success";
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
                        <h4 class="page-title">Production</h4>
						<div class=" text-left">
                        
 <div class="card-body">
<a class="btn btn-primary" href="productionmilk.php">Production Milk</a>
<a class="btn btn-primary" href="productionfeeding.php">production feeding</a>
</div>
</div>
<div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

	
	<form action="suppliersfeeding_view.php" method="get" autocomplete="off">
                     <div class="card-body">
	<input  type="text" name="location" placeholder="Location">
	<input  type="text" name="supplier" placeholder="supplier name">
	<input class="btn btn-primary" type="submit" value="search"><h3 style="float:right;" > <a class="arro" href="dashboard.php"><i style="color:#A9A9A9" class="mdi mdi-arrow-left-bold-circle-outline"></i></a></h3>
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

	
	<form action="" onsubmit="return validateForm()" method="post" autocomplete="off">
	<div class="card-body">
  
<h4>feeding</h4>
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date</b></label>
	<div class="col-sm-9">
   <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="date" id="date"  >
	<div id="dateerror" class="error"></div>
	</div></div>
	
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Supplier Name</b></label>
	<div class="col-sm-9">
   <input class="form-control" type="text" placeholder="Enter Supplier Name" name="supplier" id="supplier"  >
	<div id="suppliererror" class="error"></div>
	</div></div>
	
	    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Group/Department</b></label>
	<div class="col-sm-9">
   <input class="form-control" type="text" placeholder="Enter group Name" name="group" id="group"  >
	<div id="grouperror" class="error"></div>
	</div></div>
	
	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter location" name="location" id="location" >
	<div id="locationerror" class="error"></div>
	</div></div>
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter quantity" id="quantity" name="quantity" >
	<div id="quantityerror" class="error"></div>
	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>status</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter status" id="status" name="status" >
<div id="statuserror" class="error"></div>
</div></div>

 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Remarks</b></label>
	<div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter remarks" id="remarks" name="remarks" >
</div></div>

										
	
	<div class="border-top">
	  <div class="card-body">
    <input  type="submit" class="btn btn-success" name="submit" value="Register" >
							</div>
						</div>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
<script>
		function validateForm(){ 
var date=document.getElementById("date").value ;
var supplier=document.getElementById("supplier").value ;  
var location=document.getElementById("location").value ;  
var group=document.getElementById("group").value ;
var quantity=document.getElementById("quantity").value ;  
var status=document.getElementById("status").value ; 

if (date==null || date==""){ 
document.getElementById("dateerror").innerHTML  = "Please enter date.";
         document.getElementById("date").focus();
return false; 
}

else
{
	document.getElementById("dateerror").style.display = "none";
}
if (supplier==null || supplier==""){ 
document.getElementById("suppliererror").innerHTML  = "Please enter supplier.";
         document.getElementById("supplier").focus();
return false; 
}
else
{
	document.getElementById("suppliererror").style.display = "none";
}
if (group==null || group==""){ 
document.getElementById("grouperror").innerHTML  = "Please enter group.";
         document.getElementById("group").focus();
return false; 
}
else
{
	document.getElementById("grouperror").style.display = "none";
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
if (quantity==null || quantity==""){ 
document.getElementById("quantityerror").innerHTML  = "Please enter quantity.";
         document.getElementById("quantity").focus();
return false; 
}
else
{
	document.getElementById("quantityerror").style.display = "none";
}
if (status==null || status==""){ 
document.getElementById("statuserror").innerHTML  = "Please enter status.";
         document.getElementById("status").focus();
return false; 
}
else
{
	document.getElementById("statuserror").style.display = "none";
}


}
</script>



