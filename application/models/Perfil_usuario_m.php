<?php
class Perfil_usuario_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

 public function mostrar()
  {
   $this->db->select("*");
   $this->db->from("perfil_usuario");
   $r = $this->db->get();  
   return $r->result();
 }

public function agregar()
  {
   $datos = array(
    "perfil_usuario" => strtoupper($this->input->post("perfil_usuario")),
  );
   $this->db->insert("perfil_usuario",$datos);
 }

public function eliminar()
  {
   $this->db->where("id_perfil_usuario",$this->input->post("id"));
   $this->db->delete("perfil_usuario");
 }

 public function perfil_usuario_editar($id)
  {
   $this->db->select("*");
   $this->db->from("perfil_usuario");
   $this->db->where("id_perfil_usuario",$id);
   $r = $this->db->get();  
   return $r->result();
 }

  public function modificar()
  {
   $datos = array(
    "perfil_usuario" => strtoupper($this->input->post("perfil_usuario")),
  );
   $this->db->where("id_perfil_usuario",$this->input->post("id_perfil_usuario"));
   $this->db->update("perfil_usuario",$datos);
 }

}