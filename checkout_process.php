 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineshopping";


//include('dbconnect.php');
$valid = 0 ;


$a=$_POST['firstname'];
$b=$_POST['email'];
$c=$_POST['address'];
$d=$_POST['city'];
$e=$_POST['state'];
$f=$_POST['zip'];
$g=$_POST['cardname'];
$h=$_POST['cardnum'];
$i=$_POST['expmonth'];
$j=$_POST['expyear'];
$k=$_POST['cvv'];





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO checkout(firstname, email, address, city, state, zip, cardname, cardnumber, expmonth, expyear, cvv) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')";


if ($conn->query($sql) === TRUE) {
    
	
	header('Location: finalpage.php');
	/*echo "<a href='index.php' 
style='border:2px solid green;
	width:500px;
	height:320px;
	padding:20px;
	border-radius:20px;
	text-align:center'>
Successfully SignedUp CLick here to Login.
</a>";*/
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
	echo "The name is Already used by the Customer ";
}

$conn->close();
?>
