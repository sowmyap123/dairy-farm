<?php
//ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php"); 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['cattleid']))
{

}
if(isset($_GET['cattleid']))
{
	$reslt = mysqli_query($conn,"SELECT * from cattlefood where (cid ='".$_GET['cattleid']."' OR location like '%".$_GET['location']."%' )");
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
                        <h4 class="page-title">Cattle Food info</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

	
	<form action="cattlefood_view.php" method="get">
 <div class="card-body">
<div class="serchone">
<input placeholder="Location" type="text" name="location">

	
	<input placeholder="Cattle Id" type="text" name="cattleid">

	<input class="btn btn-success" type="submit" value="search"><h3 style="float:right;" > <a class="arro" href="dashboard.php"><i style="color:#A9A9A9" class="mdi mdi-arrow-left-bold-circle-outline"></i></a></h3>
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

<?php if(isset($_GET['status']) && $_GET['status'] == 'update') { ?>
<div class="col-group"><h5> Cattle Food has updated succesfully!</h5></div>
<?php } ?>
<?php if($count == 0)
				{ ?>
				<div class="col-group">
					<h3> No results Found oF <?php echo $_GET['cattleid']; ?></h3>
				</div>
				 <?php
				 } else
				 {?>
			 <?php
				$getrows=mysqli_fetch_array($reslt);
				
			?>
			
			<div class="form-group row">
			<label class="col-sm-3 text-right control-label col-form-label" for="email"><b>location :</b></label>
   <div class="col-sm-9 col-form-label"><?php echo $getrows['location'];?></div>
			</div>

    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Cattle Id :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['cid'];?></div>
			</div>


    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed :</b></label>
    <div class="col-sm-9 col-form-label"><?php echo $getrows['breed'];?></div>
			</div>

	
    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Sex :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['sex'];?></div>
			</div>

	
	 <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label"  for="psw-repeat"><b>Feed Name :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['feed'];?></div>
			</div>

		 <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Quantity :</b></label>

     <div class="col-sm-9 col-form-label"><?php echo $getrows['quantity'];?></div>
			</div>


	
    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Extra Supplementary:</b></label>
   <div class="col-sm-9 col-form-label"><?php echo $getrows['supplementary'];?></div>
			</div>


	  <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Extra Quantity :</b></label>
	   <div class="col-sm-9 col-form-label"><?php echo $getrows['extraquantity'];?></div>
			</div>

										
    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Repetiton :</b></label>
    <div class="col-sm-9 col-form-label"><?php echo $getrows['repetiton'];?></div>
			</div>


    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Start Time :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['start'];?></div>
			</div>


    <div class="form-group row"><label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>End Time :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['end'];?></div>
			</div>


    <div class="form-group row"><label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>shift start time:</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['shiftstart'];?></div>
			</div>


    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>shift end time:</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['shiftend'];?></div>
			</div>


    <div class="form-group row"><label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>description :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['description'];?></div>
			</div>


    <div class="form-group row"><label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>incharge :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['incharge'];?></div>
			</div>

	
	 <div class="card-body">	
<a class="btn btn-primary" href="cattlefood_edit.php?cid=<?php echo $getrows['cid'];?>">Update</a>
<a  class="btn btn-primary" href="cattlefood_delete.php?cid=<?php echo $getrows['cid'];?>">Delete</a>
</div>
			<?php
				
				 }
			?>
			</div>
			</div>
			</div>
			</div>
			<footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="#">Integra</a>.
            </footer>