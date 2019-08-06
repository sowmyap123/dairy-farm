<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['cid']))
{
	header("location:dashboard.php");
}
$reslt = mysqli_query($conn,"SELECT * from cattlestage where cid ='".$_GET['cid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$cid = $_POST['cid'];
		
		$stage = $_POST['stage'];
		
		$reslt = mysqli_query($conn,"update `cattlestage` set  `stage`='".$stage ."' where cid ='".$_GET['cid']."'  ");
		header("location:cattlestage_view.php?location=$location&cattleid=$cid&status=update");
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
                        <h4 class="page-title">Cattle Stage</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

	
	<form action="cattlestage_view.php" method="get">
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
						
<form action="" method="post">
  <div class="card-body">
    <input type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input type="hidden" value="<?php echo $res['cid']  ;?>" name="cid">
	  
	
    
  
	<label for="psw-repeat"><b>stage</b></label><br>
	<select  class="select2 form-control custom-select" name="stage" value="" >
										<option <?php if($res['stage']=="milk + empty") echo 'selected="selected"'; ?>>
										milk + empty
										</option>
										<option <?php if($res['stage']=="dry + pregnant") echo 'selected="selected"'; ?>>
										dry + pregnant
										</option>
										<option <?php if($res['stage']=="milk + pregnant") echo 'selected="selected"'; ?>>
										milk + pregnant
										</option>
										<option <?php if($res['stage']=="dry + empty") echo 'selected="selected"'; ?>>
										dry + empty
										</option>
										<option <?php if($res['stage']=="calf") echo 'selected="selected"'; ?>>
										calf
										</option>
										<option <?php if($res['stage']=="heifer") echo 'selected="selected"'; ?>>
										heifer
										</option>
										<option <?php if($res['stage']=="heifer + pregnant") echo 'selected="selected"'; ?>>
										heifer + pregnant
										</option>
										<option <?php if($res['stage']=="young bull") echo 'selected="selected"'; ?>>
										young bull
										</option>
										<option <?php if($res['stage']=="active bull") echo 'selected="selected"'; ?>>
										active bull
										</option>
										<option <?php if($res['stage']=="inactive bull") echo 'selected="selected"'; ?>>
										inactive bull
										</option>
										</select>
	
										
    <input type="submit" class="btn btn-success" name="submit" value="Update" >
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
