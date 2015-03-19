<?php

namespace models;

use lib\Core;
use PDO;

class UserGroup{

	protected $core;

	function __construct() {
		$this->core = Core::getInstance();
	}

	public function getGroups() {
		$r = array();		
		$sql = "SELECT * FROM UserGroup";
		$stmt = $this->core->dbh->prepare($sql);
 		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);		   	
		} else {
			$r = 0;
		}		
		return $r;
	}

}