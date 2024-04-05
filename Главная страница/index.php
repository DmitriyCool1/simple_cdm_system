<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>Управление проектом</title>
    <style>
        body {
            background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(01.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            color: #505050;
            font: 14px 'Segoe UI', tahoma, arial, helvetica, sans-serif;
            page-break-inside: avoid;
        }
        #header {
            position: sticky;
            overflow-x: hidden;
            background: #efefef;
            padding: 0;
        }
        h1 {
            position: sticky;
            text-align: left;
            font-size: 48px;
            margin-left: 160px;
            padding: 0 30px;
            line-height: 80px;

            font-family: 'Comfortaa';
            letter-spacing: 4px;
            word-spacing: 0px;
            color: #787878;
            font-weight: bold;
            text-decoration: none;
            font-style: normal;
            font-variant: normal;
            text-transform: capitalize;

        }
        p {
            font-size: 20px;
            color: #fff;
            background: #969696;
            padding: 0 30px;
            line-height: 50px;
        }
        form {
            margin: 0 auto;
            background-color: #fff;
            padding: 5px 5px;
            width: 18%;
        }
        /* The sidebar menu */
        .sidenav {
            height: 100%; /* Full-height: remove this if you want "auto" height */
            width: 160px; /* Set the width of the sidebar */
            position: fixed; /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black */
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 20px;
        }
        /* The navigation menu links */
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }
        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }
        /* Style page content */
        .main {
            text-align: center;
            height: 100%;
            background-color: #DCDCDC;
            margin-left: 160px; /* Same as the width of the sidebar */
            margin-right: 60px;
            position: center;
        }
        /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        #block {
            text-align: left;
            font-size: 20px;
            white-space: nowrap; /* Отменяем перенос текста */
            overflow: hidden; /* Обрезаем содержимое */
            text-overflow: ellipsis;
            /*width: max-content;*/
            position: relative;
            background-color: white;
            width: 300px;
            height: 300px;
            display: inline-block;
            margin: 5px 5px 5px 5px;
        }
        #author {
            display: flex;
            align-items: flex-end;
            position:absolute;
            bottom:0px;
        }
        .btn-group button {
            margin: 0 auto;
            top: 50%;
            left: 50%;
            background-color: #4CAF50; /* Зеленый фон */
            border: 1px solid green; /* Зеленая граница */
            color: white; /* Белый текст */
            padding: 10px 24px; /* Немного отступов */
            cursor: pointer; /* Указатель/значок руки */
            /*width: 25%;*/ /* Установите ширину, если это необходимо */
            font-size: 200%;
            display: block; /* Сделайте так, чтобы кнопки располагались друг под другом */
        }
        .btn-group button:not(:last-child) {
            border-bottom: none; /* Предотвращение двойных границ */
        }
        /* Добавить цвет фона при наведении курсора */
        .btn-group button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>PROЕКТ</h1>
    </div>
    <!-- Side navigation -->
    <div class="sidenav">
        <a href="index.php">Главная</a>
        <a href="Создать/create.php">Создать</a>
        <a href="Справка/spravka.html">Справка</a>
        <a href="Аккаунт/account.php">Аккаунт</a>
        <a href="../get_news_for_the_user.php">Новости</a>
        <a href="../view_created_tasks.php">Мои задания</a>
    </div>
    <!-- Page content -->
    <p></p>
    <div class="main">
<?php
session_start();

// Проверка, установлена ли сессия и содержит ли она значение user_id
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
    // Сессия установлена и user_id > 0, продолжаем выполнение кода
    $user_id = $_SESSION['user_id'];
} else {
    // Сессия не установлена или user_id <= 0, перенаправление на страницу авторизации
    header("Location: ../Сайт%20регистрации/index.php");
    exit(); // Убедитесь, что вызывается exit() после перенаправления
}

$user = 'root';
$password = 'root';
$db = 'planner_db';
$host = 'localhost';
$port = 3306;

$conn = new mysqli($host, $user, $password, $db, $port);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение user_id из сессии
$user_id = $_SESSION['user_id'];
$sql = "SELECT t.id, t.title, t.deadline, u.username
        FROM tasks AS t
        INNER JOIN user_tasks AS ut ON t.id = ut.task_id
        INNER JOIN users AS u ON t.created_by = u.id
        WHERE ut.user_id = $user_id";

if ($result = $conn->query($sql)) {
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Имеется задач: $rowsCount</p>";
    foreach ($result as $row) {
        $task_id = $row["id"]; // Определение переменной $task_id
        echo '<div id="block">' . $row["title"] . '<br><a href ../get_task_log.php?task_id=' . $task_id . '">Просмотреть логи изменений</a></br>' . '<div id="author"><br>Deadline: ' . $row["deadline"] . '</br>Автор: ' . $row["username"] . '</div></div>';

        // Запрос для получения списка участников и их ролей
        $task_id = $row["id"];
        $participants_sql = "SELECT u.username, ut.role
                            FROM users AS u
                            INNER JOIN user_tasks AS ut ON u.id = ut.user_id
                            WHERE ut.task_id = $task_id";

        if ($participants_result = $conn->query($participants_sql)) {
            echo "<p>Участники:</p>";
            if ($participants_result->num_rows > 0) {
                while ($participant = $participants_result->fetch_assoc()) {
                    echo "<p>Участник: " . $participant["username"] . ", Роль: " . $participant["role"] . "</p>";
                }
            } else {
                echo "<p>Нет участников</p>";
            }
            $participants_result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    }
    $result->free();
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();
?>

    </div>
</body>
</html>