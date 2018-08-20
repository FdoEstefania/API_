<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Googleplay extends CI_Controller {

    public function getversion($packagename)
    {
        // Obtenemos la upda mas reciente del paquete android
        $package = $this->db->query("SELECT * FROM package WHERE IdPackage IN
                                    (
                                        SELECT IdPackage FROM package WHERE UpdatedAt > (NOW() - INTERVAL 30 MINUTE)
                                    ) AND name = '$packagename' AND idplatform = 1 LIMIT 1")->row();
        // si hay una update en al menos 30 mnutos
        if($package != null){
            // ubicamos a nuestro buscador a la ultima version encontrada
            $name = $package->Name;
            $version = $package->Version;
            $url = base_url("googleplay/version/$name/$version");
            header("Location: " . $url);
        }else{
            // buscamos la ultima version
            $html = file_get_contents("https://play.google.com/store/apps/details?id=$packagename&hl=en");
            $this->load->view('googleplay/getversion', array("html" => $html, "packagename" => $packagename));
        }
    }

    public function version($packagename, $versionapp){
        $this->db->query("UPDATE package SET version = '$versionapp', updatedat = CURRENT_TIMESTAMP WHERE name = '$packagename'");
        echo json_encode(array("packagename" => $packagename, "codeversion" => $versionapp));
    }

}

/* End of file Googleplay.php */
