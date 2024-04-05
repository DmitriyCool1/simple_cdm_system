<?php
session_start(); // Начало сессии

$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

// Параметры mysqli изменяются в зависимости от того, используется ли xampp или нет
$mysql = new mysqli('localhost', 'root', 'root', 'planner_db');

$result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
$user = $result->fetch_assoc();

if ($user === null) {
    // Ошибка: логин не найден
    echo "<script>alert('Логин не верный!');</script>";
} else {
    if ($pass === trim($user['pass'])) {
        // Правильный логин и пароль

        // Сохраняем идентификатор пользователя в сессии
        $_SESSION['user_id'] = $user['id']; //запись какого-то айди в сессию
        $_SESSION['username'] = $username; // Запись логина в сессию
        $_SESSION['email'] = $user['email']; // Запись почты в сессию

        // Выполняется перенаправление на localhost
        header('Location: ../Главная%20страница/');
        exit();
    } else {
        // Ошибка: неверный пароль
        echo "<script>alert('Пароль не верный!');</script>";
    }
}

$mysql->close();
?>