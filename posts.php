<?php include 'db.php'; ?>
<?php if (!isset($_SESSION['user'])) header("Location: login.php"); ?>
<link rel="stylesheet" href="style.css">
<h2>Welcome, <?= $_SESSION['user'] ?> | <a href="logout.php">Logout</a></h2>
<a href="create_post.php"><button>Create New Post</button></a>
<hr>

<?php
$posts = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
while ($row = $posts->fetch_assoc()):
?>
<div style="background:#fff; padding:20px; margin-bottom:10px; border-radius:8px;">
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
    <small>Posted on <?= $row['created_at'] ?></small><br>
    <a href="edit_post.php?id=<?= $row['id'] ?>"><button>Edit</button></a>
    <a href="delete_post.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete post?');"><button>Delete</button></a>
</div>
<?php endwhile; ?>
