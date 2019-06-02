<!DOCTYPE html>
<html>
<head>
	<title>Visitors</title>
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
			<form action = "../../server/bootstrap.php" method = "POST" id = "postForm">
				<input type="hidden" name="service" value="addPost">
				<fieldset>
					<textarea name = "post" autofocus placeholder = "Type here..." required></textarea>
				</fieldset>
				<fieldset>
					<input type = "submit" name = "sendPost" value = "Send" class = "btn">
				</fieldset>
			</form>
		</div>
		<div id="main-foot"><p>Copyright I-Talk Forum 2019</p></div>
	</div>
</body>
</html>