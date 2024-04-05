<?php
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$codeword = filter_var(trim($_POST['codeword']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

if (mb_strlen($username) < 5 || mb_strlen($username) > 90) {
    echo "Недопустимая длина логина!";
    exit();
} else if (mb_strlen($codeword) < 5 || mb_strlen($codeword) > 10) {
    echo "Недопустимая длина кодового слова (от 5 до 10 символов)";
    exit();
} else if (mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
    echo "Недопустимая длина пароля (от 2 до 6 символов)";
    exit();
}

// Параметры mysqli изменяются в зависимости от того xampp это или нет
$mysql = new mysqli('localhost', 'root', 'root', 'planner_db');
$mysql->query("INSERT INTO `users` (`username`, `password`, `email`, `codeword`) VALUES('$username', '$pass','$email', '$codeword')");

$mysql->close();
header('Location: index.php');
?>
