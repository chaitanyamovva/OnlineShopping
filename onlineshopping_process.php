<?php

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

}
else
{
// Define $username and $password'

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose

// Selecting Database
$db = mysql_select_db("onlineshopping", $connection);
// SQL query to fetch information of registerd users and finds user match.
$sql =insert into items (item_name, item_quantity, item_price) values('.$values['item_name']','.$values['item_quantity']','.$values['item_price']');



if (query($sql) == true) {
	
// Initializing Session
header('Location: checkout.php');// Redirecting To Other Page
} else {
$error = "Enter other user name and password";
}
mysql_close($connection); // Closing Connection
}
}
?>


