<?php
// Установка параметров для подключения к БД
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "planner_db";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение идентификатора задания из параметров запроса
$task_id = $_GET['task_id'];

// Запрос для получения записей из task_log для задания с данным task_id
$sql = "SELECT task_log.created_by, task_log.title, task_log.description, task_log.status, task_log.created_at, task_log.deadline
        FROM task_log
        WHERE task_log.task_id = $task_id
        ORDER BY task_log.id DESC";
$result = $conn->query($sql);

// Создание таблицы для вывода данных
echo "<table>";
echo "<tr><th>Title</th><th>Description</th><th>Creator</th><th>Status</th><th>Created at</th><th>Deadline</th></tr>";

// Вывод записей таблицы task_log в виде строк таблицы
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $creator_id = $row["created_by"];
        $creator_name_query = "SELECT username FROM users WHERE id = $creator_id";
        $creator_result = $conn->query($creator_name_query);
        $creator_name = "";
        if ($creator_result->num_rows > 0) {
            $creator_row = $creator_result->fetch_assoc();
            $creator_name = $creator_row["username"];
        }
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["description"] . "</td><td>" . $creator_name . "</td><td>" . $row["status"] . "</td><td>" . $row["created_at"] . "</td><td>" . $row["deadline"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found.</td></tr>";
}

echo "</table>";

// Закрытие подключения
$conn->close();
?>
