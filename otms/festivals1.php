<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Online Temple Management System || Festivals</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <!-- festivals -->
    <div class="prayer">
        <div class="container">
            <h2>Festivals</h2>
            <?php
            $result = mysqli_query($con, "SELECT * FROM festivals");
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="prayer-top">
                    <div class="col-md-4 prayer-left">
                        <?php
                        // Assuming the festival_image column contains the file name
                        <div class="col-md-4 prayer-left">
					<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" class="img-responsive" alt="" /></a>
				</div>

                        // Construct the full path to the image
                        $imagePath = 'festival_images/' . $imageFileName;

                        // Display the image
                        echo '<img src="' . $imagePath . '" class="img-responsive" alt="Festival Image" />';
                        ?>
                    </div>
                    <div class="col-md-8 prayer-right">
                        <h3><?php echo htmlentities($row['festival_name']); ?></h3>
                        <h6>Festival Date: <?php echo htmlentities($row['festival_date']); ?></h6>
                        <h6>Deity Associated: <?php echo htmlentities($row['deity_associated']); ?></h6>
                        <p>Description: <?php echo htmlentities($row['description']); ?></p>
                        <!-- Add any other festival details you want to display -->
                    </div>
                    <div class="clearfix"> </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>
