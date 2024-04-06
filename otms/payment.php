

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Online Temple Management System || Payment</title>
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
    
  
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
    
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">payment</h4>
                 
                  <form class="forms-sample" action="payscript.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="" required='true' />
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Amount</label>
                      <input type="text" class="form-control" name="amt" id="amt" value="" required='true' />
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
</body>

</html>
