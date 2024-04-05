<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Форма регистрации</title>
</head>
<body>
	<div class="container mt-4">
        <div class="row">
			<div class="col">
				<h1>Форма регистрации</h1>
					<form action="check.php" method="post">
					<input type="text" class="form-control" name="username" id="username" placeholder="Введите логин"><br>	

					<input type="email" class="form-control" name="email" id="email" placeholder="Введите email"><br>
					
					<input type="text" class="form-control" name="codeword" id="codeword" placeholder="Введите кодовое слово"><br>

					<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>

					<button class="btn btn-success" type="submit">Зарегистрировать</button>
					</form>
				</div>
			<div class="col">
				<h1>Форма авторизации</h1>
					<form action="auth.php" method="post">
					<input type="text" class="form-control" name="username" id="username" placeholder="Введите логин"><br>	
					<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
					<button class="btn btn-success" type="submit">Авторизоваться</button>
					</form>
					<a href="forgot_password.php">Забыли пароль?</a>
			</div>
		</div>
		
</body>
</html>




            
