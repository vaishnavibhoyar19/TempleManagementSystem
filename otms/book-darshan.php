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
  	$dod=$_POST['dod'];
    $tod=$_POST['tod'];
    $totmem=$_POST['totmem'];
    $message=$_POST['message'];
    $bookingnum=mt_rand(100000000, 999999999);
	
    $_SESSION['bookingnum']=$bookingnum;
    $darshanbookid=$_GET['darshanbookid'];
    $query=mysqli_query($con, "insert into bookdarshan(BookingNumber,UserID,TempleID,DateofDarshan,TimeofDarshan,TotalMember,Message) value('$bookingnum','$uid','$darshanbookid','$dod','$tod','$totmem','$message')");
    if ($query) {


 echo "<script>window.location.href='thank-you.php'</script>"; 
  
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
<title>	Online Temple Management System | | Book Darshan</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<style type="text/css">
        .div1 {
  border-radius: 5px;
  background-color:#dedcbb;
  margin-left: 150px;
  padding: 40px;
  
           align:center;
}



      </style>
</head>
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>


	
	<!-- contact -->
	<div class="contact">
	<div class="container">
		
		<h2><u><b>Book Darshan</b></u></h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post" class="div1">
								<div >
									<div>
										<span>Date of Darshan :</span>
										<input type="date" class="form-control" value="" name="dod" required="true" >
									</div><br>
									<div>
										<span>Time of Darshan :</span>
										<input type="time" class="form-control" value="" name="tod" required="true" >
									</div>
									<br>
									<div>
									
										<span>Total Member :</span>
										<input type="number" class="form-control" value="" name="totmem" required="true">
									</div><br>
									<div >
									<span>Subject :</span>
									<textarea name="message" class="form-control"> </textarea>
								</div>

								<div class="clearfix"> </div>
								
					
								
								<div>
								<input type="reset" value="Reset" name="reset" style="font-size:20px; color:white; margin-top:20px; width:150px; height:47px; border:none; background-color:#665f5c;">
									<input type="submit" value="send" name="submit" style="float:right;"></div>
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