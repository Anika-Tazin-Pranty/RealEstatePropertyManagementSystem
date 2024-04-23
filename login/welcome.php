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
                <br>
                <h2>Dashboard</h2>                
                <tr>
                    <th>Your unique ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            
                <?php

                include 'config.php';

                $sql = "SELECT * FROM users WHERE email='$temp'";
                $result = mysqli_query($conn, $sql);

                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td></tr>";
                }
                ?>
            </table>
            <div>
                <br>
                <h2>Your Properties</h2>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Property Type</th>
                    <th>House no.</th>
                    <th>Road</th>
                    <th>Place</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Comments</th>
                </tr>
                <?php

                include 'config.php';

                $sql = "SELECT * FROM ads WHERE email='$temp'";
                $result = mysqli_query($conn, $sql);
                $id = 0;
                $last = "";
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    include 'config.php';
                    $q = "SELECT cmnt FROM comment WHERE ad_id='$id'";
                    $res = mysqli_query($conn, $q);
                    while($r = $res->fetch_assoc()){
                        $last = $last." "."$r[cmnt]";
                    }
                    echo "<tr><td>".$row['id']."</td><td>".$row['type']."</td><td>".$row['house']."</td><td>".$row['road']."</td><td>".$row['place']."</td><td>".$row['size']."</td><td>".$row['price']."</td><td>".$last."</td></tr>";
                    
                }
                
                ?>
            </table>
            <div>
                <br>
                <h2>Your Wishlist</h2>
            </div>
            <table>
                <tr>
                    <th>Property Type</th>
                    <th>House no.</th>
                    <th>Road</th>
                    <th>Place</th>
                    <th>Size</th>
                    <th>Price</th>
                </tr>
                <?php

                include 'config.php';

                $sql = "SELECT * FROM wishlist WHERE email='$temp'";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    $tempo = $row['ad_id'];
                    $sql = "SELECT * FROM ads WHERE id='$tempo'";
                    $res = mysqli_query($conn, $sql);
                    while($row = $res->fetch_assoc()){
                        echo "<tr><td>".$row['type']."</td><td>".$row['house']."</td><td>".$row['road']."</td><td>".$row['place']."</td><td>".$row['size']."</td><td>".$row['price']."</td></tr>";
                    }
                }
                ?>
            </table>
            <div>
            <div class="button">
                <button type = "button" onclick = "location.href='registration.php'">SELL A PROPERTY</button>
            </div>
            <form action="search.php" method="post">
            <div class="button">
                <button type = "button" onclick = "location.href='search.php'">BUY PROPERTY</button>
            </div>
            </form>
            </div>
        </div>
        <!-- <div class="content">
            <div class="button">
                <button type = "button" onclick = "location.href='registration.php'">SELL A PROPERTY</button>
            </div>
            <form action="search.php" method="post">
            <div class="button">
                <button type = "button" onclick = "location.href='search.php'">BUY PROPERTY</button>
            </div>
            </form>
        </div> -->
        <br>
        <div>
            <style>
                a:link, a:visited {
                background-color: white;
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