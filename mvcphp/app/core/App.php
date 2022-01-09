<?php 

/**
 * 
 */
class App
{
	//property unutk akses 
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];


	public function __construct()
	{
		// code...
		$url = $this->parseURL();

		// 1.controller
		//ada ga file di dlm controller yg namanya dari index array ke 0
		if (file_exists('../app/controllers/'. $url[0]. '.php')) {
			// kalau ada mengganti property dari controller menjadi array tsbt
			$this->controller = $url[0];
			//agar bisa ambil parameter
			unset($url[0]);
		}

		//mengambil controller dan digabungkan dengan controller
		require_once '../app/controllers/'. $this->controller .'.php';
		//instansiasi object agar bisa mengambil method
		$this-> controller = new $this->controller;


		// 2.method
		//method untuk array [1]
		if (isset($url[1])) {
			// cek adakah method url 1
			if( method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}


		//3.params
		//cek parameter di array 2...
		if (!empty($url)) {
			// $this->params = array_values($url);
			if(!isset($url[0])){
			// untuk memasukkan ke property param diisi dengan array url
               $this->params = array_values($url);
            } 
		}


		//4.Jalankan controller, method dan kirim params jika ada
		//
		call_user_func_array([$this->controller,$this->method], $this->params);
	}

	//mengambil url dan memecah seesusai dgn ..
	public function parseURL()
	{
		if (isset($_GET['url'])) {
			// rtrim menghapus '/' di akhir url
			$url = rtrim($_GET['url'],'/');
			//filter_var agar menghindari karakter2 aneh 
			$url = filter_var($url,FILTER_SANITIZE_URL);
			//memecah url berdasrakan /
			$url = explode('/', $url);
			return $url;
		}
	}
}
 ?>