<?php
	class Usuarios extends CI_Controller{	
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$user = $this->session->userdata('logged');
			
			if (!isset($user)) { 
				redirect(base_url().'index.php','refresh');
			} 
		}

		public function WHead(){
			$this->load->view('header');
			$this->load->view('dashboardclean');
		}

		public function index(){
			$this->WHead();
			$data['TBUS']=$this->Users->allUser();
			$data['RLUS']=$this->Users->allRol();             
			$this->load->view('users', $data);
			$this->load->view('footer');
		}
		
		public function Eliminar($ID, $status){
			$this->Users->del($ID, $status);
		}

		public function Clave($ID, $pass){
			$this->Users->Clave($ID, $pass);
		}

		public function Guardar($user, $name, $pass, $rol){
			$this->Users->Guardar($user, $name, $pass, $rol);
		}
	}