<?php

include 'config.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

while($row = $result->fetch_assoc()){
    echo $row['id']; echo "\n";
}


?>