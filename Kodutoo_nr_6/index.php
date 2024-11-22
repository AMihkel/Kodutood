<?php
$kasutaja = "miku";   // Your MySQL username
$pw = "Par00l123";     // Your MySQL password
$dbserver = "localhost";  // The MySQL server (localhost in your case)
$andmepaas = "andmed";  // The name of your database

// Establish the connection
$yhendus = mysqli_connect($dbserver, $kasutaja, $pw, $andmepaas);

// Check if the connection is successful
if (!$yhendus) {
    die("Connection failed: " . mysqli_connect_error());
}

$paring = "SELECT `asset_name`, `location`
            FROM `network_inventory` 
            ORDER BY `asset_name` ASC
            LIMIT 10";

$valjund = mysqli_query($yhendus, $paring);

if ($valjund) {
    while ($rida = mysqli_fetch_assoc($valjund)) {
        echo "Asset Name: " . $rida['asset_name'] . "<br>";
        echo "Location: " . $rida['location'] . "<br><br>";
    }
} else {
    echo "Error: " . mysqli_error($yhendus);
}
?>
