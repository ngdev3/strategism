<?php

class Invoice_mod extends CI_Model {
    public $table = "aa_invoice";
    function __construct() {
        parent::__construct();
        
    }

//THIS FUNCTION ADD COLOR1
    public function add($data) {               
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
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
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

//  THIS FUNCTION EDIT city DATA
    function edit($id) {
        
        $old_date = $_POST['start_date'];            // works
        $middle = strtotime($old_date);             // returns bool(false)
        $new_date = date('Y-m-d', $middle);            
        
        $old_dates = $_POST['end_date'];            // works
        $middles = strtotime($old_dates);             // returns bool(false)
        $new_dates = date('Y-m-d', $middles);  
                  
        
        $due_date = $_POST['due_date'];            // works
        $middles = strtotime($due_date);             // returns bool(false)
        $due_date = date('Y-m-d', $middles);  

        $postdata = array(
            'client_id'                    => $_POST['client_id'],           
            'start_date'                     => $new_date,           
            'end_date'                       => $new_dates,           
            'consultant_id'                 =>$_POST['consultant_id'],           
            'hours'                    =>$_POST['hours'],           
            'enclosed_type'                      =>$_POST['enclosed'],                   
            'due_amount'                     =>$_POST['due_amount'],                    
            'status'                =>$_POST['status'],                    
            'due_date'                =>$due_date,                    
            'old_invoice_number'                =>$_POST['old_invoice_number'],                    
            'added_by'                      => $this->session->userdata('userinfo')->id,   
            'isEmailSent'           => 'no',
            'updated_date' =>          date("Y-m-d h:i:s"),  
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $postdata);
        return $this->db->affected_rows();
    }

//  THIS FUNCTION VIEW city DATA
    function view($id) {
     
        $this->db->select('wct.*');
        $this->db->from($this->table.' as wct');
        $this->db->where('wct.id', $id);
    //     $this->db->join('aa_designation ad','wct.desg_id = ad.id','left');
    //    $this->db->join('aa_designation gd','wct.department_id = gd.id','left');
        
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
      //  $this->db->where("emp_type",'1');
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];
            $this->db->where("(first_name  LIKE '%$search_val%' OR  status  LIKE '%$search_val%')");
        }
        return $query = $this->db->get($this->table);
    }

    function get_city_data($parent_id = "") {        
        $requestData = $this->input->post(null, true);
        // pr($requestData); die;
        $columns = array(
            1 => 'wct.invoice_index',
        );
        
        $this->db->select('wct.*');
        $this->db->from($this->table.' as wct');
      // $this->db->join('aa_designation ad','wct.desg_id = ad.id','left');
      // $this->db->join('aa_designation gd','wct.department_id = gd.id','left');
        //$this->db->join('am_payment_terms ptid','ptid.payment_term_id = wct.payment_term_id','left');
         
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];            
            $this->db->where("(wct.emp_code LIKE '%$search_val%' OR wct.status  LIKE '%$search_val%')");
        }
        
        if (isset($_GET['status'])) {
           
            $this->db->where("wct.status =",$_GET["status"]);
        }else {
            $this->db->where("wct.status !=",'Delete');
        }
           // $this->db->where("wct.emp_type",'1');
        
        if (@$requestData['order'][0]['column'] && @$requestData['order'][0]['dir']) {
            $order = @$requestData['order'][0]['dir'];
            $column_name = $columns[@$requestData['order'][0]['column']];
            $this->db->order_by("$column_name", "$order");
        } else {
            $this->db->order_by("wct.id", "desc");
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

    function BillToDetail(){
        $this->db->select('ac.*, apt.*');
        $this->db->where("ac.status !=",'Delete');
        $this->db->join('am_payment_terms apt','ac.payment_term_id = apt.payment_term_id','left');
        $query = $this->db->get('am_clients ac');
        return $query->result();
     
    }

    function consultant(){
        $this->db->select('e.status, e.id, e.bill_rate, CONCAT(e.first_name," ",e.last_name) AS consultant_name, as.skill_name');
        $this->db->where("e.status !=",'Delete');
        $this->db->where("e.emp_type",'2');
        $this->db->join('aa_skills as','e.skills = as.skill_id','left');
        $query = $this->db->get('employee e');
        return $query->result();
     
    }

    /* End of function */
}
