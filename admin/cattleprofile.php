<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$cid = $_POST['cid'];
		$breed = $_POST['breed'];
		$sex = $_POST['sex'];
		$birth = $_POST['birth'];
		$stage = $_POST['stage'];
		$bull = $_POST['bull'];
		$mother = $_POST['mother'];
		$color = $_POST['color'];
		$place = $_POST['place'];
		$price = $_POST['price'];
		$purchase = $_POST['purchase'];
		$lactation = $_POST['lactation'];
		$status = $_POST['status'];
		if(is_uploaded_file($_FILES['pimage']['tmp_name']))
		{
			$filename=$_FILES['pimage']['name'];
			$size=$_FILES['pimage']['size'];
			$type=$_FILES['pimage']['type'];
			$tmp=$_FILES['pimage']['tmp_name'];
			$error=$_FILES['pimage']['error'];
			$ext=substr($filename,strpos($filename,"."));
			$str="1234567890abcdefghijklmnopqrstuvwxyz";
			$uq=substr(str_shuffle($str),10,16)."_".time();
					//check file size
					date_default_timezone_set('Asia/Kolkata');
		  // echo $curr_time = time(); echo "<br>";
			$curtime= date('Y-m-d H:i:s');
					if($size<(1024*1024))
					{
						if($ext==".jpg" || $ext==".png" || $ext==".gif" || $ext==".jpeg" )
						{
							if(move_uploaded_file($tmp,"img/".$uq."_".$filename))
							{
									if(is_uploaded_file($_FILES['bimage']['tmp_name']))
				{
					$filename1=$_FILES['bimage']['name'];
					$size1=$_FILES['bimage']['size'];
					$type1=$_FILES['bimage']['type'];
					$tmp1=$_FILES['bimage']['tmp_name'];
					$error1=$_FILES['bimage']['error'];
					$ext1=substr($filename1,strpos($filename1,"."));
					$str="1234567890abcdefghijklmnopqrstuvwxyz";
					$uq1=substr(str_shuffle($str),10,16)."_".time();
					//check file size
					date_default_timezone_set('Asia/Kolkata');
					// echo $curr_time = time(); echo "<br>";
					$curtime= date('Y-m-d H:i:s');
					if($size1<(1024*1024))
					{
						if($ext1==".jpg" || $ext1==".png" || $ext1==".gif" || $ext1==".jpeg" )
						{
							if(move_uploaded_file($tmp1,"img/".$uq1."_".$filename1))
							{
							$reslt = mysqli_query($conn,"INSERT INTO `cattleprofile`(`location`, `cid`, `breed`, `sex`, frontimg,backimg,`birthdate`, `stage`, `bullid`, `motherid`, `color`, `birthplace`, `purchasedate`, `price`, `lactation`, `status`) VALUES ('".$location ."','".$cid ."','".$breed ."','".$sex ."','".$uq."_".$filename."','".$uq1."_".$filename1."','".$birth ."','".$stage ."','".$bull ."','".$mother ."','".$color ."','".$place ."','".$purchase ."','".$price ."','".$lactation ."','".$status ."')");
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cattle Profile has been registered Successfully";
							}
							else
							{
								echo "<p>Sorry Unable to Upload</p>";
							}
						}
						else
						{
							echo "<p>Please Select a valid Image like 
							jpg, png, gif</p>";
						}
					}
					else
					{
						echo "<p>FIle size should below 1MB</p>";
					}
				}
				else
				{
					echo "Please sleect1 a file to upload";
				}
							}
							else
							{
								echo "<p>Sorry Unable to Upload</p>";
							}
						}
						else
						{
							echo "<p>Please Select a valid Image like 
							jpg, png, gif</p>";
						}
					}
					else
					{
						echo "<p>FIle size should below 1MB</p>";
					}
			}
			else
			{
				echo "Please sleect a file to upload";
			}
	}
	?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
<div class="page-wrapper">

          <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Cattle Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
  
  <form action="cattleprofile_view.php" method="get" autocomplete="off">
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
<div class="card">
                    <div class="col-md-8">
   <form  method="post" enctype="multipart/form-data" onsubmit="return validateForm()" action="" autocomplete="off">
  <div class="card-body">
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="email"><b>location</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter location" name="location" id="location">
	 <div id="locationerror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw"><b>Cattle Id</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Cattle Id" name="cid" id="cid">
		 <div id="ciderror" class="error"></div>

	</div></div>
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Breed</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Breed" name="breed" id="breed">
			 <div id="breederror" class="error"></div>

	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Sex</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Sex" name="sex" id="sex" >
	<div id="sexerror" class="error"></div>
	</div></div>

    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Birth Date</b></label>
	 <div class="col-sm-9">
     <input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="birth" id="birth" >
	 <div id="birtherror" class="error"></div>
	</div></div>
