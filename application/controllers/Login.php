<?php
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

    public function index()
    {
    	 if ($_SERVER['HTTP_HOST'] == '165.98.75.45:8448') {
            echo '<div style="color: rgba(0,0,0,0.4);font-size: 150px;">Acceso denegado</div>';
           exit();
        }
        $this->load->view('header_login');
		$this->load->view('Login');
		$this->load->view('footer_login');
    }
    
    public function Salir(){        
        $this->session->sess_destroy();
        $sessiondata = array(
                'logged' => 0
        );

        $this->session->unset_userdata($sessiondata);
        $this->index();
	}
    public function Acreditar(){
    	$this->form_validation->set_rules('txtUsuario', 'Usuario', 'required');
		$this->form_validation->set_rules('txtpassword', 'Contraseña', 'required');
    	
        if ($this->form_validation->run()== FALSE) {
    		 redirect('?error=1'); 
    	} else {
    		$name = $this->input->get_post('txtUsuario');
			$pass = $this->input->get_post('txtpassword');
			
            $data['user'] = $this->Users->login($name, $pass);
            
    		if ($data['user'] == 0) {
    			redirect('?error=2'); 
    		} else {
                $this->Users->InsertLog($data['user'][0]['User'],$data['user'][0]['IdUser']);
                
                $sessiondata = array(
                                'IdUS' => $data['user'][0]['IdUser'],
                                'SlpName' => $data['user'][0]['User'],
                                'Permiso' => $data['user'][0]['Access'],
                                'logged' => 1
                                );
                $this->session->set_userdata($sessiondata);               
                
    			redirect('dashboard'); 
    		}
    	}
    }
}
