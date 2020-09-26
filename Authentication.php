<?php

session_start();

$link = mysqli_connect('localhost','root','');
$database = mysqli_select_db($link,'onlineshopping');

$user = $_POST['customername'];
$pass = $_POST['customerpsd'];


// User is logging in
if (isset($_POST["submit2"]))
{
    if (empty ($user)) //if username field is empty echo below statement
    {
        echo "<font color='red'>***You must enter your unique username (email).***</font><br/><br/>";

    }
    if (empty ($pass)) //if password field is empty echo below statement
    {
        echo "<font color='red'>***You must enter your unique password.***</font><br/><br/>";
    }

}
else
{   

    $query = "SELECT * FROM onlineshopping_addcustomer WHERE customerename = '$user' AND customerpsd = '$pass'" ;
    $result = mysqli_query($link,$query);
    if (mysqli_num_rows($result) == 1) 
    {
        echo "pass"; //Pass, do something
    } 
    else 
    {
        echo "fail"; //Fail
    }

}

session_write_close();

?>
