<?php

$name = $_REQUEST['name'];
$pass = $_REQUEST['pass'];
$status = $_REQUEST['status'];

$pass = md5($pass);

try{
$db = new PDO("mysql:host=localhost; dbname=example", "root", "");
} catch(PDOException $g){
	echo "connection not established ".$g.getMessage();
}

$sql = $db->prepare("SELECT * FROM registration WHERE (Username = ? AND Password = ?) AND status = ?");

if($sql->execute([$name, $pass, $status])){
	//echo "success";
	$row = $sql->rowCount();
	if($row>0){
		session_start();
		$_SESSION['user'] = $name;
		echo "success";
		
	}
	else{
		echo "error";
	}
	
}
else{
	echo "error";
}




?>