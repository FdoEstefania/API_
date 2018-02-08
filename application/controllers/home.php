<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header.php', array('title' => "Creamos tu aplicacion móvil"));
        $this->load->view('template/home');
        $this->load->view('template/footer');
    }

    public function about(){
    	$this->load->view('template/header', array('title' => 'Acerca de DevAzt'));
    	$this->load->view('template/about');
    	$this->load->view('template/footer');
    }

}

/* End of file Home.php */