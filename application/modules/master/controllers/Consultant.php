<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *  Auth Controller
 *
 * @package		Auth
 * @subpackage  Models
 * @category    City Master 
 * @author		Geet
 * @website		http://www.thealternativeaccount.com
 * @company             thealternativeaccount Inc
 * @since		Version 1.0
 */
class Consultant extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('consultant_mod');
        is_adminprotected();
		validate_admin_login();
        // is_protected();
    }

    /**
     * Index
     *
     * function show all list of city Info
     * 
     * @access	public  
     * @return	html data
     */
    public function index() {
        $data['title'] = Project;
        $data['page_title'] = 'State';
        $page = 'consultant/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->consultant_mod->getdata();
        // pr($data); die;
        _layout($data);
    }

    /**
     * Add
     *
     * function add new city for product
     * 
     * @access	public
     * @return	html data
     */
    public function add() {
         
        if (isPostBack()) {
        //   pr($_POST); die;
            
            $this->form_validation->set_rules('first_name', 'First Name ',  'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name ',  'trim|required');
            $this->form_validation->set_rules('visa_id', 'Visa Type ',  'trim|required');
            $this->form_validation->set_rules('skills', 'Skills',  'trim|required');
            $this->form_validation->set_rules('client_id', 'Client',  'trim|required');
            $this->form_validation->set_rules('duration_id', 'Project Duration',  'trim|required');
            $this->form_validation->set_rules('project_start_date', 'Start Date ',  'trim|required');
            $this->form_validation->set_rules('project_end_date', 'End Date ',  'trim|required');
            $this->form_validation->set_rules('aa_job_type', 'Job Type',  'trim|required');
            $this->form_validation->set_rules('pay_bill', 'Pay Bill',  'trim|required');
            $this->form_validation->set_rules('bill_rate', 'Bill Rate ',  'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile',  'trim|required');
            $this->form_validation->set_rules('email', 'Email',  'trim|required');
            $this->form_validation->set_rules('joining_status', 'Joining Status',  'trim|required');
            $this->form_validation->set_rules('sales', 'Sales',  'trim|required');
            $this->form_validation->set_rules('recruiter', 'Recruiter',  'trim|required');
            $this->form_validation->set_rules('team_lead_id', 'Team Lead',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            
            
            if ($this->form_validation->run() == FALSE) {
                
            } else {   
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
                 
                );
                $this->consultant_mod->add($postdata);
                set_flashdata('success', 'Consultant added successfully');
                redirect('/master/consultant');
            }
        }
        $titleKey = 'Consultant';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$titleKey;
        $data['page_title'] = $titleKey;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $titleKey);
        $page = 'consultant/add';        
        $d = array('table' => 'aa_visa_type','status'=>'status','column3'=>'Active');
        $k = array('table' => 'aa_skills','status'=>'status','column3'=>'Active');
        $g = array('table' => 'am_clients','status'=>'status','column3'=>'Active');
        $l = array('table' => 'aa_project_durations','status'=>'status','column3'=>'Active');
        $m = array('table' => 'aa_job_type','status'=>'status','column3'=>'Active');
        $n = array('table' => 'employee','status'=>'status','column3'=>'Active');
        $data['visa_type'] = getdata($d);         
        $data['skill_type'] = getdata($k);         
        $data['client_type'] = getdata($g);         
        $data['duration'] = getdata($l);         
        $data['job_type'] = getdata($m);         
        $data['emp'] = $this->consultant_mod->employee();        
        $data['page'] = $page;
    //    pr( $data); die;
        _layout($data);
    }
       
    /**
     * deletecategories
     *
     * this function delete State
     * 
     * @access	public
     * @return	html data
     */
    public function delete_city() {
        $post = $this->input->post('id');
        if (!empty($post)) {
            if ($this->consultant_mod->delete_city($post)) {                
                set_flashdata('success', 'Client deleted successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    public function pdffil(){
        // die;
        $data['result'] = $this->consultant_mod->view('4');
        // $this->load->view('invoice_data/pdfs');
        // die;
        generate_kyi_invoice_pdf($data);
    }
    /**
     * Edit
     *
     * this function update city
     * 
     * @access	public
     * @return	html data
     */
    public function edit($id = "") {
    //   pr($_POST);die;
        $state_id = ID_decode($id);
        if (isPostBack()) {
            $state_id = ID_decode($id);
            $this->form_validation->set_rules('first_name', 'First Name ',  'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name ',  'trim|required');
            $this->form_validation->set_rules('visa_id', 'Visa Type ',  'trim|required');
            $this->form_validation->set_rules('skills', 'Skills',  'trim|required');
            $this->form_validation->set_rules('client_id', 'Client',  'trim|required');
            $this->form_validation->set_rules('duration_id', 'Project Duration',  'trim|required');
            $this->form_validation->set_rules('project_start_date', 'Start Date ',  'trim|required');
            $this->form_validation->set_rules('project_end_date', 'End Date ',  'trim|required');
            $this->form_validation->set_rules('aa_job_type', 'Job Type',  'trim|required');
            $this->form_validation->set_rules('pay_bill', 'Pay Bill',  'trim|required');
            $this->form_validation->set_rules('bill_rate', 'Bill Rate ',  'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile',  'trim|required');
            $this->form_validation->set_rules('email', 'Email',  'trim|required');
            $this->form_validation->set_rules('joining_status', 'Joining Status',  'trim|required');
            $this->form_validation->set_rules('sales', 'Sales',  'trim|required');
            $this->form_validation->set_rules('recruiter', 'Recruiter',  'trim|required');
            $this->form_validation->set_rules('team_lead_id', 'Team Lead',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
             if ($this->form_validation->run() == FALSE) {
                
            } else {
                
                $this->consultant_mod->edit($state_id);
                set_flashdata('success', 'End Client updated successfully');
                redirect('/master/consultant');
            }
        }
        $titleKey = 'Edit End consultant';
        $UpdatetitleKey = 'Edit End consultant';
        // $d = array('table' => 'am_clients','status'=>'status','column3'=>'Active');
        // $data['countrydata'] = getdata($d);
        $data['result'] = $this->consultant_mod->view($state_id);
        $d = array('table' => 'aa_visa_type','status'=>'status','column3'=>'Active');
        $k = array('table' => 'aa_skills','status'=>'status','column3'=>'Active');
        $g = array('table' => 'am_clients','status'=>'status','column3'=>'Active');
        $l = array('table' => 'aa_project_durations','status'=>'status','column3'=>'Active');
        $m = array('table' => 'aa_job_type','status'=>'status','column3'=>'Active');
        $n = array('table' => 'employee','status'=>'status','column3'=>'Active');
        $data['visa_type'] = getdata($d);         
        $data['skill_type'] = getdata($k);         
        $data['client_type'] = getdata($g);         
        $data['duration'] = getdata($l);         
        $data['job_type'] = getdata($m);         
        $data['emp'] = $this->consultant_mod->employee();       
        $data['title'] = 'Track (The Rest Accounting Key)  | '.$titleKey;
        $data['page_title'] = $UpdatetitleKey;


        $data['breadcum'] = array("dashboard/" => 'Home', '' =>  $UpdatetitleKey);
        $page = 'consultant/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
     public function view($id = "") {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->consultant_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'consultant/view';
          // pr($data);die;
            $data['page'] = $page;
            _layout($data);
        }
    }




    
    /**
     * view_all
     *
     * this function to view all city
     * 
     * @access	public
     * @return	html data
     */
    public function view_all() {
        $requestData    = $this->input->post(null,true);
        /*Counting warehouse data*/
        $query          =   $this->consultant_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->consultant_mod->get_city_data(); 
        //pr($citydata);die;       
        $data   =   array();
        if(count($citydata)>0)
        {
            $j = $requestData['start'];
            for( $i=0; $i<count($citydata);$i++ ) 
            {  
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array(); 
                //$nestedData[]   =   "<input type='checkbox'  class='deleteRow' value='".$row['id']."'  />";
                $nestedData[]   =   $j;
                
                $nestedData[]   =   $row["first_name"].' '.$row['last_name'];
                $nestedData[]   =   $row["client_name"]; 
                $nestedData[]   =   $row["sales_first_name"].' '.$row["sales_last_name"];
                $nestedData[]   =   $row["recruiter_first_name"].' '.$row["recruiter_last_name"]; 
                $nestedData[]   =   $row["team_first_lead"].' '.$row["team_last_lead"]; 
                $nestedData[]   =   $row["pay_bill"]; 
                $nestedData[]   =   $row["bill_rate"]; 
                $nestedData[]   =   $row["consultant_status"];

                $nestedData[]   =   $this->load->view("consultant/_action", array("row" => $row), true);
                $data[]         =   $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format
    }
    /*End of function*/
    
    function restoreData(){
        $arr =  json_decode($_POST['arr']);        
        $res = restoreData($arr);
        //$this->session->set_flashdata("alert",array("c"=>"s","m"=>"Data has been Restored"));
        set_flashdata('success', 'Data has been Restored'); 
        echo json_encode($res);
    }

}