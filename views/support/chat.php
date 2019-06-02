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
			<div id="prev-chats">
			</div>
			<form method="POST" id="chatForm" >
				<input type="hidden" name="service" value="addChat">
				<fieldset>
					<textarea name = "chat" autofocus placeholder = "Type here..." required></textarea>
				</fieldset>
				<fieldset>
					<input type= "submit" name="sendChat" value="Send" class="btn">
				</fieldset>
			</form>
			<!-- <a href="chat.php" download>Download</a> -->
		</div>
		<div id="main-foot"><p>Copyright I-Talk Forum 2019</p></div>
	</div>
	<script>
		let sender = window.location.search.replace("?", "").split("&")[0].split("=")[1];
		let receiver = window.location.search.replace("?", "").split("&")[1].split("=")[1];
		(function chat() {
			const chatForm = document.getElementById('chatForm');
			//chatForm.onsubmit = () => false;
			const prevChats = document.getElementById('prev-chats');
			let formData = new FormData();
			if (chatForm !== null) {
				let formElements = chatForm.elements;
				formElements.namedItem('sendChat').addEventListener('click', (event) => {
					if (chatForm.checkValidity()) {
						formData.append('service', 'addChat')
						formData.append('receiver', receiver);
						formData.append('chat', formElements.namedItem('chat').value);
						fetch('../../server/bootstrap.php', {
							method : "POST",
							body : formData
						})
						.then(res => res.text())
						.then(response => {
							return JSON.parse(response);
						})
						.then(json => {
							if (json.status === 'success') {
								chatForm.reset();
							}
						})
						.catch(err => {
							alert('Unable to send chat. Check your connection.'+err);
						});

					}
				});
			}
		})();
		function getChats() {
			let formData = new FormData();
			formData.append('service', 'getChats');
			formData.append('sender', sender);
			fetch('../../server/bootstrap.php', {
				method : "POST",
				body : formData
			})
			.then(res => res.text())
			.then(response => {
				return JSON.parse(response);
			})
			.then(chats => {
				let prevChats = document.getElementById('prev-chats');
				if (prevChats === null) {
					return;
				}
				for (let chat of chats) {
					let box = document.createElement('div'), p =document.createElement('p'), span = document.createElement('span');
					box.classList.add('chatMessage');
					if (chat.sender === sender) {
						box.classList.add('received-message');
					}else {
						box.classList.add('send-message');
					}
					p.innerHTML = chat.message;
					span.innerHTML = chat.dateAdded;
					box.appendChild(p);
					box.appendChild(span);
					prevChats.appendChild(box);
				}
			})
			.catch(err => {
				console.log('Unable to get chats. Check your connection.'+err);
			});
		}
		getChats();
	</script>
</body>
</html>