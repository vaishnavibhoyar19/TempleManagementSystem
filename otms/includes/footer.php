<!-- footer -->
  <div class="footer">
  <div class="container">
    <div class="col-md-3 loc">
      <?php

$ret=mysqli_query($con,"select * from page where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      <h3>Location</h3>
      <p><?php  echo $row['PageDescription'];?></p>
      <p><span>Telephone :</span> <?php  echo $row['MobileNumber'];?></p>
      <span>Email : </span><a href="mailto:temple@gmail.com"><?php  echo $row['Email'];?></a>
    </div><?php } ?>
    <div class="col-md-3 ma">
    <h3>Catch</h3>
     <img src="images/place-2016-10-20-9-2debe815231bfc6ee1046e0b27a3e84b.jpg" width="100">
    </div>
    <div class="col-md-3 or">
      <h3>Our Temple</h3>
      <li><a href="index.php">• Home</a></li>
      <li><a href="contact.php">• Contact Us</a></li>
      <li><a href="about.php">• About Us</a></li>
      <li><a href="temples.php">• Temples</a></li>
      <li><a href="festivals.php">• Festivals</a></li>
    </div>
    <div class="col-md-3 con">
      <h3>Get Connected</h3>
      <ul class="social">
            <li><a href="https://www.facebook.com"><i class="fb"> </i>Facebook</a></li>
            <li><a href="https://twitter.com"><i class="twt"> </i>Twitter</a></li>
            <li><a href="https://www.youtube.com/youtube"><i class="yout"> </i>You Tube</a></li>
            <li><a href="https://www.linkedin.com"><i class="lik"> </i>Likedin</a></li>
            <li><a href="https://skype.com"><i class="skyp"> </i>Skype</a></li>           
              <div class="clearfix"> </div>           
          </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
  </div>
  <div class="footer-bottom">
  <div class="container">
    <p>Copyrights © Smart Temple System </p>
  </div>
  </div>
  
  <!-- footer -->