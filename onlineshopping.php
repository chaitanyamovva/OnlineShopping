<?php 
include('session.php');

$connect = mysqli_connect("localhost", "root", "", "onlineshopping");





if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="onlineshopping.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
						<meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
					  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  padding-top: 100px;
  padding-right: 400px;
  padding-bottom: 600px;
  padding-left: 805px;
}

td, th {
  border: 0px solid #dddddd;
  text-align: left;
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 150px;
}
</style>


<body>
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
				
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
				
			</ul>
			</div>
		  </div>
		</nav>











		<br />
		<div class="container">
			<br />
			<br />
			<br />
			
			<br /><br />
			
			<div class="alert alert-info" align="center">Welcome <h4><?php echo $login_session; ?></h4> </div>
			<table>
  <tr>
    <th ><h4 style="font:bold" > ItemImage </h4></th>
    <th ><h4 style="font:bold"> Price </h4></th>
    <th ><h4 style="font:bold"> Quantity </h4></th>
	
<table>
  </tr>
			<?php
				$query = "SELECT * FROM onlineshopping_products ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>

<div class="col-md-4">
				<form method="post" action="onlineshopping.php?action=add&id=<?php echo $row["id"]; ?>">

<table>

  </tr>
  <tr>
    <td width="33%"><img src="<?php echo $row["image"]; ?>" class="img-responsive"  height="200px" width="200px" /></td>
    <td width="33%"><h4 class="text" >$ <?php echo $row["price"]; ?></h4></td>
    <td width="33%"><input type="text" name="quantity" value="" class="form-control" size="1" />
	<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>"  />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
	<input type="submit" name="add_to_cart" style="margin-top:5px;"  value="Add to Cart" style="background-color: #555555 "/></td>
	
	
  </tr>
  </form>
			</div>
  
			<?php
					}
				}
			?>
			</table>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<form action="checkout.php?total_cart_price=<?php echo number_format($total, 2); ?>" >
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td ><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="onlineshopping.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-danger remove-item">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?>
						<input type="hidden" name="total_cart_price" value="<?php echo number_format($total, 2); ?>"/>
						<button type="submit" >Proceed to Checkout</button>
						</td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
				
			</div>
			</form>
		</div>
	</div>
	<br />
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>