<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Forgot  Password</title>
<meta name="description" content=" forgot your rightlaw password,Enter your email address and get reset password link in Your mail adress" />
</head>
<body>

 <div class="header">
 <img src="log.png" />
  	<h2>Forgot Password</h2>
  </div>
<section>	 
<form class="fcls"  method="post">
				
				
					<div class="input-group">
					  <input type="email" class="postinputform"  name="email" id="user_entered_email" placeholder="Enter Registered Email-id"/>
					</div>
					
				<div class="input-group">
				<button type="submit" class="btn" name="forgotpass">Reset my Password</button>
			</div>
			</form>
			</section>
			
			<?php
			if (isset($_POST['forgotpass']))
			{
			$email = $_POST['email'];	
			
			$subject='Forget Password';
			
			$verificationhash='';
			$hasgen=mysqli_query($connection,"select * from register where email='".$email."'");
			if(mysqli_num_rows($hasgen) > 0)
			{
			    $row_hash= mysqli_fetch_array($hasgen);
			    
			}
			$from= FROM_MAIL;
			$to=$row_hash['email'];
			$verificationhash=$row_hash['id'];
			
			
			$message="Dear User,<br><br>Please click the link below to reset your new password. <br/><br/>";
			$message .= "<a href='http://localhost/sample/resetpassword.php?id=$verificationhash'>http://localhost/sample/resetpassword.php?id=$verificationhash</a><br/><br/>";
			$message .= '<b>Team</b><br>';
			$headers =  "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "From: $user_name <$from>\r\n";
			mail($to,$subject,$message,$headers);
			echo $msg;
                        $msg='<span style="color:green;text-align:center;font-size:15px">A Password Reset link has been sent successfully <br> at your registered Email Id</span>';
                      
			}
			?>
	</body>
</html>