<?php session_start();
include('includes/config.php');

error_reporting(0);


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Thank You</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>

<style>
.input {
  display: inline-block;
  border-radius: 4px;
  background-color: Blue;
  border: #66b3ff;
  border-style:outset;
  border-width:15px;
  color: White;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 300px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 550px;
}




</style>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	


    <div class="study" >
		<div class="container">
    
    <div style="border:#c5c9da; border-width:2px; height: 100px; width:600px; border-style:solid; margin-left:270px; text-align: center; padding: 30px; background-color: #effbe4;">
			<h2> Your Total Amount Is :-  <?php echo $_GET['Price'];?> ₹</h2>
		</div></div>
	<br>
  
	<!-- study -->
	<form action="" method="POST" >

  
  
<input type="submit" value="Pay with razorpay" id="payment" class="input" >
    <input type="hidden" custom="Hidden Element" name="hidden">

</form>
</div>
	<?php include_once('includes/footer.php');?>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
  
  
  
  var options = {
      "key": "rzp_test_d4iXfAlHo8uPyg", // Enter the Key ID generated from the Dashboard
      "amount": "<?php echo $_GET['Price']*100;?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
      "currency": "INR",
      "name": "Smart Temple System",
      "description": "Temple Donation",
      
      "image": "https://example.com/your_logo",
      //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
      "handler": function (response){
          
        
          alert("Payment Successful");
         
          window.location.href='abhishek-success.php';
      },
      "prefill": {
          "name": "",
          "email": "",
          "contact": ""
      },
      "notes": {
          "address": ""
      },
      "theme": {
          "color": "#3399cc"
      }
  };
  var rzp1 = new Razorpay(options);
  rzp1.on('payment.failed', function (response){
          alert(response.error.code);
          alert(response.error.description);
          alert(response.error.source);
          alert(response.error.step);
          alert(response.error.reason);
          alert(response.error.metadata.order_id);
          alert(response.error.metadata.payment_id);
  });
  document.getElementById('payment').onclick = function(e){
      rzp1.open();
      e.preventDefault();
  
  }
  
  </script>


<?php include_once('includes/footer.php');?>
</body>
</html>