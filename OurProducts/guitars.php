<?php include ( "../inc/connect.inc.php" ); ?>
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
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Guitars</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" href="../image/logo.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>


	</style>
</head>
<body style="background-color:#1b7899;">
	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<nav>
  <ul>
    <li>
      <a href="guitars.php">Guitars</a>
    </li>
    <li>
      <a href="flutes.php">Flutes</a>
    </li>
    <li>
      <a href="saxophones.php">Saxophones</a>
    </li>
    <li>
      <a href="pianos.php">Pianos</a>
    </li>
  </ul>
</nav>
	<div style="padding: 15px 0px; font-size: 15px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php
			$getposts = mysqli_query($con ,"SELECT * FROM products WHERE available >='1' AND item ='guitars'  ORDER BY id DESC LIMIT 10") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];

						echo '
							<ul style="float: left;margin-left:30px;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img src="../image/product/guitars/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: '.$price.' DH</div>
									</div>

								</li>
							</ul>
						';

						}
				}
		?>

		</div>
	</div>
</body>
</html>
