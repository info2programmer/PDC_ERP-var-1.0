<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_report extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());
		}	
		$this->load->model(array('Common_model'));
		date_default_timezone_set('Asia/Kolkata'); 
	}
	################################################################
	################################# CUSTOMER ##########################################################
	
	function invoice_report_view()
	{		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/invoice-report-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	
	function invoice_report()
	{
		$type = $this->input->post("invoice_type");
		$from_date = date_format(date_create($this->input->post("from_date")), "Y-m-d");
		$to_date = date_format(date_create($this->input->post("to_date")), "Y-m-d");
		
		$data['invoice_type'] = $this->input->post("invoice_type");
		$data['from_date'] = date_format(date_create($this->input->post("from_date")), "Y-m-d");
		$data['to_date'] = date_format(date_create($this->input->post("to_date")), "Y-m-d");
		
		if($type=='Room')
		{
			$data['rows'] = $this->db->query("select * from td_room_book where booking_from>='$from_date' and booking_from<='$to_date' and is_checkin=1")->result();
		}
		else if($type=='Restaurant')
		{
			$data['rows'] = $this->db->query("select * from td_table_book where booking_from>='$from_date' and booking_from<='$to_date' and is_checkin=1")->result();
		}
		
		$this->load->view('maincontents/invoice-report',$data);
		
	}	
	

	################################# CUSTOMER ##########################################################
}

