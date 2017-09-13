<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_setting extends CI_Controller {

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

	function manage_company()
	{
		$table['name'] = 'td_company_setting';
		$data['row'] = $this->Common_model->find_data($table,'row');
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'company_name'=>$this->input->post('company_name'),
							'company_address'=>$this->input->post('company_address'),
							'state_ut'=>$this->input->post('state_ut'),
							'pin_code'=>$this->input->post('pin_code'),							
							'email_id'=>$this->input->post('email_id'),
							'phn_number'=>$this->input->post('phn_number'),
							'gst_no'=>$this->input->post('gst_no'),
							'state_code'=>$this->input->post('state_code'),
							'pan_no'=>$this->input->post('pan_no'),
							);
			$table['name'] = 'td_company_setting';	
			$data['row'] = $this->Common_model->save_data($table,$field,1,'company_setting_id');
			$this->session->set_flashdata('success_message','Company setting successfully updated');	
			redirect('company_setting/manage_company');		
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/company-setting-view',$data,true);
		$this->load->view('layout-inner',$data);
	}

	######################################################################################	

	function manage_bank()
	{
		$table['name'] = 'td_bank';
		$data['row'] = $this->Common_model->find_data($table,'row');
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'bank_name'=>$this->input->post('bank_name'),
							'bank_branch'=>$this->input->post('bank_branch'),
							'ac_num'=>$this->input->post('ac_num'),
							'ac_type'=>$this->input->post('ac_type'),							
							'ac_name'=>$this->input->post('ac_name'),
							'ifsc_code'=>$this->input->post('ifsc_code'),
							'branch_address'=>$this->input->post('branch_address')
							);
			$table['name'] = 'td_bank';	
			$data['row'] = $this->Common_model->save_data($table,$field,1,'bank_id');
			$this->session->set_flashdata('success_message','Bank Details successfully updated');	
			redirect('company_setting/manage_bank');		
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/bank-setting-view',$data,true);
		$this->load->view('layout-inner',$data);
	}

	##################################################################################################	

}



