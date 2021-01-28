<?php
session_start();
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>sign In page</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
<h1 style="text-align: center; background-color: yellow;" >Sign In </h1>
<br><br><br>

											<div class="login-left">
												<ul>
													<li><a class="fb" href="#"><i></i>Facebook</a></li>
													<li><a class="goog" href="#"><i></i>Google</a></li>
													
												</ul>
											</div>
									<div class="login-right">
										<form method="post" action="package-list.php">
											<h3>Signin with your account </h3>
<br><br>
											E-mail Id:
	<input type="text" name="email" id="email" placeholder="Enter your Email"  required="">	
	<br><br>
	Password :
	<input type="password" name="password" id="password" placeholder="Password" value="" required="">	
											<h4><a href="forgot-password.php">Forgot password</a></h4>
											
											<input type="submit" name="signin" value="SIGNIN">
										</form>
										<br><br><br>
										<center>
										<span ><a href="../tms/index.php" style="color: blue; text-decoration: underline; font-size: 25px; text-align: center;">Back to home </a></span>
									</center>
									</div>
															
								</div>
								
						</div>
					</div>
				</div>
			</div>
			
</body>
</html>