<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>Регистрация</title>
    <style>
        body {
            background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(A5662-How-can-architecture-become-more-diverse-Image-3.jpg);
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
            text-align: center;
            font-size: 48px;
            font-weight: normal;
            margin: 0;
            padding: 0 30px;
            line-height: 150px;
        }


        p {
            font-size: 20px;
            color: #fff;
            background: #969696;
            padding: 0 30px;
            line-height: 50px;
        }

        #container {
            text-align: center;
            left: 50%;
        }
        form {
            margin: 0 auto;
            background-color: #fff;
            padding: 5px 5px;
            width: 18%;
        }

        .btn-group button {
            margin: 0 auto;
            top: 50%;
            left: 50%;
            background-color: #4CAF50; /* Зеленый фон */
            border: 1px solid green; /* Зеленая граница */
            color: white; /* White text */
            padding: 10px 24px; /* Немного отступов */
            cursor: pointer; /* Указатель/значок руки */
            width: 25%; /* Установите ширину, если это необходимо */
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
        <h1>Система управления вашим проектом</h1>
    </div>
    <p></p>
    <p></p>
    <p></p>
    <div id="container">
        <form>
            Логин <br><input type=text name="login"></br>
            Пароль <br><input type=text name="password"></br>
        </form>
    </div>
    <p></p>
    <p></p>
    <p></p>
    <div class="btn-group">
        <button>Вход</button>
        <p></p>
        <a href="register.php"><button>Регистрация</button></a>
    </div>
</body>
</html>