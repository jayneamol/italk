<?php
require("app/models/Database.php");
require("admin/Admin.php");
require("forums/Forums.php");
require("user/User.php");
require("chats/Chats.php");
require("resources/Resources.php");

$Admin = new Admin();
$Forums = new Forums();
$User = new User();
$Chats = new Chats();
$Resources = new Resources();

header("Content-type: application/json");
@session_start();

if (!isset($_POST['service'])) {
	$res = ['status' => "failed", "message" => "Unspecified request."];
	echo json_encode($res);
	exit();
}
$service = $_POST['service'];
if ($service === "addChat") {
	$sender = $_SESSION['username'];
	$receiver = $_POST['receiver'];
	$message = $_POST['chat'];
	$add = $Chats->addChat($sender, $receiver, $message);
	if ($add) {
		echo json_encode(['status' => "success", 'message' => "Message sent."]);
	}else {
		echo json_encode(['status' => "failed", 'message' => "Message not sent."]);
	}
}
if ($service === "getChats") {
	$receiver = $_SESSION['username'];
	echo json_encode($Chats->getChats($_POST['sender'], $receiver));
}
if ($service === "addUser") {
	$username = $_POST['username'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$signup = $User->addUser(['username' => $username, 'fname' => $fname, 'lname'
		=> $lname, 'mname' => $mname, 'email' => $email, 'password' => $password, 'role' => $role]);
	if ($signup) {
		echo json_encode(['status' => "success", 'message' => "Signup successfull."]);
	}else {
		echo json_encode(['status' => "failed", 'message' => "Unsuccessfull signup."]);
	}
}
if ($service === "login") {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$log = $User->login($_POST['username'], $_POST['password'] );
	if ($log) {
		echo json_encode(['status' => "success", 'role' => $_SESSION['role']]);
	}else {
		echo json_encode(['status' => "failed", 'message' => "Unsuccessfull login."]);
	}
}
if ($service === "addResources") {
	$name = $_POST['name'];
	$user = $_SESSION['username']; 
	$url = $_POST['url'];
	$ad = $Resources->addResources($_POST['name'], $user, $_POST['url']);
	if ($ad) {
		echo json_encode(['status' => "success", 'message' => "Resource added successfully."]);
	}else {
		echo json_encode(['status' => "failed", 'message' => "Resource addition unsuccessfull."]);
	}
}
if ($service === "addPost") {
	$sender = $_SESSION['username']; 
	$post = $_POST['post'];
	$adpost = $Forums->addPost($sender,$_POST['post']);
	if ($adpost) {
		echo json_encode(['status' => "success", 'message' => "Post added in forum."]);
	}else {
		echo json_encode(['status' => "failed", 'message' => "Uanble to add post in forum."]);
	}
}
if ($service === "posts") {
	$sender = $_POST['sender'];
	$post = $_POST['post'];
	$dateAdded = $_POST['dateAdded'];
	echo json_encode($Forums->posts($sender, $_POST['post'], $_POST['dateAdded']));
}
if ($service === "viewUser") {
	$username = $_POST['username'];
	echo json_encode($Admin->viewUser($_POST['username']));
}

if ($service === 'chatList') {
	echo json_encode($Chats->chatList());
}