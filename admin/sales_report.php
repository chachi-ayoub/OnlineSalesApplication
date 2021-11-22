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
			if($utype_db == 'staff'){
				header("location: login.php");
			}
}

?>


<!doctype html>
<html>
	<head>
		<title>ayoub shop</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="icon" href="../image/logo.png" type="image/x-icon">
	</head>
	<body class="home-welcome-text"  style="background-color:#1b7899;">
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
								<li><?php echo '<a href="all_customer.php" >All Customers</a>'; ?></li>
								<li><?php echo '<a href="sales_report.php" style=" background-color: #1b7860; border-radius: 4px; color: #fff;">Sales Reports</a>'; ?></li>
							</ul>
							</ul>
						</div>
					</li>
					<li style="float: right; margin-right:300px; margin-top:5%;">
						<div>
							<table class="rightsidemenu">
								<tr style="font-weight: bold;" colspan="10" bgcolor="grey">
									<th>Customer Id</th>
									<th>Customer Name</th>
									<th>Payment</th>
								</tr>
								<tr>
									<?php include ( "../inc/connect.inc.php");
									$total = 0;
									$query = "SELECT * FROM orders WHERE dstatus='yes' ORDER BY id DESC";
									$run = mysqli_query($con,$query);
									while ($row=mysqli_fetch_assoc($run)) {
										$uid = $row['uid'];
										$productId = $row['pid'];
										$quantity = $row['quantity'];
										$query1 = "SELECT * FROM user WHERE id='$uid'";
										$run1 = mysqli_query($con,$query1);
										$row1=mysqli_fetch_assoc($run1);
										$FirstName = $row1['firstName'];

										$query2 = "SELECT * FROM products WHERE id='$productId'";
										$run2 = mysqli_query($con,$query2);
										$row2=mysqli_fetch_assoc($run2);
										$pPrice = $row2['price'];
										$payment = $pPrice * $quantity;
										$total+=$payment;
									 ?>
									<th><?php echo $uid; ?></th>
									<th><?php echo $FirstName; ?></th>
									<th><?php echo $payment; ?> DH</th>
								</tr>
								<?php } ?>
								<tr style="font-weight: bold;" colspan="10" bgcolor="grey">
									<th>Total Sales</th>
									<th></th>
									<th><?php echo $total; ?> DH</th>
								</tr>
							</table>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>
