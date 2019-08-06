<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php"); 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['suppliersname']))
{
	header("location:dashboard.php");
}
if(isset($_GET['suppliersname']))
{
	$reslt = mysqli_query($conn,"SELECT * from suppliersfeeding where (suppliersname ='".$_GET['suppliersname']."' AND location like '%".$_GET['location']."%' )");
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
                        <h4 class="page-title">suppliers feeding</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

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
                    <div class="col-md-12">
                        <div class="card">

<?php if($count == 0)
				{ ?>
				<div class="col-group">
					<h3> No results Found oF <?php echo $_GET['suppliersname']; ?></h3>
				</div>
				 <?php
				 } else
				 {?>
			 <?php
				$getrows=mysqli_fetch_array($reslt);
				
			?>
			 <div class="row">
                    <div class="col-md-6">
			
			 <div class="form-group row">
			<label class="col-sm-3 text-right control-label col-form-label" for="email" class="col-sm-3 text-right control-label col-form-label"><b>location :</b>
			</label><div class="col-sm-9 col-form-label"><?php echo $getrows['location'];?></div></div>

	<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Date :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['Date'];?></div></div>


	<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Supplier Name
 :</b>
    </label><div class="col-sm-9 col-form-label"><?php echo $getrows['Supplier Name
'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Department :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['Department'];?></div></div>

	<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Location :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['Location'];?></div></div>
	 
  <div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Quantity :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['Quantity'];?></div></div>
                         <div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>status :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['status'];?></div></div>
                         <div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Remarks :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['Remarks'];?></div></div>
                        
  <div class="card-body">
<a class="btn btn-primary" href="milkproduction_edit.php?breed=<?php echo $getrows['breed'];?>">Update</a>
<a class="btn btn-primary" href="milkproduction_delete.php?breed=<?php echo $getrows['breed'];?>">Delete</a>

			<?php
				
				 }
			?>
                        </div>
                </div>
               
            </div>
	</div>
	

           
            <footer class="footer text-center">
                All Rights Reserved by Integra. Designed and Developed by <a href="#">Integra</a>.
            </footer>
            
        </div>
	</div>
	
	