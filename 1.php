<?php

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$phno=$_POST['phno'];
$email=$_POST['email'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose

// Selecting Database
$db = mysql_select_db("onlineshopping", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("insert into login (username,password,phno,email) values('$username','$password','$phno','$email')", $connection);

if ($query == true) {
// Initializing Session
header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
