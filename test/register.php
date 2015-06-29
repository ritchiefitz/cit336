<?php 
    if (!$_SESSION) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="." method="post">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email">
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br>
		<label>&nbsp;</label>
		<input type="submit" name="action" value="Register">
	</form>
</body>
</html>