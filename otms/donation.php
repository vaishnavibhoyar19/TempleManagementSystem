<?php
session_start();
ini_set('display_errors', 1);
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit']))
  {
  	$uid=$_SESSION['otmsuid'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pannum=$_POST['pannum'];
    $damt=$_POST['damt'];
    $payopt=$_POST['paymentoption'];
    $message=$_POST['message'];
    $donationnum=mt_rand(100000000, 999999999);
    $_SESSION['donationnum']=$donationnum;
  $donationid=$_GET['donationid'];
  $_SESSION['damt']=$damt;
   
    $query=mysqli_query($con, "insert into donation(DonationNumber,UserID,TempleID,City,State,Country,PANNumber,DonationAmount,PaymentOption,Message) value($donationnum,$uid,$donationid,'$city','$state','$country','$pannum',$damt,'$payopt', '$message')");
    

	if ($query) {

	   
   	  echo "<script>window.location.href='razor-payment.php'</script>"; 
	/* echo "<script>window.location.href='payscript.php'</script>"; 
	*/
	//echo "razor-payment.php?damt= "+$damt;
  
	}
  else
    {        echo '<script>alert("Something Went Wrong. Please try again")</script>';
   }

  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Donation</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>
	
	<!-- contact -->
	<div class="contact">
	<div class="container">
		<h2>Donation For Temple</h2>

		
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post" >
								<div class="contact-form-row">
									
								
									<div>
									
										<span>City :</span>
										<input type="text" class="form-control" value="" name="city" required="true">
									</div>
									<div>
										
										<span>State :</span>
										<input type="text" class="form-control" value="" name="state" required="true">
									</div>
									<div>
										
										<span>Country :</span>
										<input type="text" class="form-control" value="" name="country" required="true">
									</div>
									<div>
										<br>
										<span>PAN Number :</span>
										
										<input type="text" class="form-control" value="" maxlength="10" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"  name="pannum" required="true">
									</div>
									
									<div>
										<br>
										<span>Donation Amount:</span>
										<input type="number" class="form-control" value="" name="damt" required="true">
									</div>
									<div>
										<br>
										<span>Payment Option:</span>
										<select type="text" class="form-control" value="" name="paymentoption" required="true">
											<option value="">Choose Payment Option</option>
											<option value="online">Online</option>
											
										</select>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Subject(Related to donation) :</span>
									<textarea name="message" class="form-control"> </textarea>
								</div>
								<input type="submit" value="Proceed" name="submit">

								
							</form>
						</div>
						<!----- contact-form ------>
					</div>
					<!----- contact-grids ----->
			
		</div>
	</div>
	<!-- contact -->		
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>