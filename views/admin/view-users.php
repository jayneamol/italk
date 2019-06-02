<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
			<form method="POST" action=view-users.php>
			<table  width=700 cellspacing=0 cellpadding=5>
				<tr bgcolor=#ccccc><th align="left">Username</th><th align="left">First Name</th><th align="left">Last Name</th><th align="left">Middle Name</th><th align="left">Email</th><th align="left">Role</th></tr>
			<?php
			$db=new PDO("mysql:host=localhost;dbname=italk","root","");
 			$sql="SELECT username,fname,lname,mname,email, role FROM user";
			$result=$db->query($sql)->fetchAll(PDO::FETCH_NAMED);
 			foreach ($result as $key => $value) {
 			echo "<tr>";
 			echo "<td>".$value['username']."</td>";
 			echo "<td>".$value['fname']."</td>";
 			echo "<td>".$value['lname']."</td>";
 			echo "<td>".$value['mname']."</td>";
 			echo "<td>".$value['email']."</td>";
 			echo "<td>".$value['role']."</td>";
 			echo "</tr>";
 	          }
 		    ?>
 			</table>	
			</div>
		</div>
		<div id="main-foot"><p>Copyright I-Talk Forum 2019</p></div>
	</div>
</body>
	<!--<script src="../../public/js/app.js"></script> -->
</html>