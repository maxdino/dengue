<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilegios_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Privilegios_m');
	}


	public function index()
	{
		$permisos = $this->Privilegios_m->traer_modulos();
		$data["perfil_usuario"] =  $this->Privilegios_m->perfil_usuario();
		$data["permisos2"] = $permisos;
		$this->load->view('seguridad/privilegios/privilegios_v',$data);
	}

	public function cantidad_modulos()
	{
		$r = $this->db->query("select * from modulo ")->result();
		
		echo json_encode($r);
	}

	public function modulos_padre()
	{
		$r = $this->db->query("select * from modulo where id_padre=0 ")->result();
		
		echo json_encode($r);
	}

	public function modulos_seleccionados()
	{
		$r = $this->db->query("select * from perfil_usuario_modulo where id_perfil_usuario=".$this->input->post("id_perfil_usuario"))->result();
		
		echo json_encode($r);
	}

	public function agregar()
	{
		
		$this->Privilegios_m->agregar();
	}

}