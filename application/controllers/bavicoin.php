<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bavicoin extends CI_Controller {

    public function index()
    {
        echo json_encode(array("bavicoin" => array("USD" => 0.80079, "COL" => 2362.33)));
    }

}

/* End of file Bavicoin.php */
