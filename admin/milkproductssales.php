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
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$date = $_POST['date'];
		$status = $_POST['status'];
            $location = $_POST['location'];
		$quantity = $_POST['quantity'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		
		
		date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
		$reslt = mysqli_query($conn,"INSERT INTO `salesmilkproducts`(`pid`, `product`, `date`, `status`, `location`,`quantity`, `description`, `incharge`) VALUES ('".$pid ."','".$pname ."','".$date ."','".$status ."','".$location ."','".$quantity ."','".$description ."','".$incharge ."')");
	echo "Cattle stage has been updated success";
	}


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'pid') !== false) {
    	$reslt = mysqli_query($conn,"SELECT * from salesmilkproducts where pid ='".$_GET['pid']."' ");
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
                        
						<div class="text-left">
						
						                        
 <div class="card-body">
<a class="btn btn-primary" href="feedsales.php">feed</a>
<a class="btn btn-primary" href="cattlesales.php">cattle</a>
<a class="btn btn-primary" href="milkproductssales.php">milk products</a>
</div>
</div>
						
						
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
    <form action="milkproductsales_view.php" method="get" autocomplete="off">
<div class="card-body">
	<input  type="text" placeholder="Location" name="location">
<input  type="text" placeholder="productid" name="productid">
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
						
	<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" autocomplete="off">
<div class="card-body">
 <div class="card">
       <h4 class="card-title">Milk Products Sales</h4>
	   
	   <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Product Name</b></label>
	 <div class="col-sm-9">
     <select class="select2 form-control custom-select" name="pname"  id="pname" selected="selected" >
										<option>
										select
										</option>
										<option>
										curd
										</option>
										<option>
										cheese
										</option>
										<option>
										paneer
										</option>
										</select>
										<div id="pnameerror"></div>
	</div></div>
	
 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Product Id</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Product Id" name="pid"  id="pid" >
	<div id="piderror" class="error"></div>
	</div></div>
	 
 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Status</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Status" name="status" id="status" >
	<div id="statuserror" class="error"></div>
	</div></div>
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Status" name="location" id="location" >
	<div id="statuserror" class="error"></div>
	</div></div>
 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date</b></label>
	 <div class="col-sm-9">
   <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="date" id="date">
	<div id="dateerror" class="error"></div>
	</div></div>

	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Quantity" name="quantity" id="quantity" >
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
	 
	 <div class="card-body">
	    <input type="submit" class="btn btn-success" name="submit" value="Register" >
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
	function validateForm(){ 
var pname=document.getElementById("pname").value ;
var pid=document.getElementById("pid").value ;
var status=document.getElementById("status").value ;
var quantity=document.getElementById("quantity").value ;
var date=document.getElementById("date").value ;
var description=document.getElementById("description").value ;
var incharge=document.getElementById("incharge").value ;

if (pname==null || pname==""){ 
document.getElementById("pnameerror").innerHTML  = "Please select your product name.";
         document.getElementById("pname").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("pname").value)) 
{
        document.getElementById("pnameerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("pname").focus();
        return false;
}
else
{
	document.getElementById("pnameerror").style.display = "none";
}
if (pid==null || pid==""){ 
document.getElementById("piderror").innerHTML  = "Please enter product id";
         document.getElementById("pid").focus();
return false; 
}else
{
	document.getElementById("piderror").style.display = "none";
}

if (status==null || status==""){ 
document.getElementById("statuserror").innerHTML  = "Please enter status";
         document.getElementById("status").focus();
return false; 
}else
{
	document.getElementById("statuserror").style.display = "none";
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

