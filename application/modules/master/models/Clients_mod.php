<?php

class Clients_mod extends CI_Model {
    public $table = "am_clients";
    function __construct() {
        parent::__construct();
        
    }

//THIS FUNCTION ADD COLOR1
    public function add($data) {               
        if ($this->db->insert($this->table, $data)) {
            return true;
        }
    }

//THIS FUNCTION GET city AND SUBcity DATA
    function getdata() {
        $CI = &get_instance();
        $CI->db->select();
        $CI->db->from('am_end_clients');
        $CI->db->where('status', 'Active');

        $query = $CI->db->get();
        if ($query->num_rows()) {
            return $query->result();
        }
        return false;
    }

//THIS FUNCTION GET DATA THROUGH ID
    function getdatathroughid($table = "", $attributes = "", $id = "") {
        $CI = &get_instance();
        $CI->db->select($attributes);
        $CI->db->from($table);
        $CI->db->where('end_client_id', $id);
        $CI->db->where('status', 'active');
        $query = $CI->db->get();
        if ($query->num_rows()) {
            return $query->row_array();
        }
        return false;
    }

//  THIS FUNCTION DELETE city DATA
    function delete_city($id) {
        $data['status'] = 'Delete';
        $this->db->where('client_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

//  THIS FUNCTION EDIT city DATA
    function edit($id) {
       
        // $postdata = array(
        //     'end_client_name'        => $_POST['end_client_name'],           
        //     'end_client_location'        => $_POST['end_client_location'],           
        //     'mobile_no'        => $_POST['mobile_no'],           
        //     'email'        => $_POST['email'],           
        //     'contact_person'        => $_POST['contact_person'],           
        //     'end_client_zipcode'        => $_POST['end_client_zipcode'],           
        //     'status'            => $_POST['status'],  
        //     'updated_date' =>          date("Y-m-d h:i:s")      
        // );

       // pr($_POST); die;
        $postdata = array(
            'client_name'               => $_POST['client_name'],           
            'end_client_id'             => $_POST['end_client_id'],           
            'payment_term_id'           => $_POST['payment_term_id'],           
            'email'                     =>$_POST['email'],           
            'contact_person'            =>$_POST['contact_person'],           
            'client_zipcode'            =>$_POST['client_zipcode'],           
            'status'                    =>$_POST['status'],
            'updated_date' =>          date("Y-m-d h:i:s")                     
        );
      

        $this->db->where('client_id', $id);


        $this->db->update($this->table, $postdata);
    }

//  THIS FUNCTION VIEW city DATA
    function view($id) {
     
        $this->db->select('wct.*, aec.*, ptid.*');
        $this->db->from($this->table.' as wct');
        $this->db->where('wct.client_id', $id);
        $this->db->join('am_end_clients aec','wct.end_client_id = aec.end_client_id','left');
        $this->db->join('am_payment_terms ptid','ptid.payment_term_id = wct.payment_term_id','left');
         
        return $query = $this->db->get($this->table)->row();
    }

    function count_city_data() {
        $requestData = $this->input->post(null, true);

        $this->db->select('*');
        
       // $this->db->join('am_end_clients aec','wct.end_client_id = aec.end_client_id','left');
       // $this->db->join('am_payment_terms ptid','ptid.payment_term_id = wct.payment_term_id','left');
        
        if (isset($_GET['status'])) {
            $this->db->where("status =",$_GET["status"]);
        }
        else {
            $this->db->where("status !=",'Delete');
        }        
        
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];
            $this->db->where("(client_name  LIKE '%$search_val%' OR  status  LIKE '%$search_val%')");
        }
        return $query = $this->db->get($this->table);
    }

    function get_city_data($parent_id = "") {        
        $requestData = $this->input->post(null, true);
        // pr($requestData); die;
        $columns = array(
            1 => 'wct.client_name',
        );
        
        $this->db->select('wct.*, aec.*, ptid.*');
        $this->db->from($this->table.' as wct');
        $this->db->join('am_end_clients aec','wct.end_client_id = aec.end_client_id','left');
        $this->db->join('am_payment_terms ptid','ptid.payment_term_id = wct.payment_term_id','left');
         
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];            
            $this->db->where("(wct.client_name LIKE '%$search_val%' OR wct.status  LIKE '%$search_val%')");
        }
        
        if (isset($_GET['status'])) {
           
            $this->db->where("wct.status =",$_GET["status"]);
        }else {
            $this->db->where("wct.status !=",'Delete');
        }
        
        if (@$requestData['order'][0]['column'] && @$requestData['order'][0]['dir']) {
            $order = @$requestData['order'][0]['dir'];
            $column_name = $columns[@$requestData['order'][0]['column']];
            $this->db->order_by("$column_name", "$order");
        } else {
            $this->db->order_by("wct.end_client_id", "desc");
        }
        if (@$requestData['length'] && $requestData['length'] != '-1') {
            $this->db->limit($requestData['length'], $requestData['start']);
        }

        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        if ($query->num_rows()) {
            return $query->result();
        } else {
            //return false;
        }
    }

    /**
     * check_preexistance
     *
     * function for check either color name pre exist
     * 
     * @access	public
     * @return	html data
     */
    function check_preexistance($id, $city_name) {
        $this->db->select('*');
        $this->db->where('end_client_id !=', $id);
        $this->db->where('term_days ', $city_name);
        $query = $this->db->get($this->table);
      //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }

    /* End of function */
}
