<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:login.php');
}
else{


  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Online Temple Management System || View Donation Receipt</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
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
  <div class="container-scroller d-flex">
    <!-- partial:partials/_sidebar.html -->
    <?php include_once('includes/sidebar.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body" id="print2">
                 
                 
                  <div class="table-responsive pt-3">
                    <?php
 $viewid=$_GET['id'];
$ret=mysqli_query($con,"select devotees.ID as uid,devotees.FirstName,devotees.LastName,devotees.MobileNumber,devotees.Email,temple.ID as tid,temple.TempleName,temple.TempleImage1,temple.TempleLocation,temple.State,temple.Country,temple.Religion,donation.ID as did,donation.DonationNumber,donation.UserID,donation.TempleID,donation.City as dcity,donation.State as dstate,donation.Country as dcountry,donation.PANNumber,donation.DonationAmount,donation.PaymentOption,donation.Message,donation.DonationDate from donation join devotees on devotees.ID=donation.UserID join temple on temple.ID=donation.TempleID where donation.ID='$viewid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <table class="table table-bordered" border="1">
 <tr>
<td colspan="4" align="center" style="font-size:20px;color:blue">Donation Receipt</td></tr>
<tr><td  colspan="4" style="font-size:20px;color:blue">
 <img src="templeimages/<?php echo htmlentities($row['TempleImage1']);?>" width="300" height="100"> <?php  echo $row['TempleName'];?></td> </tr>

 <tr class="table-warning">
    <th>Receipt Number</th>
    <td><?php echo htmlentities($row['DonationNumber']);?></td>
 
    <th>Date</th>
    <td><?php  echo $row['DonationDate'];?></td>
    
  </tr>
 <tr class="table-info">
    <th>Name</th>
    <td><?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?></td>
 
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Email</th>
    <td><?php echo htmlentities($row['Email']);?></td>
 
    <th>PAN Number</th>
    <td><?php  echo $row['PANNumber'];?></td>
    
  </tr>
  <tr class="table-success">
    <th>City</th>
    <td><?php echo htmlentities($row['dcity']);?></td>
 
    <th>State</th>
    <td><?php  echo $row['dstate'];?></td>
    
  </tr>
  <tr class="table-primary">
    <th>Country</th>
    <td><?php echo htmlentities($row['dcountry']);?></td>
 
    <th>Message</th>
    <td><?php  echo $row['Message'];?></td>
    
  </tr>
   <tr class="table-warning">
    <th>Payment Amount</th>
    <td> ₹ <?php echo htmlentities($row['DonationAmount']);?></td>
 
    <th>Payment Method</th>
    <td><?php  echo $row['PaymentOption'];?></td>
    
  </tr>
</table>
<p style="text-align: center; padding-top: 30px"><input type="button"  name="printbutton" value="Print" class="btn btn-primary mr-2" onclick="return print1('print2')"/></p>
           <?php $cnt=$cnt+1; } ?>         
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <?php include_once('includes/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- End custom js for this page-->
</body>

</html><?php } ?>
