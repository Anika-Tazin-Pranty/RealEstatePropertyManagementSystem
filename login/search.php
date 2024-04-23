<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
	<style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: red; font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: solid red; color: red;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
</head>
<body>
<br>
<form method="post">
<label>Search</label>
<input type="text" placeholder="Search by place" name="search1">
<input type="submit" name="submit1">

<label>Search</label>
<input type="text" placeholder="Search by size (sq ft)" name="search2">
<input type="submit" name="submit2">

<label>Search</label>
<input type="number" placeholder="Search by price (TK)" name="search3">
<input type="submit" name="submit3">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=real_estate",'root','');

if (isset($_POST["submit1"])) {
	$str = $_POST["search1"];
	$sth = $con->prepare("SELECT * FROM ads WHERE place = '$str'");

	$sth-> setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	
	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>ID</th>
				<th>Owner's Contact</th>
				<th>Property Type</th>
				<th>House no.</th>
				<th>Road</th>
				<th>Place</th>
				<th>Size (sq ft.)</th>
				<th>Price (TK)</th>
			</tr>
			<?php

                include 'config.php';

                $sql = "SELECT * FROM ads WHERE place='$str'";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
					$identity = $row['id'];
                    echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".$row['type']."</td><td>".$row['house']."</td><td>".$row['road']."</td><td>".$row['place']."</td><td>".$row['size']."</td><td>".$row['price']."</td></tr>";
                }
            ?>
		</table>
<?php 
	}
		
		
		else{
			echo "No results";
		}


}

?>

<?php


$con = new PDO("mysql:host=localhost;dbname=real_estate",'root','');

if (isset($_POST["submit2"])) {
	$str = $_POST["search2"];
	$sth = $con->prepare("SELECT * FROM ads WHERE size = '$str'");

	$sth-> setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	
	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Property ID</th>
				<th>Owner's Contact</th>
				<th>Property Type</th>
				<th>House no.</th>
				<th>Road</th>
				<th>Place</th>
				<th>Size (sq ft.)</th>
				<th>Price (TK)</th>
			</tr>
			<?php

                include 'config.php';

                $sql = "SELECT * FROM ads WHERE size='$str'";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".$row['type']."</td><td>".$row['house']."</td><td>".$row['road']."</td><td>".$row['place']."</td><td>".$row['size']."</td><td>".$row['price']."</td></tr>";
                }
            ?>
		</table>
<?php 
	}
		
		
		else{
			echo "No results";
		}


}

?>
<?php


$con = new PDO("mysql:host=localhost;dbname=real_estate",'root','');

if (isset($_POST["submit3"])) {
	$str = $_POST["search3"];
	$sth = $con->prepare("SELECT * FROM ads WHERE price = '$str'");

	$sth-> setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	
	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Property ID</th>
				<th>Owner's Contact</th>
				<th>Property Type</th>
				<th>House no.</th>
				<th>Road</th>
				<th>Place</th>
				<th>Size (sq ft.)</th>
				<th>Price (TK)</th>
			</tr>
			<?php

                include 'config.php';

                $sql = "SELECT * FROM ads WHERE price='$str'";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".$row['type']."</td><td>".$row['house']."</td><td>".$row['road']."</td><td>".$row['place']."</td><td>".$row['size']."</td><td>".$row['price']."</td></tr>";
                }
            ?>
		</table>
<?php 
	}
		
		
		else{
			echo "No results";
		}


}

?>

<br><br>
<form method="post">
<label><h2>Add to wishlist</h2></label>
<table>
	<tr><td><label>Enter the property ID: </td></label></tr>
	<tr><td><input type="text" placeholder="The left most column" name="wish"></td></label></tr>
	<tr><td><label>Enter your account email: </td></label></tr>
	<tr><td><input type="text" placeholder="Your account email" name="email"><br></td></label></tr>
	<tr><td><input type="submit" name="wished" value="Add to wishlist"><br></td></label></tr>
</table>

<?php
include 'config.php';

if (isset($_POST["wished"])) {
	$email = $_POST["email"];
	$wish = $_POST["wish"];
	$sql = "INSERT INTO wishlist(email, ad_id) VALUES ('$email','$wish')";
	$run = mysqli_query($conn,$sql);
	if ($run){
		echo "<h1>Added to wishlist successfully!</h1>";
		exit();
	} else{
		echo "Error";
		exit();
	}
}
?>

<br><br>
<h2>Leave a comment to the seller</h2>
<table>
	<form methos="post">
	<tr><td></td><td>Property ID:</td></tr>
	<tr><td></td><td><input type="text" name="pid"></td></tr>
	<tr><td></td><td>Your Account Email:</td></tr>
	<tr><td></td><td><input type="text" name="commenter"></td></tr>
	<tr><td></td><td>Comment:</td></tr>
	<tr><td></td><td><textarea cols="35" rows="6" name="comment"></textarea></td></tr>
	<tr><td></td><td><input type="submit" value="Comment" name = "commented"></td></tr>
</table>
<br><br>

<?php
include 'config.php';

if (isset($_POST["commented"])) {
	$email = $_POST["commenter"];
	$pid = $_POST["pid"];
	$cmnt = $_POST["comment"]." ".'Please contact me at'." ".$email;
	$sql = "INSERT INTO comment(ad_id, email, cmnt) VALUES ('$pid','$email','$cmnt')";
	$run = mysqli_query($conn,$sql);
	if ($run){
		echo "<h1>Comment added!</h1>";
		exit();
	} else{
		echo "Error";
		exit();
	}
}
?>


