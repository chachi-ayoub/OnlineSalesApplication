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

?>


<!doctype html>
<html>
	<head>
		<title>ayoub shop</title>
		<link rel="icon" href="../image/logo.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body class="home-welcome-text"  style="background-color:#1b7899;" >
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>

				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">Hi '.$uname_db.'</br><span style="color: #de2a74"></span></a>';
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
		<div style="margin-top: 20px;">
			<div style="width: 1200px; margin: 0 auto;">

				<ul>
					<li style="float: left; margin-top:10%; ">
						<div class="settingsleftcontent">
							<ul>
								<ul>
								<li><?php echo '<a href="report.php" >List Of Products</a>'; ?></li>
								<li><?php echo '<a href="all_customer.php" style=" background-color: #1b7860; border-radius: 4px; color: #fff;">All Customers</a>'; ?></li>
								<li><?php echo '<a href="sales_report.php" >Sales Reports</a>'; ?></li>
							</ul>
							</ul>
						</div>
					</li>
					<li style="float: right;; margin-right:70px; margin-top:5%;">
						<div>
							<table class="rightsidemenu" style="width:90px;">
								<tr style="font-weight: bold;" colspan="10" bgcolor="grey">
									<th>Id</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Address</th>
									<th>Activation</th>
								</tr>
								<tr>
									<?php include ( "../inc/connect.inc.php");
									$query = "SELECT * FROM user ORDER BY id DESC";
									$run = mysqli_query($con,$query);
									while ($row=mysqli_fetch_assoc($run)) {
										$id = $row['id'];
										$fname = $row['firstName'];
										$lname = $row['lastName'];
										$email = $row['email'];
										$mobile = $row['mobile'];
										$address = $row['address'];
										$active = $row['activation'];

									 ?>
									<th><?php echo $id; ?></th>
									<th><?php echo $fname; ?></th>
									<th><?php echo $lname; ?></th>
									<th><?php echo $email; ?></th>
									<th><?php echo $mobile; ?></th>
									<th><?php echo $address; ?></th>
									<th><?php echo $active; ?></th>
								</tr>
								<?php } ?>
							</table>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>
