<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$status = $_POST['register'];

$pass = md5($pass);

$con = mysqli_connect('localhost','root','','example');

if(!$con) {
	echo "Connection not established";
}

$sql = "INSERT INTO registration (Username, Email, Password, status) VALUES('$name', '$email', '$pass', '$status');";

$query = mysqli_query($con, $sql);

if($query) {
	echo "success";
}
else{
	echo "error";
}

?>