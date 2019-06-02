<?php
/**
 * 
 */
class Admin extends Database
{
	function viewPost($id)
	{
		return $this->select("SELECT * FROM post WHERE id='{$id}'");
	}
	function deletePost($id)
	{
		return $this->delete("post", ["id" => $id]);
	}
	function deleteUser($username)
	{
		return $this->delete("user", ["username" => $username]);
	}
	function viewUser($username)
	{
		return $this->select("SELECT * FROM user WHERE username='{$username}'");
	}
}