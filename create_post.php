<?php include 'db.php'; ?>
<?php if (!isset($_SESSION['user'])) header("Location: login.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    header("Location: posts.php");
}
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Create Post</h2>
    <input type="text" name="title" placeholder="Title" required />
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit">Submit</button>
</form>
