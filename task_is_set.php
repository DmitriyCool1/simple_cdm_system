<?php
// Установка параметров для подключения к БД
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "planner_db";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$task_id = $_POST["task_id"]; //да, предыдущая страница отправляет айди создаваемой страницы
$user_roles = $_POST["user_roles"]; //введенные в таблицу значения ролей

// Обновление ролей пользователей в задании
foreach($user_roles as $user_id => $role) {
  $sql = "INSERT INTO user_tasks (user_id, task_id, role) VALUES ('$user_id', '$task_id', '$role')";
  if ($conn->query($sql) === TRUE) {
    echo "Задание создано успешно";
  } else {
    echo "Ошибка: " . $conn->error;
  }
}

// Закрытие подключения
$conn->close();
?>
