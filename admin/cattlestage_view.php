<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php");  
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['cattleid']))
{
	header("location:dashboard.php");
}
if(isset($_GET['cattleid']))
{
	$reslt = mysqli_query($conn,"SELECT * from cattlestage where (cid ='".$_GET['cattleid']."' AND location like '%".$_GET['location']."%' )");
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
    <?php if(isset($_GET['status']) && $_GET['status'] == 'update') { ?>
<div class="col-group"><h5> Cattle stage has updated succesfully!</h5></div>
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
   <div class="col-sm-9 col-form-label"><?php echo $getrows['location'];?></div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Cattle Id :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['cid'];?></div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed :</b></label>
    <div class="col-sm-9 col-form-label"><?php echo $getrows['breed'];?></div></div>


	<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Sex :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['sex'];?></div></div>


	 <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Stage :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['stage'];?></div></div>
	

<div class="card-body">
	
<a class="btn btn-primary" href="cattlestage_edit.php?cid=<?php echo $getrows['cid'];?>">Update</a>
<a  class="btn btn-primary" href="cattlestage_delete.php?cid=<?php echo $getrows['cid'];?>">Delete</a>
</div>
			<?php
				
				 }
			?>