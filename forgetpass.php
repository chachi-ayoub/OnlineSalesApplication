<!DOCTYPE html>
<html>
<head>
	<title>Password Recover</title>
	<link rel="icon" href="image/title.png" type="image/x-icon">
	<meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body class="home-welcome-text" style="background-color:#1b7899;">
	<div>
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<a style="text-decoration: none; color:black;" href="signin.php">SIGN UP</a>
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<a style="text-decoration: none; color:black;" href="login.php">LOG IN</a>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 70px; margin-top:2px;" src="image/logo.png">
				</a>
			</div>
		</div>
	</div>
	<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 110px;">
		<div class="container">
			<div>
				<div>
					<div class="signupform_content">
						<h2>Find Account!</h2>
						<div class="signupform_text"></div>
						<div>
							<form action="" method="POST" class="registration">
								<div class="signup_form">
									<div>
										<td>
											<input type="text" name="username" class="email signupbox" placeholder="Write  Email..." size="30" required autofocus>
										</td>
									</div>
									<div>
										<input class="uisignupbutton signupbutton" type="submit" name="searchId" id="senddata" value="Search">
									</div>
									<div class="signup_error_msg">
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
