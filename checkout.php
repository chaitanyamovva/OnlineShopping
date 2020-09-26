<?php
if(isset($_GET["total_cart_price"])){
	$total_cart_price = $_GET["total_cart_price"];
}else{
	$total_cart_price = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>

<body>
<style>

form
{
    text-align: left;
}
.container {
  width: 500px;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}


</style>
<script>


</script>
<head>
<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			 
			</div>
			<div class="collapse navbar-collapse navbar-right" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="sellercontact.php"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
			  </ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
				
			</ul>
			</div>
		  </div>

</nav>
</head>


<body>

     
        
		  <form method="POST" action="checkout_process.php">
  
    
            <div class="container">
			<h4 align= "center" > <b>Billing/Shipping </b><h4>
            <label for="fname"><i class="fa fa-user"></i> Full Name:</label><br>
            <input type="text" id="fname" name="firstname" placeholder="Sai Chaitanya" required><br><br>
            <label for="email"><i class="fa fa-envelope"></i> Email:</label><br>
            <input type="text" id="email" name="email" placeholder="*****@mail.com" required><br><br>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address:</label><br>
            <input type="text" id="adr" name="address" placeholder="*** *** street " required><br><br>
            <label for="city"><i class="fa fa-institution"></i> City:</label><br>
            <input type="text" id="city" name="city" placeholder="Edmonton" required><br><br>

            
               <label for="state">State:</label><br>
                <input type="text" id="state" name="state" placeholder="AB" required><br><br>
              
              
                <label for="zip">Zip: Enter in the below format</label><br>
                <input type="text" id="inputData" name="zip" placeholder="*** ***" required><br><br>
             <button type="button" onclick="myFunction()">check delivery address</button>
			  <p id="text"></p>
       <script type="text/javascript"> 
	   
	   function myFunction(){


          var iData = document.getElementById("inputData").value;
         let expression = /[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/g;
		 let matched = iData.match(expression);
         
		 if(matched){
			 
			 document.getElementById("text").innerHTML = "we delivery to this address";
		 }else{
			 
			 document.getElementById("text").innerHTML = "we donot delivery to this address";
		 }
         }
	   </script>
			
		  <br>

 <br> </div>
 <br>
  
	
         <div class="container">
            <h4 align= "center" > <b>Payment</b><h4>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i><br>
            </div><br>
            <label for="cname">Name on Card</label><br>
            <input type="text" id="cname" name="cardname" placeholder="Sai Chaitanya"required><br><br>
            <label for="ccnum">Credit card number</label><br>
            <input type="text" id="ccnum" name="cardnumber" pattern="[4]{1}[0-9]{15}" placeholder="****************" required><br><br>
            <label for="expmonth">Exp Month</label><br>
            <input type="text" id="expmonth" name="expmonth" placeholder="MM" required><br><br>
            
                <label for="expyear">Exp Year</label><br>
                <input type="text" id="expyear" name="expyear" placeholder="YY" required><br><br>
              
                <label for="cvv">CVV</label><br>
                <input type="text" id="cvv" name="cvv" placeholder="***" required><br><br>
				 <input type="submit" value="Proceed to pay ($<?php echo($total_cart_price);?>)" class="btn" align="center" >
              
        
        </div>
       
		
		
		  
      </form>
   

</body>
</html>
