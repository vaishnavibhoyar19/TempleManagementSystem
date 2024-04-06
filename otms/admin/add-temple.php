<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$tname=$_POST['tname'];
$tlocation=$_POST['tlocation'];

//$city=$_POST['city'];
$state=$_POST['state'];

$country=$_POST['country'];
$religion=$_POST['religion'];

$description=$_POST['description'];
$starttime=$_POST['start'];
$aarti=$_POST['aarti'];
$festivals=$_POST['festivals'];
$image1=$_FILES["image1"]["name"];
   
$extension1 = substr($image1,strlen($image1)-4,strlen($image1));

//Renaming the  image file
$imgnewfile1=md5($image1.time()).$extension1;

    move_uploaded_file($_FILES["image1"]["tmp_name"],"templeimages/".$imgnewfile1);
    
$sql=mysqli_query($con,"insert into temple(TempleName,TempleLocation,State,Country,Religion,Description,OpeningTime,AartiTime,Festivals,TempleImage1) values('$tname','$tlocation','$state','$country','$religion','$description','$starttime','$aarti','$festivals','$imgnewfile1')");
echo "<script>alert('Temple detail has been added successfully');</script>";
echo "<script>window.location.href='manage-temple.php'</script>";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Online Temple Management System || Add Temple</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Temple</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Temple</label>
                      <input type="text" class="form-control" name="tname" id="tname" value="" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Location</label>
                      <input type="text" class="form-control" name="tlocation" id="tlocation" value="" required='true' />
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">State</label>
                      <input type="text" class="form-control" id="state" name="state" class="form-control" value="" required='true' />
                    </div>
                   <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Country</label>
                      <input type="text" class="form-control" id="country" name="country" value="" required='true' />
                    </div>

                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Religion</label>
                      <select type="text" class="form-control" id="religion" name="religion" value="" required='true'>            
                      <option value="Hindu">Hindu</option>
                      <option value="Christian">Christian</option>
                      <option value="Sikh">Sikh</option>
                       <option value="Jain">Jain</option>
                       
                     </select>
                    </div>

                  
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" value="" required='true' /></textarea>
                    </div>

                    <div class="form-group">
                    <label for="appt">Open Hours:</label>
                    <input type="text" class="form-control" id="start" name="start" required='true'>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Aarti Timing Details </label>
                    <input type="text" class="form-control" id="aarti" name="aarti"" required='true'>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Festivals</label>
                      <textarea type="text" class="form-control" id="festivals" name="festivals" value="" required='true' /></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Temple Featured Image</label>
                      <input type="file" class="form-control" id="image1" name="image1" value="" required='true' />
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                   
                  </form>
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
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html><?php } ?>
