<?php
/**
 * 
 */
class User extends Database
{
	function addUser(array $values)
	{
		$password = password_hash($values['password'], PASSWORD_DEFAULT);
		return $this->insert("user", ['username', 'fname', 'lname', 'mname', 'email', 'password', 'role'], [$values['username'], $values['fname'], $values['lname'], $values['mname'], $values['email'], $password, $values['role']]);
	}
	function login($username, $password)
	{
		$state = false;
		$result = $this->select("SELECT username, email, password, role FROM user WHERE username ='{$username}' OR email='{$username}' LIMIT 1");
		if (count($result) === 0) {
			return $state;
		}
		$state = password_verify($password, $result[0]['password']);
		@session_start();
		$_SESSION['username'] = $result[0]['username'];
		$_SESSION['email'] = $result[0]['email'];
		$_SESSION['role'] = $result[0]['role'];
		return $state;
	}
}