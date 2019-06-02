<?php
class Database 
{
	private $conn;
	function __construct() 
	{
		//CREATES DB CONNECTION
		$this->conn = new PDO("mysql:host=localhost;dbname=italk","root","");
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	//PROTECTED- HAS TO BE CALLED TO FUNCTION
	protected function insert($table, array $columns, array $values) 
	{
		$result = false;
		if (count($columns) !== count($values)) {
			return $result;  //ENSURES THAT COLUMNS=VALUES
		}
		$colString = implode(",", $columns);
		$valueCols = array_map(function($column) { return ":".$column; }, $columns);
		$colSafe = implode(",", $valueCols);
		$query = "INSERT INTO {$table}({$colString}) VALUES ({$colSafe})";
		$statement = $this->conn->prepare($query);//PREPARES STATEMENT FOR SECURITY
		for($i = 0;$i < count($columns);$i++) {
			$statement->bindValue($valueCols[$i], $values[$i]);
		}
		$statement->execute();
		$errorCode = $statement->errorCode();
		$statement->closeCursor();
		if ($errorCode === "00000") {
			$result = true;
			return $result;
		}
		return $result;
	}
	/*
	*e.g ["username" => 'cynthia']
	*/
	protected function delete($table, array $conditions) 
	{
		$query = '';
		$statement = null;
		if (count($conditions) > 0) {
			$query = "DELETE FROM {$table} ";
			$columns = array_keys($conditions);//TAKES THE CONDITIONS E.G WHERE
			$rules = array_map(function($column){ return $column."=:".$column; }, $columns);
			$values = array_values($conditions);
			$whereClause = "WHERE ".implode(" AND ", $rules);
			$query .= $whereClause;
			$statement = $this->conn->prepare($query);
			for ($i = 0; $i < count($columns); $i++) {
				$statement->bindValue($columns[$i],$values[$i]);
			}
		}else {
			$query = "DELETE FROM {$table}";
			$statement = $this->conn->prepare($query);
		}
		$statement->execute();
		$errorCode = $statement->errorCode();
		$statement->closeCursor();
		if ($errorCode === "00000") {
			return true;
		}
		return false;
	}
	protected function update($table, $set, $conditions)
	{
		//UPDATE user SET name = :name WHERE email=:email AND phone=:phone;
		$setColumns = array_keys($set);
		$setValues = array_values($set);
		$whereColumns = array_keys($conditions);
		$whereValues = array_values($conditions);
		$query = "UPDATE {$table} SET ";
		$bindKeys = array();
		$bindValues =array();
		if (count($setColumns) === 0) {
			return false;
		}
		$setString = implode(",", array_map(function($setColumn){return $setColumn."=:".$setColumn; }, $setColumns));
		$query .= $setString." ";
		for ($i = 0; $i < count($setColumns); $i++) {
			array_push($bindKeys, $setColumns[$i]);
			array_push($bindValues, $setValues[$i]);
		}
		if (count($whereColumns) > 0) {
			$whereString = implode(" AND ", array_map(function($whereColumn){return $whereColumn."=:".$whereColumn; }, $whereColumns));
			for ($i = 0; $i < count($whereColumns); $i++) {
				array_push($bindKeys, $whereColumns[$i]);
				array_push($bindValues, $whereValues[$i]);
			}
			$query .= "WHERE ".$whereString;
		}
		$statement = $this->conn->prepare($query);
		for ($i =0; $i < count($bindKeys); $i++) {
			$statement->bindValue(":".$bindKeys[$i],$bindValues[$i]);
		}
		$statement->execute();
		$errorCode = $statement->errorCode();
		$statement->closeCursor();
		if ($errorCode === "00000") {
			return true;
		}
		return false;
	}
	protected function select($query)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}