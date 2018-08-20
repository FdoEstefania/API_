<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header.php', array('title' => "Creamos tu aplicacion móvil", 'iframe' => array($this->getlistofcontrols())));
        $this->load->view('template/home');
        $this->load->view('template/footer');
    }

    public function getlistofcontrols(){
        $controles = $this->db->query("SELECT * FROM control WHERE online = 1")->result();
        $html = $this->load->view('control/index', array("controles" => $controles, "height" => 450), true);
        return $html;
    }

    public function about(){
    	$this->load->view('template/header', array('title' => 'Acerca de DevAzt'));
    	$this->load->view('template/about');
    	$this->load->view('template/footer');
    }

    public function sendmail(){
        $nombre = $this->input->post("nombre");
        $correo = $this->input->post("correo");
        $asunto = $this->input->post("asunto");
        $telefono = $this->input->post("telefono");
        $mensaje = $this->input->post("mensaje");

        if(!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($telefono) && !empty($mensaje)){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "contacto@devaztio.com";
            $to = "daniel_lopez@devazt.com";
            $subject = $asunto;
            $message = "$nombre con correo $correo y numero de telefono $telefono, dejo un comentario: $mensaje";
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
            echo '{ "status": true }';
        }else{
            echo '{ "status": true }';
        }
    }

    public function login(){

        $message = $this->input->get("message");

        // debemos cargar la vista
        $this->load->view('template/header', array("title" => "Login"));
        $this->load->view('template/login', array("message" => $message));
        $this->load->view('template/footer');
    }

    public function trylogin(){
        
        $post = $this->input->post();

        foreach ($post as $key => $value):
            $this->db->where($key, $value);
        endforeach; 

        $cliente = $this->db->get('cliente')->row();
        $access = false;
        if($cliente != null){
            $access = $cliente->Password = $post["password"];
        }

        if($access){
            // asignamos la sesion del usuario
            $this->session->set_userdata((array) $cliente);
            // navegamos al panel dashboard
            header("Location: " . base_url("dashboard/index"));
        }else{
            header("Location: " . base_url("home/login?message=no reconocemos tus datos"));
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        header("Location: " . base_url("home/index"));
    }

}

/* End of file Home.php */