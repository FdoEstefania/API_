<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

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
        $apicalls = $this->db->query("SELECT a.*, Date(a.Fecha) as DateDay, c.nombre as Cliente, cc.nombre as Control FROM apicall a
                                    INNER JOIN cliente c on a.idcliente = c.idcliente
                                    INNER JOIN control cc on a.idcontrol = cc.idcontrol
                                    ORDER BY a.fecha DESC")->result();
        $data["apicalls"] = $apicalls;
        
        $labels = array();
        $numbers = array();

        foreach ($apicalls as $apicall):
            if(array_key_exists($apicall->DateDay, $numbers)){
                $numbers[$apicall->DateDay]++;
            }else{
                array_push($labels, $apicall->DateDay);
                $numbers[$apicall->DateDay] = 1;
            }
        endforeach;

        $newnumbers = array();
        foreach ($numbers as $key => $value):
            array_push($newnumbers, $value);
        endforeach;

        $data["requestapibarchartlabels"] = $labels;
        $data["requestapibarchartnumbers"] = $newnumbers;

        $data["requestapibarchartyaxesmax"] = max($newnumbers) * 10;

        $ventas = $this->db->query("SELECT count(*) as ventas FROM clientecontrol WHERE online = 0")->row()->ventas;
        $data["ventas"] = $ventas;



        $html = $this->load->view('adminpanel/index', $data, true);
        $this->load->view('adminpanel/page', array("html" => $html));
    }

}

/* End of file Adminpanel.php */
