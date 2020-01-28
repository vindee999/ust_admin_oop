<?php 
	
	class Database{

		public $dbHost = DB_HOST;
		public $dbUser = DB_USER;
		public $dbPass = DB_PASS;
		public $dbName = DB_NAME;
		public $link;
		public $error;

		public function __construct(){
			$this->connect();
		}

		private function connect(){
			$con = new mysqli($this->dbHost,$this->dbUser,$this->dbPass,$this->dbName);
		}

	}

?>