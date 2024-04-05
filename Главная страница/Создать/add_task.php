<?php
// начало сессии
session_start();

// проверка существования значений полей
if(isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {

    // Подключение к базе данных
    $conn = new mysqli('127.0.0.1', 'root', 'root', 'planner_db');

    // Проверка подключения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // подготовленный запрос для вставки нового задания
    $stmt = $conn->prepare("INSERT INTO tasks (title, description, created_by, created_at, deadline, status) VALUES (?, ?, ?, NOW(), ?, 'Не выполнена')");
    $stmt->bind_param("ssis", $_POST['title'], $_POST['description'], $_SESSION['user_id'], $_POST['deadline']);

    // выполнение запроса
    $stmt->execute();

    // получение id только что созданного задания
    $task_id = $conn->insert_id;

    // закрытие подключения
    $stmt->close();
    $conn->close();

    // сохранение id задания в сессии
    $_SESSION['task_id'] = $task_id;

    // переадресация на страницу добавления пользователей
    header('Location: add_users.php');
    exit;
}
else {
    echo 'Please fill in all fields.';
}
?>
