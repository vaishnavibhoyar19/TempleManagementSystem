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


//Abhishek

$uid=$_SESSION['otmsuid'];
	 
    $pname=explode("/",$_POST['pname']);
    $price=$_POST['price'];
	$doa=$_POST['doa'];
    $toa=$_POST['toa'];
    $totmem=$_POST['totmem'];
    $membernm=$_POST['membernm'];
    $relation=$_POST['relation'];
    $dis=$_POST['dis'];
    $bookingnum=mt_rand(100000000, 999999999);
    $_SESSION['bookingnum']=$bookingnum;
     $darshanbookid=$_GET['darshanbookid'];
    
//Pooja

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
    
     //darshan

    $query=mysqli_query($con, "insert into bookdarshan(BookingNumber,UserID,TempleID,DateofDarshan,TimeofDarshan,TotalMember,Message) value('$bookingnum','$uid','$darshanbookid','$dod','$tod','$totmem','$message')");
    $result = mysqli_multi_query($con, $query);
        var_dump($result);
  
  $query1=mysqli_query($con, "insert into bookabhishek(BookingNumber,TempleID,UserID,AbhishekName,Price,DateofAbhishek,TimeofAbhishek,TotalMember,NameOfMember,Relation,Description) value('$bookingnum','$darshanbookid','$uid','$pname[0]','$pname[1]','$doa','$toa','$totmem','$membernm','$relation','$dis')");
  $result1 = mysqli_multi_query($con, $query1);
  var_dump($result1);
    
  $query2=mysqli_query($con, "insert into bookpooja(BookingNumber,TempleID,UserID,PoojaName,Price,DateofPooja,TimeofPooja,TotalMember,NameOfMember,Prasad) value('$bookingnum','$darshanbookid','$uid','$pname[0]','$pname[1]','$dop','$top','$totmem','$membernm','$prasad')");
  $result2 = mysqli_multi_query($con, $query2);
  var_dump($result2);
  

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
<script src=
"https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
    <style type="text/css">
        .selectt {
            color: #fff;
            padding: 30px;
            display: none;
            margin-top: 30px;
            margin-left:150px;
            width: 900px;
            background: pink;
        }

       label {
            margin-right: 20px;
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
							<form method="post">
								<div class="contact-form-row">
									<div>
										<span>Date of Darshan :</span>
										<input type="date" class="form-control" value="" name="dod" required="true" >
									</div>
									<div>
										<span>Time of Darshan :</span>
										<input type="time" class="form-control" value="" name="tod" required="true" >
									</div>
									<br>
									<div>
										<br>
										<span>Total Member :</span>
										<input type="number" class="form-control" value="" name="totmem" required="true">
									</div>
									<div >
									<span>Subject :</span>
									<textarea name="message" class="form-control"> </textarea>
								</div>


									<?php
$uid=$_SESSION['otmsuid'];
$ret=mysqli_query($con,"select * from devotees where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
	<div>
	<br><h2><u><b>Address Details</b></u></h2>
								
									<span>Street Name/Society Name :</span>
									<input type="text" class="form-control" id="sname" name="sname" value="<?php  echo $row['StreetName'];?>" readonly="true">
								</div><br>
								<div>
								<br>
									<span>Location :</span>
									<input type="text" class="form-control" id="location" name="location" value="<?php  echo $row['Location'];?>" readonly="true">
								</div><br>
								<div>
									
									<span>Zipcode :</span>
									<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php  echo $row['ZipCode'];?>"  readonly="true">
								</div>
								<div>
									<br>
									<span>Landmark:</span>
									<input type="text" class="form-control" id="landmark" name="landmark" value="<?php  echo $row['Landmark'];?>"  readonly="true">
								</div>

								<div>
									<br>
									<span>City</span>
									<input type="text" class="form-control" id="city" name="city" value="<?php  echo $row['City'];?>"  readonly="true">
								</div></div>
								<div class="clearfix"> </div>
								
					
                                <div>
                                    <br>
                                        <Span>Want Abhishek -<input type="checkbox" name="a" 
                       value="Yess"> Yes</span> </div>

                       <div class="Yess selectt">

                                
									<div>
										<span>Date of Abhishek :</span>
										<input type="date" class="form-control" value="" name="doa" required="true" >
									</div>
									<div>
										<span>Time of Abhishek :</span>
										<input type="time" class="form-control" value="" name="toa" required="true" >
									</div>
									<br>

                                   
                                    
            
        
<div><br>
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
                                    <div>
										<br>
										<span>Relation with member :</span>
										<input type="text" class="form-control" value="" name="relation" required="true">
									</div>
									<div >
									<span>Description:</span>
									<textarea name="dis" class="form-control"> </textarea>
								</div>

              </div>

              <div>
                                    <br>
                                        <Span>Want Pooja  -<input type="checkbox" name="p" 
                       value="Yes"> Yes</span> 
                
            
</div>
<script type="text/javascript">
            $(document).ready(function() {
                $('input[type="checkbox"]').click(function() {
                    var inputValue = $(this).attr("value");
                    $("." + inputValue).toggle();
                });
            });
        </script>



<div class="Yes selectt">

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
										<span>Price :</span>
                                        <input type="text" class="form-control" value="<?php echo $row['Price'];?>"  name="price" readonly>
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
									<span>Prasad Required:</span>
									<input type="radio" id="yes" name="prasad" value="Yes">Yes <input type="radio" name="prasad" id="no" value="NO" id="radio">NO
								</div>
              </div>


								<?php } ?>
								<div>
								<input type="submit" value="send" name="submit"></div>
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