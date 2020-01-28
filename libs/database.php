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
			$this->link = new mysqli($this->dbHost,$this->dbUser,$this->dbPass,$this->dbName);

			if(!$this->link){
				$this->error =  "Connection Failed ".$this->link->connect_error;
			}
		}

		public function select($query){
			$result = $this->link->query($query);

			if($result->num_rows > 0){
				return $result;
			}else{
				return false;
			}

		}

		public function insert($query){
			$insert = $this->link->query($query);

			if($insert){
				header('Location: index.php?insert=Post Inserted');
			}else{
				echo "Did not insert";
			}

		}

		public function update($query){
			$update = $this->link->query($query);

			if($update){
				header('Location: index.php?insert=Post Updated');
			}else{
				echo "Did not update";
			}

		}

		public function delete($query){
			$delete = $this->link->query($query);

			if($delete){
				header('Location: index.php?insert=Post Deleted');
			}else{
				echo "Did not update";
			}

		}


	}

?>