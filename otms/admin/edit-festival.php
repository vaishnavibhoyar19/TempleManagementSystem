<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $festival_id = $_POST['festival_id'];
        $festival_name = $_POST['festival_name'];
        $festival_date = $_POST['festival_date'];
        $deity_associated = $_POST['deity_associated'];
        $description = $_POST['description'];
        $festival_description = $_POST['festival_description'];
        $festival_image = $_POST['festival_image'];

        $sql = mysqli_query($con, "UPDATE festivals SET festival_name='$festival_name', festival_date='$festival_date', deity_associated='$deity_associated', description='$description', festival_description='$festival_description', festival_image='$festival_image' WHERE festival_id='$festival_id'");
        echo "<script>alert('Festival detail has been updated successfully');</script>";
        echo "<script>window.location.href='managefestival.php'</script>";
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Online Temple Management System || Update Festival</title>
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

            <?php include_once('includes/sidebar.php'); ?>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                <?php include_once('includes/header.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update Festival</h4>

                                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                                            <?php
                                            $festival_id = intval($_GET['festival_id']);
                                            $query = mysqli_query($con, "select * from festivals where festival_id='$festival_id'");
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="festival_id" value="<?php echo htmlentities($row['festival_id']); ?>" required='true' />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Festival Name</label>
                                                    <input type="text" class="form-control" name="festival_name" value="<?php echo htmlentities($row['festival_name']); ?>" required='true' />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Festival Date</label>
                                                    <input type="date" class="form-control" name="festival_date" value="<?php echo htmlentities($row['festival_date']); ?>" required='true' />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Deity Associated</label>
                                                    <input type="text" class="form-control" name="deity_associated" value="<?php echo htmlentities($row['deity_associated']); ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Description</label>
                                                    <textarea type="text" class="form-control" name="description" required='true'><?php echo htmlentities($row['description']); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Festival Description</label>
                                                    <textarea type="text" class="form-control" name="festival_description" required='true'><?php echo htmlentities($row['festival_description']); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Festival Image</label>
                                                    <input type="text" class="form-control" name="festival_image" value="<?php echo htmlentities($row['festival_image']); ?>" />
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                                        </form>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php include_once('includes/footer.php'); ?>
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

    </html>
<?php } ?>
