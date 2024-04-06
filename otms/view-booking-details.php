<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['otmsuid'])==0)
  { 
header('location:logout.php');
}
else{


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Donation History</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript">

function print1(strid)
{
if(confirm("Do you want to print?"))
{
var values = document.getElementById(strid);
var printing =
window.open('','','left=0,top=0,width=550,height=400,toolbar=0,scrollbars=0,sta­?tus=0');
printing.document.write(values.innerHTML);
printing.document.close();
printing.focus();
printing.print();

}
}
</script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="study">
		<div class="container">

    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body" id="print2">

			<?php
 

 
 $uid=$_SESSION['otmsuid'];
$viewid=$_GET['id'];
$ret=mysqli_query($con,"select devotees.ID as uid,devotees.FirstName,devotees.LastName,devotees.MobileNumber,devotees.Email,devotees.RegDate,devotees.StreetName,devotees.Location,devotees.ZipCode,devotees.Landmark,devotees.City,temple.ID as tid,temple.TempleName,temple.TempleLocation,temple.State as tstate,temple.Country as tcountry,temple.Description,temple.TempleImage1,bookdarshan.ID as bid,bookdarshan.BookingNumber,bookdarshan.UserID,bookdarshan.TempleID,bookdarshan.DateofDarshan,bookdarshan.TimeofDarshan,bookdarshan.TotalMember,bookdarshan.Message,bookdarshan.BookingDate,bookdarshan.Status from bookdarshan join devotees on devotees.ID=bookdarshan.UserID join temple on temple.ID=bookdarshan.TempleID where bookdarshan.ID='$viewid' && bookdarshan.UserID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <table class="table table-bordered" id="print2" border="1">
 <tr>
<td colspan="6" align="center" style="font-size:20px;color:blue">
 Booking Details of :<?php echo htmlentities($row['BookingNumber']);?></td> </tr>

 <tr class="table-warning">
    <th>Temple Name</th>
    <td colspan="2"><?php echo htmlentities($row['TempleName']);?></td>
 
    <th>Temple Image</th>
    <td colspan="2"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" height='200' width='200'></td>
    
  </tr>
 <tr class="table-info">
  <th>Temple Country</th>
    <td><?php echo htmlentities($row['tcountry']);?></td>
    <th>Temple State</th>
    <td><?php echo htmlentities($row['tstate']);?></td>
 
    <th>Temple City</th>
    <td><?php  echo $row['tcity'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Temple Location</th>
    <td><?php echo htmlentities($row['TempleLocation']);?></td>
 
    <th>Temple Description</th>
    <td colspan="4"><?php  echo $row['Description'];?></td>
    
  </tr>
 <tr>
<td colspan="6" align="center" style="font-size:20px;color:blue">
 Detail of Devotee</td> </tr>
  
 <tr class="table-danger">
    <th>Darshanarthi(Devotee) Name</th>
    <td> <?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?></td>
 
    <th>Darshanarthi(Devotee) Email</th>
    <td colspan="4"><?php  echo $row['Email'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Darshanarthi(Devotee) Mobile Number</th>
    <td><?php echo htmlentities($row['MobileNumber']);?></td>
 
    <th>Darshanarthi(Devotee) Reg Date</th>
    <td colspan="4"><?php  echo $row['RegDate'];?></td>
    
  </tr>
<tr>
  <td colspan="6" align="center" style="font-size:20px;color:blue">
 Detail of Darshans</td> </tr>

 <tr class="table-danger">
    <th>Date of Darshan</th>
    <td colspan="2"><?php echo htmlentities($row['DateofDarshan']);?></td>
 
    <th>Time of Darshan</th>
    <td colspan="2"><?php  echo $row['TimeofDarshan'];?>  PM</td>
    
  </tr>
  <tr class="table-danger">
    <th>Total Member</th>
    <td><?php echo htmlentities($row['TotalMember']);?></td>
 
    <th>Street Name</th>
    <td><?php  echo $row['StreetName'];?></td>
     <th>Location</th>
    <td><?php echo htmlentities($row['Location']);?></td>
  </tr>
 
  <tr class="table-danger">
    <th>Zipcode</th>
    <td><?php  echo $row['ZipCode'];?></td>
    <th>Landmark</th>
    <td><?php echo htmlentities($row['Landmark']);?></td>
 
    <th>City</th>
    <td><?php  echo $row['City'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Message</th>
    <td><?php echo htmlentities($row['Message']);?></td>
 
    <th>Booking Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
    <th>Darshan Status</th>
    <td> <?php  
    $status=$row['Status'];
if($row['Status']=="Accepted")
{
  echo "Darshan request has been accepted";
}



if($row['Status']=="Rejected")
{
  echo "Darshan request has been rejected";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
  </tr>
 
</table>


<p style="text-align: center; padding-top: 30px"><input type="button"  name="printbutton" value="Print" class="btn btn-primary mr-2" onclick="return print1('print2')"/></p>
           <?php $cnt=$cnt+1; } ?>
		</div>
	</div>
	<!-- study -->
  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>