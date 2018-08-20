<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $idcliente;
    
    public function __construct()
    {
        parent::__construct();
        $idcliente = $this->session->userdata('IdCliente');
        if(empty($idcliente)){
            header("Locaiton: " . base_url("home/index"));
            return;
        }
        
        $this->idcliente = $idcliente;
    }
    

    public function index()
    {
        $data = null;

        $controls = $this->db->query("SELECT * FROM clientecontrol cc
                                      INNER JOIN control c on cc.idcontrol = c.idcontrol
                                      WHERE cc.idcliente = $this->idcliente GROUP BY c.idcontrol")->result();

        $data["controls"] = $controls;

        $html = $this->load->view('dashboard/index', $data, true);
        $this->load->view('dashboard/page', array("html" => $html));
    }

    public function admincontrol($idcontrol){
        $controls = $this->db->query("SELECT * FROM clientecontrol cc
                                      INNER JOIN control c on cc.idcontrol = c.idcontrol
                                      WHERE cc.idcliente = $this->idcliente AND c.idcontrol = $idcontrol")->result();
        $html = "";
        if(count($controls) > 0){
            $data = null;
            $data["control"] = $controls[0];
            $data["controls"] = $controls;
            $html = $this->load->view('dashboard/admincontrol', $data, true);
        }else{
            $html = $this->load->view('dashboard/404', null, true);
        }

        $this->load->view('dashboard/page', array("html" => $html));
    }

    public function appid($idclientecontrol){
        $control = $this->db->query("SELECT * FROM clientecontrol cc
                                      INNER JOIN control c on cc.idcontrol = c.idcontrol
                                      WHERE cc.idcliente = $this->idcliente AND cc.idclientecontrol = $idclientecontrol")->row();

        $html = "";
        if($control != null){
            $data = null;
            $data["control"] = $control;
            $html = $this->load->view('dashboard/appid', $data, true);
        }else{
            $html = $this->load->view('dashboard/404', null, true);
        }

        $this->load->view('dashboard/page', array("html" => $html));
    }

    public function setappsid($idclientecontrol){
        
        $control = $this->db->query("SELECT * FROM clientecontrol cc
                                      INNER JOIN control c on cc.idcontrol = c.idcontrol
                                      WHERE cc.idcliente = $this->idcliente AND cc.idclientecontrol = $idclientecontrol")->row();

        $html = "";

        if($control != null){
            $post = $this->input->post();
            $this->db->where('idclientecontrol', $idclientecontrol);
            $this->db->where('idcliente', $this->idcliente);
            $this->db->update('clientecontrol', $post);
            header("Location: " . base_url("dashboard/admincontrol/$control->IdControl"));

        }else{
            $html = $this->load->view('dashboard/404', null, true);
        }
        
        $this->load->view('dashboard/page', array("html" => $html));
    }

}

/* End of file Dashboard.php */
