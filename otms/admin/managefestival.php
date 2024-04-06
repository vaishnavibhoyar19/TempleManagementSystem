<?php
session_start();
include_once('includes/config.php');
error_reporting(0);
// Additional code to handle festival deletion
if (isset($_GET['delfestival']) && isset($_GET['festival_id'])) {
    $festival_id = $_GET['festival_id'];
    mysqli_query($con, "DELETE FROM festivals WHERE festival_id ='$festival_id'");
    echo "<script>alert('Festival Data Deleted');</script>";
    echo "<script>window.location.href='managefestival.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Temple Management System || Manage Festivals</title>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <style type="text/css"></style>
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
                                <div class="card-body">
                                    <h4 class="card-title">Manage Festivals Information</h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Festival name
                                                </th>
                                                <th>
                                                    Festival Date
                                                </th>
                                                <th>
                                                    Deity Associated
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM festivals");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr class="table-info">
                                                        <th>
                                                            <?php echo htmlentities($cnt); ?>
                                                        </th>
                                                        <td width="250">
                                                            <?php echo htmlentities($row['festival_name']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['festival_date']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['deity_associated']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['description']); ?>
                                                        </td>
                                                        <td width="200">
                                                            <a href="edit-festival.php?festival_id=<?php echo $row['festival_id'] ?>" class="btn-sm btn-primary">Edit</a>
                                                            <a href="managefestival.php?delfestival=true&festival_id=<?php echo $row['festival_id'] ?>" onClick="return confirm('Are you sure you want to delete this festival?')" class="btn-sm btn-danger">Delete</a>
                                                        </td>
                                                        <?php $cnt = $cnt + 1;
                                                    } ?>
                                                    </tr>
                                            </tbody>
                                        </table>
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

</html>
