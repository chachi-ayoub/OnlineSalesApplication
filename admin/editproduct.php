<?php include ( "../inc/connect.inc.php" ); ?>
<?php

ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
	$user = "";
	header("location: login.php?ono=".$epid."");
}
else {
	if (isset($_REQUEST['epid'])) {

		$epid = mysqli_real_escape_string($con,$_REQUEST['epid']);
	}else {
		header('location: index.php');
	}
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($con,"SELECT * FROM admin WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
		$uname_db = $get_user_email['firstName'];
		$utype_db=$get_user_email['type'];

}
$getposts = mysqli_query($con,"SELECT * FROM products WHERE id ='$epid'") or die(mysqli_error());
	if (mysqli_num_rows($getposts)) {
		$row = mysqli_fetch_assoc($getposts);
		$id = $row['id'];
		$pName = $row['pName'];
		$piece=$row['piece'];
		$price = $row['price'];
		$description = $row['description'];
		$picture = $row['picture'];
		$item = $row['item'];
		$itemu = ucwords($row['item']);
		$type = $row['type'];
		$typeu = ucwords($row['type']);
		$category = $row['category'];
		$categoryu = ucwords($row['category']);
		$code = $row['pCode'];
		$available =$row['available'];
	}

//update product
if (isset($_POST['updatepro'])) {
	$pname = $_POST['pname'];
	$price = $_POST['price'];
	$piece=$_POST['piece'];
	$available = $_POST['available'];
	$category = $_POST['category'];
	$type = $_POST['type'];
	$item = $_POST['item'];
	$pCode = $_POST['code'];
	//triming name
	$_POST['pname'] = trim($_POST['pname']);

	if($result = mysqli_query($con,"UPDATE products SET pName='$_POST[pname]',price='$_POST[price]',description='$_POST[descri]',available='$_POST[available]',category='$_POST[category]',type='$_POST[type]',item='$_POST[item]',pCode='$_POST[code]' WHERE id='$epid'")){
		header("Location: editproduct.php?epid=".$epid."");

	}else {
		echo "no changed";
	}
}
if (isset($_POST['updatepic'])) {

if($_FILES['profilepic'] == ""){

		echo "not changed";
}else {
	//finding file extention
$profile_pic_name = @$_FILES['profilepic']['name'];
$file_basename = substr($profile_pic_name, 0, strripos($profile_pic_name, '.'));
$file_ext = substr($profile_pic_name, strripos($profile_pic_name, '.'));

if (((@$_FILES['profilepic']['type']=='image/jpeg') || (@$_FILES['profilepic']['type']=='image/png') || (@$_FILES['profilepic']['type']=='image/jpg') || (@$_FILES['profilepic']['type']=='image/gif')) && (@$_FILES['profilepic']['size'] < 1000000)) {

	$item = $item;
	if (file_exists("../image/product/$item")) {
		//nothing
	}else {
		mkdir("../image/product/$item");
	}


	$filename = strtotime(date('Y-m-d H:i:s')).$file_ext;

	if (file_exists("../image/product/$item/".$filename)) {
		echo @$_FILES["profilepic"]["name"]."Already exists";
	}else {
		if(move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "../image/product/$item/".$filename)){
			$photos = $filename;
			if($result = mysqli_query($con,"UPDATE products SET picture='$photos' WHERE id='$epid'")){

				$delete_file = unlink("../image/product/$item/".$picture);
				header("Location: editproduct.php?epid=".$epid."");
			}else {
				echo "Wrong!";
			}
		}else {
			echo "Something Worng on upload!!!";
		}
		//echo "Uploaded and stored in: userdata/profile_pics/$item/".@$_FILES["profilepic"]["name"];


	}
	}
	else {
		$error_message = "Choose a picture!";
	}

}
}



if (isset($_POST['delprod'])) {
//triming name
	$getposts1 = mysqli_query($con,"SELECT pid FROM orders WHERE pid='$epid'") or die(mysqli_error());
					if ($ttl = mysqli_num_rows($getposts1)) {
						$error_message = "You can not delete this product.<br>Someone ordered this.";
					}
					else {
						if(mysqli_query($con,"DELETE FROM products WHERE id='$epid'")){
						header('location: orders.php');
						}
					}
	}

$search_value = "";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="icon" href="../image/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#1b7899;">
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
	<div class="holecontainer" style=" padding-top: 20px; padding: 0 20%">
		<div class="container signupform_content ">
			<div>

				<h2 style="padding-bottom: 20px;">Edit Product Info</h2>
				<div style="float: right;">
				<?php
					echo '
						<div class="">
						<div class="signupform_text"></div>
						<div>
							<form action="" method="POST" class="registration">
								<div class="signup_form">
									<div>
										<td >
											<input name="pname" id="first_name" placeholder="Product Name" required="required" class="first_name signupbox" type="text" size="30" value="'.$pName.'" >
										</td>
									</div>
									<div>
										<td >
											<input name="price" id="last_name" placeholder="Price" required="required" class="last_name signupbox" type="text" size="30" value="'.$price.' DH" >
										</td>
									</div>
									<div>





										<td>
											<input name="available" placeholder="Available Quantity" required="required" class="email signupbox" type="text" size="30" value="'.$available.' Units">
										</td>
									</div>
									<div>
										<td >
											<input name="descri" id="first_name" placeholder="Description" required="required" class="first_name signupbox" type="text" size="30" value="'.$description.'" >
										</td>
									</div>


									<div>
										<td>
											<select name="item" required="required" style=" font-size: 20px;
										font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid black;color: black;margin-left: 0;width: 300px;background-color: transparent;" class="">
												<option selected value="'.$item.'">'.$itemu.'</option>
												<option value="flutes">flutes</option>
												<option value="guitars">guitars</option>
												<option value="saxophones">saxophones</option>
											</select>
										</td>
									</div>
									<div>
										<td>
											<input name="code" id="password-1" required="required"  placeholder="Code" class="password signupbox " type="text" size="30" value="'.$code.' (code)">
										</td>
									</div>
									<div>
										<input name="updatepro" class="uisignupbutton signupbutton" type="submit" value="Update Product">
									</div>
									<div>
										<input name="delprod" class="uisignupbutton signupbutton" type="submit" value="Delete This Product">
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

					';
					if(isset($success_message)) {echo $success_message;}

				 ?>

				</div>
			</div>
		</div>
		<div style="float: left;">
			<div>
				<?php
					echo '
						<ul style="float: left;">
							<li style="float: left; padding: 0px 25px 25px 25px;">
								<div class="home-prodlist-img prodlist-img">';
								if (file_exists('../image/product/'.$item.'/'.$picture.'')){
									echo '<img src="../image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi">';
								}else {
									echo '
									<div class="home-prodlist-imgi" style="text-align: center; padding: 0 0 6px 0;">No Image Found!</div>';
								} echo '

								</div>
							</li>
							<li>
								<form action="" method="POST" class="registration" enctype="multipart/form-data">
										<div class="signup_form">
											<div>
												<td>
													<input name="profilepic" style="width: 115px;" class="password signupbox" type="file" value="Add Picture">
												</td>
											</div>
											<div>
												<input name="updatepic" style="width: 144px;" class="uisignupbutton signupbutton" type="submit" value="Change Picture">
											</div>
											<div class="signup_error_msg">';
											if(isset($error_message)) {echo $error_message;}
											' </div>
										</div>
									</form>
							</li>
						</ul>
					';
				?>
			</div>

		</div>
	</div>
</body>
</html>
