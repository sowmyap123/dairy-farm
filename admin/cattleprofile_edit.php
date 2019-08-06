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
$reslt = mysqli_query($conn,"SELECT * from cattleprofile where cid ='".$_GET['cid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$cid = $_POST['cid'];
		$stage = $_POST['stage'];
		$bull = $_POST['bull'];
		$price = $_POST['price'];
		$lactation = $_POST['lactation'];
		$status = $_POST['status'];
		$reslt = mysqli_query($conn,"update `cattleprofile` set  `stage`='".$stage ."', `bullid`='".$bull ."', `price`='".$price ."', `lactation`='".$lactation ."', `status`='".$status ."' where cid ='".$_GET['cid']."'  ");
	header("location:cattleprofile_view.php?location=$location&cattleid=$cid&status=update");
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
                        <h4 class="page-title">Cattle Update</h4>
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
                    <div class="col-md-8">
                        <div class="card">
						<form action="" method="post" autocomplete="off">
						 <div class="card-body">
						 
	<input class="form-control" type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input class="form-control" type="hidden" value="<?php echo $res['cid']  ;?>" name="cid">
	  
	  <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>stages</b></label>
	<div class="col-sm-9">
	<select class="select2 form-control custom-select" name="stage" >
										<option value="stage 1" <?php if($res['stage']=="stage 1") echo 'selected="selected"'; ?>>
										stage 1
										</option>
										<option value="stage 2" <?php if($res['stage']=="stage 2") echo 'selected="selected"'; ?>>
										stage 2
										</option>
										<option value="stage 3" <?php if($res['stage']=="stage 3") echo 'selected="selected"'; ?>>
										stage 3
										</option>
										<option value="stage 4" <?php if($res['stage']=="stage 4") echo 'selected="selected"'; ?>>
										stage 4
										</option>
										</select>
										</div>
									</div>
	<div class="form-group row">										
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Bull Id</b></label>
  <div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['bullid'];?>" name="bull" required>
	</div>
	</div>
	
   <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Price</b></label>
   <div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['price'];?>" name="price" required>
	</div>
	</div>

   <div class="form-group row">
   <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Lactation Date</b></label>
    <div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['lactation'];?>" name="lactation" required>
	</div>
	</div>

 <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Status</b></label><br>
	<div class="col-sm-9">
	<select class="select2 form-control custom-select" name="status">
										<option value="live" <?php if($res['status']=="live") echo 'selected="selected"'; ?>>
										live
										</option>
										<option value="dead" <?php if($res['status']=="dead") echo 'selected="selected"' ;  ?>>
										dead
										</option>
										<option value="sick" <?php if($res['status']=="sick") echo 'selected="selected"' ;  ?>>
										sick
										</option>
										<option value="sold" <?php if($res['status']=="sold") echo 'selected="selected"' ;  ?>>
										sold
										</option>
										<option value="stolen" <?php if($res['status']=="stolen") echo 'selected="selected"' ;  ?>>
										stolen
										</option>
										</select>
										</div>
										</div>
	<div class="border-top">
        <div class="card-body">
            <input  name="submit" type="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
										
    
  </div>
   </div>
</form>
  </div>
    </div>
	  </div>
	  </div>
