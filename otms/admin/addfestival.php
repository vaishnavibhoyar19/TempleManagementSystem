<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $festivalName = $_POST['festivalName'];
        $festivalDate = $_POST['festivalDate'];
        $deityAssociated = $_POST['deityAssociated'];
        $description = $_POST['description'];
        $festivalDescription = $_POST['festivalDescription'];
        $image = $_FILES["festivalImage"]["name"];

        $extension = substr($image, strlen($image) - 4, strlen($image));

        // Renaming the image file
        $imgNewFile = md5($image . time()) . $extension;

        move_uploaded_file($_FILES["festivalImage"]["tmp_name"], "festivalimages/" . $imgNewFile);

        $sql = mysqli_query($con, "INSERT INTO festivals(festival_name, festival_date, deity_associated, description, festival_description, festival_image) 
                                    VALUES ('$festivalName', '$festivalDate', '$deityAssociated', '$description', '$festivalDescription', '$imgNewFile')");

        echo "<script>alert('Festival detail has been added successfully');</script>";
        echo "<script>window.location.href='managefestival.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Online Temple Management System || Add Festival</title>
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
                                    <h4 class="card-title">Add Festival</h4>

                                    <form class="forms-sample" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="festivalName">Name of Festival</label>
                                            <input type="text" class="form-control" name="festivalName" id="festivalName"
                                                required='true' />
                                        </div>
                                        <div class="form-group">
                                            <label for="festivalDate">Date</label>
                                            <input type="date" class="form-control" name="festivalDate" id="festivalDate"
                                                required='true' />
                                        </div>

                                        <div class="form-group">
                                            <label for="deityAssociated">Deity Associated</label>
                                            <input type="text" class="form-control" name="deityAssociated"
                                                id="deityAssociated" required='true' />
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description"
                                                required='true'></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="festivalDescription">Festival Description</label>
                                            <textarea class="form-control" name="festivalDescription"
                                                id="festivalDescription" required='true'></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="festivalImage">Festival Image</label>
                                            <input type="file" class="form-control" name="festivalImage"
                                                id="festivalImage" required='true' />
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

</html>