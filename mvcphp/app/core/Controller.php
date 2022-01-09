<?php 
/**
 * mengatur semua class di folder controller
 */
class Controller
{
	//mengakses method view, parameter untuk view apa , dan isi data apa
	public function view($view,$data=[])
	{
		//panggil view pada folder view
		require_once '../app/views/'. $view .'.php';
	}

	public function model($model){
		// panggil model pada folder model
		require_once '../app/models/'. $model .'.php';
		//instansiasi class
		return new $model;
	}
}
 ?>