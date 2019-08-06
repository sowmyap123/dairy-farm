<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['milk']))
{
	header("location:dashboard.php");
}
if(isset($_GET['milk']))
{
	$reslt = mysqli_query($conn,"SELECT * from stockmilk where (milk ='".$_GET['milk']."' AND location like '%".$_GET['location']."%' )");
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
                        <h4 class="page-title">Stock Milk Info</h4>
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
					<h3> No results Found oF <?php echo $_GET['milk']; ?></h3>
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
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Milk Name :</b>
    </label><div class="col-sm-9 col-form-label"><?php echo $getrows['milk'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>quantity :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['quantity'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>supplementary :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['supplementary'];?></div></div>


	<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Description :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['description'];?></div></div>
  <div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Incharge :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['incharge'];?></div></div>
  
			<?php
				
				 }
			?>
			
                </div>
               
            </div>
	</div>
	

           
            <footer class="footer text-center">
                All Rights Reserved by Integra. Designed and Developed by <a href="#">Integra</a>.
            </footer>
            
        </div>
	</div>
	
	