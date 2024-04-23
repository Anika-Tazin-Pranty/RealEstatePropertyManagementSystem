<?php 

session_start();

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
}
$temp = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: black; font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: white; color: red;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="banner">
        <?php echo "<h1>Welcome " . $_SESSION['name'] . "</h1>"; ?>
        <div>
            <table>
                <h2>Dashboard</h2>                
                <tr>
                    <th>Your unique ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            
                <?php

                include 'config.php';

                $sql = "SELECT * FROM admin WHERE email='$temp'";
                $result = mysqli_query($conn, $sql);

                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td></tr>";
                }
                ?>
            </table>
            <div>
            <h2>Users</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php

                include 'config.php';

                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td></tr>";
                    
                }
                
                ?>
            </table>
            </div>
            <div>
                <br>
                <!-- <h2>Ad posted by the users</h2> -->
                <div>
            <h2>Ad posted by the Users</h2>
            <table>
                <tr>
                    <th>AD ID</th>
                    <th>Property Type</th>
                    <th>House no.</th>
                    <th>Road</th>
                    <th>Place</th>
                    <th>Size</th>
                    <th>Price</th>
                </tr>
                <?php

                include 'config.php';

                $sql = "SELECT * FROM ads;";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['type']."</td><td>".$row['house']."</td><td>".$row['road']."</td><td>".$row['place']."</td><td>".$row['size']."</td><td>".$row['price']."</td></tr>";
                    
                }
                
                ?>
            </table>
            </div>
            <div>
                <br><br>
                <h2>Remove a user (Admin Only)</h2>
                <table>
                    <form method="post">
                    <tr><td></td><td>User's unique ID:</td></tr>
                    <tr><td></td><td><input type="number" name="uid"></td></tr>
                    <tr><td></td><td><input type="submit" value="Delete!!!" name = "delete"></td></tr>
                </table>
                <br><br>

                <?php
                include 'config.php';

                if (isset($_POST["delete"])) {
                    $uid = $_POST["uid"];
                    $sql = "DELETE FROM users WHERE id='$uid'";
                    $run = mysqli_query($conn,$sql);
                    if ($run){
                        echo "<h1>User Deleted!</h1>";
                        exit();
                    } else{
                        echo "Error";
                        exit();
                    }
                }
                ?>
                </table>
                <br><br>
                <h2>Remove an ad (Admin Only)</h2>
                <table>
                    <form method="post">
                    <tr><td></td><td>Ad ID:</td></tr>
                    <tr><td></td><td><input type="number" name="ad_id"></td></tr>
                    <tr><td></td><td><input type="submit" value="Delete the AD!" name = "del"></td></tr>
                </table>
                <br><br>

                <?php
                include 'config.php';

                if (isset($_POST["del"])) {
                    $ad_id = $_POST["ad_id"];
                    $sql = "DELETE FROM ads WHERE id='$ad_id'";
                    $run = mysqli_query($conn,$sql);
                    if ($run){
                        echo "<h1>Ad deleted!</h1>";
                        exit();
                    } else{
                        echo "Error";
                        exit();
                    }
                }
                ?>
                <h2>Add an admin (Admin Only)</h2>
                <table>
                    <form method="post">
                    <tr><td></td><td>Name:</td></tr>
                    <tr><td></td><td><input type="text" name="new_name"></td></tr>
                    <tr><td></td><td>Email:</td></tr>
                    <tr><td></td><td><input type="text" name="new_email"></td></tr>
                    <tr><td></td><td>Password:</td></tr>
                    <tr><td></td><td><input type="text" name="new_pass"></td></tr>
                    <tr><td></td><td><input type="submit" value="Add as an Admin" name = "as"></td></tr>
                </table>
                <br><br>

                <?php
                include 'config.php';

                if (isset($_POST["as"])) {
                    $new_name = $_POST["new_name"];
                    $new_email = $_POST["new_email"];
                    $new_pass = $_POST["new_pass"];
                    $sql = "INSERT INTO admin(name, email, password) VALUES ('$new_name', '$new_email', '$new_pass')";
                    $run = mysqli_query($conn,$sql);
                    if ($run){
                        echo "<h1>Admin Added</h1>";
                        exit();
                    } else{
                        echo "Error";
                        exit();
                    }
                }
                ?>
        </div>
        <br>
        <div>
            <style>
                a:link, a:visited {
                background-color: blue;
                color: black;
                border: 2px solid white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                }
                a:hover, a:active {
                background-color: red;
                color: white;
                }
            </style>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>