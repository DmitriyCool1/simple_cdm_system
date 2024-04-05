<?php
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['task_id']) && isset($_POST['new_title']) && isset($_POST['new_description']) && isset($_POST['new_deadline'])) {
    $task_id = $_POST['task_id'];
    $new_title = $_POST['new_title'];
    $new_description = $_POST['new_description'];
    $new_deadline = $_POST['new_deadline'];

    // Здесь можно выполнить необходимые операции по обновлению задания в базе данных
    $user = 'root';
    $password = 'root';
    $db = 'planner_db';
    $host = 'localhost';
    $port = 3306;

    $conn = new mysqli($host, $user, $password, $db, $port);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "UPDATE tasks SET title = '$new_title', description = '$new_description', deadline = '$new_deadline' WHERE id = $task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Задание успешно обновлено";
    } else {
        echo "Ошибка при обновлении задания: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Ошибка: Не указаны все необходимые параметры";
}
?>
