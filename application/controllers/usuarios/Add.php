<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Usuario_model");
    }

	public function index()
	{
		
		$this->load->view('usuarios/add');
	}

	public function save(){
		
		$fullname = $this->input->post("FullName");
		$email = $this->input->post("Email");
		$password = $this->input->post("Password");
		$repassword = $this->input->post("RePassword");

		$this->form_validation->set_rules('FullName', 'Nombre Completo', 'required|min_length[3]');
		$this->form_validation->set_rules('Email', 'Correo Electronico', 'required|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules('Password', 'Password', 'required|min_length[4]');
		$this->form_validation->set_rules('RePassword', 'Confirma contraseña', 'required|matches[Password]');


		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('usuarios/add');
		}
		else
		{
			$data = array (
				"nombre"=>$fullname,
				"email"=>$email,
				"password"=>md5($password),
	
			);
			$this->Usuario_model->save($data);
			$this->session->set_flashdata('success','Se guardaron los datos exitosamente');
			redirect(base_url()."usuarios");
		}

		
	}
}