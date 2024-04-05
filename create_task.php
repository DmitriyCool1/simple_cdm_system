<?php
// начало сессии
session_start();

// проверка существования значений полей
if(isset($_POST['users']) && isset($_SESSION['task_id'])) {

    // Подключение к базе данных
    $conn = new mysqli('localhost', 'root', 'root', 'planner_db');

    // Проверка подключения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // подготовленный запрос для добавления каждого пользователя в задание
    $stmt = $conn->prepare("INSERT INTO user_tasks (task_id, user_id, role) VALUES (?, ?, ?)");

    // добавление каждого пользователя
    foreach($_POST['users'] as $index => $user_id) {
        $role = $_POST['roles'][$index];

        $stmt->bind_param("iis", $_SESSION['task_id'], $user_id, $role);
        $stmt->execute();
    }

    // закрытие подключения
    $stmt->close();
    $conn->close();

    // удаление id задания из сессии
    unset($_SESSION['task_id']);

    // переадресация на страницу задач
    header('Location: tasks.php');
    exit;
}
else {
    echo 'Please select at least one user.';
}
?>
