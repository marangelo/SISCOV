<?php
	class Trabajadores extends CI_Controller{	
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$user = $this->session->userdata('logged');
			
			if (!isset($user)) { 
				redirect(base_url().'index.php','refresh');
			} 
		}

		public function index(){
			$this->load->view('header');
			$this->load->view('dashboardclean');
			$data['TBW']=$this->Works->allwork();
			$data['CGW']=$this->Works->allCargo();
			$data['TNW']=$this->Works->allTurno();
			$this->load->view('workers',$data);
			$this->load->view('footer');
		}
        		
		public function Eliminar($cod, $status){
			$this->Works->del($cod, $status);
		}

		public function Guardar($NombreC,$Cargo,$Horario){
			$this->Works->Guardar($NombreC,$Cargo,$Horario);
		}

		public function Calendario($cod){
			$query = $this->Works->Calendario($cod);
			
			echo json_encode($query);
		}

		public function GCalendario($cod,$title,$start){
			$this->Works->GCalendario($cod,$title,$start);
		}

		public function UCalendario($Id,$IdE,$Punto,$Fecha){
			$this->Works->UCalendario($Id,$IdE,$Punto,$Fecha);
		}

		public function FEvento($Id,$Fecha){
			echo $this->Works->FEvento($Id,$Fecha);
		}
	}