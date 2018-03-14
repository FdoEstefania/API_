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

    public function sendmail(){
        $nombre = $this->input->post("nombre");
        $correo = $this->input->post("correo");
        $asunto = $this->input->post("asunto");
        $telefono = $this->input->post("telefono");
        $mensaje = $this->input->post("mensaje");
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "contacto@devaztio.com";
        $to = "jenny_mora@devazt.com, daniel_lopez@devazt.com";
        $subject = $asunto;
        $message = "$nombre con correo $correo y numero de telefono $telefono, dejo un comentario: $mensaje";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo '{ "status": true }';
    }

}

/* End of file Home.php */