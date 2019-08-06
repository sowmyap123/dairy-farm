<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_GET['fdate']))
{
	$reslt = mysqli_query($conn,"SELECT * from employeeattend where (date BETWEEN '".$_GET['fdate']."' AND '".$_GET['tdate']."') and location='".$_GET['location']."' ");
$count = mysqli_num_rows($reslt);
}
include("index.php"); 

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

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
                        <h3 class="page-title">Reports</h3>
						</div>
						</div>
						</div>
  <div class="container-fluid">
<div class="row">
                    <div class="col-md-8">
                        
 <div class="card-body">
<a class="btn btn-primary" href="reportsuppliers.php">Suppliers</a>
<a class="btn btn-primary" href="reportmilk.php">milk</a>
<a class="btn btn-primary" href="reportemployee.php">employee</a>
<a class="btn btn-primary" href="reportsales.php">sales</a>
<a class="btn btn-primary" href="reportcattle.php">Cattle</a>
<a class="btn btn-primary" href="reportstock.php">Stock</a>
<a class="btn btn-primary" href="reportsissuse.php">Issuse</a>
</div>


<div class="row">
                    <div class="col-md-12">
                        <div class="card">
	<h4>employee Report</h4>
	
<form action="" method="get" enctype="multipart/form-data" onsubmit="return validateForm()" autocomplete="off">
  <div class="card-body">
  <div class="card">
  
<div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" class="form-control" type="text" placeholder="Enter location" id="location" name="location" >
	 <div id="locationerror" class="error"></div>
	</div></div>
  
  <div class="form-group row">
  
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>From Date</b></label>
	 <div class="col-sm-9">
   <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="fdate" id="fdate" >
    <div id="fdateerror" class="error"></div>
	</div></div>
	
<div class="form-group row">
  
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>To Date</b></label>
	 <div class="col-sm-9">
   <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="tdate" id="tdate"  >
    <div id="tdateerror" class="error"></div>
	</div></div>
	
	 <div class="card-body">
	    <input type="submit" class="btn btn-success" name="submit" value="Register" >
		</div>

</div>
</div>
</form>  
<?php
if (strpos($url,'fdate') !== false) {



if(mysqli_num_rows($reslt)>0)
		{
		
		?>
		<h4>Attendence History</h4>
		<table border=1>
			<tr>
				<th>Id</th>
				<th>Employee Id</th>
				<th>Name</th>
				<th>No of days present</th>
				<th>date</th>
			</tr>
		
			<?php 
				$i = 1;
			while($row=mysqli_fetch_array($reslt))
			{
			
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['eid']?></td>
						<td><?php echo $row['name']?></td>
						<td><?php echo $count;?></td>
						<td><?php echo $row['date'];?></td>
						
						
						
					</tr>
				<?php
			}
			?>
			
		</table>
		<?php
		}
		else
		{
			?>
				<p>Sorry! No Records Found</p>
			<?php
		}
}
		?>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
		function validateForm(){ 
var location=document.getElementById("location").value ;
var fdate=document.getElementById("fdate").value ;
var tdate=document.getElementById("tdate").value ; 

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
if (fdate==null || fdate==""){ 
document.getElementById("fdateerror").innerHTML  = "Please enter from date.";
         document.getElementById("fdate").focus();
return false; 
}else
{
	document.getElementById("fdateerror").style.display = "none";
}

if (tdate==null || tdate==""){ 
document.getElementById("tdateerror").innerHTML  = "Please enter to date.";
         document.getElementById("tdate").focus();
return false; 
}else
{
	document.getElementById("tdateerror").style.display = "none";
}
		}
</script>

 