<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['pid']))
{
	header("location:dashboard.php");
}
if(isset($_GET['pid']))
{
	$reslt = mysqli_query($conn,"SELECT * from expenses where (pid ='".$_GET['pid']."' AND location like '%".$_GET['location']."%' )");
	$count=mysqli_num_rows($reslt);
}
?>
<div class="page-wrapper">
            
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Expenses Info</h4>
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
					<h3> No results Found oF <?php echo $_GET['productid']; ?></h3>
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
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Product Name :</b>
    </label><div class="col-sm-9 col-form-label"><?php echo $getrows['pname'];?></div></div>

<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Product Id :</b>
    </label><div class="col-sm-9 col-form-label"><?php echo $getrows['pid'];?></div></div>

<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Services :</b>
    </label><div class="col-sm-9 col-form-label"><?php echo $getrows['services'];?></div></div>

<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Department :</b>
    </label><div class="col-sm-9 col-form-label"><?php echo $getrows['department'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Quantity :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['quantity'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Payee Name :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['payeename'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Type :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['type'];?></div></div>
<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Rate :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['rate'];?></div></div>


<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Mode oF payment :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['paymentmode'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Bill Id :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['billid'];?></div></div>


<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Amount :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['amount'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Tax :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['tax'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Purchase Date :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['purchasedate'];?></div></div>

<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Sell Date :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['selldate'];?></div></div>


	<div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Description :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['description'];?></div></div>
  <div class="form-group row">
    <label  class="col-sm-3 text-right control-label col-form-label"for="psw-repeat"><b>Incharge :</b>
     </label><div class="col-sm-9 col-form-label"><?php echo $getrows['incharge'];?></div></div>
  <div class="card-body">
<a class="btn btn-primary" href="expenses_edit.php?pid=<?php echo $getrows['pid'];?>">Update</a>
<a class="btn btn-primary" href="expenses_delete.php?pid=<?php echo $getrows['pid'];?>">Delete</a>
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
	
	