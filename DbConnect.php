<?php 
	
	class DbConnect {
		private $server = 'bviwkxajficmpcnpuysi-mysql.services.clever-cloud.com';
		private $dbname = 'bviwkxajficmpcnpuysi';
		private $user = 'u2hzqq8j1pyjngpm';
		private $pass = '71ScFyZHFFmlriKyKYmK';

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' .$this->server .';dbname=' . $this->dbname, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch (\Exception $e) {
				echo "Database Error: " . $e->getMessage();
			}
		}
	}
 ?>


