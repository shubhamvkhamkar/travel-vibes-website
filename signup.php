<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
header('location:thankyou.php');
}
}
?>
<!--Javascript for check email availabilty-->
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>signup page</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
<h1 style="text-align: center; background-color: yellow;">Sign Up </h1>

<br><br><br>

					
							<section>
								
											<div class="login-left">
												<ul>
													<li><a class="fb" href="#"><i></i>Facebook</a></li>
													<li><a class="goog" href="#"><i></i>Google</a></li>
													
												</ul>
											</div>
											<div class="login-right">
												<form name="signup" method="post" action="thankyou.php">
													<h3>Create your account </h3>
													<br>
					
Name:
				<input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="">
				Mobile Number:
				<input type="text" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="">
				E-mail-Id :
		<input type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	

		 <span id="user-availability-status" style="font-size:12px;"></span> 
		Password: 
	<input type="password" value="" placeholder="Password" name="password" required="">	
													<input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
												</form>
													<center>
										<span ><a href="../tms/index.php" style="color: blue; text-decoration: underline; font-size: 25px; text-align: center;">Back to home </a></span>
									</center>
											</div>
																			
										
								</div>
							</section>
					</div>
				</div>
			</div>
		</body>
			</html>