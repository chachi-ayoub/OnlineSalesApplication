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


<!doctype html>
<html>
	<head>
		<title>ayoub shop</title>
		<link rel="icon" href="../image/logo.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
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
		<div>
			<table class="rightsidemenu">
				<tr style="font-weight: bold;" colspan="10" bgcolor="grey">
					<th>Id</th>
					<th>P Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Piece</th>
					<th>Available</th>
					<th>Item</th>
					<th>image of product</th>
				</tr>
				<tr>
					<?php include ( "../inc/connect.inc.php");
					$query = "SELECT * FROM products ORDER BY id DESC";
					$run = mysqli_query($con,$query);
					while ($row=mysqli_fetch_assoc($run)) {
						$id = $row['id'];
						$pName = substr($row['pName'], 0,50);
						$descri = $row['description'];
						$price = $row['price'];
						$piece=$row['piece'];
						$available = $row['available'];
						$item = $row['item'];
						$picture = $row['picture'];

					 ?>
					<th><?php echo $id; ?></th>
					<th><?php echo $pName; ?></th>
					<th><?php echo $descri; ?></th>
					<th><?php echo $price; ?></th>
					<th><?php echo $piece; ?></th>
					<th><?php echo $available; ?></th>
					<th><?php echo $item; ?></th>
					<th><?php echo '<div class="home-prodlist-img"><a href="editproduct.php?epid='.$id.'">
									<img src="../image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									</a>
								</div>' ?></th>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>
