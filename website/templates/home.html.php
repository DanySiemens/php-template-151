
<!Doctype>
<html>
<head>
	<link rel="stylesheet" href="/Design/design.css">
 	<title>Homepage</title>
</head>
<body>
	<h1>Danys Blog</h1>
	<?php
		if(!isset($_SESSION['email'])){
		echo "<form id='login' method='post'><input type='hidden' name='login' id='login'></input>
		<Button type='submit'>Login</Button>
		</form>";
		echo "<form id='register' method='post'><input type='hidden' name='register' id='register'></input>
		<Button type='submit'>Register</Button>
      		</form>";
		}
		else {
		?><a href="#">Post Erstellen</a>
		<a href="#">Ausloggen</a><?php
		}
		?>
		<?php
	?>
</body>
</html>
