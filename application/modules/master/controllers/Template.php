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
class Template extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('template_mod');
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
        $page = 'template/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->template_mod->getdata();
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
        //  pr($_POST); die;
            $this->form_validation->set_rules('template_name', 'Template Name',  'trim|required');
            $this->form_validation->set_rules('content', 'Content',  'trim|required');
            $this->form_validation->set_rules('heading', 'Heading',  'trim|required');
            $this->form_validation->set_rules('api_key', 'API Key',  'trim|required');
            $this->form_validation->set_rules('app_id', 'App ID',  'trim|required');
            $this->form_validation->set_rules('big_picture', 'Big Picture URL',  'trim|required');
            $this->form_validation->set_rules('time', 'Time',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {                
                $postdata = array(
                    'template_name'               => $_POST['template_name'],           
                    'content'               => $_POST['content'],           
                    'heading'             => $_POST['heading'],           
                    'app_id'           => $_POST['app_id'],           
                    'big_picture'                     =>$_POST['big_picture'],           
                    'time'            =>$_POST['time'],           
                    'status'                    =>$_POST['status'],  
                    'api_key'                    =>$_POST['api_key'],  
                    'added_by'                      => $this->session->userdata('userinfo')->id 
                );
                $this->template_mod->add($postdata);
                set_flashdata('success', 'Template added successfully');
                redirect('/master/template');
            }
        }
        $titleKey = 'Template';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$titleKey;
        $data['page_title'] = $titleKey;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $titleKey);
        $page = 'template/add';                
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
            if ($this->template_mod->delete_city($post)) {                
                set_flashdata('success', 'Client deleted successfully');
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
            $this->form_validation->set_rules('template_name', 'Template Name',  'trim|required');
            $this->form_validation->set_rules('content', 'Content',  'trim|required');
            $this->form_validation->set_rules('heading', 'Heading',  'trim|required');
            $this->form_validation->set_rules('api_key', 'API Key',  'trim|required');
            $this->form_validation->set_rules('app_id', 'App ID',  'trim|required');
            $this->form_validation->set_rules('big_picture', 'Big Picture URL',  'trim|required');
            $this->form_validation->set_rules('time', 'Time',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
           
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                
                $this->template_mod->edit($state_id);
                set_flashdata('success', 'Client updated successfully');
                redirect('/master/template');
            }
        }
        $titleKey = 'Edit End template';
        $UpdatetitleKey = 'Edit End template';
        // $d = array('table' => 'am_template','status'=>'status','column3'=>'Active');
        // $data['countrydata'] = getdata($d);
        $data['result'] = $this->template_mod->view($state_id);
                
        $data['title'] = 'Track (The Rest Accounting Key)  | '.$titleKey;
        $data['page_title'] = $UpdatetitleKey;

        $data['breadcum'] = array("dashboard/" => 'Home', '' =>  $UpdatetitleKey);
        $page = 'template/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
     public function view($id = "") {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->template_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'template/view';
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
        $query          =   $this->template_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->template_mod->get_city_data(); 
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
                $nestedData[]   =   $row["template_name"];
                $nestedData[]   =   $row["content"];
                $nestedData[]   =   $row["heading"];
                $nestedData[]   =   $row["api_key"];
                $nestedData[]   =   $row["status"];	
                $nestedData[]   =   $this->load->view("template/_action", array("row" => $row), true);
                $data[]         =   $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by templateide , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
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