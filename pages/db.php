<?php
$servername = "localhost";
$username = "root"; // default xampp username
$password = "";     // default xampp password
$dbname = "skillpro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
