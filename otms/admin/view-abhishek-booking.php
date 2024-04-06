<?php session_start();
global $uid;
global $viewid;

error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:login.php');
}
else{
if(isset($_POST['submit']))
  {
    
    $viewid=$_GET['id'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
   $query=mysqli_query($con, "update bookabhishek set Remark='$remark', Status='$ressta' where A_ID='$viewid'");
    if ($query) {
   
    echo '<script>alert("Darshan Status Has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-booking.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

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
                  <h4 class="card-title">Darshan booking Details</h4>
                 
                  <div class="table-responsive pt-3">
                    <?php
 $viewid=$_GET['id'];

 #$ret=mysqli_query($con,"select devotees.ID as uid,devotees.FirstName,devotees.LastName,devotees.MobileNumber,devotees.Email,devotees.StreetName,devotees.Location,devotees.ZipCode,devotees.Landmark,devotees.City,devotees.RegDate,temple.ID as tid,temple.TempleName,temple.TempleLocation,temple.State as tstate,temple.Country as tcountry,temple.Description,temple.TempleImage1,bookabhishek.ID as bid,bookabhishek.BookingNumber,bookabhishek.UserID,bookabhishek.TempleID,bookabhishek.DateofDarshan,bookabhishek.TimeofDarshan,bookabhishek.TotalMember,bookabhishek.Message,bookabhishek.BookingDate,bookabhishek.Status from bookabhishek join devotees on devotees.ID=bookabhishek.UserID join temple on temple.ID=bookabhishek.TempleID where bookabhishek.ID='$viewid' && bookabhishek.UserID='$uid'");
 $ret=mysqli_query($con,"select devotees.ID as uid,devotees.FirstName,devotees.LastName,devotees.MobileNumber,devotees.Email,devotees.RegDate,devotees.StreetName,devotees.Location,devotees.ZipCode,devotees.Landmark,devotees.City,temple.ID as tid,temple.TempleName,temple.TempleLocation,temple.State as tstate,temple.Country as tcountry,temple.Religion,temple.Description,temple.TempleImage1,bookabhishek.A_ID as bid,bookabhishek.BookingNumber,bookabhishek.UserID,bookabhishek.TempleID,bookabhishek.AbhishekName,bookabhishek.Price,bookabhishek.DateOfAbhishek,bookabhishek.TimeOfAbhishek,bookabhishek.TotalMember,bookabhishek.NameOfMember,bookabhishek.Description,bookabhishek.AbhishekBookingDate,bookabhishek.Remark,bookabhishek.Status from bookabhishek join devotees on devotees.ID=bookabhishek.UserID join temple on temple.ID=bookabhishek.TempleID where bookabhishek.A_ID='$viewid'");

 
 $cnt=1;
 while ($row=mysqli_fetch_array($ret)) {
   
 
 ?>
                     <table class="table table-bordered" id="print2" border="1">
  <tr>
 <td colspan="6" align="center" style="font-size:20px;color:blue">
  Booking Details of :<?php echo htmlentities($row['BookingNumber']); ?></td> </tr>
 
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
     <th>Devotee Name</th>
     <td> <?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?></td>
  
     <th>Devotee Email</th>
     <td colspan="4"><?php  echo $row['Email'];?></td>
     
   </tr>
   <tr class="table-danger">
     <th>Devotee Mobile Number</th>
     <td><?php echo htmlentities($row['MobileNumber']);?></td>
  
     <th>Devotee Reg Date</th>
     <td colspan="4"><?php  echo $row['RegDate'];?></td>
     
   </tr>
   <tr>
  <td colspan="6" align="center" style="font-size:20px;color:blue">
 Detail of Abhishek</td> </tr>

 <tr class="table-danger">
    <th>Date of Abhishek</th>
    <td colspan="2"><?php echo htmlentities($row['DateOfAbhishek']);?></td>
 
    <th>Time of Abhishek</th>
    <td colspan="2"><?php  echo $row['TimeOfAbhishek'];?>  PM</td>
    
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
    <th>Name Of Member</th>
    <td><?php echo htmlentities($row['NameOfMember']);?></td>
 
    <th>Booking Date</th>
    <td><?php  echo $row['AbhishekBookingDate'];?></td>
    
</tr>
<tr class="table-danger">

 
    <th>Description</th>
    <td><?php  echo $row['Description'];?></td>


    <th>Abhishek Status</th>
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

           <?php $cnt=$cnt+1; } ?>
           <?php if($status==""){ ?>

<p align="center" style="padding-top: 20px;">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
                         

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Accepted" selected="true">Accepted</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>

</div>

                      
                        </div>
                    </div>
                </div>
              </div>     
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
