<?php
class Privilegios_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

}


public function traer_permisos($idperfil)
{
   $this->db->select("h.id_modulo as idpadre, h.nombre as padre, pa.nombre as hijo, pa.id_modulo as idhijo, h.icono as icono, pa.url, p.estado");
   $this->db->from("modulo as h");
   $this->db->join("modulo as pa","h.id_modulo=pa.id_padre");
   $this->db->join("permisos as p","p.id_modulo=pa.id_modulo");
   $this->db->join("perfil_usuario as pu","pu.id_perfil_usuario=p.id_perfil_usuario");
   $this->db->where("pu.id_perfil_usuario",$idperfil);
   $this->db->where("p.estado","1");
   $this->db->order_by("h.id_modulo","asc");
   $r = $this->db->get();
   return $r->result();
}

public function traer_modulos()
{
   $this->db->select("h.id_modulo as idpadre, h.nombre as padre, pa.nombre as hijo, pa.id_modulo as idhijo, h.icono as icono, pa.url,pa.estado");
   $this->db->from("modulo as h");
   $this->db->join("modulo as pa","h.id_modulo=pa.id_padre");
   $this->db->where("pa.estado","1");
   $this->db->order_by("h.id_modulo","asc");

   $r = $this->db->get();
   return $r->result();
}

public function perfil_usuario()
{
    $this->db->select("*");
    $this->db->from("perfil_usuario");
    $r = $this->db->get();
    return $r->result();
}

public function agregar()
{
 
      $this->db->where("id_perfil_usuario",$this->input->post("id_perfil_usuario"));    
      $this->db->delete("perfil_usuario_modulo"); 
      
  for ($i=0; $i < count($_POST['id_modulo']); $i++) { 
    
    $datos = array(
    "id_perfil_usuario" => $this->input->post("id_perfil_usuario"),
    "id_modulo" => $_POST['id_modulo'][$i],
    );
   $this->db->insert("perfil_usuario_modulo",$datos);

  }
    
}

}