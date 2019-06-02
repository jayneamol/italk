<?php
/**
 * 
 */
class Resources extends Database
{
	function addResources($name, $user, $url)
	{
		return $this->insert("resource", ["name", "user", "url"],[$name,$user,$url]);
	}
	function getResources($name, $user, $url)
	{
		return $this->select("SELECT id, name, user, url FROM resource ");
	}
}