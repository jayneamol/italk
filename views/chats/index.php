<!DOCTYPE html>
<html>
<head>
	<title>Chats</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
</head>
<body>
	<div id='chat'>
		<div class="chat-head">
			<div><h4>I-Talk</h4></div>
			<div><button id="chat-hide"></button></div>
		</div>
		<div class="chat-body">
		</div>
		<div class="chat-textField"></div>
		<form id='chat-form'>
			<textarea name="chatspace" placeholder="Type message" id='chat-message' autofocus required></textarea>
			<input type="submit" name="chat" value="SEND" id="chat-send">
		</form>
	</div>
</body>
</html>