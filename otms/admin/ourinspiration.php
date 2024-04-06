<?php
// Database Connection
include('includes/config.php');

// Validating Session
session_start();
error_reporting(0);

if (strlen($_SESSION['aid']) == 0) {
    header('location:login.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Temple Management System || Feedback</title>
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
        <?php include_once('includes/sidebar.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <?php include_once('includes/header.php'); ?>
            <!-- partial -->
            <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" style="background-color: #f4f4f4; padding: 20px; border-radius: 10px; animation: fadeIn 1s ease-in-out;">
                        <!-- Your improved and styled static content goes here -->
                        <h2 class="card-title" style="color: #4CAF50; font-family: 'Arial', sans-serif; text-align: center; margin-bottom: 20px; animation: fadeIn 2s ease-in-out;">
                            Our Inspiration - Prem Mandir
                        </h2>
                        <div class="rotating-border" style="border-radius: 10px; overflow: hidden; animation: rotateBorder 6s linear infinite;">
                            <img src="images/prem_mandir.jpg" alt="Prem Mandir Photo" class="img-fluid" style="border: 4px solid transparent; border-image: linear-gradient(45deg, #f00, #ff0, #0f0, #0ff, #00f, #f0f, #f00); border-image-slice: 1; border-radius: 6px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        </div>
                        <div style="margin-top: 20px;">
                            <p style="font-size: 16px; color: #333; line-height: 1.6; text-align: justify; animation: fadeIn 2s ease-in-out;">
                                Prem Mandir is a breathtaking temple located in Vrindavan, Uttar Pradesh, India.
                                Built with white marble, it symbolizes divine love and spirituality.
                                The temple is a significant place of worship and serves as a source of inspiration for devotees worldwide.
                                Its exquisite architecture and tranquil ambiance create a profound sense of peace and devotion.

                                <span style="font-weight: bold; color: #007BFF; animation: fadeIn 2s ease-in-out;">Visit Prem Mandir</span> to experience the spiritual journey and marvel at the intricate details of its design.

                                <span style="font-style: italic;">"Let the divine love guide your path."</span>

                                More about Prem Mandir:
                                - The temple is dedicated to Radha Krishna and Sita Ram.
                                - It was inaugurated on February 17, 2012, by Jagadguru Shree Kripaluji Maharaj.
                                - Prem Mandir's foundation stone was laid on January 14, 2001.
                                - The temple complex spans 54 acres and is adorned with beautiful gardens.

                                Immerse yourself in the divine aura of Prem Mandir and feel the serenity that transcends the material world.
                            </p>
                        </div>
                        <!-- End of improved static content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes rotateBorder {
        0% {
            border-color: #f00;
        }
        14.3% {
            border-color: #ff0;
        }
        28.6% {
            border-color: #0f0;
        }
        42.9% {
            border-color: #0ff;
        }
        57.2% {
            border-color: #00f;
        }
        71.5% {
            border-color: #f0f;
        }
        85.8% {
            border-color: #f00;
        }
        100% {
            border-color: #ff0;
        }
    }
</style>

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
<?php
}
?>
