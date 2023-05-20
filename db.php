<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-learningdz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("فشل الإتصال بقاعدة البيانات: " . $conn->connect_error);
}

?>