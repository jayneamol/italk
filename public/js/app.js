
 function addUser() {
 	const signUp = document.getElementById('signUp');
 	let formData = new FormData();
	if (signUp !== null) {
		let formElements = signUp.elements;
		signUp.onsubmit = () => false;
		formElements.namedItem('AddUser').addEventListener('click', (event) => {
			if (signUp.checkValidity()) {
				formData.append('service', 'addUser');
				formData.append('username', formElements.namedItem('username').value);
				formData.append('fname', formElements.namedItem('fname').value);
				formData.append('lname', formElements.namedItem('lname').value);
				formData.append('mname', formElements.namedItem('mname').value);
				formData.append('email', formElements.namedItem('email').value);
				formData.append('password', formElements.namedItem('password').value);
				formData.append('role', formElements.namedItem('role').value);
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
						signUp.reset();
						alert ("Signup successful");
						return;
					}
				})
				.catch(err => {
					alert('Unable to sign up. Check your connection.'+err);
				});

			}
		});
}
 }
 (function login() {
 	const logIn = document.getElementById('logIn');
	let formData = new FormData();
	if (logIn !== null) {
		let formElements = logIn.elements;
		logIn.onsubmit = () => false;
		formElements.namedItem('LogIn').addEventListener('click', (event) => {
			if (logIn.checkValidity()) {
				formData.append('service', 'login')
				formData.append('username', formElements.namedItem('username').value);
				formData.append('password', formElements.namedItem('password').value);
				fetch('../../server/bootstrap.php', {
					method : "POST",
					body : formData
				})
				.then(res => res.text())
				.then(response => {
					return JSON.parse(response);
				})
				.then(json => {
					if (json.status !== 'success') {
						//console.log('Failed to log in.');
					    alert('Wrong username or password');
						return;
					}
					if (json.role === 'ADMIN') {
						window.location = "../../views/admin/index.php";
					}
					if (json.role === 'SUPPORT') {
						window.location = "../../views/support/index.php";
					}
					if (json.role === 'VISITOR') {
						window.location = "../../views/visitors/index.php";
					}
				})
				.catch(err => {
					console.log('Unable to login. Check your connection.'+err);
				});
			}
		});
	}
})();
function addResources() {
 	const addRe = document.getElementById('addRe');
 	let formData = new FormData();
	if (addRe !== null) {
		let formElements = addRe.elements;
		addRe.onsubmit = () => false;
		formElements.namedItem('addre').addEventListener('click', (event) => {
			if (addRe.checkValidity()) {
				formData.append('service', 'addResources');
				formData.append('name', formElements.namedItem('name').value);
				formData.append('user', formElements.namedItem('user').value);
				formData.append('url', formElements.namedItem('url').value);
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
						alert('Resource added successfully');
						addRe.reset();
					}
				})
				.catch(err => {
					alert('Unable to add resources. Check your connection.'+err);
				});

			}
		});
}
 }
 function addPost() {
	const postForm = document.getElementById('postForm');
	let formData = new FormData();
	if (postForm !== null) {
		let formElements = postForm.elements;
		postForm.onsubmit = () => false;
		formElements.namedItem('sendPost').addEventListener('click', (event) => {
			if (postForm.checkValidity()) {
				formData.append('service', 'addPost')
				formData.append('sender', 'sender');
				formData.append('post', formElements.namedItem('post').value);
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
						postForm.reset();
						alert('Post added successfully');
					}
				})
				.catch(err => {
					alert('Unable to send post. Check your connection.'+err);
				});

			}
		});
	}
}
 (function posts() {
 	let formData = new FormData();
 	formData.append('service', 'posts');
	formData.append('sender', 'sender');
	formData.append('post', 'post');
	formData.append('dateAdded', 'dateAdded');
 	fetch('../../server/bootstrap.php', {
		method : "POST",
		body: formData
	})
	.then(res => res.json())
	.then(posts => {
		let container = document.getElementById("post-list");
		if (container === null) {
			return;
		}
		for (let post of posts) {
			let div = document.createElement('div'),
			postTitle = document.createElement("div"),
			postBody = document.createElement("div"),
			postFoot = document.createElement("div"),
			span = document.createElement("span");
			postTitle.innerHTML = post.sender;
			postBody.innerHTML = post.post;
			postFoot.innerHTML = post.dateAdded;
			div.appendChild(postTitle);
			div.appendChild(postBody);
			div.appendChild(postFoot);
			container.appendChild(div);
		}
		
	})
	.catch(err => {
		console.log("Unable to get posts "+err);
	});
 })();
 (function viewUser() {
 	let formData = new FormData();
 	formData.append('service', 'viewUser');
	formData.append('username', 'username');
 	fetch('../../server/bootstrap.php', {
			method : "POST",
			body: FormData 

		})
		.then(res => res.json())
		.then(response => {
			let container = document.getElementById("view-users");
			for (let user of users) {
				console.log(user);
				let div = document.createElement('div'),
				user = document.createElement("div")
				user.innerHTML = user.user;
				div.appendChild(user);
				container.appendChild(div);
			
			}
		})
		.catch(err => {
			console.log("Unable to get fetch list of users "+err);
		});
 })
 ();