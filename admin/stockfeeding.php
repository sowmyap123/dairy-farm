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
		$pname = $_POST['pname'];
		$supplementary = $_POST['supplementary'];
		$quantity = $_POST['quantity'];
		$uptodate = $_POST['uptodate'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		
		
		date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
		$reslt = mysqli_query($conn,"INSERT INTO `stockfeeding`(`pname`, `supplementary`, `quantity`, `location`, `uptodate`, `description`, `incharge`) VALUES  ('".$pname ."','".$supplementary ."','".$quantity ."','".$location ."','".$uptodate ."','".$description ."','".$incharge ."')");
	echo "Cattle stage has been updated success";
	}


?>
<div class="page-wrapper">
	
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                     
							<div class="">
						
						                        
 <div class="card-body">
<a class="btn btn-primary" href="stockfeeding.php">feeding</a>
<a class="btn btn-primary" href="stockvaccine.php">vaccine</a>
<a class="btn btn-primary" href="stockmilk.php">milk</a>
</div>
</div>

         <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                              <form action="stockfeeding_view.php" method="get">
<div class="card-body">
<input  type="text" placeholder="Location" name="location">
<input  type="text" placeholder="Stock Name" name="sname">
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
						


<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
<div class="card-body">
 <div class="card">
       <h4 class="card-title">Feeding</h4>
	   
	     <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Product Name</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Name of Product" name="pname"  id="pname">
		<div id="pnameerror" class="error"></div>

	</div></div> 
	
	 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Extra Supplementary</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Supplementary" name="supplementary" >
	</div></div> 
	
	
	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Quantity" name="quantity" id="quantity">
		<div id="quantityerror" class="error"></div>

	</div></div>
	
  
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Work Location" name="location"  id="location">
		<div id="locationerror" class="error"></div>

	</div></div>


 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>UptoDate</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter UptoDate" name="uptodate" id="uptodate">
		<div id="uptodateerror" class="error"></div>

	</div></div>

	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Description" name="description" id="description">
			<div id="descriptionerror" class="error"></div>

	</div></div>
	 
	 	  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Incharge" name="incharge" id="incharge">
		<div id="inchargeerror" class="error"></div>

	</div></div>
	 
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
function validateform()
{
	var pname=document.getElementById("pname").value ;  
	var location=document.getElementById("location").value ;  
	var quantity=document.getElementById("quantity").value ;  
	var uptodate=document.getElementById("uptodate").value ;  
	var description=document.getElementById("description").value ;  
	var incharge=document.getElementById("incharge").value ;  
if (pname==null || pname==""){ 
document.getElementById("pnameerror").innerHTML  = "Please Enter Product Name.";
         document.getElementById("pname").focus();
return false; 
}
else
{
	document.getElementById("pnameerror").style.display = "none";
}	
if (quantity==null || quantity==""){ 
document.getElementById("quantityerror").innerHTML  = "Please Enter quantity.";
         document.getElementById("quantity").focus();
return false; 
}
else
{
	document.getElementById("quantityerror").style.display = "none";
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
if (uptodate==null || uptodate==""){ 
document.getElementById("uptodateerror").innerHTML  = "Please enter uptodate.";
         document.getElementById("uptodate").focus();
return false; 
}
else
{
	document.getElementById("uptodateerror").style.display = "none";
}
if (description==null || description==""){ 
document.getElementById("descriptionerror").innerHTML  = "Please enter description.";
         document.getElementById("description").focus();
return false; 
}
else
{
	document.getElementById("descriptionerror").style.display = "none";
}
if (incharge==null || incharge==""){ 
document.getElementById("inchargeerror").innerHTML  = "Please enter incharge.";
         document.getElementById("incharge").focus();
return false; 
}
else
{
	document.getElementById("inchargeerror").style.display = "none";
}
}
</script>
