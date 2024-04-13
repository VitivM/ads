<?php
// Подключение к базе данных
$db = new mysqli('localhost', 'root', '', 'site_db');

// Проверка на отправку формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $db->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля

    // Проверка на уникальность username
    $result = $db->query("SELECT * FROM users WHERE username = '$username'");
    if ($result->num_rows > 0) {
        echo "Такой пользователь уже существует!";
    } else {
        // Добавление нового пользователя в базу данных
        $db->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        echo "Регистрация успешна!";
    }
}
?>

<form method="post">
    Имя пользователя: <input type="text" name="username" required><br>
    Пароль: <input type="password" name="password" required><br>
    <input type="submit" value="Регистрация">
</form>
