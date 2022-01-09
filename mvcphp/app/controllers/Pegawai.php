<?php
/**
 * 
 */
class Pegawai extends Controller
{
	//method default dari App
	public function index(){

		//memanggil view pada folder view
		$data['judul'] = 'Daftar Pegawai';
		//data dari model
		$data['pgw'] = $this->model('Pegawai_model')->getAllPegawai();
		$this->view('templates/header',$data);
		$this->view('pegawai/index',$data);
		$this->view('templates/footer');
	}

	public function detail($id){

		//memanggil view pada folder view
		$data['judul'] = 'Detail Pegawai';
		//data dari model ambil id
		$data['pgw'] = $this->model('Pegawai_model')->getPegawaiById($id);
		$this->view('templates/header',$data);
		$this->view('pegawai/detail',$data);
		$this->view('templates/footer');
	}

	public function tambah(){
		//jika kita menjalankan model yg berisi method tambah data maka..
		if ($this->model('Pegawai_model')->tambahDataPegawai($_POST) > 0) {

			//set flash
			Flasher::setFlash('berhasil','ditambahkan','success');

			//maka akan redirect ke
			header('Location: '. BASEURL . '/Pegawai');
			exit;
		} 
		else{
			//set flash
			Flasher::setFlash('gagal','ditambahkan','danger');

			//maka akan redirect ke
			header('Location: '. BASEURL . '/Pegawai');
			exit;
		}
	}

	public function hapus($id){
		//jika kita menjalankan model yg berisi method tambah data maka..
		if ($this->model('Pegawai_model')->hapusDataPegawai($id) > 0) {

			//set flash
			Flasher::setFlash('berhasil','dihapus','success');

			//maka akan redirect ke
			header('Location: '. BASEURL . '/Pegawai');
			exit;
		} 
		else{
			//set flash
			Flasher::setFlash('gagal','dihapus','danger');

			//maka akan redirect ke
			header('Location: '. BASEURL . '/Pegawai');
			exit;
		}
	}

	public function getUbah(){
		//membuat method berdasarkan id
		echo json_encode($this->model('Pegawai_model')->getPegawaiById($_POST['id']));
	}

	public function ubah(){
		if ($this->model('Pegawai_model')->ubahDataPegawai($_POST) > 0) {

			//set flash
			Flasher::setFlash('berhasil','diubah','success');

			//maka akan redirect ke
			header('Location: '. BASEURL . '/Pegawai');
			exit;
		} 
		else{
			//set flash
			Flasher::setFlash('gagal','diubah','danger');

			//maka akan redirect ke
			header('Location: '. BASEURL . '/Pegawai');
			exit;
		}
	}

	public function cari(){
		//memanggil view pada folder view
		$data['judul'] = 'Daftar Pegawai';
		//data dari model
		$data['pgw'] = $this->model('Pegawai_model')->cariDataPegawai();
		$this->view('templates/header',$data);
		$this->view('pegawai/index',$data);
		$this->view('templates/footer');
	}
}
 ?>