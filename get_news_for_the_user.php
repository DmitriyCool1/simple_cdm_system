<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>Управление проектом</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(01.jpg);
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
            height: 100%;
            /* Full-height: remove this if you want "auto" height */
            width: 160px;
            /* Set the width of the sidebar */
            position: fixed;
            /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1;
            /* Stay on top */
            top: 0;
            /* Stay at the top */
            left: 0;
            background-color: #111;
            /* Black */
            overflow-x: hidden;
            /* Disable horizontal scroll */
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
            background-color: green;
            margin-left: 160px;
            /* Same as the width of the sidebar */
            margin-right: 60px;
            position: center;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
            .sidenav a {
                font-size: 18px;
            }
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
            position: absolute;
            bottom: 0px;
        }
        .container{
            font-size: 150%;
            margin: 0 auto;
            position: relative;
            width: max-content;
            background-color: #fff;
            text-align: center;
        }
        TABLE {
    width: 100%; /* Ширина таблицы */
    border: 1px solid #399; /* Граница вокруг таблицы */
    border-spacing: 7px 5px; /* Расстояние между границ */
   }
   TD {
    background: #fc0; /* Цвет фона */
    border: 1px solid #333; /* Граница вокруг ячеек */
    padding: 5px; /* Поля в ячейках */ 
   }
    </style>
</head>
<body>
    <div id="header">
        <h1>PROЕКТ</h1>
    </div>
    <!-- Side navigation -->
    <div class="sidenav">
        <a href="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0/index.php">Главная</a>
        <a href="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0/Создать/create.php">Создать</a>
        <a href="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0/Справка/spravka.html">Справка</a>
        <a href="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0/Аккаунт/account.php">Аккаунт</a>
        <a href="get_news_for_the_user.php">Новости</a>
        <a href="view_created_tasks.php">Мои задания</a>
    </div>
    <!-- Page content -->
<p></p>
<div class="main">
        <div class="container">
            <?php
            session_start();

// Проверка, установлена ли сессия и содержит ли она значение user_id
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
    // Сессия установлена и user_id > 0, продолжаем выполнение кода
    $user_id = $_SESSION['user_id'];
} else {
    // Сессия не установлена или user_id <= 0, перенаправление на страницу авторизации
    header("Location: Сайт%20регистрации/index.php");
    exit(); // Убедитесь, что вызывается exit() после перенаправления
}
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

            // Получение списка всех соответствующих строк из таблицы news для заданного user_id, отсортированных по дате

            $sql = "SELECT news.Date, tasks.title, news.Description FROM news JOIN tasks ON news.task_id=tasks.id WHERE news.user_id = $user_id ORDER BY news.Date DESC";
            $result = $conn->query($sql);

            // Вывод списка строк
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Дата</th><th>Задание</th><th>Описание</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Date"] . "</td><td>" . $row["title"] . "</td><td>" . $row["Description"] . "</td></tr>";
                }

                echo "</table>";
            } else {
                echo "Нет новостей";
            }

            // Закрытие подключения
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
