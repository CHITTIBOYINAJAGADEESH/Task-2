<?php include 'db.php'; ?>
<?php if (!isset($_SESSION['user'])) header("Location: login.php"); ?>
<?php
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header("Location: posts.php");
}
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Edit Post</h2>
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required />
    <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea>
    <button type="submit">Update</button>
</form>
