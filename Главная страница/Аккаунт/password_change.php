<!DOCTYPE html>
<html>
<head>
<title>Настройка аккаунта</title>
</head>
<body>
<!-- Форма для смены пароля -->
<form action="change_password.php" method="post">
<label for="current_password">Текущий пароль:</label>
<input type="password" name="current_password" id="current_password"><br><br>
<!-- Поле для ввода нового пароля -->
<label for="new_password">Новый пароль:</label>
<input type="password" name="new_password" id="new_password"><br><br>
<!-- Кнопка для смены пароля -->
<button type="submit">Изменить пароль</button>
</form>
<!-- Уведомление о том, что пароль был успешно изменен -->
<?php
if (isset($_POST['new_password'])) {
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
if ($current_password == "old_password") {
echo "<h2>Пароль успешно изменен.</h2>";
} else {
echo "Неверный текущий пароль. Попробуйте еще раз.";
}
}
?>
<!-- Сообщение об ошибке авторизации -->
<?php if (isset($_GET['error'])): ?>
<h2>Ошибка авторизации.</h2>
<?php echo $_GET['error']; ?>
<?php endif; ?>