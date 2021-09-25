<?php include("../config/constants.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

</head>
<body>
	<div class="login">
		<h4 class="text-center">Login</h4>

		<?php if(isset($_SESSION['login']))
				{
					echo $_SESSION['login'];
					unset($_SESSION['login']);
				}

				if (isset($_SESSION['no-login-message'])) {
					echo $_SESSION['no-login-message'];
					unset ($_SESSION['no-login-message']);
				}
			?>
			<br> 

		<!-- login Form start-->

		<form action="" method="POST" class="text-center">
			
			Username:- <br>
			<input type="text" name="username" placeholder="Enter Username" required> <br><br>

			Password:-<br>
			<input type="password" name="password" placeholder="Enter Password" required><br><br>

			<input type="submit" name="submit" value="Login" class="btn-primary"><br><br>

		</form>



		<!-- login Form End -->

		<p class="text-center">Created By:- <a href="https://www.linkedin.com/in/shubhamkhapra-">SK</a></p>
	</div>
</body>
</html>


<?php

	if(isset($_POST['submit'])) : ?>
		<?php	{
				// process for login
				// $username = $_POST['username'];
				$username = mysqli_real_escape_string($conn, $_POST['username']);

				$Rawpassword = md5($_POST['password']);
				$password = mysqli_real_escape_string($conn ,$Rawpassword);

				//Sql check the user with username and password exist or not
				$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
				$res = mysqli_query($conn, $sql);

				$count = mysqli_num_rows($res);

				if($count==1)
					{
						$_SESSION['login']="<div class='success'> Login Successful. </div>";
						$_SESSION['user']= $username;  //check the user is login or not and logout will unset 


						header("location:".$SITEURl.'admin/');
						
					}else
						{
							$_SESSION['login']="<div class='error text-center'> username and password did not match </div>";
							header("location:".$SITEURl.'admin/login.php');
						}

			} 
			?>
			

 <?php endif ; ?>
