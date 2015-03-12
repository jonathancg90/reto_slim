<?php
namespace models;

include_once('../lib/Core.php');

use lib\Core;
use PDO;

class User{

	protected $core;

	function __construct() {
		$this->core = Core::getInstance();
	}
	
	// Get all users
	public function getUsers() {
		$r = array();		
		$sql = "select * from user";
		$stmt = $this->core->dbh->prepare($sql);
 		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);		   	
		} else {
			$r = 0;
		}		
		return $r;
	}

	public function getUserById($id) {
		$r = array();		
		
		$sql = "select * from user WHERE id=$id";
		$stmt = $this->core->dbh->prepare($sql);
		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);		   	
		} else {
			$r = 0;
		}		
		return $r;
	}

	public function insertUser($data) {
		try {
			$sql = "insert into user(email, password, name, last_name, address, photo, group_id) 
	    					values(:email, :password, :name, :last_name, :address, :photo, :group_id)";
			$stmt = $this->core->dbh->prepare($sql);
			if ($stmt->execute($data)) {
				return $this->core->dbh->lastInsertId();;
			} else {
				return '0';
			}
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
		
	}
	public function updateUser($data) {
		try {
			$sql = "update user set email=:email, password=:password, name=:name, last_name=:last_name, address=:address, photo=:photo, group_id=:group_id where id=:id";
			$stmt = $this->core->dbh->prepare($sql);
			if ($stmt->execute($data)) {
				return "1";
			} else {
				return '0';
			}
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
		
	}

}