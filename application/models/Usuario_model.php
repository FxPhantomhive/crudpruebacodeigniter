<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function save($data){
        $this->db->query("ALTER TABLE usuarios AUTO_INCREMENT 1");
        $this->db->insert("usuarios",$data);
    }

    public function getUsers(){
        $this->db->select("*");
        $this->db->from("usuarios");

        $results = $this->db->get();

        return $results->result();
    }

    public function getUser($id){
        $this->db->select("u.id, u.nombre, u.email");
        $this->db->from("usuarios u");
        $this->db->where("u.id",$id);

        $results = $this->db->get();

        return $results->row();
    }

    public function update($data,$id){       
        $this->db->where("u.id",$id);
        $this->db->update("usuarios u",$data);
    }

    public function delete($id){
       
        $this->db->where("id",$id);
        $this->db->delete("usuarios");
    }
}