<?php
session_start();
session_destroy(); // Уничтожаем сессию
header("Location: index.php"); // Перенаправляем пользователя на главную страницу
exit;
?>
