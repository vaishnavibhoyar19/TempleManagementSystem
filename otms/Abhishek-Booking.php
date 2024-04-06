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
	$doa=$_POST['doa'];
    $toa=$_POST['toa'];
    $totmem=$_POST['totmem'];
    $membernm=$_POST['membernm'];
    

    $dis=$_POST['dis'];
    $bookingnum=mt_rand(100000000, 999999999);

    $_SESSION['bookingnum']=$bookingnum;
     $darshanbookid=$_GET['darshanbookid'];
    $query=mysqli_query($con, "insert into bookabhishek(BookingNumber,TempleID,UserID,AbhishekName,Price,DateofAbhishek,TimeofAbhishek,TotalMember,NameOfMember,Description) value('$bookingnum','$darshanbookid','$uid','$pname[0]','$pname[1]','$doa','$toa','$totmem','$membernm','$dis')");
    if ($query) {


 echo "<script>window.location.href='abhishek-proceed.php'</script>"; 
  
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}


if(isset($_POST['Update']))
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
<title>	Smart Temple System | | Abhishek Darshan</title>
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
		
		<h2><u><b>Abhishek Darshan</b></u></h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post">
								<div class="contact-form-row">
									<div>
										<span>Date of Abhishek :</span>
										<input type="date" class="form-control" value="" name="doa" required="true" >
									</div>
									<div>
										<span>Time of Abhishek :</span>
										<input type="time" class="form-control" value="" name="toa" required="true" >
									</div>
									<br>

                                    <div>


                
<br>

                                    <span>Name of Abhishek</span>
                      <select type="text" class="form-control" name="pname" id="pname" value="" required='true' />
                        <?php
      $id=$_GET[darshanbookid];
      $query=mysqli_query($con,"select * from abhishek where TempleID='$id'");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['AbhishekName'];?>/<?php echo $row['Price'];?>"><?php echo $row['AbhishekName'];?>  /₹ <?php echo $row['Price'];?></option>
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
                                    
									<div >
									<span>Description:</span>
									<textarea name="dis" class="form-control"> </textarea>
								</div>
								
<div>


<input type="submit" value="send" name="submit"></div>
<div class="clearfix"> </div>

<script type="text/javascript">
            $(document).ready(function() {
                $('input[type="checkbox"]').click(function() {
                    var inputValue = $(this).attr("value");
                    $("." + inputValue).toggle();
                });
            });
        </script>
					
								<?php } ?>
							</form>
						</div>
						<!----- contact-form ------>
					</div>



									<?php
$uid=$_SESSION['otmsuid'];
$ret=mysqli_query($con,"select * from devotees where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<div class="view selectt">
	<form method="post">
	<h2><u><b>Address Details</b></u></h2>
								
									<span>Street Name/Society Name :</span>
									<input type="text" class="form-control" id="sname" name="sname" value="<?php  echo $row['StreetName'];?>" required="true">
								
								
									<span>Location :</span>
									<input type="text" class="form-control" id="location" name="location" value="<?php  echo $row['Location'];?>" required="true">
								
									
									<span>Zipcode :</span>
									<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php  echo $row['ZipCode'];?>"  required="true">
								
								
									<span>Landmark:</span>
									<input type="text" class="form-control" id="landmark" name="landmark" value="<?php  echo $row['Landmark'];?>"  required="true">
								
									<span>City</span>
									<input type="text" class="form-control" id="city" name="city" value="<?php  echo $row['City'];?>"  required="true">
								
									<input type="submit" value="Update" name="Update">

</div></form>
					<!----- contact-grids ----->
			
		</div>
	</div>
	<!-- contact -->		
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>