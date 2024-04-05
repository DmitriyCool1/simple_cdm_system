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

// Запрос на получение списка пользователей
$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

// Создание таблицы для вывода данных, 
//task_is_set.php - страница, на которую перебрасывает после нажатия на кнопку
echo "<form action='task_is_set.php' method='post'>";
echo "<table>";
echo "<tr><th>Имя пользователя</th><th>Назначить участником</th><th>Роли и обязанности</th></tr>";

// Вывод пользователей в виде строк таблицы
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["username"] . "</td>";
    echo "<td><input type='checkbox' name='user[]' value='" . $row["id"] . "'></td>";
    echo "<td><input type='text' name='roles[]' placeholder='Введите роли'></td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='3'>No users found.</td></tr>";
}

echo "</table>";
echo "<input type='submit' value='Внести участников'>";
echo "</form>";

// Закрытие подключения
$conn->close();
?>