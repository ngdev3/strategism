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
class Employee extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('employee_mod');
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
        $page = 'employee/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->employee_mod->getdata();
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
            $this->form_validation->set_rules('first_name', 'First Name',  'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name',  'trim|required');
            $this->form_validation->set_rules('desg_id', 'Designation',  'trim|required');
            $this->form_validation->set_rules('department_id', 'Department',  'trim|required');
            $this->form_validation->set_rules('pan_number', 'Pan Number',  'trim|required');
            $this->form_validation->set_rules('emp_code', 'Emp Code',  'trim|required');
            $this->form_validation->set_rules('dob', 'Date Of Birth',  'trim|required');
            $this->form_validation->set_rules('doj', 'Date Of Joining',  'trim|required');
            $this->form_validation->set_rules('bank_name', 'Bank Name',  'trim|required');
            $this->form_validation->set_rules('account_number', 'Account Number',  'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile',  'trim|required');
            $this->form_validation->set_rules('email', 'Email',  'trim|required');
            $this->form_validation->set_rules('address', 'Address',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {    
                $old_date = $_POST['dob'];            // works
				$middle = strtotime($old_date);             // returns bool(false)
                $new_date = date('Y-m-d', $middle);            
                
                $old_dates = $_POST['doj'];            // works
				$middles = strtotime($old_dates);             // returns bool(false)
                $new_dates = date('Y-m-d', $middles);            
                
                $postdata = array(
                    'first_name'                    => $_POST['first_name'],           
                    'last_name'                     => $_POST['last_name'],           
                    'desg_id'                       => $_POST['desg_id'],           
                    'department_id'                 =>$_POST['department_id'],           
                    'pan_number'                    =>$_POST['pan_number'],           
                    'emp_code'                      =>$_POST['emp_code'],           
                    'dob'                           =>$new_date,                    
                    'doj'                           =>$new_dates,                    
                    'bank_name'                     =>$_POST['bank_name'],                    
                    'account_number'                =>$_POST['account_number'],                    
                    'email'                         =>$_POST['email'],                    
                    'mobile'                        =>$_POST['mobile'],                    
                    'address'                       =>$_POST['address'],                    
                    'status'                        =>$_POST['status'],                    
                    'emp_type'                      =>'1',      
                    'added_by'                      => $this->session->userdata('userinfo')->id,              
                );
                $this->employee_mod->add($postdata);
                set_flashdata('success', 'Employee added successfully');
                redirect('/master/employee');
            }
        }
        $titleKey = 'Employee';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$titleKey;
        $data['page_title'] = $titleKey;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $titleKey);
        $page = 'employee/add';        
        $d = array('table' => 'aa_designation','status'=>'status','column3'=>'Active');
        $data['emp_cat'] = getdata($d);      
        $data['page'] = $page;
        // pr( $data); die;
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
            if ($this->employee_mod->delete_city($post)) {                
                set_flashdata('success', 'Employee deleted successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
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
      // pr($_POST);die;
        $state_id = ID_decode($id);
        if (isPostBack()) {
            $state_id = ID_decode($id);
            $this->form_validation->set_rules('first_name', 'First Name',  'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name',  'trim|required');
            $this->form_validation->set_rules('desg_id', 'Designation',  'trim|required');
            $this->form_validation->set_rules('department_id', 'Department',  'trim|required');
            $this->form_validation->set_rules('pan_number', 'Pan Number',  'trim|required');
            $this->form_validation->set_rules('emp_code', 'Emp Code',  'trim|required');
            $this->form_validation->set_rules('dob', 'Date Of Birth',  'trim|required');
            $this->form_validation->set_rules('doj', 'Date Of Joining',  'trim|required');
            $this->form_validation->set_rules('bank_name', 'Bank Name',  'trim|required');
            $this->form_validation->set_rules('account_number', 'Account Number',  'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile',  'trim|required');
            $this->form_validation->set_rules('email', 'Email',  'trim|required');
            $this->form_validation->set_rules('address', 'Address',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                
                $this->employee_mod->edit($state_id);
                set_flashdata('success', 'Employee updated successfully');
                redirect('/master/employee');
            }
        }
        $titleKey = 'Edit Employee';
        $UpdatetitleKey = 'Edit Employee';
        // $d = array('table' => 'am_clients','status'=>'status','column3'=>'Active');
        // $data['countrydata'] = getdata($d);
        $data['result'] = $this->employee_mod->view($state_id);
        $d = array('table' => 'aa_designation','status'=>'status','column3'=>'Active');
        $data['emp_cat'] = getdata($d);      
            
        $data['title'] = 'Track (The Rest Accounting Key)  | '.$titleKey;
        $data['page_title'] = $UpdatetitleKey;

        $data['breadcum'] = array("dashboard/" => 'Home', '' =>  $UpdatetitleKey);
        $page = 'employee/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
     public function view($id = "") {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->employee_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'employee/view';
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
        $query          =   $this->employee_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->employee_mod->get_city_data(); 
       // pr($citydata);die;       
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
                
                // $nestedData[]   =   $row["city_name"];
                $nestedData[]   =   $row["emp_code"];
                $nestedData[]   =   $row["first_name"].' '.$row['last_name'];
                $nestedData[]   =   $row["desg_name"];
                $nestedData[]   =   $row["department_name"];
                $nestedData[]   =   $row["doj"];
                $nestedData[]   =   $row["email"];
                $nestedData[]   =   $row["pan_number"];
                $nestedData[]   =   $row["status"];	
             //   $state_id        =   $row['id'];
                $nestedData[]   =   $this->load->view("employee/_action", array("row" => $row), true);
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