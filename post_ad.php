<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    echo "Необходима авторизация";
    exit;
}

$mysqli = new mysqli('localhost', 'root', '', 'site_db');
$content = $mysqli->real_escape_string($_POST['content']);
$user_id = $_SESSION['user_id']; // Убедитесь, что вы сохраняете user_id при входе в систему

$result = $mysqli->query("INSERT INTO ads (user_id, content) VALUES ('$user_id', '$content')");

if ($result) {
    echo "Объявление опубликовано";
} else {
    echo "Ошибка публикации";
}
?>
