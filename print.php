<?php include ( "inc/connect.inc.php" ); ?>

<?php 

	
	


ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	header("location: login.php?ono=".$poid."");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);

			$uname_db = $get_user_email['firstName'];
			$ulast_db=$get_user_email['lastName'];
			$uemail_db = $get_user_email['email'];

			$umob_db = $get_user_email['mobile'];
			$uadd_db = $get_user_email['address'];
}


$query1 = "SELECT  *FROM orders WHERE id";
                $run = mysqli_query($con,$query1);
                while($row=mysqli_fetch_assoc($run)){
	            
	            $del = $row['delivery'];
	            $quantity = $row['quantity'];
                $price=$row['price'];}




require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$orderform = new Dompdf();
$page = file_get_contents("orderform.php");
		
			$output = '
			          <h5 style="color:#0d7da6;font-size:30px; text-align:center;"> Payment-receipt </h5>
			          <h3 style="color#b05b15;font-size:24px;"> First Name: </h3>
			          <span style="color:black;font-size:25px;">'. $uname_db.'</span>
			          <h3 style="color:#b05b15;font-size:24px;"> Last Name: </h3>
			          <span style="color:black;font-size:25px;">' .$ulast_db.'</span>
			          <h3 style="color:#b05b15;font-size:24px;"> Email: </h3>
			          <span style="color:black;font-size:25px;">' .$uemail_db.'</span>
			          <h3 style="color:#b05b15;font-size:24px;"> Contact Number: </h3>
			          <span style="color:black;font-size:25px;">' .$umob_db.'</span>
			          <h3 style="color:#b05b15;font-size:24px;"> Home Address: </h3>
			          <span style="color:black;font-size:25px;">'.$uadd_db.'</span>
			          <h3 style="color:#b05b15;font-size:24px;">Types of Delivery:</h3>
			          <span style="color:black;font-size:25px;">' .$del.'</span>
			          <h3 style="color:#b05b15;font-size:24px;"> Quantity: </h3>
					  <span style="color:black;font-size:25px;">' .$quantity.'</span>
					  <h3 style="color:black;font-size:20px;"> Price: '.$price.' DH</h3>
			          <h3 style="color:#0d7da6;font-size:45px;"> Total: '.$quantity * $price.' DH</h3>';

$orderform->loadHtml($output);
$orderform->setPaper('A4', 'portrait');

$orderform->render();
$orderform->stream("payment-receipt", array("Attachment"=>0));

?>

