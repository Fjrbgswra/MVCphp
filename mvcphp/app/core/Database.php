<?php 

/**
 * 
 */
class Database
{
	private $host 	 = DB_HOST;
	private $user 	 = DB_USER;
	private $pass 	 = DB_PASS;
	private $db_name = DB_NAME;

	//variabel koneksi
	private $dbh;
	private $stmt;

	public function __construct(){
		//data source name 
		$dsn = 'mysql:host='. $this->host .';dbname='. $this->db_name;

		//mengoptimasi koneksi ke database
		$option = [
			//membuat database agar koneksi terjaga terus	
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);	
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	//func untuk menjalankan query menjadi generik untuk crud
	public function query($query){
		//digunakan untuk apa insert/edit/delete
		$this->stmt = $this->dbh->prepare($query);
	}

	//binding data
	public function bind($param,$value,$type= null){
		if (is_null($type)) {
			//mengubah nilai value
			switch(true){
				case is_int($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}
		//bind untuk bersih dari sql injection
		$this->stmt->bindValue($param, $value, $type);
	}

	//eksekusi perintah 
	public function execute(){
		
		$this->stmt->execute();
	}

	//hasilnya data banyak setelah eksekusi
	public function resultSet(){
		//panggil execute
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	//mengambil 1 data
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}


	//menghitung berapa baris yg berubah
	public function rowCount(){
		return $this->stmt->rowCount();
	}
}
 ?>