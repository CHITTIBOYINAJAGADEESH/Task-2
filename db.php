<?php
session_start();

$host = 'localhost';
$db = 'blog';
$user = 'root';
$pass = 'jagga2527'; // your MySQL root password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
