<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","onlineshopping");
	$result = mysqli_query($conn,"SELECT * FROM shopkeeperlogin WHERE name='" . $_POST["name"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid name or Password!";
	} else {
        header('Location: additems.php');
		//$message = "You are successfully authenticated!";
	}
}
?>
<html>
<head>
<title>Shopkeeper Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tableheader">
			<td align="center" colspan="2">Enter Login Details</td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="name" placeholder="Shopkeeper Name" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>
</body></html>




