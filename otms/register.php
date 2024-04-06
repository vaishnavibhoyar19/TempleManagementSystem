<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=($_POST['password']);
	$sname=$_POST['sname'];
	$location=$_POST['location'];
	$zipcode=$_POST['zipcode'];
	$landmark=$_POST['landmark'];
	$city=$_POST['city'];



    $ret=mysqli_query($con, "select Email from devotees where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account.")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into devotees(FirstName, LastName, MobileNumber, Email, Password, StreetName,Location,ZipCode,Landmark,City) value('$fname', '$lname','$contno', '$email', '$password' ,'$sname','$location','$zipcode','$landmark','$city')");
    if ($query) {
    
    echo '<script>alert("You have successfully registered.")</script>';

  }
  else
    {
     
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=($_POST['password']);
    $query=mysqli_query($con,"select ID from devotees where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['otmsuid']=$ret['ID'];
     header('location:temples.php');
    }
    else{
   
    echo '<script>alert("Invalid Details.")</script>';
    }
  }
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System || Registration Page</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>

</head>
<body>
<?php include_once('includes/header.php');?>
<!---->
				<div class="register">
				<div class="container">
				<h2>Register || Login</h2>
				<div >
				 <div class="col-md-6  register-top-grid">
					
					<form method="post" name="signup" onsubmit="return checkpass();" style="background-color:#fbe3fc; padding:20px;">
					<h3>*Personal Information</h3>

					<div>
						<span>First Name</span>
						<input type="text"  style="background-color: white;" placeholder="First Name" pattern="[a-zA-Z]+" name="firstname" required="true"> 
					</div>
					<div>
						<span>Last Name</span>
						<input type="text" style="background-color: white;" name="lastname" placeholder="Last Name" pattern="[a-zA-Z]+" required="true">
					 </div>
					 <div>
						 <span>Email Address</span>
						 <input type="text" style="background-color: white;" name="email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required="true">
					</div>
					<div>
						 <span>Mobile Number</span>
						 <input type="text" style="background-color: white;" name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true">
					</div>
					
					<div>
						 <span>Password</span>
						 <input type="password"  class="form-control" name="password" placeholder="Password" required="true">
					</div>
					<div>
						 <span>Repeat password</span>
						 <input type="password" name="repeatpassword"  class="form-control" placeholder="Repeat password" required="true">
					</div>
<br>
					<div class="row">
					<h3><b>  *Address Details</b></h3>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-first-name">Street Name/Society Name*</label>
                                    <input type="text" name="sname" style="background-color: white;"  placeholder="Street Name/Society Name" class="form-control" required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-last-name">Location*</label>
                                    <input type="text" name="location" style="background-color: white;" required="true" pattern="[a-zA-Z'-'\s]*"  placeholder="Area" class="form-control" >
                                    </div>
                            </div>
                            
                          
                           
                           <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode">* Zip/Postal Code</label>
                                    <input type="text" id="zipcode" style="background-color: white;" class="form-control" name="zipcode"  maxlength="6" pattern="[0-9]{6}" required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode"> Landmark if any</label>
                                    <input type="text" id="landmark"  style="background-color: white;" pattern="[a-zA-Z'-'\s]*" class="form-control" name="landmark">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode"> Town / City *</label>
                                    <input type="text" name="city" style="background-color: white;" pattern="[a-zA-Z'-'\s]*"  placeholder="City" class="form-control" required="true">
                                </div>
							</div>
                        </div>


					   <a class="news-letter" href="#">
					   <button class="btn btn-info" type="reset" name="reset">RESET</button> <button style="float:right;" class="btn btn-info" type="submit" name="submit">REGISTER</button>
					   </a>
					   
					   </form>
					 </div></div>

					 
				     <div class=" col-md-6  register-bottom-grid">
						    <h3>Login Information</h3>
							<form method="post" style="background-color:#e4fce3; padding:10px;">
								<div>
									<span>Username</span>
									<input type="text" name="emailcont" style="background-color: white;" required="true" placeholder="Registered Email or Contact Number"  required="true">
								</div>
								<div>
									<span>Password</span>
									<input type="password"  class="form-control" name="password" placeholder="Password" required="true">
								</div>
								<div>
									<span><a class="link--gray" style="color: blue;" href="forgot-password.php">Forgot Password</span></a>
									
								</div>
								<div class="register-but">
								<button class="btn btn-success" type="reset" name="reset">RESET</button> <button style="float:right;" class="btn btn-success" type="submit" name="login">LOGIN</button>
								</div>
							</form>
						</div>
				<div class="clearfix"> </div>
			</div>	
</div>			
			<?php include_once('includes/footer.php');?>
</body>
</html>