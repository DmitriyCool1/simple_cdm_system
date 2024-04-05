<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Восстановление пароля</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(A5662-How-can-architecture-become-more-diverse-Image-3.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            color: #505050;
            font: 14px 'Segoe UI', tahoma, arial, helvetica, sans-serif;
            margin: 20px;
        }

        #header {
            background: #efefef;
            padding: 0;
        }

        h1 {
            position: sticky;
            text-align: center;
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
            padding: 5px;
            width: 18%;
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

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .left-container,
        .right-container {
        background-color: #fff;
            width: 45%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-field {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 160%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div id="header">
    <h1>Восстановление пароля</h1>
</div>
    <?php
    if (isset($_POST['email'], $_POST['codeword'], $_POST['password'])) {
        $email = $_POST['email'];
        $codeword = $_POST['codeword'];
        $newPassword = $_POST['password'];

        if (!empty($email) && !empty($codeword) && !empty($newPassword)) {
            $mysql = new mysqli('localhost', 'root', 'root', 'planner_db');

            if ($mysql->connect_error) {
                die("Ошибка подключения: " . $mysql->connect_error);
            }

            // Подготовка и выполнение SQL-запроса для поиска пользователя по электронной почте и кодовому слову
            $query = "SELECT * FROM users WHERE email = '$email' AND codeword = '$codeword'";
            $result = $mysql->query($query);

            if ($result) {
                $row = $result->fetch_assoc();

                // Проверяем, найден ли пользователь с указанной почтой и кодовым словом
                if ($row) {
                    $userId = $row['id'];

                    // Удаляем старый пароль пользователя из базы данных
                    $deleteQuery = "UPDATE users SET password = '$newPassword' WHERE id = '$userId'";
                    $deleteResult = $mysql->query($deleteQuery);
                    if ($deleteResult) {
                        echo '<div style="background-color: white; padding: 10px;">';
                        echo "Пароль успешно изменен.";
                        echo "<br>";
                        echo '<a href="index.php">Перейти к авторизации</a>';
                        echo '</div>';
                        exit();
                    } else {
                        echo "Ошибка при изменении пароля: " . $mysql->error;
                    }
                } else {
                    echo "Пользователь с указанной почтой и кодовым словом не найден";
                }
            } else {
                echo "Ошибка выполнения запроса: " . $mysql->error;
            }

            $mysql->close();
        } else {
            echo "Пожалуйста, заполните все поля";
        }
    }
    ?>
<div class="container">
        <div class="left-container">
    <form action="reset_password.php" method="post">
    <div class="input-field">
        <input type="email" class="form-control" name="email" placeholder="Введите вашу почту" required><br>
    </div>
     <div class="input-field">
        <input type="text" class="form-control" name="codeword" placeholder="Введите кодовое слово" required><br>
    </div>
    <div class="input-field">
        <input type="password" class="form-control" name="password" placeholder="Введите новый пароль" required><br>
    </div>
    <div class="btn-group">
        <button class="btn btn-success" type="submit">Восстановить пароль</button>
    </div>
    </div>
    </form>
</div>
    </form>
</div>
</body>
</html>

