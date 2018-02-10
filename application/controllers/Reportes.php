<?php
class Reportes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$user = $this->session->userdata('logged');
			
		if (!isset($user)) { 
		    redirect(base_url().'index.php','refresh');
		} 
	}

    public function index() {
	    $this->load->view('header');
		$this->load->view('dashboardclean');
		$this->load->view('Reportes/RMenu');
		$this->load->view('footer');
    }

	public function CalSemana() {
	    $this->load->view('header');
		$this->load->view('dashboardclean');
		$data['RWS']=$this->Reports->Allwork();
		$data['CGW']=$this->Works->allCargo();
		$data['TNW']=$this->Works->allTurno();
		$this->load->view('Reportes/CalSemana',$data);
		$this->load->view('footer');
    }

	public function Guardar($Fecha,$Cargo,$Horario){
		$this->Reports->Guardar($Fecha,$Cargo,$Horario);
	}
}