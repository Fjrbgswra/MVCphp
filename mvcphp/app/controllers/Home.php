<?php 
/**
 * 
 */
class Home extends Controller
{
	//method default dari App
	public function index(){

		//mengambil data pada model
		$data['nama'] = $this->model('User_model')->getUser()	;

		//memanggil view pada folder view
		$data['judul'] = 'Home';
		$this->view('templates/header',$data);
		$this->view('home/index',$data);
		$this->view('templates/footer');
	}

}
 ?>