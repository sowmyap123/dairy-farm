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
	
}
if(isset($_GET['eid']))
{
	$reslt = mysqli_query($conn,"SELECT * from employeeattend where (date BETWEEN '".$_GET['start']."' AND '".$_GET['end']."') ");
    
	$count=mysqli_num_rows($reslt);
}
$diff = (strtotime($_GET['start']) - strtotime($_GET['end']));
$datetime1 = new DateTime($_GET['start']);
$datetime2 = new DateTime($_GET['end']);
$difference = $datetime1->diff($datetime2);
$absent = $difference->d - $count;
?>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Employee Attendence</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">

<form action="employeeattend_view.php" method="get">
<div class="card-body">
	<input  type="text" name="location" placeholder="Location">

	
	<input type="text" name="eid" placeholder="Employee Id">
	
	<input type="text" name="start"  class="datepicker" placeholder="Start Date">
	
	<input type="text" name="end"  class="datepicker"   placeholder="End date">

	<input  class="btn btn-primary"  type="submit" value="search">
	
	<a href="dashboard.php">back</a>
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
                    <div class="col-md-8">
                        <div class="card">



<?php
if(mysqli_num_rows($reslt)>0)
		{
		
		?>
		<h4>Attendence History</h4>
		<table border=1>
			<tr>
				<th>Id</th>
				<th>Employee Id</th>
				<th>Name</th>
				<th>No of days present</th>
				<th>No of days absent</th>
				<th>Total No days</th>
			</tr>
		
			<?php 
				$i = 1;
			$row=mysqli_fetch_array($reslt);
			
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['eid']?></td>
						<td><?php echo $row['name']?></td>
						<td><?php echo $count;?></td>
						<td><?php echo $absent;?></td>
						<td><?php echo $difference->d;;?></td>
						
						
						
					</tr>
				<?php
				
			?>
			
		</table>
		<?php
		}
		else
		{
			?>
				<p>Sorry! No Records Found</p>
			<?php
		}
		?>
		
		 </div>
                    </div>
                </div>
            </div>
			</div>
			