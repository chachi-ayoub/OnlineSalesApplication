<?php include ( "../inc/connect.inc.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
	header("location: login.php");
	$user = "";
}
else {
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($con,"SELECT * FROM admin WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$utype_db=$get_user_email['type'];
}
$search_value = "";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ayoub shop</title>
		<link rel="icon" href="../image/logo.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="/js/homeslideshow.js"></script>
	</head>
	<body style="background-image: url(../image/bk.jpg); background-position: center center; background-repeat: no-repeat;   background-size: cover; ">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="signin.php">SIGN IN</a>';
						}
					 ?>

				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="update_admin.php">Hi '.$uname_db.'</br><span style="color: #010a0e"></span></a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
						}

					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 70px; margin-top:2px;" src="../image/logo.png">
				</a>
			</div>

		</div>
		<nav>
	  <ul>
	    <li>
	      <a href="index.php">Home</a>
	    </li>
	    <li>
	      <a href="allproducts.php">All Products</a>
	    </li>
	    <li>
	      <a href="addproduct.php">Add Product</a>
	    </li>
	    <li>
	      <a href="orders.php">Orders</a>
	    </li>
	    <?php
						if($utype_db == 'admin'){
							echo '<li><a href="report.php">Reports</a></li>
								<li><a href="newadmin.php">New Admin</a></li>';
						}
					?>

	  </ul>
	</nav>


		<div class="home-welcome" style="text-align: center;padding-bottom:20px;font-size: 30px;">
			<div class="home-welcome-text">
				<h1 style="font-size:70px; text-shadow: 4px 3px 4px grey;">Welcome Admin</h1>
				<h2>You have all permissions!</h2>
		</div>

		<center><div>
			<img src="../image/logo.png" alt="" style="width:19%; margin-top:5%">
		</div></center>
	</body>
</html>
