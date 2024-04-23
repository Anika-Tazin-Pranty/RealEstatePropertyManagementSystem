<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "real_estate";

//For connection
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>