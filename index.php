<?php include ( "inc/connect.inc.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$lname_db = $get_user_email['lastName'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Music Instruments Store</title>
		<link rel="icon" href="image/logo.png" type="image/x-icon">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body style="min-width: 980px; background-image: url(image/bk.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
		<div class="homepageheader" style="position: relative;">
			<div class="signinButton loginButton">

				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="color: #fff; text-decoration: none;" href="signin.php">SIGN UP</a>';
						}
					 ?>
				</div>


				<div class="uiloginbutton signinButton loginButton" >
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">MY OPERATIONS</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">USER LOG IN</a>';
						}
					 ?>
				</div>





				<?php
				if ($user!="") {
				echo '<div class="uiloginbutton signinButton loginButton back-button" >';
							echo '<a style="text-decoration: none; color: black;" href="addproduct.php">ADD PRODUCT</a>';
				echo '</div>';}
				?>



				<?php
				if (!$user) {
				echo '<div class="uiloginbutton signinButton loginButton back-button" >';
							echo '<a style="text-decoration: none; color: black;" href="admin/logout.php">ADMIN LOG IN</a>';
				echo '</div>';}
				?>
			</div>


			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 70px; margin-top:2px;" src="image/logo.png">
				</a>
			</div>
		</div>


		<div class="home-welcome">
			<?php
				if ($user!="") {
					echo "<div class='home-welcome-text' >";
					echo'<h1 class="title" style="margin: 0px;color:black;font-family: tahoma;text-shadow: 4px 3px 4px grey;font-size:50px;font-family: tahoma;">Hi '.$uname_db.' '.$lname_db.'</h1>';
					echo "</div>";
					echo "<center><div>";
						echo '<img src="image/logo.png" alt="" style="width:15%; margin-top:2%;">';
						echo'<h1 class="title" style="margin: 0px;color:black;font-family: tahoma;text-shadow: 4px 3px 4px grey;font-size:50px;font-family: tahoma;">ayoub shop<br>for music instruments</h1>';
					echo "</div></center>";

				}
			 ?>
			<div class="home-welcome-text"">
					<?php
						if (!$user) {
							echo "<center><div>";
								echo '<img src="image/logo.png" alt="" style="width:23%; margin-top:2%; margin-bottom:2%;">';
								echo'<h1 class="title" style="margin: 0px;color:black;font-family: tahoma;text-shadow: 4px 3px 4px grey;font-size:50px;font-family: tahoma;">ayoub shop<br>for music instruments</h1>';
							echo "</div></center>";
						}
					 ?>
			</div>
		</div>
		<hr><hr>
		<nav>
	  <ul>
	    <li>
	      <a href="OurProducts/guitars.php">Guitars</a>
	    </li>
	    <li>
	      <a href="OurProducts/flutes.php">Flutes</a>
	    </li>
	    <li>
	      <a href="OurProducts/saxophones.php">Saxophones</a>
	    </li>
	    <li>
	      <a href="OurProducts/pianos.php">Pianos</a>
	    </li>
	  </ul>
	</nav>
		<div style="margin-left:75px" class="home-prodlist" >

			<div style="width: 100%; text-align: center; ">
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img">
							<a href="OurProducts/guitars.php">
								<img src="./image/product/guitars/guitars.jpg" class="home-prodlist-imgi" >
							</a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="OurProducts/flutes.php">
							<img src="./image/product/flutes/flutes.jpg" class="home-prodlist-imgi">
							</a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="OurProducts/saxophones.php">
							<img src="./image/product/saxophones/saxophones.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="OurProducts/pianos.php">
							<img src="./image/product/pianos/pianos.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div >
      <div class="wrapper">
        <h1>Ayoub Shop Store</h1>
          <div class="copyright">Copyright © 2020. Tous droits reserves.</div>
			</div>
	</body>
</html>
