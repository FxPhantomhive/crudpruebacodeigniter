<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Usuario_model");
    }

	public function index($id)
	{
		$data = $this->Usuario_model->getUser($id);
        //print_r($data);
		$this->load->view('usuarios/edit',$data);
	}

	public function update($id){
		
		$fullname = $this->input->post("FullName");
		$email = $this->input->post("Email");
		//$password = $this->input->post("Password");
		//$repassword = $this->input->post("RePassword");

        //$validateEmail

		$this->form_validation->set_rules('FullName', 'Nombre Completo', 'required|min_length[3]');
		$this->form_validation->set_rules('Email', 'Correo Electronico', 'required|valid_email'.$validateEmail);
		//$this->form_validation->set_rules('Password', 'Password', 'required|min_length[4]');
		//$this->form_validation->set_rules('RePassword', 'Confirma contraseña', 'required|matches[Password]');


		if ($this->form_validation->run() == FALSE)
		{
				//$this->load->view('usuarios/main');
                $this->index($id);
		}
		else
		{
			$data = array (
				"nombre"=>$fullname,
				"email"=>$email,
                "updated_at"=>date("Y-m-d h:m:s")
				//"password"=>md5($password),
	
			);
			$this->Usuario_model->update($data,$id);
			$this->session->set_flashdata('success','Se actualizaron los datos exitosamente');
			redirect(base_url()."usuarios");
		}

		
	}
}