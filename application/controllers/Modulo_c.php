<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulo_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modulo_m');
	}

	public function index()
	{

			$data['modulo'] = $this->Modulo_m->modulo();
			$data['modulo_padre'] = $this->Modulo_m->modulo_padre();
			$this->load->view('seguridad/modulo/Modulo_v',$data );
	}

	public function nuevo()
	{	
		$data['modulo_padre'] = $this->Modulo_m->modulo_padre();

		$this->load->view('seguridad/modulo/Nuevo_v',$data);
	}

	public function agregar()
	{

		$this->Modulo_m->agregar(); 
		header('Location: ../Modulo_c');

	}
 

	public function editar($id)
	{
		$data['modulo'] = $this->Modulo_m->listar_modulo($id);
		$data['modulo_padre'] = $this->Modulo_m->modulo_padre();
		$this->load->view('seguridad/modulo/Editar_v',$data);
	}	

	public function modificar()
	{
		$this->Modulo_m->modificar(); 
		header('Location: ../Modulo_c');
		
	}	

}

?>