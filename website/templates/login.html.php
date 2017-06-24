<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/Design/design.css">
 	<title>Login</title>
</head>
<body>
	<h1>Einloggen</h1>
	<form method="POST">
	<?php echo $csrf?>
		<h2>Email</h2><input type="email" name="email" value="<?= (isset($email)) ? htmlspecialchars($email):""?>"/>
		<h2>Passwort:</h2><input type="password" name="password">
		<input type="submit" name="login" value="Login">
	</form>
	<a href="register">Registrieren</a>
</body>
</html>
