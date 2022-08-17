<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model("Usuario_model");
    }

	public function index()
	{
		$data = array("data"=>$this->Usuario_model->getUsers());
        //print_r($data);
		$this->load->view('usuarios/main', $data);
	}

    public function delete($id)
	{
		$this->Usuario_model->delete($id);
        $this->session->set_flashdata('success','Se eliminaron los datos exitosamente');
        redirect(base_url()."usuarios");
	}
}