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
class Visa_type extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('visa_type_mod');
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
        $page = 'visa_type/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->visa_type_mod->getdata();
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
            $this->form_validation->set_rules('name', 'Visa Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {                
                $postdata = array(
                    'name'        => $_POST['name'], 
                    'added_by'                      => $this->session->userdata('userinfo')->id,   
                              
                    'status'            => $_POST['status'],                    
                );
                $this->visa_type_mod->add($postdata);
                set_flashdata('success', 'New Visa Name added successfully');
                redirect('/master/visa_type');
            }
        }
        
        $title = 'Visa';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$title;
        $data['page_title'] = $title;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $title);
        $page = 'visa_type/add';        
        $d = array('table' => 'aa_visa_type','status'=>'status','column3'=>'Active');
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
            if ($this->visa_type_mod->delete_city($post)) {                
                set_flashdata('success', 'Visa deleted successfully');
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
            $this->form_validation->set_rules('name', 'Visa',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
           
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('name');
                $check_data         =   $this->visa_type_mod->check_preexistance($state_id,$city_name);
                /*End of this*/
                if($check_data)
                {
                    set_flashdata('error', 'Visa already exist.');
                    redirect("/master/visa_type/edit/$id");
                }else{
                    $this->visa_type_mod->edit($state_id);
                    set_flashdata('success', 'Visa updated successfully');
                    redirect('/master/visa_type');
                }
            }
        }
        $d = array('table' => 'aa_visa_type','status'=>'status','column3'=>'Active');
        $data['countrydata'] = getdata($d);
        $data['result'] = $this->visa_type_mod->view($state_id);        
        $data['title'] = 'Track (The Rest Accounting Key)  | Edit State';
        $data['page_title'] = 'Update State';

        $data['breadcum'] = array("dashboard/" => 'Home', '' => 'Update State');
        $page = 'visa_type/add';
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
            $data['result'] = $this->visa_type_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'visa_type/view';
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
        $query          =   $this->visa_type_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->visa_type_mod->get_city_data(); 
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
                $nestedData[]   =   $row["name"];
                $nestedData[]   =   $row["status"];	
                $state_id        =   $row['visa_id'];
                $nestedData[]   =   $this->load->view("visa_type/_action", array("row" => $row), true);
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