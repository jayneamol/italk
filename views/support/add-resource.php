<!DOCTYPE html>
<html>
<head>
	<title>Support Providers</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
	
</head>
<body>
	<div class="container">
		<div id="main-header">
			<?php require('header.php'); ?>
		</div>
		<div id="main-nav">
			<?php require('nav.php'); ?>
		</div>
		<div id="main-body">
			<form action="../../server/bootstrap.php" method="POST" id="addRe">
				<input type="hidden" name="service" value="addResources">
				<label>Resource Name:</label>
				<input type="text" name="name" autofocus placeholder="Resource Name" required><br><br>
				<label>Resource File:</label>
				<input type="file" name="url"><br>
				<input type="submit" name="addre" value="SUBMIT" class="button">
			</form>
		</div>
		<div id="main-foot"><p>Copyright I-Talk Forum 2019</p></div>
	</div>
</body>
</html>