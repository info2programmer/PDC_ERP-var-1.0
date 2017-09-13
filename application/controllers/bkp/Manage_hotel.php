<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_hotel extends CI_Controller {

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

	################################# FLOOR ##################################

	function floor_list()
	{
		$table['name'] = 'td_floor';
		$order_by[0] = array('field'=>'floor_id','type'=>'asc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/floor-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function floor_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'floor_name'=>$this->input->post('floor_name')
							);
			$table['name'] = 'td_floor';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','floor_id');
			$this->session->set_flashdata('success_message','Floor successfully inserted');	
			redirect('manage_hotel/floor_list');		
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-floor-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function floor_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_floor';
		$conditions = array('floor_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'floor_name'=>$this->input->post('floor_name')
							);
			$table['name'] = 'td_floor';	
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'floor_id');
			$this->session->set_flashdata('success_message','Floor successfully updated');	
			redirect('manage_hotel/floor_list');		
		}


		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-floor-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function floor_delete($id)
	{
		$table['name'] = 'td_floor';
		if($this->Common_model->delete_data($table,$id,'floor_id'))
		{
			$this->session->set_flashdata('success_message','Floor has been Deleted successfully.');
			redirect('manage_hotel/floor_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_hotel/floor_list');
		}
	}

	################################# FLOOR ##########################################################
	################################# ROOM ##########################################################
	
	function room_list()
	{
		$table['name'] = 'td_room';
		$order_by[0] = array('field'=>'room_id','type'=>'asc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/room-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function room_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'room_no'=>$this->input->post('room_no'),
							'floor_id'=>$this->input->post('floor_id'),
							'room_price'=>$this->input->post('room_price'),
							'cgst_percent'=>$this->input->post('cgst_percent'),
							'cgst_amt'=>$this->input->post('cgst_amt'),
							'sgst_percent'=>$this->input->post('sgst_percent'),
							'sgst_amt'=>$this->input->post('sgst_amt'),
							'net_total'=>$this->input->post('net_total'),
							'room_type'=>$this->input->post('room_type'),
							'is_ac'=>$this->input->post('is_ac'),
							'bed_type'=>$this->input->post('bed_type')
							);
			$table['name'] = 'td_room';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','room_id');
			$this->session->set_flashdata('success_message','Room successfully inserted');	
			redirect('manage_hotel/room_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-room-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function room_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_room';
		$conditions = array('room_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'room_no'=>$this->input->post('room_no'),
							'floor_id'=>$this->input->post('floor_id'),
							'room_price'=>$this->input->post('room_price'),
							'cgst_percent'=>$this->input->post('cgst_percent'),
							'cgst_amt'=>$this->input->post('cgst_amt'),
							'sgst_percent'=>$this->input->post('sgst_percent'),
							'sgst_amt'=>$this->input->post('sgst_amt'),
							'net_total'=>$this->input->post('net_total'),
							'room_type'=>$this->input->post('room_type'),
							'is_ac'=>$this->input->post('is_ac'),
							'bed_type'=>$this->input->post('bed_type')
							);
			$table['name'] = 'td_room';
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'room_id');
			$this->session->set_flashdata('success_message','Room successfully updated');	
			redirect('manage_hotel/room_list');		
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-room-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function room_delete($id)
	{
		$table['name'] = 'td_room';
		if($this->Common_model->delete_data($table,$id,'room_id'))
		{
			$this->session->set_flashdata('success_message','Room has been Deleted successfully.');
			redirect('manage_hotel/room_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_hotel/room_list');
		}
	}

	################################# ROOM ##########################################################
	################################# SERVICE ##########################################################
	
	function service_list()
	{
		$table['name'] = 'td_service';
		$order_by[0] = array('field'=>'service_id','type'=>'asc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/service-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function service_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'service_code'=>$this->input->post('service_code'),
							'service_name'=>$this->input->post('service_name'),
							'service_description'=>$this->input->post('service_description'),
							'service_price'=>$this->input->post('service_price'),
							'cgst_percent'=>$this->input->post('cgst_percent'),
							'cgst_amt'=>$this->input->post('cgst_amt'),
							'sgst_percent'=>$this->input->post('sgst_percent'),
							'sgst_amt'=>$this->input->post('sgst_amt'),
							'net_total'=>$this->input->post('net_total')
							);
							
			$table['name'] = 'td_service';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','service_id');
			$this->session->set_flashdata('success_message','Service successfully inserted');	
			redirect('manage_hotel/service_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-service-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function service_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_service';
		$conditions = array('service_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'service_code'=>$this->input->post('service_code'),
							'service_name'=>$this->input->post('service_name'),
							'service_description'=>$this->input->post('service_description'),
							'service_price'=>$this->input->post('service_price'),
							'cgst_percent'=>$this->input->post('cgst_percent'),
							'cgst_amt'=>$this->input->post('cgst_amt'),
							'sgst_percent'=>$this->input->post('sgst_percent'),
							'sgst_amt'=>$this->input->post('sgst_amt'),
							'net_total'=>$this->input->post('net_total')
							);
							
			$table['name'] = 'td_service';
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'service_id');
			$this->session->set_flashdata('success_message','Service successfully updated');	
			redirect('manage_hotel/service_list');		
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-service-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function service_delete($id)
	{
		$table['name'] = 'td_service';
		if($this->Common_model->delete_data($table,$id,'service_id'))
		{
			$this->session->set_flashdata('success_message','Service has been Deleted successfully.');
			redirect('manage_hotel/service_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_hotel/service_list');
		}
	}

	################################# SERVICE ##########################################################
	################################# TABLE ##########################################################
	
	function table_list()
	{
		$table['name'] = 'td_table';
		$order_by[0] = array('field'=>'table_id','type'=>'asc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/table-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function table_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'table_name'=>$this->input->post('table_name')
							);
							
			$table['name'] = 'td_table';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','table_id');
			$this->session->set_flashdata('success_message','Table successfully inserted');	
			redirect('manage_hotel/table_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-table-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function table_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_table';
		$conditions = array('table_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'table_name'=>$this->input->post('table_name')
							);
							
			$table['name'] = 'td_table';	
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'table_id');
			$this->session->set_flashdata('success_message','Table successfully updated');	
			redirect('manage_hotel/table_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-table-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function table_delete($id)
	{
		$table['name'] = 'td_table';
		if($this->Common_model->delete_data($table,$id,'table_id'))
		{
			$this->session->set_flashdata('success_message','Table has been Deleted successfully.');
			redirect('manage_hotel/table_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_hotel/table_list');
		}
	}

	################################# TABLE ##########################################################
	################################# FOOD MENU ##########################################################
	
	function food_menu_list()
	{
		$table['name'] = 'td_food_menu';
		$order_by[0] = array('field'=>'menu_id','type'=>'asc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/food-menu-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function food_menu_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'menu_code'=>$this->input->post('menu_code'),
							'menu_name'=>$this->input->post('menu_name'),
							'menu_price'=>$this->input->post('menu_price'),
							'cgst_percent'=>$this->input->post('cgst_percent'),
							'cgst_amt'=>$this->input->post('cgst_amt'),
							'sgst_percent'=>$this->input->post('sgst_percent'),
							'sgst_amt'=>$this->input->post('sgst_amt'),
							'net_total'=>$this->input->post('net_total')
							);
							
			$table['name'] = 'td_food_menu';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','menu_id');
			$this->session->set_flashdata('success_message','Food Menu successfully inserted');	
			redirect('manage_hotel/food_menu_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-food-menu-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function food_menu_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_food_menu';
		$conditions = array('menu_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'menu_code'=>$this->input->post('menu_code'),
							'menu_name'=>$this->input->post('menu_name'),
							'menu_price'=>$this->input->post('menu_price'),
							'cgst_percent'=>$this->input->post('cgst_percent'),
							'cgst_amt'=>$this->input->post('cgst_amt'),
							'sgst_percent'=>$this->input->post('sgst_percent'),
							'sgst_amt'=>$this->input->post('sgst_amt'),
							'net_total'=>$this->input->post('net_total')
							);
							
			$table['name'] = 'td_food_menu';	
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'menu_id');
			$this->session->set_flashdata('success_message','Food Menu successfully updated');	
			redirect('manage_hotel/food_menu_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-food-menu-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function food_menu_delete($id)
	{
		$table['name'] = 'td_food_menu';
		if($this->Common_model->delete_data($table,$id,'menu_id'))
		{
			$this->session->set_flashdata('success_message','Food Menu has been Deleted successfully.');
			redirect('manage_hotel/food_menu_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_hotel/food_menu_list');
		}
	}

	################################# FOOD MENU ##########################################################
	################################# LIQUOR MENU ##########################################################
	
	function liquor_menu_list()
	{
		$table['name'] = 'td_liquor_menu';
		$order_by[0] = array('field'=>'liquor_id','type'=>'asc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/liquor-menu-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function liquor_menu_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'liquor_code'=>$this->input->post('liquor_code'),
							'size'=>$this->input->post('size'),
							'liquor_name'=>$this->input->post('liquor_name'),
							'liquor_price'=>$this->input->post('liquor_price')
							);
							
			$table['name'] = 'td_liquor_menu';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','liquor_id');
			$this->session->set_flashdata('success_message','Liquor Menu successfully inserted');	
			redirect('manage_hotel/liquor_menu_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-liquor-menu-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function liquor_menu_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_liquor_menu';
		$conditions = array('liquor_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'liquor_code'=>$this->input->post('liquor_code'),
							'size'=>$this->input->post('size'),
							'liquor_name'=>$this->input->post('liquor_name'),
							'liquor_price'=>$this->input->post('liquor_price')
							);
							
			$table['name'] = 'td_liquor_menu';	
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'liquor_id');
			$this->session->set_flashdata('success_message','Liquor Menu successfully updated');	
			redirect('manage_hotel/liquor_menu_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-liquor-menu-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function liquor_menu_delete($id)
	{
		$table['name'] = 'td_liquor_menu';
		if($this->Common_model->delete_data($table,$id,'liquor_id'))
		{
			$this->session->set_flashdata('success_message','Liquor Menu has been Deleted successfully.');
			redirect('manage_hotel/liquor_menu_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_hotel/liquor_menu_list');
		}
	}

	################################# LIQUOR MENU ##########################################################
	##################################################################################################	

}



