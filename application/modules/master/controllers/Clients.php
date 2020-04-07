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
class Clients extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('clients_mod');
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
        $page = 'clients/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->clients_mod->getdata();
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
            $this->form_validation->set_rules('client_name', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('end_client_id', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('payment_term_id', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('client_zipcode', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {                
                $postdata = array(
                    'client_name'               => $_POST['client_name'],           
                    'end_client_id'             => $_POST['end_client_id'],           
                    'payment_term_id'           => $_POST['payment_term_id'],           
                    'email'                     =>$_POST['email'],           
                    'contact_person'            =>$_POST['contact_person'],           
                    'client_zipcode'            =>$_POST['client_zipcode'],           
                    'status'                    =>$_POST['status'],                    
                );
                $this->clients_mod->add($postdata);
                set_flashdata('success', 'Clients added successfully');
                redirect('/master/clients');
            }
        }
        $titleKey = 'Clients';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$titleKey;
        $data['page_title'] = $titleKey;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $titleKey);
        $page = 'clients/add';        
        $d = array('table' => 'am_end_clients','status'=>'status','column3'=>'Active');
        $k = array('table' => 'am_payment_terms','status'=>'status','column3'=>'Active');
        $data['countrydata'] = getdata($d);         
        $data['payment_terms'] = getdata($k);         
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
            if ($this->clients_mod->delete_city($post)) {                
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
            $this->form_validation->set_rules('client_name', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('end_client_id', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('payment_term_id', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('client_zipcode', 'Payment Terms Days',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
          
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                
                $this->clients_mod->edit($state_id);
                set_flashdata('success', 'End Client updated successfully');
                redirect('/master/clients');
            }
        }
        $titleKey = 'Edit End Clients';
        $UpdatetitleKey = 'Edit End Clients';
        // $d = array('table' => 'am_clients','status'=>'status','column3'=>'Active');
        // $data['countrydata'] = getdata($d);
        $data['result'] = $this->clients_mod->view($state_id);
        $d = array('table' => 'am_end_clients','status'=>'status','column3'=>'Active');
        $k = array('table' => 'am_payment_terms','status'=>'status','column3'=>'Active');
        $data['countrydata'] = getdata($d);         
        $data['payment_terms'] = getdata($k);         
               
        $data['title'] = 'Track (The Rest Accounting Key)  | '.$titleKey;
        $data['page_title'] = $UpdatetitleKey;

        $data['breadcum'] = array("dashboard/" => 'Home', '' =>  $UpdatetitleKey);
        $page = 'clients/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
     public function view($id = "") {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->clients_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'clients/view';
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
        $query          =   $this->clients_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->clients_mod->get_city_data(); 
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
                
                // $nestedData[]   =   $row["city_name"];
                $nestedData[]   =   $row["client_name"];
                $nestedData[]   =   $row["end_client_name"];
                $nestedData[]   =   $row["term_days"].' Days';
                // $nestedData[]   =   $row["mobile_no"];
                // $nestedData[]   =   $row["email"];
                // $nestedData[]   =   $row["contact_person"];
                $nestedData[]   =   $row["status"];	
                $state_id        =   $row['end_client_id'];
                $nestedData[]   =   $this->load->view("clients/_action", array("row" => $row), true);
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