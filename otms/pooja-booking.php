<?php
 global $id;
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit']))
  {
  	$uid=$_SESSION['otmsuid'];
	 
    $pname=explode("/",$_POST['pname']);
    $price=$_POST['price'];
	$dop=$_POST['dop'];
    $top=$_POST['top'];
    $totmem=$_POST['totmem'];
    $membernm=$_POST['membernm'];
    

    $prasad=$_POST['prasad'];
    $bookingnum=mt_rand(100000000, 999999999);

    $_SESSION['bookingnum']=$bookingnum;
     $darshanbookid=$_GET['darshanbookid'];
    $query=mysqli_query($con, "insert into bookpooja(BookingNumber,TempleID,UserID,PoojaName,Price,DateofPooja,TimeofPooja,TotalMember,NameOfMember,Prasad) value('$bookingnum','$darshanbookid','$uid','$pname[0]','$pname[1]','$dop','$top','$totmem','$membernm','$prasad')");
    if ($query) {


		echo"<script>alert('Successfully send ,Thank you for pooja booking.');</script><script>window.location.href='pooja-history.php'</script>";
  
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
<title>	Smart Temple System | | Pooja Booking</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>

<script src=
"https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
    <style type="text/css">
        .selectt {
            color:black;
            padding: 40px;
            display: none;
            
            width: 60%;
            background:#E8E8E8;
        }
          
        
    </style>

</head>
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>


	
	<!-- contact -->
	<div class="contact">
	<div class="container">
		
		<h2><u><b>Pooja Booking</b></u></h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post" >
								<div class="contact-form-row">
									<div>
										<span>Date of Pooja :</span>
										<input type="date" class="form-control" value="" name="dop" required="true" >
									</div>
									<div>
										<span>Time of Pooja :</span>
										<input type="time" class="form-control" value="" name="top" required="true" >
									</div>
									<br>

                                    <div>


                
<br>

                                    <label for="exampleInputUsername1">Name of Pooja</label>
                      <select type="text" class="form-control" name="pname" id="pname" value="" required='true' />
                        <?php
      $id=$_GET[darshanbookid];
      $query=mysqli_query($con,"select * from pooja where TempleID='$id'");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['PoojaName'];?>/<?php echo $row['Price'];?>"><?php echo $row['PoojaName'];?>  /₹ <?php echo $row['Price'];?></option>
              <?php } ?>
                      </select>
									</div>
                                   
                                    
                                   
                                    
									<div>
										<br>
										<span>Total Member :</span>
										<input type="number" class="form-control" value="" name="totmem" required="true">
									</div>
                                    <div>
										<br>
										<span>Name of Member :</span>
										<input type="text" class="form-control" value="" name="membernm" required="true">
									</div>
                                    
									<div ><br>
									<span>Prasad Required:</span>
									<input type="radio" id="yes" name="prasad" value="Yes">Yes <input type="radio" name="prasad" id="no" value="NO" id="radio">NO
								</div><br>
								<div>
								<input type="submit" value="send" name="submit"></div>
								<script>
        function NewTab() {
            window.open(
            "profile.php", "_blank");
        }
    </script>
 
								<?php
$uid=$_SESSION['otmsuid'];
$ret=mysqli_query($con,"select * from devotees where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<div class="view selectt">
	
	<h2><u><b>Address Details</b></u></h2>
								
									<span>Street Name/Society Name :</span>
									<input type="text" class="form-control" id="sname" name="sname" value="<?php  echo $row['StreetName'];?>" readonly="true">
								
								
									<span>Location :</span>
									<input type="text" class="form-control" id="location" name="location" value="<?php  echo $row['Location'];?>" readonly="true">
								
									
									<span>Zipcode :</span>
									<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php  echo $row['ZipCode'];?>"  readonly="true">
								
								
									<span>Landmark:</span>
									<input type="text" class="form-control" id="landmark" name="landmark" value="<?php  echo $row['Landmark'];?>"  readonly="true">
								
									<span>City</span>
									<input type="text" class="form-control" id="city" name="city" value="<?php  echo $row['City'];?>"  readonly="true">
								
								

</div>								
								
							</form>
							<div class="clearfix"> </div>
								
					
								<?php } ?>
						</div>
						<!----- contact-form ------>

						<script type="text/javascript">
            $(document).ready(function() {
                $('input[type="checkbox"]').click(function() {
                    var inputValue = $(this).attr("value");
                    $("." + inputValue).toggle();
                });
            });
        </script>
					</div>
					<!----- contact-grids ----->
			
		</div>
	</div><br><br><br>
	<!-- contact -->		
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>