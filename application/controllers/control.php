<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header', array('title' => "Util for programmers"));
        $html = $this->getlistofcontrols();
        $this->load->view('blackpage', array('html' => $html));
        $this->load->view('template/footer');
    }

    public function getlistofcontrols(){
        $controles = $this->db->query("SELECT * FROM control WHERE online = 1")->result();
        $html = $this->load->view('control/index', array("controles" => $controles, "height" => 700), true);
        return $html;
    }

    public function validateapikey($apikey = '', $idplatform = 4){
        if(empty($apikey)){
            echo null;
        }else{
            $suscriptionactive = $this->db->query("SELECT * FROM clientecontrol WHERE ApiKey = '$apikey' AND Online = 1")->row();
            if($suscriptionactive != null){
                $this->db->set('calls', 'calls+1', FALSE);

                switch ($idplatform) {
                    case 1:
                        $this->db->set('droidcalls', 'droidcalls+1', FALSE);
                        break;
                    case 2:
                        $this->db->set('ioscalls', 'ioscalls+1', FALSE);
                        break;
                    case 3:
                        $this->db->set('uwpcalls', 'uwpcalls+1', FALSE);
                        break;
                }

                $this->db->where('idclientecontrol', $suscriptionactive->IdClienteControl);
                $this->db->update('clientecontrol');

                $this->db->insert('apicall', array("idcontrol" => $suscriptionactive->IdControl,
                                                    "idcliente" => $suscriptionactive->IdCliente,
                                                    "idplatform" => $idplatform,
                                                    "idclientecontrol" => $suscriptionactive->IdClienteControl
                                                ));
            }
            echo json_encode(array("Success" => $suscriptionactive != null, "Message" => $suscriptionactive ? "OK" : "No hay una cuenta para este control", "ControlPermissions" => $suscriptionactive));
        }
    }

    public function pdfviewer(){
        $app = $this->input->get("app");
        if($app){
            $this->db->set('viewfromapp', 'viewfromapp+1', FALSE);
        }else{
            $this->db->set('viewfromweb', 'viewfromweb+1', FALSE);
        }
        $this->db->where('idcontrol', 1);
        $this->db->update('control');

        $this->db->where('idcontrol', 1);
        $control = $this->db->get('control')->row();
        $this->getview($control);
    }

    public function apixamarin(){
        $app = $this->input->get("app");
        if($app){
            $this->db->set('viewfromapp', 'viewfromapp+1', FALSE);
        }else{
            $this->db->set('viewfromweb', 'viewfromweb+1', FALSE);
        }
        $this->db->where('idcontrol', 2);
        $this->db->update('control');

        $this->db->where('idcontrol', 2);
        $control = $this->db->get('control')->row();
        $this->getview($control);
    }

    public function getview($control){
        $this->load->view('template/header', array("title" => $control->Nombre));
        $this->load->view('control/detalle', array("control" => $control));
        $this->load->view('template/footer');
    }

    public function paycontrol($idcontrol){
        $post = $this->input->post();
        $this->db->where('idcontrol', $idcontrol);        
        $control = $this->db->get('control')->row();

        if($control != null){
            $email = $this->input->post('email');
            $nombre = $this->input->post('nombre');

            $post = $this->input->post();
            $password = "";

            if(!empty($email) && !empty($nombre)){   
                $this->db->where('email', $email);
                $cliente = $this->db->get('cliente')->row();
                if($cliente == null){

                    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                    $pass = array(); //remember to declare $pass as an array
                    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                    for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[] = $alphabet[$n];
                    }

                    $password = implode($pass);

                    $post["password"] = $password;

                    $this->db->insert('cliente', $post);
                    $id = $this->db->insert_id();
                    $this->db->where('idcliente', $id);
                    $cliente = $this->db->get('cliente')->row();
                }else{
                    $password = $cliente->Password;
                }

                $apikey = $this->guidv4();
                $this->db->insert('clientecontrol', array('idcliente' => $cliente->IdCliente, 'idcontrol' => $idcontrol, 'apikey' => "$apikey", 'online' => false));

                $this->sendemail("<p>Se ha comprado el control $control->Nombre</h2><hr><br>El id del cliente es $cliente->IdCliente // $cliente->Email </p>", "daniel_lopez@devazt.com");
                
                $baseurl = base_url('control/thanks/' . $idcontrol);
                
                $loginurl = base_url('home/login');

                // $download = base_url('control/download?key=' . $apikey . '&idcontrol=' . $idcontrol);
                $this->sendemail("<h2>Hola $nombre</h2><p>Muchas gracias por realizar la compra del control $control->Nombre," .
                                 "en breve nos pondremos en contacto contigo, estos son tus datos de acceso $email / $password </p>" .
                                "<hr><br> <a href='$baseurl'>Instrucciones de uso / Ayuda</a> <a href='$loginurl'> Login </a> ", "$email, daniel_lopez@devazt.com");

                header("Location: " . $baseurl);
            }else{
                echo "no se puede mostrar esta pagina";
            }
        }else{
            echo "no se puede mostrar esta pagina";
        }
    }

    public function download(){
        $apikey = $this->input->get('key');
        $idcontrol = $this->input->get('idcontrol');

        $this->db->where('idcontrol', $idcontrol);
        $control = $this->db->get('control')->row();

        $this->db->where('apikey', $apikey);
        $cliente = $this->db->get('clientecontrol')->row();
        
        if($control != null && $cliente != null){
            header('Location: ' . $control->DownloadLink);
        }else{
            echo "no podemos mostrar esta pagina";
        }
    }

    public function thanks($idcontrol){
        $this->db->where('idcontrol', $idcontrol);        
        $control = $this->db->get('control')->row();
        if($control != null){
            $this->load->view('template/header', array('title' => 'Gracias'));
            $this->load->view('control/thanks', array("control" => $control));
            $this->load->view('template/footer');
        }
    }

    function guidv4()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function sendemail($mensaje, $correos){
        // mandamos el mensaje a su correo para enviar los datos
        $message = "<html><head></head><body>";
        $message .= $mensaje;
        $message .= "
            </body>
            </html>";
        ini_set( 'display_errors', 1);
        error_reporting(E_ALL);
        $correo = $correos;
        $from = "contacto@devaztio.com";
        $to = $correo;
        $subject = "Nueva compra";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $from;
        mail($to, $subject, $message, $headers);
    }

}

/* End of file Control.php */
