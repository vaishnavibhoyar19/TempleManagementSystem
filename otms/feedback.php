<?php
include('includes/config.php');
session_start();
error_reporting(0);

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | |System Feedback</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
.feedback{
    width: 100%;
    max-width: 780px;
    background: #fff;
    margin: 0 auto;
    padding: 15px;
    box-shadow: 1px 1px 16px rgba(0, 0, 0, 0.3);
}
.survey-hr{
  margin:10px 0;
  border: .5px solid #ddd;
}
.star-rating {
   margin: 25px 0 0px;
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  width: 175px;
  height: 35px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 20%;
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  width: 20%;
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
}
.choice {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  text-align: center;
  padding: 20px;
  display: block;
}
span.scale-rating{
margin: 5px 0 15px;
    display: inline-block;
   
    width: 100%;
   
}
span.scale-rating>label {
  position:relative;
    -webkit-appearance: none;
  outline:0 !important;
    border: 1px solid grey;
    height:33px;
    margin: 0 5px 0 0;
  width: calc(10% - 7px);
    float: left;
  cursor:pointer;
}
span.scale-rating label {
  position:relative;
    -webkit-appearance: none;
  outline:0 !important;
    height:33px;
      
    margin: 0 5px 0 0;
  width: calc(10% - 7px);
    float: left;
  cursor:pointer;
}
span.scale-rating input[type=radio] {
  position:absolute;
    -webkit-appearance: none;
  opacity:0;
  outline:0 !important;
    /*border-right: 1px solid grey;*/
    height:33px;
 
    margin: 0 5px 0 0;
  
  width: 100%;
    float: left;
  cursor:pointer;
  z-index:3;
}
span.scale-rating label:hover{
background:#fddf8d;
}
span.scale-rating input[type=radio]:last-child{
border-right:0;
}
span.scale-rating label input[type=radio]:checked ~ label{
    -webkit-appearance: none;

    margin: 0;
  background:#fddf8d;
}
span.scale-rating label:before
{
  content:attr(value);
    top: 7px;
    width: 100%;
    position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    vertical-align: middle;
  z-index:2;
}
</style>

</head>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="contact">
    <div class="container">
    <div class="feedback">
<p>Dear Customer,<br>
Thank you for your valuable time.
<h4>Please rate your system experience for the following parameters.</h4>
 
<form method="post" >

<label for="fname">Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="email" id="lname" name="email" placeholder="Your email..">

    <div><br>
<label>1. Your overall experience with system ?</label><br>
  
<span class="star-rating">
  <input type="radio" name="overallexp" value="1- Dissatisfied"><i></i>
  <input type="radio" name="overallexp" value="2- Satisfied"><i></i>
  <input type="radio" name="overallexp" value="3- Average"><i></i>
  <input type="radio" name="overallexp" value="4- Good"><i></i>
  <input type="radio" name="overallexp" value="5- Excellent"><i></i>
</span>
 
  <div class="clear"></div> 
  <hr class="survey-hr">
<label>2. Performance & Speed?</label><br>
<span class="star-rating">
  <input type="radio" name="performance" value="1- Dissatisfied"><i></i>
  <input type="radio" name="performance" value="2- Satisfied"><i></i>
  <input type="radio" name="performance" value="3- Average"><i></i>
  <input type="radio" name="performance" value="4- Good"><i></i>
  <input type="radio" name="performance" value="5- Excellent"><i></i>
</span>
 
 
  <div class="clear"></div> 
  <hr class="survey-hr">
<label>3. Friendliness </label><br>
  <div style="color:grey">
    <span style="float:left">
     POOR
    </span>
    <span style="float:right">
    Excellent
    </span>
    
  </div>
<span class="scale-rating">
  <label value="1">
  <input type="radio" name="userFriendly" value="1- Poor">
  <label style="width:100%;"></label>
  </label>
  <label value="2">
  <input type="radio" name="userFriendly" value="2- Poor" >
  <label style="width:100%;"></label>
  </label>
  <label value="3">
  <input type="radio" name="userFriendly" value="3- Poor">
  <label style="width:100%;"></label>
  </label>
  <label value="4">
  <input type="radio" name="userFriendly"  value="4- Average">
  <label style="width:100%;"></label>
  </label>
  <label value="5">
  <input type="radio" name="userFriendly" value="5- Average">
  <label style="width:100%;"></label>
  </label>
  <label value="6">
  <input type="radio" name="userFriendly" value="6- Average">
  <label style="width:100%;"></label>
  </label>
  <label value="7">
  <input type="radio" name="userFriendly" value="7- Average">
  <label style="width:100%;"></label>
  </label>
  <label value="8">
  <input type="radio" name="userFriendly" value="8- Excellent">
  <label style="width:100%;"></label>
  </label>
  <label value="9">
  <input type="radio" name="userFriendly" value="9- Excellent">
  <label style="width:100%;"></label>
  </label>
  <label value="10">
  <input type="radio" name="userFriendly" value="10- Excellent">
  <label style="width:100%;"></label>
  </label>
</span>
 
  <div class="clear"></div> 
  <hr class="survey-hr"> 
<label for="m_3189847521540640526commentText">4. Any Other suggestions:</label><br/><br/>
<textarea cols="75" name="comment" rows="5" style="100%"></textarea><br>
<br>
  <div class="clear"></div> 
<input style="background:#43a7d5;color:#fff;padding:12px;border:0" type="submit" name="submit" value="Submit your review"> 
</form>
</div>
</div>
<?php
if(isset($_POST['submit']))
{
   // $id=$_POST['$id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $overallexp=$_POST['overallexp'];
    $performance=$_POST['performance'];
    $userFriendly=$_POST['userFriendly'];
    $comment=$_POST['comment'];
    
    
   $result="insert into feedback(Name,Email,OverallExperience,Performance,UserFriendly,AnyComment) values('$name','$email','$overallexp','$performance','$userFriendly','$comment')"; 
    mysqli_query($con,$result);
    
     if($result)
	 {
	 echo"<script>alert('Your Feedback submitted successfully....');</script><script>window.location.href='index.php'</script>";
     //echo "";
	 }
     
	 else
	{
        echo"<script>alert('error...');</script>";
	}
   
     
}

?>

             
				
	
</body>
</html>