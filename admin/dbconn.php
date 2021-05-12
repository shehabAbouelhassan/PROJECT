<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
//$dbpassword = "password";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, );
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
?>