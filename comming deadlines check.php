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
  die("Ошибка подключения: " . $conn->connect_error);
}

// Получение списка заданий с приближающимся дедлайном
$sql = "SELECT id, DATEDIFF(deadline, NOW()) as days_left FROM tasks WHERE deadline - INTERVAL 3 DAY <= NOW() AND deadline >= NOW()  AND status != 'Выполнен'";
$tasks_at_deadline = $conn->query($sql);

// Добавление в planner_db.news заданий с близким или прошедшим дедлайном
if ($tasks_at_deadline->num_rows > 0) {
  while($task = $tasks_at_deadline->fetch_assoc()) {
    $sql = "SELECT user_id FROM user_tasks WHERE task_id=" . $task['id'];
    $participants = $conn->query($sql);
    while($users = $participants->fetch_assoc()) {
      $user_id = $users['user_id'];
      $task_id = $task['id'];
      
      // Определение значения для столбца `Description`
      $days_left = $task["days_left"];
      if ($days_left == 0) {
        $description = "Дедлайн сегодня";
      } elseif ($days_left == 1) {
        $description = "До дедлайна остался 1 день";
      } elseif ($days_left == 2) {
        $description = "До дедлайна осталось 2 дня";
      } else {
        $description = "Дедлайн сегодня";
      }
      
      // Добавление новой строки в таблицу `news`
      $sql_insert = "INSERT INTO `news` (`user_id`, `task_id`, `Date`, `Description`) VALUES ($user_id, $task_id, NOW(), '$description');";
      $conn->query($sql_insert);
    }
  }
} else {
  echo "No tasks with approaching deadline.";
}

// Закрытие подключения
$conn->close();
?>
