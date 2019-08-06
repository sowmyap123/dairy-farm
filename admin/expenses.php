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
	    $pname =  $_POST['pname'];
		$pid =  $_POST['pid'];	
		$department	=  $_POST['department'];
		$services =  $_POST['services'];	
		$location =  $_POST['location'];	
		$payeename =  $_POST['payeename'];
		$type	=  $_POST['type'];
		$quantity	=  $_POST['quantity'];
		$rate	=  $_POST['rate'];
		$paymentmode =  $_POST['paymentmode'];	
		$billid	=  $_POST['billid'];
		$amount	=  $_POST['amount'];
		$tax =  $_POST['tax'];
		$purchasedate =  $_POST['purchasedate'];	
		$selldate	=  $_POST['selldate'];
		$description =  $_POST['description'];	
		$incharge =  $_POST['incharge'];

	$reslt = mysqli_query($conn,"INSERT INTO `expenses`(`pname`, `pid`, `department`, `services`, `location`, `payeename`, `type`, `quantity`, `rate`, `paymentmode`, `billid`, `amount`, `tax`, `purchasedate`, `selldate`, `description`, `incharge`) VALUES ('".$pname ."','".$pid ."','".$department ."','".$services ."','".$location ."','".$payeename."','".$type."','".$quantity ."','".$rate ."','".$paymentmode ."','".$billid ."','".$amount ."','".$tax ."','".$purchasedate ."','".$selldate ."','".$description ."','".$incharge ."')");
	
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
                        <h4 class="page-title">Expenses info</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
  <form action="expenses_view.php" method="get" autocomplete="off">
<div class="card-body">
<input  type="text" placeholder="Location" name="location">
<input placeholder="Product Id" type="text" name="pid">
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
<form action="" method="post" onsubmit="return validateForm()" enctype="multipart/form-data" autocomplete="off">
  <div class="card-body">
    
 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="email"><b>Product Name</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter product name" name="pname" id="pname"  >
	<div id="pnameerror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Product Id</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Product Id" name="pid" id="pid" >
	<div id="piderror" class="error"></div>
	</div></div>
	
	  
  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="location"><b>Location </b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter location" name="location"  id="location" >
	<div id="locationerror" class="error"></div>
	</div></div> 
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Department</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter department" name="department" id="department" >
	<div id="departmenterror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>services</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter service" name="services"  id="services"  >
	<div id="serviceserror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter quantity" name="quantity" id="quantity" >
		<div id="quantityerror" class="error"></div>
	</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Payee Name</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Payee Name" name="payeename" id="payeename" >
		<div id="payeenameerror" class="error"></div>
	</div></div>

<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Type</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Type" name="type"  id="type">
	<div id="typeerror" class="error"></div>
	</div></div>

	
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Rate</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Rate" name="rate" id="rate">
	<div id="rateerror" class="error"></div>
	</div></div>
	
<div class="form-group row">										
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Mode of payment</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter mode of payment" name="paymentmode" id="paymentmode" >
<div id="paymentmodeerror" class="error"></div>
</div>
</div>


<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Bill Id</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Bill id" name="billid" id="billid" >
	<div id="billiderror" class="error"></div>
	</div>
	</div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Amount</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Amount" name="amount" id="amount">
	<div id="amounterror" class="error"></div>
	</div>
	</div>
		
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Tax</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Tax" name="tax"  id="tax">
	<div id="taxerror" class="error"></div>
	</div>
	</div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Purchase Date</b></label>
     <div class="col-sm-9">
	 <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="purchasedate" id="purchasedate" autocomplete="off"> 
	<div id="purchasedateerror" class="error"></div>
	</div></div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Sell date</b></label>
     <div class="col-sm-9">
	<input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy"  name="selldate" id="selldate" >
	<div id="selldateerror" class="error"></div>
	</div></div>
	
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Description</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder=" Enter Description" name="description"  id="description" >
	<div id="descriptionerror" class="error"></div>
	</div></div>
	
		<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Incharge</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Incharge " name="incharge" id="incharge"  >
	<div id="inchargeerror" class="error"></div>
	</div></div>
	

  
   <div class="border-top">
        <div class="card-body">
            <input  name="submit" type="submit" class="btn btn-success" value="Register">
            </div>
      </div></div>
      </form>
    </div>
					</div>
					</div>
				</div>
<footer class="footer text-center">
                All Rights Reserved by Integra. Designed and Developed by <a href="#">Integra</a>.
            </footer>
            
        </div>
    
