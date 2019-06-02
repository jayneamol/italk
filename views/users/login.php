<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
</head>
<body>
	  <div>
		<form action="../../server/bootstrap.php" method="GET" id="logIn">
	    	<input type="hidden" name="service" value="logIn">
	    	<label>Username:</label>
	    	<input type="text" name="username" autofocus placeholder="Username" required><br><br>
	    	<label>Password:</label>
	    	<input type="password" name="password" placeholder="********"><br><br>
	    	<input type="button" name="LogIn" value="SUBMIT" class="button">
		</form>
	</div>
</body>
	<script src="../../public/js/app.js"></script>
</html>