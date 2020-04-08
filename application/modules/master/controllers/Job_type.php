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
class Job_type extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('job_type_mod');
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
        $page = 'job_type/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->job_type_mod->getdata();
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
           // pr($_POST); die;
            $this->form_validation->set_rules('job_type', 'Job Type',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {                
                $postdata = array(
                    'job_type'        => $_POST['job_type'], 
                    'added_by'                      => $this->session->userdata('userinfo')->id,   
                              
                    'status'            => $_POST['status'],                    
                );
                $this->job_type_mod->add($postdata);
                set_flashdata('success', 'New Job Type added successfully');
                redirect('/master/job_type');
            }
        }
        
        $title = 'Job Type';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$title;
        $data['page_title'] = $title;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $title);
        $page = 'job_type/add';        
        $d = array('table' => 'aa_job_type','status'=>'status','column3'=>'Active');
        $data['countrydata'] = getdata($d);         
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
            if ($this->job_type_mod->delete_city($post)) {                
                set_flashdata('success', 'Job Type deleted successfully');
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
      //  pr($_POST);die;
        $state_id = ID_decode($id);
        if (isPostBack()) {
            $state_id = ID_decode($id);
            $this->form_validation->set_rules('job_type', 'Job Type',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
           
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('job_type');
                $check_data         =   $this->job_type_mod->check_preexistance($state_id,$city_name);
                /*End of this*/
                if($check_data)
                {
                    set_flashdata('error', 'Job Type already exist.');
                    redirect("/master/job_type/edit/$id");
                }else{
                    $this->job_type_mod->edit($state_id);
                    set_flashdata('success', 'Job Type updated successfully');
                    redirect('/master/job_type');
                }
            }
        }
        $d = array('table' => 'aa_job_type','status'=>'status','column3'=>'Active');
        $data['countrydata'] = getdata($d);
        $data['result'] = $this->job_type_mod->view($state_id);        
        $data['title'] = 'Track (The Rest Accounting Key)  | Edit State';
        $data['page_title'] = 'Update State';

        $data['breadcum'] = array("dashboard/" => 'Home', '' => 'Update State');
        $page = 'job_type/add';
        $data['page'] = $page;
        // pr($data); die;
        _layout($data);
    }


    /**
     * view function 
     */
     public function view($id = "") {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->job_type_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'job_type/view';
//            pr($data);die;
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
        $query          =   $this->job_type_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->job_type_mod->get_city_data(); 
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
                $nestedData[]   =   $row["job_type"];
                $nestedData[]   =   $row["status"];	
                $state_id        =   $row['job_type_id'];
                $nestedData[]   =   $this->load->view("job_type/_action", array("row" => $row), true);
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