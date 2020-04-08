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
class Invoice extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('invoice_mod');
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
        $page = 'invoice/listing';
        $data['page'] = $page;
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $data['citydata'] = $this->invoice_mod->getdata();
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
            $this->form_validation->set_rules('client_id', 'Client Id',  'trim|required');
            $this->form_validation->set_rules('start_date', 'Start Date',  'trim|required');
            $this->form_validation->set_rules('end_date', 'End Date',  'trim|required');
            $this->form_validation->set_rules('consultant_id', 'Consultant',  'trim|required');
            $this->form_validation->set_rules('hours', 'Hours',  'trim|required');
            $this->form_validation->set_rules('enclosed', 'enclosed',  'trim|required');
            $this->form_validation->set_rules('due_amount', 'Due Amount',  'trim|required');
            // $this->form_validation->set_rules('pdf_url', 'Date Of Joining',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {    
                $old_date = $_POST['start_date'];            // works
				$middle = strtotime($old_date);             // returns bool(false)
                $new_date = date('Y-m-d', $middle);            
                
                $old_dates = $_POST['end_date'];            // works
				$middles = strtotime($old_dates);             // returns bool(false)
                $new_dates = date('Y-m-d', $middles);  
                          
                
                $due_date = $_POST['due_date'];            // works
				$middles = strtotime($due_date);             // returns bool(false)
                $due_date = date('Y-m-d', $middles);  

                $indexID = InvoiceIndex();
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
                    'invoice_index'                              => InvoiceIndex(),
                    'isEmailSent'           => 'no'
                );
                $rep = $this->invoice_mod->add($postdata);
               generate_kyi_invoice_pdf($rep);
                $red['data'] = $rep;
                $red['randomData'] = $rep;
                $red['toEmail'] = defaultEmail;
               _sendEmailNew($red);
              
                set_flashdata('success', 'Invoice Generated successfully');
                redirect('/master/invoice','refresh');
            }
        }
        $titleKey = 'invoice';
        $data['title'] = 'Track (The Rest Accounting Key) | '.$titleKey;
        $data['page_title'] = $titleKey;
        $data['breadcum'] = array("dashboard/" => 'Home', '' => $titleKey);
        $page = 'invoice/add';  

        $data['billTo'] = $this->invoice_mod->BillToDetail();
        $data['consultant'] = $this->invoice_mod->consultant();
        $data['page'] = $page;

        //InvoiceIndex();
        //pr( $data); die;
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
            if ($this->invoice_mod->delete_city($post)) {                
                set_flashdata('success', 'invoice deleted successfully');
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
            $this->form_validation->set_rules('client_id', 'Client Id',  'trim|required');
            $this->form_validation->set_rules('start_date', 'Start Date',  'trim|required');
            $this->form_validation->set_rules('end_date', 'End Date',  'trim|required');
            $this->form_validation->set_rules('consultant_id', 'Consultant',  'trim|required');
            $this->form_validation->set_rules('hours', 'Hours',  'trim|required');
            $this->form_validation->set_rules('enclosed', 'enclosed',  'trim|required');
            $this->form_validation->set_rules('due_amount', 'Due Amount',  'trim|required');
            // $this->form_validation->set_rules('pdf_url', 'Date Of Joining',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                
                $this->invoice_mod->edit($state_id);
                $rep = $state_id;
               // pr($state_id); die;
                generate_kyi_invoice_pdf($rep);
                $red['data'] = $rep;
                $red['randomData'] = $rep;
                $red['toEmail'] = defaultEmail;
               _sendEmailNew($red);
              
                set_flashdata('success', 'Invoice updated successfully');
                redirect('/master/invoice');
            }
        }
        $titleKey = 'Edit invoice';
        $UpdatetitleKey = 'Edit invoice';
        $data['billTo'] = $this->invoice_mod->BillToDetail();
        $data['consultant'] = $this->invoice_mod->consultant();
       
        $data['result'] = $this->invoice_mod->view($state_id);  
        $data['title'] = 'Track (The Rest Accounting Key)  | '.$titleKey;
        $data['page_title'] = $UpdatetitleKey;

        $data['breadcum'] = array("dashboard/" => 'Home', '' =>  $UpdatetitleKey);
        $page = 'invoice/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
     public function view($id = "") {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->invoice_mod->view(@$state_id);
            $data['title'] = 'Track (The Rest Accounting Key) | State View';
            $data['page_title'] = 'State View';
            $data['breadcum'] = array("dashboard/" => 'Home', '' => 'State View');
            $page = 'invoice/view';
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
        $query          =   $this->invoice_mod->count_city_data();
        $totalData      =   $query->num_rows();
// pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'state_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->invoice_mod->get_city_data(); 
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
                $nestedData[]   =   $row["invoice_index"];
                $nestedData[]   =   $row["start_date"];
                $nestedData[]   =   $row["end_date"];
                $nestedData[]   =   $row["due_date"];
                $nestedData[]   =   $row["hours"].' Hrs';
                $nestedData[]   =   $row["due_amount"];
                $nestedData[]   =   $row["isEmailSent"];
                $nestedData[]   =   $row["status"];	
             //   $state_id        =   $row['id'];
                $nestedData[]   =   $this->load->view("invoice/_action", array("row" => $row), true);
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