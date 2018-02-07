<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DevAzt_Controller extends CI_Controller {

    var $model_name;
    var $folder;

    // CRUD CONFIG
    var $crud_columns;
    var $crud_custom;
    var $crud_haschild;
    var $crud_controller;
    var $crud_foreign;
    var $crud_parent_id;
    var $crud_foreign_name;
    var $crud_buttons;
    var $crud_viewbag;
    var $crud_row_append;
    var $crud_vars;
    var $crud_custom_sql;
    var $crud_sql;
    // id a quien pertenece los registros
    var $crud_belongs_name;
    // valor a quien pertenece los registros
    var $crud_belongs_val;

    public function __construct()
    {
        parent::__construct();
        $this->crud_custom = true;
        $this->crud_vars = false;
        $this->crud_custom_sql = false;
        $this->load->model($this->model_name, 'devaztmodel');
    }

    public function documentation($options = null){
        $this->output->set_content_type('text/html', 'UTF-8');
        if($options != null){
            $fields = $this->devaztmodel->describe();
            $endpoint = current_url();
            $endpoint = str_replace('index.php/', '', $endpoint);
            $data = array('table' => $this->devaztmodel->tablename, 'endpoint' => $endpoint, 'campos' => $fields);
            $this->load->view('DevAzt/documentation', $data);
        }else{

        }
    }

    private function get_headers($key){
        $headers = $this->input->request_headers();
        if(array_key_exists($key, $headers)){
            return $headers[$key];
        }
    }

    private function detect_method(){
        $method = strtolower($this->input->server('REQUEST_METHOD'));

        if ($this->config->item('enable_emulate_request')) {
            if ($this->input->post('_method')) {
            $method = strtolower($this->input->post('_method'));
            } else if ($this->input->server('HTTP_X_HTTP_METHOD_OVERRIDE')) {
            $method = strtolower($this->input->server('HTTP_X_HTTP_METHOD_OVERRIDE'));
            }      
        }

        if (in_array($method, array('get', 'delete', 'post', 'put', 'patch', 'link', 'view'))) {
            return $method;
        }

        return 'get';
    }

    public function verifytoken($token = null){
        if($token == null){
            $authorization = $this->get_headers('Authorization');
        }else{
            $authorization = $token;
        }
        $tokensindb = $this->db->query("SELECT * FROM accesstoken WHERE token = '$authorization'");
        if($tokensindb->num_rows() == 0){
            $error = array("error" => "No tienes permisos para acceder a la aplicación.", "code" => 203);
            echo json_encode($error);
            return false;
        }else{
            return true;
        }
    }

    public function index($id = NULL){
        $method = $this->detect_method();
        $offset = $this->input->get('offset');
        $offset = $offset == "" ? null : $offset;
        $token = $this->input->get('token');
        $token = $token == "" ? null : $token;
        $options = $this->input->get('options');
        $keys = $this->input->get('keys');
        $values = $this->input->get('values');
        $this->output->set_content_type('text/javascript', 'UTF-8');
        if(!$this->verifytoken($token)){
            return;
        }
        switch($method){
            case 'get':
                if($id == NULL){
                    if($offset != null){
                        $this->all($offset);
                        return;
                    }

                    if(!empty($keys) && !empty($values)){
                        //
                        // $this->search();
                        return;
                    }

                    if(!empty($options)){
                        $optionsarray = str_split($options);
                        $this->documentation($optionsarray);
                        return;
                    }

                    $this->all($offset);
                }else{
                    $this->get($id);
                }
                break;

            case 'post':
                $this->add();
                break;

            case 'put':
                $data = null;
                parse_str(file_get_contents("php://input"), $data);
                $updatedate = date('Y-m-d H:i:s');
                $data['updateat'] = $updatedate;
                $this->update($id, $data);
                break;
                
            case 'delete':
                $deletedate = date('Y-m-d H:i:s');
                $this->delete($id, $data = array('delete' => 1, 'deleteat' => $deletedate));
                break;
        }
    }
    
    public function modelclass(){
        echo $this->devaztmodel->modelclass();
    } 

    public function addfromdictionarycsharp($nameobject){
        echo $this->devaztmodel->dictionaryinsertcsharp($nameobject);
    }

    public function get($id = NULL){  
        if($id == NULL){
            $this->output->set_status_header(415, 'Es necesaria la propiedad /id para procesar esta peticion');
        }else{
            $obj = $this->devaztmodel->get($id);
            if($obj != null){
                $this->output->set_status_header(200, 'Se encontro el recurso solicitado en ' . $this->devaztmodel->tablename);
                echo json_encode((object) $obj, JSON_UNESCAPED_UNICODE);
            }else{
                $this->output->set_status_header(404, 'No se encontro el recurso solicitado');
            }
        }
    }

    public function all($offset = null)
    {
        $this->output->set_status_header(200, 'Se encontraron los siguientes recursos en ' . $this->devaztmodel->tablename);
        if($offset == null){
            $result = $this->devaztmodel->all()->result();
        }else{
            $result = $this->devaztmodel->index($offset);
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);    
    }

    public function add($data = NULL)
    {
        $result = $this->devaztmodel->add($data);
        if($result != null){
            $this->output->set_status_header(201, 'Se ha creado un recurso en ' . $this->devaztmodel->tablename);
            echo json_encode((object) $result, JSON_UNESCAPED_UNICODE);
        }else{
            $this->output->set_status_header(415, 'Error al realizar la operacion solicitada...');
        }
    }

    public function update($id = NULL, $data = NULL)
    {
        if($data == null){
            $data = $this->input->post();
        }
        if($id == NULL){
            $this->output->set_status_header(400, 'Es necesaria la propiedad /id para procesar esta peticion');
        }else{
            if($data != null){
                $obj = $this->devaztmodel->update($id, $data);
                if($obj != null){
                    $this->output->set_status_header(201, 'Se ha actualizado un recurso de ' . $this->devaztmodel->tablename);
                    echo json_encode((object) $obj, JSON_UNESCAPED_UNICODE);
                }else{
                    $this->output->set_status_header(415, 'No se ejecuto la operación solicitada...');
                }
            }else{
                $this->output->set_status_header(400, 'Error al realizar la operacion solicitada...');
            }
        }
    }

    public function search(){
        $result = $this->devaztmodel->search();
        if($result != null){
            $this->output->set_status_header(200, 'Se encontraron los siguientes recursos en ' . $this->devaztmodel->tablename);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        }else{
            $this->output->set_status_header(404, 'No se encontraron recursos en ' . $this->devaztmodel->tablename);
        }
    }

    public function delete($id = NULL, $data = null)
    {
        if($id == NULL){
            $this->output->set_status_header(415, 'Es necesaria la propiedad /id para procesar esta peticion');
        }else{
            if($data != null){
                $obj = $this->devaztmodel->update($id, $data);
                if($obj != null){
                    $this->output->set_status_header(201, 'Se ha eliminado virtualmente un recurso de ' . $this->devaztmodel->tablename);
                    echo json_encode((object) $obj, JSON_UNESCAPED_UNICODE);
                }else{
                    $this->output->set_status_header(415, 'Error al realizar la operacion solicitada...');
                }
            }else{
                $this->output->set_status_header(415, 'Error al realizar la operacion solicitada...');
            }
        }
    }

    public function uploadfile($name, $success, $fail){
        $config['upload_path'] = './' . $this->folder . '/';
        $config['allowed_types'] = '*';
        $config['max_size']  = '20000';
        $config['max_width']  = '10240';
        $config['max_height']  = '7680';
        $new_name = $name . time() . '.jpg';
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($name)){
            $fail();
        }else{
            $filename = '/' . $this->folder . '/' . $config['file_name'];
            $success($filename);
        }
        
    }

    public function crud_($idparent = null){
        if(!$this->crud_custom){
            $fields = $this->devaztmodel->describe();
            $foreachint = 0;
            foreach($fields as $field){
                if($field->Key == "MUL"){
                    if($idparent == null){
                        echo "se necesita una propiedad /{0} => $$field->Field";
                        return;
                    }
                    $this->crud_foreign = true;
                    $this->crud_foreign_name[$foreachint] = $field->Field;
                    $foreachint++;
                }
            }
        }else{
            $fields = array();
        }
        if($this->crud_foreign){
            if($idparent == null){
                echo 'se necesita una propiedad /{0} => $parentid/$foreignid';
                return;
            }
        }
        $foldername = $this->model_name;
        $foreign_key = $this->crud_foreign_name;
        $foreign_val = $idparent;

        $result = null;
        $parent = null;
        if($this->crud_custom_sql){
            $result = $this->db->query($this->crud_sql);
        }else{
            if($idparent != null){
                if($this->crud_foreign){
                    $result = $this->devaztmodel->search(array($this->crud_foreign_name => $idparent));
                }else{
                    $result = $this->devaztmodel->search(array($this->crud_parent_id => $idparent));
                    $parent = $this->devaztmodel->get($idparent);
                }
            }else{
                if($this->crud_haschild){
                    $result = $this->devaztmodel->search(array($this->crud_parent_id => null));
                }else{
                    $result = $this->devaztmodel->all();
                }
            }
        }
        $dbresult = true;
        if($this->crud_row_append != null){
            $datawhitappend = array();
            foreach ($result as $item){
                foreach($this->crud_row_append as $key => $value){
                    $array = (array) $item;
                    $array[$key] = $value;
                    array_push($datawhitappend, (object) $array);
                }
            }
            $result = $datawhitappend;
            $dbresult = false;
        }
        if($dbresult){
            $rows = $result != null && $result->num_rows() > 0 ? $result->result() : array();
        }else{
            $rows = $result != null ? $result : array();
        }

        $data = array("dbresult" => $dbresult, "consulta" => $rows, "columns" => $this->crud_columns, "controllername" => $this->crud_controller, "tablename" => $this->model_name, "haschild" => $this->crud_haschild && $idparent == null, "nameidparent" => $this->crud_parent_id, "idparent" => $idparent, "parent" => $parent, "foreign_key" => $foreign_key, "foreign_val" => $foreign_val, "buttons" => $this->crud_buttons, "fields" => $fields, "belongs_val" => $this->crud_belongs_val, "belongs_name" => $this->crud_belongs_name);

        if($this->crud_viewbag != null){
            foreach($this->crud_viewbag as $key => $value){
                $data[$key] = $value;
            }
        }

        if($this->crud_vars){
            echo json_encode($data);
        }else{
            $this->load->view('devazt/head');
            if($this->crud_custom){
                $this->load->view($foldername . '/crud', $data);
            }else{
                $this->load->view('devazt/crud', $data);
            }
            $this->load->view('devazt/footer');
        }
    }

}

/* End of file API_Model.php */
