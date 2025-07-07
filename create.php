<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO notes (user_id, title, content) VALUES ($user_id, '$title', '$content')";
    $conn->query($sql);
    header("Location: dashboard.php");
}
?>

<form method="post">
    Title: <input type="text" name="title" required><br><br>
    Content:<br>
    <textarea name="content" rows="10" cols="50" required></textarea><br><br>
    <button type="submit">Save Note</button>
</form>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>

