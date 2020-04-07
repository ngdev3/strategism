<?php

class Consultant_mod extends CI_Model {
    public $table = "employee";
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
        $CI->db->where('id', $id);
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
       
        $old_date = $_POST['project_start_date'];            // works
        $middle = strtotime($old_date);             // returns bool(false)
        $new_date = date('Y-m-d', $middle);            
        
        $old_dates = $_POST['project_end_date'];            // works
        $middles = strtotime($old_dates);             // returns bool(false)
        $new_dates = date('Y-m-d', $middles);            
                   
        $postdata = array(
            'first_name'               => $_POST['first_name'],           
            'last_name'             => $_POST['last_name'],           
            'visa_id'           => $_POST['visa_id'],           
            'skills'                     =>$_POST['skills'],           
            'client_id'            =>$_POST['client_id'],           
            'duration_id'            =>$_POST['duration_id'],  
            'project_start_date'            =>$new_date,  
            'project_end_date'            =>$new_dates,  
            'aa_job_type'            =>$_POST['aa_job_type'],  
            'pay_bill'            =>$_POST['pay_bill'],  
            'bill_rate'            =>$_POST['bill_rate'],  
            'mobile'            =>$_POST['mobile'],  
            'email'            =>$_POST['email'],  
            'joining_status'            =>$_POST['joining_status'],  
            'sales'            =>$_POST['sales'],  
            'recruiter'            =>$_POST['recruiter'],  
            'team_lead_id'            =>$_POST['team_lead_id'],  
            'emp_type'            =>'2',  
            'status'                    =>$_POST['status'],   
            'added_by'                      => $this->session->userdata('userinfo')->id, 
            'updated_date' =>          date("Y-m-d h:i:s")              
         
        );

      
        $this->db->where('id', $id);


        $this->db->update($this->table, $postdata);
    }

//  THIS FUNCTION VIEW city DATA
    function view($id) {
     
        $this->db->select('wct.*');
        $this->db->from($this->table.' as wct');
        $this->db->where('wct.id', $id);   
        return $query = $this->db->get($this->table)->row();
    }

    function count_city_data() {
        $requestData = $this->input->post(null, true);

        $this->db->select('*');
        
       // $this->db->join('am_end_clients aec','wct.id = aec.id','left');
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
        
        $this->db->select('wct.*,wct.status as consultant_status, ac.client_name as client_name, aad.first_name as sales_first_name, aad.last_name as sales_last_name, aadg.first_name as recruiter_first_name,aadg.last_name as recruiter_last_name, tl.first_name as team_first_lead, tl.last_name as team_last_lead');
        $this->db->from($this->table.' as wct');
        $this->db->join('employee aad','wct.sales = aad.id','left');
        $this->db->join('employee aadg','wct.recruiter = aadg.id','left');
        $this->db->join('employee tl','wct.team_lead_id = tl.id','left');
        $this->db->join('am_clients ac','wct.client_id = ac.client_id','left');
        // $this->db->join('am_payment_terms ptid','ptid.payment_term_id = wct.payment_term_id','left');
         
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];            
            $this->db->where("(wct.client_name LIKE '%$search_val%' OR wct.status  LIKE '%$search_val%')");
        }
        
        if (isset($_GET['status'])) {
           
            $this->db->where("wct.status =",$_GET["status"]);
        }else {
            $this->db->where("wct.status !=",'Delete');
        }
         $this->db->where("wct.emp_type",'2');
        
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
        $this->db->where('id !=', $id);
        $this->db->where('term_days ', $city_name);
        $query = $this->db->get($this->table);
      //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }


    function employee(){
        $this->db->select("wct.*, ad.name as desg_name, gd.name as depart");
        $this->db->from("employee wct");
        $this->db->where("wct.emp_type",'1');
        $this->db->join('aa_designation ad','wct.desg_id = ad.id','left');
        $this->db->join('aa_designation gd','wct.department_id = gd.id','left');
         
        return $this->db->get()->result();
    }

    /* End of function */
}
