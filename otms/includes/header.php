<!-- header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="header">
    <div class="header-top">
      <div class="container">
        <div class="head-left">
          <ul class="number">
            <li><span><?php
echo "Date: " . date("Y/m/d") . "<br>";

echo "Day: " . date("l");
?></span></li>          
          </ul>
        </div>
        <div class="head-right">
          <?php if (strlen($_SESSION['otmsuid']>0)) {?>
          <ul class="number">
            <li><a href="donation-history.php">Donation History </a></li>|
            <li><a href="darshan-history.php"> Darshan History </a></li>|
            <li><a href="abhishek-history.php">Abhishek History </a></li>|
            <li><a href="pooja-history.php"> Pooja History </a></li>|
            <li><a href="profile.php">Profile </a></li>|
           
            <li><a href="logout.php" data-hover="Logout">Logout</a></li>
            
                 <div class="clearfix"> </div>     
          </ul></li><?php } ?>
        </div>
          <div class="clearfix"> </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="logo">
          <a href="index.php" style="text-align:center;"><img src="images/logo.png" class="img-responsive" alt="" width="100" height="50" />
            <h4 style="font-weight:bold; padding-top:1%; font-size:24px;">Smart Temple System</h4></a>
        </div>
        <div class="bottom-left">
           <?php if (strlen($_SESSION['otmsuid']==0)) {?>
          <a href="register.php">Login Here</a><?php } ?>
        </div>
        
        <form action="search.php" method="POST">
 <input type="text" placeholder="Search.." name="searchdata"  id="searchdata" required style="margin-left:550px; ">
  <button type="submit" name="search" ><i class="fa fa-search"></i></button>
</form>
          <div class="clearfix"> </div>
          
      </div>
    </div>
            
        <div class="container">
        <div class="head-na">
          <div class="head-nav">
          <span class="menu"> </span>
            <ul class="cl-effect-15">
                <li><a href="index.php" data-hover="HOME">HOME</a></li> <label>|</label>
                
                
                <li><a href="temples.php" data-hover="Temples">Temples</a></li> <label>|</label>
                <li><a href="festivals1.php" data-hover="FESTIVALS">FESTIVALS</a></li> <label>|</label>
                <li><a href="about.php" data-hover="ABOUT">About US</a></li> <label>|</label>
                <li><a href="contact.php" data-hover="CONTACT">CONTACT  US</a></li><label>|</label>
                <li><a href="feedback.php" data-hover="Feedback">Feedback</a></li><label>|</label>
                
<?php if (strlen($_SESSION['otmsuid']==0)) {?>
 <li><a href="admin/login.php" data-hover="ADMIN">Admin</a></li>
 
 <?php } ?>


                  <div class="clearfix"> </div>
              </ul>
          </div>
          <!-- script-for-nav -->
          <script>
            $( "span.menu" ).click(function() {
              $( ".head-nav ul" ).slideToggle(300, function() {
              // Animation complete.
              });
            });
          </script>
        <!-- script-for-nav --> 
        </div>
        </div>
        
  </div>
  <!-- header -->