<?php include ( "../inc/connect.inc.php" ); ?>

<?php
ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
}
else {
	header("location: index.php");
}

if (isset($_POST['login'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$user_login = mysqli_real_escape_string($con,$_POST['email']);
		$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
		$password_login = mysqli_real_escape_string($con,$_POST['password']);
		$num = 0;
		$result = mysqli_query($con,"SELECT * FROM admin WHERE (email='$user_login') AND password='$password_login'");
		$num = mysqli_num_rows($result);
		$get_user_email = mysqli_fetch_assoc($result);
			$get_user_uname_db = $get_user_email['id'];
		if ($num>0) {
			$_SESSION['admin_login'] = $get_user_uname_db;
			setcookie('admin_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
			header('location: index.php');
			exit();
		}
		else {
			$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Username or Password incorrect.<br>
				</font></div>';

		}
	}

}

$search_value = "";

?>

<!doctype html>
<html>
	<head>
		<title>ayoub shop</title>

		<link rel="icon" href="../image/logo.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body class="home-welcome-text" style="background-color:#1b7899;">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
							echo '<a style="text-decoration: none; color: #fff;" href="../login.php">USER LOG IN</a>';
					 ?>

				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="../index.php">
					<img style=" height: 70px; margin-top:2px;" src="../image/logo.png">
				</a>
			</div>
		</div>
		<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 110px;">
			<div class="container" style="background-color: white;opacity: 0.6;border-radius: 10px;">
				<div>
					<div>
						<div class="signupform_content">
							<h2>Admin Login</h2>
							<div class="signupform_text"></div>
							<div>
								<form action="" method="POST" class="registration">
									<div class="signup_form">
										<div>
											<td>
												<input name="email" placeholder="Enter Your Email" required="required" class="email signupbox" type="email" size="30" value="">
											</td>
										</div>
										<div>
											<td>
												<input name="password" id="password-1" required="required"  placeholder="Enter Password" class="password signupbox " type="password" size="30" value="">
											</td>
										</div>
										<div>
											<input name="login" class="uisignupbutton signupbutton" type="submit" value="Log In">
										</div>
										<div class="signup_error_msg">
											<?php
												if (isset($error_message)) {echo $error_message;}

											?>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
