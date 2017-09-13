<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_brand extends CI_Controller {
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

	function index()
	{
		$table['name'] = 'td_brand';
		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('maincontents/manage-brand-list-view',$data,true);
		$this->load->view('layout-after-login',$data);
	}

	######################################################################################	

	function add()
	{	

		$data['action'] = 'Add';

		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'brand_name' => $this->input->post('brand_name'),
				'published' => 1,
				);
				$table['name'] = 'td_brand';
				$data = $this->Common_model->save_data($table,$fields,'','brand_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Brand successfully inserted');	
				redirect('manage_brand');
				}
			}
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-brand-view',$data,true);
		$this->load->view('layout-after-login',$data);
	}

	######################################################################################	

	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('brand_id'=>$id);
		$table['name'] = 'td_brand';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{				
				$fields = array(
				'brand_name' => $this->input->post('brand_name'),
				'published' => 1,
				);

				$table['name'] = 'td_brand';
				$data = $this->Common_model->save_data($table,$fields,$id,'brand_id');
				if($data) {
				$this->session->set_flashdata('success_message','Brand successfully updated');	
				redirect('manage_brand');
				}
				else {
				redirect('manage_brand');	
				}
			}
		}

		

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-brand-view',$data,true);
		$this->load->view('layout-after-login',$data);
	}

	######################################################################################	

	function confirmDelete($id)
	{

		if($this->session->flashdata('success_message'))
		{
			$data['success_message'] =  $this->session->flashdata('success_message');
		}
		if($this->session->flashdata('error_message'))
		{
			$data['error_message'] =  $this->session->flashdata('error_message');
		}
		$table['name'] = 'td_brand';
		if($this->Common_model->delete_data($table,$id,'brand_id'))
		{
			$this->session->set_flashdata('success_message','Brand has been Deleted successfully.');
			redirect('manage_brand');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_brand');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_brand';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'brand_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Brand successfully deactivated');
				redirect(base_url().'manage_brand');
			}
		else
			{
				redirect(base_url().'manage_brand');
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_brand';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'brand_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Brand successfully activated');
				redirect(base_url().'manage_brand');
			}
		else
			{
				redirect(base_url().'manage_brand');
			}
	}

	##############################################################################################	

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}	

	##################################################################################################	

}



