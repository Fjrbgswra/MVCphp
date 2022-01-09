<?php 

class Pegawai_model {

	//var untuk table
	private $table ='pegawai';
	//var untuk menampung db
	private $db;

	//lgsg instansiasi untuk panggil database
	public function __construct(){
		$this->db = new Database;
	}


	// PDO database handler buat menampung koneksi ke database
	// private $dbh;
	// private $stmt;

	//melakukan koneksi ke db
	// public function __construct(){
	// 	//data source name 
	// 	$dsn = 'mysql:host=localhost;dbname=pegawai';

	// 	try {
	// 		$this->dbh = new PDO($dsn, 'root', '');	
	// 	} catch(PDOException $e){
	// 		die($e->getMessage());
	// 	}
	// }


	public function getAllPegawai(){
	//select db
	// $this->stmt = $this->dbh->prepare('SELECT * FROM pegawai');
	//jalankan quary
	// $this->stmt->execute();
	//ambil semua datanya dari db
	// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

	//jalankan query
		$this->db->query('SELECT * FROM '.$this->table);
		return $this->db->resultSet();

	}

	//fungsi mengambil data berdasarkan id
	public function getPegawaiById($id){
		//untuk menyimpan data yg akan di binding
		$this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
		//bind id
		$this->db->bind('id',$id);
		//karna hanya 1 query
		return $this->db->single();
	}

	//fungsi menangkap data baru yg ditambahkan
	public function tambahDataPegawai($data)
	{
		$query = "INSERT INTO pegawai
				  VALUES
				  ('',:nama,:nip,:email,:depart)";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nip', $data['nip']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('depart', $data['depart']);

		$this->db->execute();

		return $this->db->rowCount();
		// var_dump($data);
		// echo "<pre>";
		// print_r($data);
		// die;
	}

	public function hapusDataPegawai($id){
		$query = "DELETE FROM pegawai WHERE id = :id";
		
		$this->db->query($query);
		$this->db->bind('id',$id);
		
		$this->db->execute();

		return $this->db->rowCount();	
	}

	public function ubahDataPegawai($data)
	{
		$query = "UPDATE pegawai
				  SET
				  nama    = :nama,
				  nip     = :nip,
				  email   = :email,
				  depart  = :depart
				  WHERE id= :id";
				  

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nip', $data['nip']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('depart', $data['depart']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
		// var_dump($data);
		// echo "<pre>";
		// print_r($data);
		// die;
	}

	public function cariDataPegawai(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM pegawai WHERE nama LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}

}
?>
