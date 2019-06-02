<?php
/**
 * 
 */
class Forums extends Database
{
	function addPost($sender, $post)
	{
		return $this->insert("post",["sender","post"],[$sender, $post]);
	}
	function posts()
	{
		return $this->select("SELECT id, sender, post, DATE_FORMAT(post.dateAdded, '%D of %M,%Y at %H:%i:%s') AS dateAdded FROM post");
	}
	function postReplies($id) 
	{
		return $this->insert("SELECT * FROM postReply WHERE postID={$id}");
	}
	function addReply($postID, $user, $reply)
	{
		return $this->select("postReply",["postID","user", "reply"],[$postID, $user, $reply]);
	}
}