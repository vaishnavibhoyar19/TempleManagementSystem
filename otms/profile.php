<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit']))
  {
  	$uid=$_SESSION['otmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
	$sname=$_POST['sname'];
	$location=$_POST['location'];
	$zipcode=$_POST['zipcode'];
	$landmark=$_POST['landmark'];
	$city=$_POST['city'];



    
   $query=mysqli_query($con, "update devotees set FirstName='$fname', LastName='$lname',StreetName='$sname',Location='$location',ZipCode='$zipcode',Landmark='$landmark',City='$city' where ID='$uid'");
    if ($query) {


 echo '<script>alert("Your profile has been updated")</script>'; 
  
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Profile</title>
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
		<h2>Update your profile</h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post">
								<?php
$uid=$_SESSION['otmsuid'];
$ret=mysqli_query($con,"select * from devotees where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
								<div class="contact-form-row">
									
								
									<div>
									
										<span>First Name :</span>
										<input type="text" class="form-control" id="firstname" name="firstname" value="<?php  echo $row['FirstName'];?>" required="true">
									</div>
									<div>
										
										<span>Last Name :</span>
										<input type="text" class="form-control" id="lastname" name="lastname" value="<?php  echo $row['LastName'];?>" required="true">
									</div>
									<div>
										
										<span>Email address :</span>
										<input type="email" class="form-control" id="email" name="email" value="<?php  echo $row['Email'];?>"  readonly="true">
									</div>
									<div>
										<br>
										<span>Mobile Number :</span>
										<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>"  readonly="true">
									</div>



									
									<div>
										<br>
										<span>Registraton Date:</span>
										<input type="text" class="form-control" id="regdate" name="regdate" value="<?php  echo $row['RegDate'];?>"  readonly="true">
									</div>
									
									<div class="clearfix"> </div></div>

									<div><div>
										<div class="container">
										<br><br><br><br><br><br><br><br><br><h3>Address Details</h3>
</div>
									<div>
									
									<span>Street Name/Society Name :</span>
									<input type="text" class="form-control" id="sname" name="sname" value="<?php  echo $row['StreetName'];?>" required="true">
								</div><br>
								<div>
			
									<span>Location :</span>
									<input type="text" class="form-control" id="location" name="location" value="<?php  echo $row['Location'];?>" required="true">
								</div><br>
								<div>
									
									<span>Zipcode :</span>
									<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php  echo $row['ZipCode'];?>"  required="true">
								</div>
								<div>
									<br>
									<span>Landmark:</span>
									<input type="text" class="form-control" id="landmark" name="landmark" value="<?php  echo $row['Landmark'];?>"  required="true">
								</div>

								<div>
									<br>
									<span>City</span>
									<input type="text" class="form-control" id="city" name="city" value="<?php  echo $row['City'];?>"  required="true">
								</div>
									
								</div><?php } ?>
								<div class="clearfix"> </div>
								
								<input type="submit" value="Update" name="submit">
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