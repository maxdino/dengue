<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipress_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ipress_m');
	}

	public function index()
	{
		$data['ipress'] = $this->Ipress_m->mostrar();
		$this->load->view('ipress/Ipress_v',$data);
	}

	public function nuevo()
	{	
		$data['red'] = $this->Ipress_m->red();
		$data['microred'] = $this->Ipress_m->microred();
		$data['tipos'] = $this->Ipress_m->tipos();
		$data['categorias'] = $this->Ipress_m->categorias();
		$data['provincias'] = $this->Ipress_m->provincias();
		$data['departamentos'] = $this->Ipress_m->departamentos();
		$this->load->view('ipress/Nuevo_v',$data);
	}

	public function distritos()
	{
		$r = $this->db->query("select * from distritos where(id_provincias=".$this->input->post("id").")")->result();
		echo json_encode($r);
	}

	public function provincias()
	{
		$r = $this->db->query("select * from provincias where(id_departamentos=".$this->input->post("id").")")->result();
		echo json_encode($r);
	}

	public function microred()
	{
		$r = $this->db->query("select * from microred where(red=".$this->input->post("id").")")->result();
		echo json_encode($r);
	}

	public function agregar()
	{	
		$this->Ipress_m->agregar();
		header('Location: ../Ipress_c');
	}

	public function editar($id)
	{	
		$data['red'] = $this->Ipress_m->red();
		$data['microred'] = $this->Ipress_m->microred();
		$data['ipress'] = $this->Ipress_m->ipress_editar($id);
		$r = $this->db->query("select * from ipress where(codigo=".$id.")")->row();
		$r1 = $this->db->query("select * from distritos where(id_distritos=".$r->distrito.")")->row();
		$r2 = $this->db->query("select * from distritos where(id_provincias=".$r1->id_provincias.")")->result();
		$r11 = $this->db->query("select * from provincias where(id_provincias=".$r1->id_provincias.")")->row();
		$r12 = $this->db->query("select * from provincias where(id_departamentos=".$r11->id_departamentos.")")->result();
		$data['distritos_m'] = $r2;
		$data['provincias_m'] = $r12;
		$r3 = $this->db->query("select * from ipress where(codigo=".$id.")")->row();
		$r4 = $this->db->query("select * from microred where(id_microred=".$r3->microred.")")->row();
		$r5 = $this->db->query("select * from microred where(red=".$r4->red.")")->result();
		$data['microred_m'] = $r5;
		$data['tipos'] = $this->Ipress_m->tipos();
		$data['categorias'] = $this->Ipress_m->categorias();
		$data['provincias'] = $this->Ipress_m->provincias();
		$data['distritos'] = $this->Ipress_m->distritos();
		$data['departamentos'] = $this->Ipress_m->departamentos();
		$this->load->view('ipress/Editar_v',$data);
	}

	public function modificar()
	{	
		$this->Ipress_m->modificar();
		header('Location: ../Ipress_c');
	}

	public function eliminar()
	{	
		$this->Ipress_m->eliminar();
	}

}
