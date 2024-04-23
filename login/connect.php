<?php

if(mysqli_connect_errno()){
	echo "Failed to connect";
	exit();
}

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$type = $_POST['type'];
	$house = $_POST['house'];
	$road = $_POST['road'];
	$place = $_POST['place'];
	$size = $_POST['size'];
	$price = $_POST['price'];

	$sql = "INSERT INTO ads(email, type, house, road, place, size, price) VALUES ('$email','$type','$house','$road','$place','$size','$price')";
	include 'config.php';
	$run = mysqli_query($conn,$sql);
	if ($run){
		echo "Ad posted successfully";
		
		exit();
	} else{
		echo "Error";
		exit();
	}
}
?>