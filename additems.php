<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineshopping";


//include('dbconnect.php');
$valid = 0 ;


$name=$_POST['name'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
if(isset($_FILES["image"]))
		{
			$path="uploads/";
			$target_path=$path.basename($_FILES["image"]["name"]);
			if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_path))
			{
				
			}
		}




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="insert into onlineshopping_products(name,image,price,quantity)values('$name','$target_path','$price','$quantity')";


if ($conn->query($sql) === TRUE) {
    
	echo "The ITEM is added ";
	
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
	echo "The ITEM is not added ";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>adding items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .sidebar
  {
	      background-color: black;
          height: 720px;
	  
  }
  .navbar {
    margin-bottom: 0px !important;
}

.col-sm-4 {
    width: 41.333333% !important;
}
  
  </style>
</head>
<body>


<div class="container-fluid">
  <div class="row">
	
	<div  class="col-sm-9">
	
	<body>
		<div  class="col-sm-9">
	
	<body>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form  align="center" action="" method="POST" enctype="multipart/form-data">
				<h2 >ADD ITEMS</h2>
				<hr>
				<?php if($valid == 1){ ?>
					<div class="alert alert-success">Successfully added</div>
				<?php } elseif($valid == 2){ ?>
					<div class="alert alert-danger">items not entered</div>
				<?php } ?>
			    <input type="text" name="name" placeholder="itemname" class="form-control"><br><br>				
				
				<h5>ITEM IMAGE</h5><input type="file" name="image" value="CandidateImage" style="padding-top:15px"  class="form-control"><br>
				
				<input type="text" name="price" placeholder="itemprice" class="form-control"><br><br>			
				<input type="text" name="quantity" placeholder="itemquantity" class="form-control"><br><br>			
				<br><br>
				
				
				
		
				<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
			</form>
		 </div>
		<div class="col-sm-4"></div>
		</div>
	</div>
	</body>
	</div>
   </div>
  </div>

</body>
</html>