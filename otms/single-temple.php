<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System || Temples</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- prayer -->
	<div class="prayer">
		<div class="container">
			<?php
			$tid=$_GET['tid'];
$ret=mysqli_query($con,"select *from  temple where ID= $tid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			<h2>Details of <?php echo  htmlentities($row['TempleName']);?></h2>
			
			<div class="prayer-top">
				<div class="col-md-4 prayer-left">
					<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" class="img-responsive" alt="" /></a>
				</div>
				<div class="col-md-8 prayer-right">
					<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>"><h3><?php echo  htmlentities($row['TempleName']);?></h3></a>
                        <h3> <?php echo  htmlentities($row['Religion']);?></h3>
                        <h6>Opening Time & Closing Time:- <?php echo  htmlentities($row['OpeningTime']);?> </h6>

					<h6><?php echo  htmlentities($row['TempleLocation']);?> (<?php echo  htmlentities ($row['State']);?>), <?php echo  htmlentities($row['Country']);?></h6>
					<p><?php echo  htmlentities($row['Description']);?></p>
                         <h4><u>Aarti Time Details:-</u></h4> <li><?php echo  htmlentities($row['AartiTime']);?></li><br>
                        <h4><u>Festivals:-</u></h4> <li><?php echo  htmlentities($row['Festivals']);?></li>

					<a href="book-darshan.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Darshan Booking</a>
					<a href="Abhishek-Booking.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Abhishek Booking</a>
                         <a href="book-darshan.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Pooja Booking</a>
                         <a href="donation.php?donationid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-info">Donation</a>
					
				</div>
				<div class="clearfix"> </div>
			</div><?php 
$cnt=$cnt+1;
}?>
			
			
		</div>
	</div>
	<!-- prayer -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>