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
			<div id="chats-list" style="display: flex;flex-direction: column;"></div>
			<script>
				let formData = new FormData();
				formData.append('service', 'chatList');
				fetch('../../server/bootstrap.php', {
					method: "POST",
					body: formData
				})
				.then(res => res.text())
				.then(text => {
					let a;
					let chats = JSON.parse(text);
					for (let chat of chats) {
						a = document.createElement('a');
						a.setAttribute("href", "http://localhost/italk/views/support/chat.php?sender="+chat.sender+"&receiver="+chat.receiver);
						a.innerHTML = chat.sender + " <i>" + chat.message +"</i>";
						document.getElementById("chats-list").appendChild(a);
					}
				})
				.catch(function(err) {
					console.log(err);
				});
			</script>
		</div>
		</div>
		<div id="main-foot"><p>Copyright I-Talk Forum 2019</p></div>
</body>
</html>