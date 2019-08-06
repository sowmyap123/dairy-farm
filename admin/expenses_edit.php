<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['pid']))
{
	header("location:dashboard.php");
}
$reslt = mysqli_query($conn,"SELECT * from expenses where pid ='".$_GET['pid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$pid = $_POST['pid'];
		$breed = $_POST['Department'];
		$feed = $_POST['Rate'];
		$extraquantity = $_POST['Amount'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];
		$reslt = mysqli_query($conn,"update `expenses` set  `Department`='".$Department ."', `Rate`='".$Rate ."', `Amount`='".$extraquantity ."', `description`='".$Amount ."', 'incharge'='".$incharge."' where pid ='".$_GET['pid']."'  ");
		header("location:expenses_view.php?location=$location&cattleid=$pid");
	}
	include("index.php");  
?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">expenses</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
       <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
            <div class="row">
                    <div class="col-md-6">
                        <div class="card">

<form action="" method="post">
 <div class="card-body">
  
    <input class="form-control" type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input  class="form-control" type="hidden" value="<?php echo $res['pid']  ;?>" name="pid">
	  
	
   <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>department<b></label><br>
		<div class="col-sm-9">
 <input  class="form-control" type="text" value="<?php echo $res['department'];?>" name="department" required>
 </div>
 </div>  <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>rate</b></label><br>
		<div class="col-sm-9">
 <input  class="form-control" type="text" value="<?php echo $res['rate'];?>" name="rate" required>
 </div>
 </div>
    
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>amount</b></label><br>
		<div class="col-sm-9">
 <input  class="form-control" type="text" value="<?php echo $res['amount'];?>" name="amount" required>
 </div>
 </div>
     
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label><br>
		<div class="col-sm-9">
 <input  class="form-control" type="text" value="<?php echo $res['description'];?>" name="description" required>
 </div>
 </div>
     
									
										<div class="form-group row">
										<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge</b></label>
 <div class="col-sm-9">
 <input class="form-control" type="text" value="<?php echo $res['incharge'];?>" name="incharge" required>
	</div>
										</div>									
	
	
	 
        <div class="card-body">
                <input  type="submit" class="btn btn-success" name="submit" value="Update" >
            </div>
       
	
	
	
  </div>
</form>

        </div>
                    </div>
                </div>
            </div>
			</div>
            