<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label"><b>Upload Front Image</b></label>
	 <div class="col-sm-9">
				<input  class="form-control" type="file" name="pimage" id="front" class="form-control">
					<div id="fronterror" class="error"></div>

				 </div>
				
					<label  class="col-sm-3 text-right control-label col-form-label"><b>Upload Back Image</b></label>
					 <div class="col-sm-9">
				<input class="form-control" type="file" name="bimage" id="back" class="form-control">
									<div id="backerror" class="error"></div>

				</div>
	
	</div>
	<div class="form-group row">
	  <label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>stages</b></label>
	   <div class="col-sm-9">
	<select class="select2 form-control custom-select" name="stage" selected="selected" value="" id="stage" >
										<option>
										Select
										</option>
										<option>
										stage 1
										</option>
										<option>
										stage 2
										</option><option>
										stage 3
										</option><option>
										stage 4
										</option>
										</select>
										<div id="stageerror" class="error"></div>
	</div>	
</div>
<div class="form-group row">										
    <label  class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Bull Id</b></label>
	 <div class="col-sm-9">
    <input class="form-control" type="text" placeholder="Enter Bull Id" name="bull" id="bull">
	<div id="bullerror" class="error"></div>
</div>
</div>


<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Mother Id</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Mother Id" name="mother" id="mother" >
	<div id="mothererror" class="error"></div>
	</div>
	</div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Color</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Color" name="color" id="color" >
	<div id="colorerror" class="error"></div>
	</div>
	</div>
	
	
    <div class="form-group row">
	<label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Birth Place</b></label>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Birth Place" name="place"  id="place">
		<div id="placeerror" class="error"></div>
	</div></div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Purchase Date</b></label>
     <div class="col-sm-9">
	<input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="purchase" id="purchase" >
		<div id="purchaseerror" class="error"></div>
	</div></div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Price</b></label><br>
     <div class="col-sm-9">
	<input class="form-control" type="text" placeholder="Enter Price" name="price" id="price" >
		<div id="priceerror" class="error"></div>
	</div></div>
	
	<div class="form-group row">
    <label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Lactation Date</b></label>
     <div class="col-sm-9">
	<input class="form-control datepicker" type="text" placeholder="mm/dd/yyyy" name="lactation" id="lactation" >
	<div id="lactationerror" class="error"></div>
	</div></div>
	
	<div class="form-group row">
	<label for="psw-repeat" class="col-sm-3 text-right control-label col-form-label"><b>Status</b></label>
	<div class="col-sm-9">
	<select name="status" class="select2 form-control custom-select" selected="selected" value="" >
										<option>
										Select
										</option>
										
										<option>
										live
										</option>
										<option>
										dead
										</option>
										<option>
										sick
										</option>
										<option>
										sold
										</option>
										<option>
										stolen
										</option>
										</select>
										
    
  </div>
  </div>

   <div class="border-top">
        <div class="card-body">
            <input  name="submit" type="submit" class="btn btn-success" value="Register">
            </div>
        </div>
		
</form>


			

                </div>
               
            </div>
	</div>
	

           
            <footer class="footer text-center">
                All Rights Reserved by Integra. Designed and Developed by <a href="#">Integra</a>.
            </footer>
            
        </div>
        </div>
		</div>
