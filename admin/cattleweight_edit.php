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
$reslt = mysqli_query($conn,"SELECT * from cattleweight where cid ='".$_GET['cid']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$cid = $_POST['cid'];
		$length = $_POST['length'];
		$weight = $_POST['weight'];
		$height = $_POST['height'];
		$description = $_POST['description'];
		$status = $_POST['status'];
		$incharge = $_POST['incharge'];
		$reslt = mysqli_query($conn,"update `cattleweight` set  `length`='".$length ."', `weight`='".$weight ."', `height`='".$height ."', `description`='".$description ."', `status`='".$status ."',incharge='".$incharge."' where cid ='".$_GET['cid']."'  ");
		header("location:cattleweight_view.php?location=$location&cattleid=$cid&status=update");
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
                        <h4 class="page-title">Cattle weight Info</h4>
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
    <input  class="form-control" type="hidden" value="<?php echo $res['cid']  ;?>" name="cid">
	  
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Length</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['length'];?>" name="length" required>
	</div>
	</div>
   
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>weight</b></label>
	<div class="col-sm-9">
    <input  class="form-control" type="text" value="<?php echo $res['weight'];?>" name="weight" required>
	</div>
	</div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>height</b></label><br>
	<div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['height'];?>" name="height" required>
	</div>
</div>

	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label><br>
		<div class="col-sm-9">
 <input  class="form-control" type="text" value="<?php echo $res['description'];?>" name="description" required>
 </div>
 </div>
								<div class="form-group row">
										<label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Status</b></label><br>
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
            
