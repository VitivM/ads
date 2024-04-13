<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<body>
    <h1>Добро пожаловать на наш сайт!</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Привет, пользователь! <a href="logout.php">Выйти</a></p>
        <p><a href="posts.php">Посмотреть объявления</a></p>
    <?php else: ?>
        <p>Вы не авторизованы. Пожалуйста, <a href="login.php">войдите</a> или <a href="register.php">зарегистрируйтесь</a>.</p>
    <?php endif; ?>
</body>
</html>
