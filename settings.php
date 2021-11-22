<?php include ( "inc/connect.inc.php" ); ?>
<?php

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];
			$upass = $get_user_email['password'];

			$umob_db = $get_user_email['mobile'];
			$uadd_db = $get_user_email['address'];
}

if (isset($_REQUEST['uid'])) {

	$user2 = mysqli_real_escape_string($con,$_REQUEST['uid']);
	if($user != $user2){
		header('location: index.php');
	}
}else {
	header('location: index.php');
}

if (isset($_POST['changesettings'])) {
//declere veriable
$email = $_POST['email'];
$opass = $_POST['opass'];
$npass = $_POST['npass'];
$npass1 = $_POST['npass1'];
//triming name
	try {
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');

		}
			if(isset($opass) && isset($npass) && isset($npass1) && ($opass != "" && $npass != "" && $npass1 != "")){
				if( md5($opass) == $upass){
					if($npass == $npass1){
						$npass = md5($npass);
						mysqli_query($con,"UPDATE user SET password='$npass' WHERE id='$user'");
						$success_message = '
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman">
							Password changed.
						</font></div>';
					}else {
					$success_message = '
						<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
						<font face="bookman">
							New password not matched!
						</font></div>';
					}
				}else {
				$success_message = '
					<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
					<font face="bookman">
						Fillup password field exactly.
					</font></div>';
				}
			}else {
				$success_message = '
					<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
					<font face="bookman">
						Fillup password field exactly.
					</font></div>';
				}

			if($uemail_db != $email) {
				if(mysqli_query($con,"UPDATE user SET  email='$email' WHERE id='$user'")){
					//success message
					$success_message = '
					<div class="signupform_text" style="font-size: 18px; text-align: center;">
					<font face="bookman">
						Settings change successfull.
					</font></div>';
				}
			}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>My Operations</title>
	<link rel="icon" href="image/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#1b7899;">
	<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="signin.php">SIGN IN</a>';
						}
					 ?>

				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 70px; margin-top:2px;" src="image/logo.png">
				</a>
			</div>
			<div class="">

				</div>
			</div>
		</div>
		<?php
		echo '<nav>
	  <ul>
	    <li>
	      <a href="mycart.php?uid='.$user.'">Cart</a>
	    </li>
	    <li>
	      <a href="profile.php?uid='.$user.'">Orders</a>
	    </li>
	    <li>
	      <a href="settings.php?uid='.$user.'">Settings</a>
	    </li>
	  </ul>
	</nav>';
	?>
	<div style="margin-top: 30px;margin-left:250px;" >
		<div style="width: 900px; margin: 0 auto;">

			<ul>
				<li style="">
					<div class="holecontainer" style=" padding-top: 20px; padding: 0 20%" >
						<form action="" method="POST" class="registration">
							<div class="container signupform_content " >
								<div style="font-size: 20px;color: black;margin: 0 0 5px 0;">
									<tr>Change Password:</tr></br>
								</div>
								<div>
									<tr><input class="email signupbox" type="password" name="opass" placeholder="Old Password"></tr></br>
								</div>
								<div>
									<tr><input class="email signupbox" type="password" name="npass" placeholder="New Password"></tr></br>
								</div>
								<div>
									<tr><input class="email signupbox" type="password" name="npass1" placeholder="Repeat Password"></tr></br></br></br></br></br>
								</div>
								<div style="font-size: 20px;color: black;margin: 0 0 5px 0;">
									<tr>Change Email:<br></tr>
								</div>
								<div>
									<tr><?php echo '<input class="email signupbox" required type="email" name="email" placeholder="New Email" value="'.$uemail_db.'">'; ?></tr></br>
								</div>
								<div>
									<tr><input class="uisignupbutton signupbutton" type="submit" name="changesettings" value="Update Settings"></tr></br>
								</div>
								<div>
									<?php if (isset($success_message)) {echo $success_message;} ?>
								</div>
							</div>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>


</body>
</html>
