<?php

namespace models;

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
			return $r[0];	   	
		} else {
			$r = 0;
			return $r;
		}		
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
			$sql = "update user set email=:email, name=:name, last_name=:last_name, address=:address, photo=:photo, group_id=:group_id where id=:id";
			$stmt = $this->core->dbh->prepare($sql);
			if ($stmt->execute($data)) {
				return true;
			} else {
				return false;
			}
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
	}

	public function deleteUser($id) {
		try {
			$sql = "delete from user where id=$id";
			$stmt = $this->core->dbh->prepare($sql);
			if ($stmt->execute($data)) {
				return true;
			} else {
				return false;
			}
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
	}

	static function login($email, $password) {
		try {
			$core = Core::getInstance();

			$sql = "select * from user WHERE email='$email'";
			$stmt = $core->dbh->prepare($sql);
			if ($stmt->execute()) {
				if($stmt->rowCount() > 0){	
					$user = $stmt->fetchAll(PDO::FETCH_ASSOC);	
					if (crypt($password, $user[0]["password"]) == $user[0]["password"]){
					   $result = true;
			        } else {
			        	$result = false;
			        }
				} else {
					$result = false;
				}	   	
			} else {
				$result = false;
			}		


	        return $result;
        } catch(PDOException $e) {
        	echo  $e->getMessage();
    	}
	}

}