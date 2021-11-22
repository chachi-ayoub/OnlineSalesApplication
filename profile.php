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

$search_value = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Operations</title>
	<link rel="icon" href="image/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" href="image/logo.png" type="image/x-icon">
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
			<div id="srcheader">
			<div class="srcclear"></div>
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
	<div>
		<div style="width: 900px; margin: 0 auto;">

			<ul>

				<li style=" background-color: #fff;">
					<div>
						<div>
							<table class="rightsidemenu">
								<tr style="font-weight: bold;" colspan="10" bgcolor="#3A5487">
									<th>Product Name</th>
									<th>Price</th>
									<th>Total Product</th>
									<th>Order Date</th>
									<th>Delevery Date</th>
									<th>Delevery Place</th>
									<th>Delevery Status</th>
									<th>View</th>
								</tr>
								<tr>
									<?php include ( "inc/connect.inc.php");
									$query = "SELECT * FROM orders WHERE uid='$user' ORDER BY id DESC";
									$run = mysqli_query($con,$query);
									while ($row=mysqli_fetch_assoc($run)) {
										$pid = $row['pid'];
										$quantity = $row['quantity'];
										$oplace = $row['oplace'];
										$mobile = $row['mobile'];
										$odate = $row['odate'];
										$ddate = $row['ddate'];
										$dstatus = $row['dstatus'];

										//get product info
										$query1 = "SELECT * FROM products WHERE id='$pid'";
										$run1 = mysqli_query($con,$query1);
										$row1=mysqli_fetch_assoc($run1);
										$pId = $row1['id'];
										$pName = substr($row1['pName'], 0,50);
										$price = $row1['price'];
										$picture = $row1['picture'];
										$item = $row1['item'];
										$category = $row1['category'];
									 ?>
									<th><?php echo $pName; ?></th>
									<th><?php echo $price; ?></th>
									<th><?php echo $quantity; ?></th>
									<th><?php echo $odate; ?></th>
									<th><?php echo $ddate; ?></th>
									<th><?php echo $oplace; ?></th>
									<th><?php echo $dstatus; ?></th>
									<th><?php echo '<div class="home-prodlist-img"><a href="OurProducts/view_product.php?pid='.$pId.'">
													<img src="image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
													</a>
												</div>' ?></th>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>


</body>
</html>