<script>
		function validateForm(){ 
var location=document.getElementById("location").value ; 
var cid=document.getElementById("cid").value ; 
var breed=document.getElementById("breed").value ;
var sex=document.getElementById("sex").value ;  
var birth=document.getElementById("birth").value ;  
var front=document.getElementById("front").value ;  
var back=document.getElementById("back").value ;  
var bull=document.getElementById("bull").value ; 
var mother=document.getElementById("mother").value ;
var stage=document.getElementById("stage").value ;
var color=document.getElementById("color").value ;
var place=document.getElementById("place").value ;
var purchase=document.getElementById("purchase").value ;
var price=document.getElementById("price").value ;
var lactation=document.getElementById("lactation").value ;

if (stage=="select"){ 
document.getElementById("stageerror").innerHTML  = "Please select stage.";
         document.getElementById("stage").focus();
return false; 
}
if (location==null || location==""){ 
document.getElementById("locationerror").innerHTML  = "Please select your location.";
         document.getElementById("location").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("location").value)) 
{
        document.getElementById("locationerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("location").focus();
        return false;
}
else
{
	document.getElementById("locationerror").style.display = "none";
}

if (cid==null || cid==""){ 
document.getElementById("ciderror").innerHTML  = "Please enter cid.";
        document.getElementById("cid").focus();
		return false; 
}
else if (!/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/g.test(document.getElementById("cid").value)) 
{
        document.getElementById("ciderror").innerHTML  = "Please Enter letters and numbers.";
        document.getElementById("cid").focus();
        return false;
}
else
{
	document.getElementById("ciderror").style.display = "none";
}
if (breed==null || breed==""){ 
document.getElementById("breederror").innerHTML  = "Please enter breed.";
         document.getElementById("breed").focus();
		return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("breed").value)) 
{
        document.getElementById("breederror").innerHTML  = "Please Enter letters only.";
        document.getElementById("breed").focus();
        return false;
}
else
{
	document.getElementById("breederror").style.display = "none";
}
if (sex==null || sex==""){ 
document.getElementById("sexerror").innerHTML  = "Please enter sex.";
         document.getElementById("sex").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("sex").value)) 
{
        document.getElementById("sexerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("sex").focus();
        return false;
}
else
{
	document.getElementById("sexerror").style.display = "none";
}
if (birth==null || birth==""){ 
document.getElementById("birtherror").innerHTML  = "Please enter birth.";
         document.getElementById("birth").focus();
return false; 
}

if (front==null || front==""){ 
document.getElementById("fronterror").innerHTML  = "Please select image.";
         document.getElementById("front").focus();
return false; 
}

else
{
	        var selection = document.getElementById('front');
		
for (var i=0; i<selection.files.length; i++) {
    var ext = selection.files[i].name.substr(-3);
    if(ext== "jpg" || ext== "png" || ext== "gif")  {
       	document.getElementById("fronterror").style.display = "none";

    }
	else
	{
		 document.getElementById("fronterror").innerHTML  = "please select Only jpg.png.gif images";
        return false;
	}
} 
}

if (back==null || back==""){ 
document.getElementById("backerror").innerHTML  = "Please select image.";
         document.getElementById("back").focus();
return false; 
}
else
{
	        var selection = document.getElementById('back');
		
for (var i=0; i<selection.files.length; i++) {
    var ext = selection.files[i].name.substr(-3);
    if(ext== "jpg" || ext== "png" || ext== "gif")  {
       	document.getElementById("backerror").style.display = "none";

    }
	else
	{
		 document.getElementById("backerror").innerHTML  = "please select Only jpg.png.gif images";
        return false;
	}
} 
}

if (bull==null || bull==""){ 
document.getElementById("bullerror").innerHTML  = "Please enter bull id.";
         document.getElementById("bull").focus();
return false; 
}
else if (!/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/g.test(document.getElementById("bull").value)) 
{
        document.getElementById("bullerror").innerHTML  = "Please Enter letters and numbers.";
        document.getElementById("bull").focus();
        return false;
}
else
{
	document.getElementById("bullerror").style.display = "none";
}
if (mother==null || mother==""){ 
document.getElementById("mothererror").innerHTML  = "Please enter mother id.";
         document.getElementById("mother").focus();
return false; 
}
else if (!/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/g.test(document.getElementById("mother").value)) 
{
        document.getElementById("mothererror").innerHTML  = "Please Enter letters and numbers.";
        document.getElementById("mother").focus();
        return false;
}
else
{
	document.getElementById("mothererror").style.display = "none";
}
if (color==null || color==""){ 
document.getElementById("colorerror").innerHTML  = "Please enter color.";
         document.getElementById("color").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("color").value)) 
{
        document.getElementById("colorerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("color").focus();
        return false;
}
else
{
	document.getElementById("colorerror").style.display = "none";
}
if (place==null || place==""){ 
document.getElementById("placeerror").innerHTML  = "Please enter place";
         document.getElementById("place").focus();
return false; 
}
else if (!/^[a-zA-Z]*$/g.test(document.getElementById("place").value)) 
{
        document.getElementById("placeerror").innerHTML  = "Please Enter letters only.";
        document.getElementById("place").focus();
        return false;
}
else
{
	document.getElementById("placeerror").style.display = "none";
}

if (purchase==null || purchase==""){ 
document.getElementById("purchaseerror").innerHTML  = "Please enter purchase.";
         document.getElementById("purchase").focus();
return false;
}
else
{
	document.getElementById("purchaseerror").style.display = "none";
}
if (price==null || price==""){ 
document.getElementById("priceerror").innerHTML  = "Please enter price.";
         document.getElementById("price").focus();
return false; 
}
else if (!/^[0-9]*$/g.test(document.getElementById("price").value)) 
{
        document.getElementById("priceerror").innerHTML  = "Please Enter Numbers only.";
        document.getElementById("price").focus();
        return false;
}
else
{
	document.getElementById("priceerror").style.display = "none";
}
if (lactation==null || lactation==""){ 
document.getElementById("lactationerror").innerHTML  = "Please enter lactation date.";
         document.getElementById("lactation").focus();
return false; 
}else
{
	document.getElementById("lactationerror").style.display = "none";
}

}
</script>


	
	
