<?php 

namespace core\lib;

class model extends \PDO{
	public function __construct(){
		$dsn = 'mysql:host=localhost;daname=framework';
		$username = 'root';
		$password = '';
		try{
			parent::__construct($dsn, $username, $password);
		} catch(\PDOException $e){
			ddd($e->getMessage());
		}
	}
}