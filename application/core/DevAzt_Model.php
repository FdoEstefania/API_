<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DevAzt_Model extends CI_Model {

    var $tablename;
    var $column_name_id;

    public function __construct()
    {        
        parent::__construct();
    }

    public function describe(){
        // field_data
        $fields = $this->db->query("DESCRIBE $this->tablename")->result();
        return $fields;
    }

    public function modelclass(){
        $fields = $this->db->list_fields($this->tablename);
        $modelclass = "public class $this->tablename <br>{<br>";
        foreach($fields as $field){
            $modelclass .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;public string $field { get; set; }<br>";
        }
        $modelclass .= "}";
        return $modelclass;
    }

    public function dictionaryinsertcsharp($nameobject = null){
        if($nameobject == NULL){
            $nameobject = "Instance";
        }
        $fields = $this->db->list_fields($this->tablename);
        $modelclass = 'new Dictionary&lt;string,object&gt; <br>{<br>';
        foreach($fields as $field){
            $modelclass .= '&nbsp;&nbsp;&nbsp;&nbsp;{ "' . $field . '", ' . $nameobject . '.' . $field . ' },<br>';
        }
        $modelclass .= "}";
        return $modelclass;
    }
    
    public function add($data = null){
        if($data == null){
            $data = $this->input->post();
        }
        if($this->db->insert($this->tablename, $data)){
            $data[$this->column_name_id] = $this->db->insert_id();
            return $data;
        }else{
            return null;
        }
    }

    public function update($id, $data = NULL){
        $this->db->where($this->column_name_id, $id);
        if($data == NULL){
            return null;
        }
        
        if($this->db->update($this->tablename, $data)){
            return $this->get($id);
        }else{
            return null;
        }
    }

    public function all(){
        return $this->db->get($this->tablename, 1000, 0);
    }

    public function index($offset = 0){
        return $this->db->get($this->tablename, 30, $offset)->result();
    }

    public function get($id){
        $query = $this->db->query("SELECT * FROM $this->tablename WHERE $this->column_name_id = '$id' LIMIT 1");
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return null;
        }
    }

    public function delete($id){
        return $this->db->query("DELETE FROM $this->tablename WHERE $this->column_name_id = '$id'");        
    }

    public function search($data = NULL){
        if($data == NULL){
            $this->db->where($this->input->post());
        }else{
            $this->db->where($data);
        }

        $query = $this->db->get($this->tablename, 1000, 0);
        if($query->num_rows() > 0){
            return $query;
        }else{
            return null;
        }
    }

    public function totalrows($array = null){
        if($array == null){
            $number = $this->db->query("SELECT count(*) as number FROM $this->tablename")->row()->number;
        }else{
            $usuarios = $this->search($array);
            if($usuarios != null){
                $number = count($usuarios);
            }else{
                $number = 0;
            }
        }
        return intval($number);
    }

    public function getpagination($number_per_page, $initialrow, $array = null, $orderby = null){
        if($array != null){
            $this->db->where($array);
        }
        if($orderby != null){
            $this->db->order_by($orderby["column"], $orderby["type"]);
        }
        return $this->db->get($this->tablename, $number_per_page, $initialrow);
    }

}

/* End of file API_Model.php */
