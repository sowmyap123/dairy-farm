<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php"); 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['eid']))
{
	header("location:dashboard.php");
}
if(isset($_GET['eid']))
{
	$reslt = mysqli_query($conn,"SELECT * from employee where (employeeid ='".$_GET['eid']."' AND location like '%".$_GET['location']."%' )");
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
                        <h4>Employee Information</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               
                             <form action="employeeprofile_view.php" method="get">
	<div class="card-body">
	<div class="serchone">
	<input type="text" placeholder="Location" name="location">
	<input type="text" placeholder="Employee Id" name="eid">
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">		


<?php if($count == 0)
				{ ?>
				<div class="col-group">
					<h3> No results Found oF <?php echo $_GET['eid']; ?></h3>
				</div>
				 <?php
				 } else
				 {?>
			 <?php
				$getrows=mysqli_fetch_array($reslt);
				
			?>
			<div class="row">
			 <div class="col-md-6">
			  <div class="card">		
	
	<div class="form-group row">
			<label class="col-sm-3 text-right control-label col-form-label" for="email"><b>location :</b></label>
   <div class="col-sm-9 col-form-label"><?php echo $getrows['location'];?></div></div>
   
   
	    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Employee Id :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['employeeid'];?></div></div>

    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Name :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['name'];?></div></div>


	    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Gender :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['gender'];?></div></div>

	    

	    <div class="form-group row">	 
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Date of Birth :</b></label>
    <div class="col-sm-9 col-form-label"><?php echo $getrows['dob'];?></div></div>

	    <div class="form-group row">
	  <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Email :</b></label>
	    <div class="col-sm-9 col-form-label"><?php echo $getrows['email'];?></div></div>

		    <div class="form-group row">									
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Mobile :</b></label>
     <div class="col-sm-9 col-form-label"><?php echo $getrows['mobile'];?></div></div>

    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label"  for="psw-repeat"><b>Addhar No:</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['addar'];?></div></div>

    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Pancard No :</b></label>
       <div class="col-sm-9 col-form-label"><?php echo $getrows['pan'];?></div></div>

    <div class="form-group row">
	<label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Department :</b></label>
       <div class="col-sm-9 col-form-label"><?php echo $getrows['department'];?></div></div>

    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Blood Group :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['bloodgroup'];?></div></div>

	    <div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Address :</b></label>
      <div class="col-sm-9 col-form-label"><?php echo $getrows['address'];?></div></div>

    <div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Joining Date :</b></label>
       <div class="col-sm-9 col-form-label"><?php echo $getrows['joiningdate'];?></div></div>

	    <div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Reference Id :</b></label>
       <div class="col-sm-9 col-form-label"><?php echo $getrows['refid'];?></div></div>
	
  <div class="card-body">
<a class="btn btn-primary" href="employeeprofile_edit.php?eid=<?php echo $getrows['employeeid'];?>">Update</a>
<a class="btn btn-primary" href="employeeprofile_delete.php?eid=<?php echo $getrows['employeeid'];?>">Delete</a>
</div>			<?php
				
				 }
			?>
			</div>
			</div>
			
				 <div class="col-md-6">
				  <div class="card">		
	<div class="form-group row">
	 <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Profile Image :</b></label>
           <div class="col-sm-9 col-form-label">
	 <img src="img/<?php echo $getrows['profilepic'];?>"></div></div>
			
			</div></div></div>
		</div></div></div></div></div>