<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");

$id = $_SESSION['user']['id'];
$result = $conn->query("SELECT * FROM notes WHERE user_id=$id ORDER BY id DESC");
?>

<h2>Your Notes</h2>
<a href="create.php">+ New Note</a> | <a href="logout.php">Logout</a>
<hr>

<?php while($note = $result->fetch_assoc()): ?>
<div>
    <h3><?= $note['title'] ?></h3>
    <div><?= substr($note['content'], 0, 100) ?>...</div>
    <a href="edit.php?id=<?= $note['id'] ?>">Edit</a> |
    <a href="delete.php?id=<?= $note['id'] ?>">Delete</a>
</div>
<hr>
<?php endwhile; ?>
