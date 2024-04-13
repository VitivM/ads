<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Доступ запрещен!";
    exit;
}

$db = new mysqli('localhost', 'root', '', 'site_db');

// Добавление нового объявления
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $db->real_escape_string($_POST['text']);
    $user_id = $_SESSION['user_id'];
    $db->query("INSERT INTO posts (user_id, text) VALUES ('$user_id', '$text')");
}

// Получение и отображение всех объявлений
$result = $db->query("SELECT * FROM posts ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<div>{$row['text']}</div>";
}
?>

<form method="post">
    <textarea name="text" required></textarea><br>
    <input type="submit" value="Добавить объявление">
</form>
