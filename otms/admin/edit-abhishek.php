<?php session_start();
error_reporting(0);

include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
  $tid=$_POST['tid'];
  $pname=$_POST['pname'];
  $price=$_POST['price'];
  $id=intval($_GET['id']);



$sql=mysqli_query($con,"update abhishek set TempleID='$tid',AbhishekName='$pname',Price='$price' where A_ID='$id'");
echo "<script>alert('Abhishek detail has been updated successfully');</script>";
echo "<script>window.location.href='manage-abhishek.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Online Temple Management System || Update abhishek</title>
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
                  <h4 class="card-title">Update Abhishek</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select temple.TempleName,abhishek.A_ID,abhishek.TempleID,abhishek.AbhishekName,abhishek.Price from abhishek join temple on temple.ID=abhishek.TempleID where abhishek.A_ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>  
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Temple</label>
                      <select type="text" class="form-control" name="tid" id="tid" value="" required='true' />
                      <option value="<?php echo  htmlentities($row['TempleID']);?>"><?php echo  htmlentities($row['TempleName']);?></option>
                        <?php
      
      $query1=mysqli_query($con,"select * from  temple");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['ID'];?>"><?php echo $row1['TempleName'];?></option>
                  <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Abhishek</label>
                      <input type="text" class="form-control" name="pname" id="pname" value="<?php echo  htmlentities($row['AbhishekName']);?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="number" class="form-control" name="price" id="price" value="<?php echo  htmlentities($row['Price']);?>" required='true' />
                    </div>
                    
                    
                  <?php } ?>
                   
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
