<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
?>

<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Search Temples</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>
	<!-- contact -->
	<div class="prayer">
		<div class="container">
			
			<?php
			 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }

    $total_records_per_page = 5;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM temple");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; 
                 
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];

                        // $query=mysqli_query($con,"select devotees.ID as uid,devotees.FirstName,devotees.LastName,devotees.MobileNumber,devotees.Email,temple.ID as tid,temple.TempleName,bookdarshan.ID as bid,bookdarshan.BookingNumber,bookdarshan.UserID,bookdarshan.TempleID,bookdarshan.DateofDarshan,bookdarshan.TimeofDarshan,bookdarshan.TotalMember,bookdarshan.City,bookdarshan.State,bookdarshan.Country,bookdarshan.IdentityProof,bookdarshan.IdentityProofnumber,bookdarshan.Message,bookdarshan.BookingDate,bookdarshan.Status from bookdarshan join devotees on devotees.ID=bookdarshan.UserID join temple on temple.ID=bookdarshan.TempleID where bookdarshan.BookingNumber like '$sdata%' || devotees.FirstName like '$sdata%' || devotees.MobileNumber like '$sdata%'");
                        
                         
                         $query=mysqli_query($con,"select * from temple where TempleName like  '$sdata%' ");

                         
                        
                         $num=mysqli_num_rows($query);
          

if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                        
                        <div class="prayer-top">
				<div class="col-md-4 prayer-left">
					<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" class="img-responsive" alt="" /></a>
				</div>
				<div class="col-md-8 prayer-right">
					<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>"><h3><?php echo  htmlentities($row['TempleName']);?></h3></a>
                        <h3> <?php echo  htmlentities($row['Religion']);?></h3>
                        <h6>Opening Time & Closing Time:- <?php echo  htmlentities($row['OpeningTime']);?> </h6>

					<h6><?php echo  htmlentities($row['TempleLocation']);?> (<?php echo  htmlentities ($row['State']);?>), <?php echo  htmlentities($row['Country']);?></h6>
					
                         <h4><u>Aarti Time Details:-</u></h4> <li><?php echo  htmlentities($row['AartiTime']);?></li><br>
                        <h4><u>Festivals:-</u></h4> <li><?php echo  htmlentities($row['Festivals']);?></li>

					<a href="book-darshan.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Darshan Booking</a>
					<a href="Abhishek-Booking.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Abhishek Booking</a>
                         <a href="pooja-booking.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Pooja Booking</a>
                         <a href="donation.php?donationid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-info">Donation</a>
					
				</div>
				<div class="clearfix"> </div>
			</div>
                          
                        <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ul class="pagination" style="padding-left: 100px;">
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
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

</html><?php  ?>
