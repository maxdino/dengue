<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_usuario_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perfil_usuario_m');
	}


	public function index()
	{
		$data['perfil_usuario']= $this->Perfil_usuario_m->mostrar();
		$this->load->view('seguridad/perfil_usuario/Perfil_usuario_v',$data);
	}

	public function nuevo()
	{
		$this->load->view('seguridad/perfil_usuario/Nuevo_v');
	}

	public function agregar()
	{
		$this->Perfil_usuario_m->agregar();
		 header('Location: ../Perfil_usuario_c');
	}

	public function editar($id)
	{
		$data['perfil_usuario']= $this->Perfil_usuario_m->perfil_usuario_editar($id);
		$this->load->view('seguridad/perfil_usuario/Editar_v',$data);
	}

	public function modificar()
	{
		$this->Perfil_usuario_m->modificar();
		header('Location: ../Perfil_usuario_c');
	}

	public function eliminar()
	{
		$this->Perfil_usuario_m->eliminar();
	}

}
