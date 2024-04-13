<?php
$servername = "localhost";
$username = "root"; // Ваше имя пользователя для базы данных
$password = ""; // Ваш пароль для базы данных (для XAMPP обычно пустой)

// Создаем соединение
$conn = new mysqli($servername, $username, $password);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Создаем базу данных
$sql = "CREATE DATABASE IF NOT EXISTS site_db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Выбираем базу данных site_db
$conn->select_db("site_db");

// SQL для создания таблицы users
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(60) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// SQL для создания таблицы posts
$sql = "CREATE TABLE IF NOT EXISTS posts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
text TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table posts created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
