<?php
/**
 * 
 */
class Chats extends Database
{
	function addChat($sender, $receiver, $message)
	{
		return $this->insert("chat", ["sender", "receiver", "message"],[$sender,$receiver,$message]);
	}
	function getChats($sender, $receiver)
	{
		return $this->select("SELECT id, sender, receiver, message, DATE_FORMAT(dateAdded, '%D of %M,%Y at %H:%i:%s') AS dateAdded FROM chat WHERE (sender='{$sender}' OR sender='{$receiver}') AND (receiver='{$sender}' OR receiver='{$receiver}')");
	}

	function chatList()
	{
		return $this->select("SELECT * FROM chat WHERE receiver='".$_SESSION['username']."'");
	}
}