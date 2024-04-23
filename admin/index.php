<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['name'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		$_SESSION['email'] = $row['email'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shokher Neer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			background-color: #f0f0f0;
			font-family: Arial, sans-serif;
		}
		.container {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
			margin: 50px auto;
			padding: 40px;
			width: 350px;
		}
		.login-text {
			color: #555;
			margin-bottom: 20px;
		}
		.input-group {
			margin-bottom: 20px;
		}
		input[type="email"], input[type="password"] {
			border: 1px solid #ddd;
			border-radius: 5px;
			padding: 10px;
			width: 100%;
		}
		button.btn {
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: #fff;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Admin Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>