<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/Design/design.css">
	<title>Registrierung</title>
</head>
<body>
	<h1>Register</h1>
	<form method="POST">
	<h2>MailAdresse:</h2>
	<input type="email" name="email" value="<?= (isset($email)) ? htmlspecialchars($email) : "" ?>" />
	<h2>Passwort:</h2>
	<input type="password" name="password">
	<input type="submit" name="register" value="register">
	</form>
	<a href="login">login</a>
	<a href="https://localhost/">Home</a>
</body>
</html>
