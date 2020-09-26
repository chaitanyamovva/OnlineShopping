<?php

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])|| empty($_POST['phno'])|| empty($_POST['email']) ) {
$error = "Username or Password is invalid";
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
$username = stripslashes($username);
$password = stripslashes($password);
$phno=stripslashes($phno);
$email=stripslashes($email);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$phno = mysql_real_escape_string($phno);
$email = mysql_real_escape_string($email);
// Selecting Database
$db = mysql_select_db("onlineshopping", $connection);
// SQL query to fetch information of registerd users and finds user match.
$sql = "INSERT INTO login (username, password, phno,email)
VALUES ('$username', '$password', '$phno','$email')";

if ($conn->query($sql) === TRUE) 
{
 // Initializing Session
header("location: login.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}