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
			<div id="prev-chats">
			</div>
			<form method = "POST" id = "chatForm">
				<input type="hidden" name="service" value="addChat">
				<fieldset>
					<textarea name = "chat" autofocus placeholder = "Type here..." required></textarea>
				</fieldset>
				<fieldset>
					<input type= "submit" name="sendChat" value="Send" class="btn">
				</fieldset>
			</form>
		</div>
		<div id="main-foot"><p>Copyright I-Talk Forum 2019</p></div>
	</div>
</body>
	<script src="../support/chat.php"></script>
</html>