<script>
		function validateForm(){ 
var pname=document.getElementById("pname").value ;
var location=document.getElementById("location").value ;  
var pid=document.getElementById("pid").value ;
var department=document.getElementById("department").value ;  
var services=document.getElementById("services").value ; 
var payeename=document.getElementById("payeename").value ;
var type=document.getElementById("type").value ;
var rate=document.getElementById("rate").value ;
var paymentmode=document.getElementById("paymentmode").value ;
var billid=document.getElementById("billid").value ;
var amount=document.getElementById("amount").value ;
var tax=document.getElementById("tax").value ;
var purchasedate=document.getElementById("purchasedate").value ;
var selldate=document.getElementById("selldate").value ;
var quantity=document.getElementById("quantity").value ;
var description=document.getElementById("description").value ;
var incharge=document.getElementById("incharge").value ;
if (pname==null || pname==""){ 
document.getElementById("pnameerror").innerHTML  = "Please enter pname.";
         document.getElementById("pname").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("pname").value)) 
{
        document.getElementById("pnameerror").innerHTML  = "Please Enter letters and numbers.";
        document.getElementById("pname").focus();
        return false;
}
else
{
	document.getElementById("pnameerror").style.display = "none";
}
if (pid==null || pid==""){ 
document.getElementById("piderror").innerHTML  = "Please enter pid.";
         document.getElementById("pid").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("pid").value)) 
{
        document.getElementById("piderror").innerHTML  = "Please Enter letters only.";
        document.getElementById("pid").focus();
        return false;
}
else
{
	document.getElementById("piderror").style.display = "none";
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

if (department==null || department=="")
{ 
document.getElementById("departmenterror").innerHTML  = "Please enter department.";
         document.getElementById("department").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("department").value)) 
{
        document.getElementById("departmenterror").innerHTML  = "Please Enter letters only.";
        document.getElementById("department").focus();
        return false;
}
else
{
	document.getElementById("departmenterror").style.display = "none";
}
if (services==null || services=="")
{ 
document.getElementById("serviceserror").innerHTML  = "Please enter services id.";
         document.getElementById("services").focus();
return false; 
}else
{
	document.getElementById("serviceserror").style.display = "none";
}
if (quantity==null || quantity=="")
{ 
document.getElementById("quantityerror").innerHTML  = "Please enter quantity.";
         document.getElementById("quantity").focus();
return false; 
}else
{
	document.getElementById("quantityerror").style.display = "none";
}
if (payeename==null || payeename==""){ 
document.getElementById("payeenameerror").innerHTML  = "Please enter payeename name.";
         document.getElementById("payeename").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("payeename").value)) 
{
        document.getElementById("payeenameerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("payeename").focus();
        return false;
}else
{
	document.getElementById("payeenameerror").style.display = "none";
}

if (type==null || type=="")
{ 
document.getElementById("typeerror").innerHTML  = "Please enter type";
         document.getElementById("type").focus();
return false; 
}else
{
	document.getElementById("typeerror").style.display = "none";
}
if (rate==null || rate=="")
{ 
document.getElementById("rateerror").innerHTML  = "Please enter rate time";
         document.getElementById("rate").focus();
return false; 
}else
{
	document.getElementById("rateerror").style.display = "none";
}

if (paymentmode==null || paymentmode=="")
{ 
document.getElementById("paymentmodeerror").innerHTML  = "Please enter paymentmode time";
         document.getElementById("paymentmode").focus();
return false; 
}else
{
	document.getElementById("paymentmodeerror").style.display = "none";
}
if (billid==null || billid==""){ 
document.getElementById("billiderror").innerHTML  = "Please enter billid ";
         document.getElementById("billid").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("billid").value)) 
{
        document.getElementById("billiderror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("billid").focus();
        return false;
}else
{
	document.getElementById("billiderror").style.display = "none";
}
if (amount==null || amount==""){ 
document.getElementById("amounterror").innerHTML  = "Please enter amount";
         document.getElementById("amount").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("amount").value)) 
{
        document.getElementById("amounterror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("amount").focus();
        return false;
}else
{
	document.getElementById("amounterror").style.display = "none";
}
if (tax==null || tax==""){ 
document.getElementById("taxerror").innerHTML  = "Please enter tax";
         document.getElementById("tax").focus();
return false; 
}else
{
	document.getElementById("taxerror").style.display = "none";
}
if (purchasedate==null ||purchasedate=="")
{ 
document.getElementById("purchasedateerror").innerHTML  = "Please enter purchase date";
         document.getElementById("purchasedate").focus();
return false; 
}else
{
	document.getElementById("purchasedateerror").style.display = "none";
}

if (selldate==null || selldate==""){ 
document.getElementById("selldateerror").innerHTML  = "Please enter selldate";
         document.getElementById("selldate").focus();
return false; 
}else
{
	document.getElementById("selldateerror").style.display = "none";
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
