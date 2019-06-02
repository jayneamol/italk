 <!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
</head>
<body>
	<div>
		<form action="../../server/bootstrap.php" method="POST" id="signUp">
		<input type="hidden" name="service" value="addUser">	
			<label>Username:</label>
			<input type="text" name="username" placeholder="Username" autofocus required><br><br>
			<label>First Name:</label>
			<input type="text" name="fname" placeholder="First Name" required><br><br>
			<label>Last Name:</label>
			<input type="text" name="lname" placeholder="Last Name" required><br><br>
			<label>Middle Name:</label>
			<input type="text" name="mname" placeholder="Middle Name" ><br><br>
			<label>Email:</label>
			<input type="text" name="email" placeholder="Email"><br><br>
			<label>Password:</label>
			<input type="password" name="password" placeholder="********"><br><br>
			<label>Role:</label>
			<input type="text" name="role" placeholder="VISITOR or SUPPORT"><br><br>
			<input type="submit" value="SUBMIT" name="AddUser" class="button">
		</form>
	</div>	
</body>
	<script src="../../public/js/app.js"></script>
</html>