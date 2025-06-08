<?php include 'db.php'; ?>
<?php if (!isset($_SESSION['user'])) header("Location: login.php"); ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM posts WHERE id=$id");
header("Location: posts.php");
