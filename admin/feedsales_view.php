<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php");
 $conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['feedname']))
{
	header("location:dashboard.php");
}
if(isset($_GET['feedname']))
{
	$reslt = mysqli_query($conn,"SELECT * from feedsales where (feedname ='".$_GET['feedname']."' AND location like '%".$_GET['location']."%' )");
	$count=mysqli_num_rows($reslt);
}
?>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">sales feed</h4>
                        
                    </div>
                </div>
            </div>
            
       <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
						<?php if($count == 0)
				{ ?>
				<div class="col-group">
					<h3> No results Found oF <?php echo $_GET['feedname']; ?></h3>
				</div>
				 <?php
				 } else
				 {?>
			 <?php
				$getrows=mysqli_fetch_array($reslt);
				
			?>
			
			 
 <div class="form-group row">
			<label class="col-sm-3 text-right control-label col-form-label" for="email"><b>location :</b></label>
   <div class="col-sm-9 col-form-label"><?php echo $getrows['location'];?></div></div>
	
 
 <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>feed name:</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['feedname'];?></div></div>
	
 
 <div class="form-group row">
 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>date :</b></label>
    <div class="col-sm-9 col-form-label"><?php echo $getrows['date'];?></div></div>
	


	

	 <div class="form-group row">
<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity :</b></label>
	   <div class="col-sm-9 col-form-label"><?php echo $getrows['Quantity'];?></div></div>
	

	 <div class="form-group row">										
<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description :</b></label>
    <div class="col-sm-9 col-form-label"><?php echo $getrows['description'];?></div></div>
	


  
  
    <div class="form-group row">
<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['incharge'];?></div></div>
	
<div class="card-body">
<a class="btn btn-primary" href="cattleweight_edit.php?cid=<?php echo $getrows['cid'];?>">Update</a>
<a class="btn btn-primary" href="cattleweight_delete.php?cid=<?php echo $getrows['cid'];?>">Delete</a>
			<?php
				
}
			?>
			</div>
			</div>
                    </div>
                </div>
            </div>
			</div>
			