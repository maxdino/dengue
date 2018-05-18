<?php
class Ipress_m extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}

	public function mostrar()
	{
		$this->db->select("*");
		$this->db->from("ipress");
		$this->db->join("distritos","distritos.id_distritos=ipress.distrito");
		$this->db->join("provincias","provincias.id_provincias=distritos.id_provincias");
		$this->db->join("categorias","ipress.categoria=categorias.id_categorias");
		$this->db->join("microred","ipress.microred=microred.id_microred");
		$this->db->join("tipos","ipress.tipo=tipos.id_tipos");
		$r = $this->db->get();  
		return $r->result();
	}

	public function ipress_editar($id)
	{
		$this->db->select("*");
		$this->db->from("ipress");
		$this->db->where("codigo",$id);
		$r = $this->db->get();  
		return $r->result();
	}

	public function red()
	{
		$this->db->select("*");
		$this->db->from("red_salud");
		$r = $this->db->get();  
		return $r->result();
	}

	public function microred()
	{
		$this->db->select("*");
		$this->db->from("microred");
		$r = $this->db->get();  
		return $r->result();
	}

	public function tipos()
	{
		$this->db->select("*");
		$this->db->from("tipos");
		$r = $this->db->get();  
		return $r->result();
	}

	public function categorias()
	{
		$this->db->select("*");
		$this->db->from("categorias");
		$r = $this->db->get();  
		return $r->result();
	}

	public function departamentos()
	{
		$this->db->select("*");
		$this->db->from("departamentos");
		$r = $this->db->get();  
		return $r->result();
	}

	public function provincias()
	{
		$this->db->select("*");
		$this->db->from("provincias");
		$r = $this->db->get();  
		return $r->result();
	}

	public function distritos()
	{
		$this->db->select("*");
		$this->db->from("distritos");
		$r = $this->db->get();  
		return $r->result();
	}

	public function agregar()
	{
		$datos = array(
			"ipress" => $this->input->post("ipress"),
			"microred" => $this->input->post("microred"),
			"tipo" => $this->input->post("tipos"),
			"categoria" => $this->input->post("categorias"),
			"codigo" => $this->input->post("codigo"),
			"distrito" => $this->input->post("distritos"),
			"resolucion" => $this->input->post("resolucion"),
			"fecha" => $this->input->post("fecha"),
		);
		$this->db->insert("ipress",$datos);
	}

	public function modificar()
	{
		$fecha= new DateTime($this->input->post("fecha"));
		$fecha1 = $fecha->format('Y-m-d');
		$datos = array(
			"ipress" => $this->input->post("ipress"),
			"microred" => $this->input->post("microred"),
			"tipo" => $this->input->post("tipos"),
			"categoria" => $this->input->post("categorias"),
			"distrito" => $this->input->post("distritos"),
			"resolucion" => $this->input->post("resolucion"),
			"fecha" => $fecha1,
		);
		$this->db->where("codigo",$this->input->post("id"));
		$this->db->update("ipress",$datos);
	}

	public function eliminar()
	{
		$this->db->where("codigo",$this->input->post("id"));
		$this->db->delete("ipress",$datos);
	}
}