<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_customer extends CI_Controller {
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
	
	function customer_list()
	{
		/*$table['name'] = 'td_customer';
		$order_by[0] = array('field'=>'customer_id','type'=>'desc');
		$conditions = array('customer_id!='=>1);
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);*/
		
		$data['rows'] = $this->db->query("select * from td_customer where customer_id!=1")->result();
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/customer-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}	
	function customer_add()
	{
		$data['row'] = array();
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='tab')
		{
			/* aadhar card */
			$imge1 = $_FILES["aadhar_file"]["name"];
			if($imge1!='')
			{								
				$imageFileType1 = pathinfo($imge1, PATHINFO_EXTENSION);	
				if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF")
				{					
						$this->session->set_flashdata('aadhar_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image1 = time().$imge1;
				$temp1 = $_FILES["aadhar_file"]["tmp_name"];
				$image_path1 = 'uploads/customer/';
				move_uploaded_file($temp1,$image_path1.$image1);
			}
			else
			{
				$image1 ='';
			}
			/* aadhar card */
			/* pan card */
			$imge2 = $_FILES["pan_file"]["name"];
			if($imge2!='')
			{								
				$imageFileType2 = pathinfo($imge2, PATHINFO_EXTENSION);	
				if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "PNG" && $imageFileType2 != "JPEG" && $imageFileType2 != "GIF")
				{					
						$this->session->set_flashdata('pan_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image2 = time().$imge2;
				$temp2 = $_FILES["pan_file"]["tmp_name"];
				$image_path2 = 'uploads/customer/';
				move_uploaded_file($temp2,$image_path2.$image2);
			}
			else
			{
				$image2 ='';
			}
			/* pan card */
			/* votar card */
			$imge3 = $_FILES["votar_file"]["name"];		
			if($imge3!='')
			{
										
				$imageFileType3 = pathinfo($imge3, PATHINFO_EXTENSION);	
				if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "PNG" && $imageFileType3 != "JPEG" && $imageFileType3 != "GIF")
				{					
						$this->session->set_flashdata('votar_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image3 = time().$imge3;
				$temp3 = $_FILES["votar_file"]["tmp_name"];
				$image_path3 = 'uploads/customer/';
				move_uploaded_file($temp3,$image_path3.$image3);
			}
			else
			{
				$image3 ='';
			}
			/* votar card */
			
			/* passport card */
			$imge4 = $_FILES["passport_file"]["name"];		
			if($imge4!='')
			{
										
				$imageFileType4 = pathinfo($imge3, PATHINFO_EXTENSION);	
				if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" && $imageFileType4 != "gif" && $imageFileType4 != "JPG" && $imageFileType4 != "PNG" && $imageFileType4 != "JPEG" && $imageFileType4 != "GIF")
				{					
						$this->session->set_flashdata('passport_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image4 = time().$imge4;
				$temp4 = $_FILES["passport_file"]["tmp_name"];
				$image_path4 = 'uploads/customer/';
				move_uploaded_file($temp4,$image_path4.$image4);
			}
			else
			{
				$image4 ='';
			}
			/* passport card */
			
			
			$field = array(
							'customer_name'=>$this->input->post('customer_name'),
							'address'=>$this->input->post('address'),
							'district'=>$this->input->post('district'),
							'state'=>$this->input->post('state'),
							'pincode'=>$this->input->post('pincode'),
							'email'=>$this->input->post('email'),
							'phone1'=>$this->input->post('phone1'),
							'phone2'=>$this->input->post('phone2'),
							'passport_no'=>$this->input->post('passport_no'),
							'aadhar_no'=>$this->input->post('aadhar_no'),
							'votarid'=>$this->input->post('votarid'),
							'pan'=>$this->input->post('pan'),
							'dob'=>$this->input->post('dob'),
							'doa'=>$this->input->post('doa'),
							'gst_no'=>$this->input->post('gst_no'),
							'aadhar_file'=>$image1,
							'pan_file'=>$image2,
							'votar_file'=>$image3,
							'passport_file'=>$image4
							);
			//echo '<pre>';print_r($field);die;				
			$table['name'] = 'td_customer';	
			$data['row'] = $this->Common_model->save_data($table,$field,'','customer_id');
			
			$customer_id = $this->db->insert_id();			
			$n = substr($this->input->post('customer_name'),0,3);
			$cust_code = $n."/".date('Y').$customer_id;
			
			$field1 = array('cust_code'=>$cust_code);
			$data['row'] = $this->Common_model->save_data($table,$field1,$customer_id,'customer_id');
			
			
			$this->session->set_flashdata('success_message','Customer successfully inserted');	
			redirect('manage_customer/customer_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-customer-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function customer_edit($id)
	{
		$data['action'] = 'Edit';
		
		$table['name'] = 'td_customer';
		$conditions = array('customer_id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			/* aadhar card */
			$imge1 = $_FILES["aadhar_file"]["name"];
			if($imge1!='')
			{								
				$imageFileType1 = pathinfo($imge1, PATHINFO_EXTENSION);	
				if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF")
				{					
						$this->session->set_flashdata('aadhar_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image1 = time().$imge1;
				$temp1 = $_FILES["aadhar_file"]["tmp_name"];
				$image_path1 = 'uploads/customer/';
				move_uploaded_file($temp1,$image_path1.$image1);
			}
			/* aadhar card */
			/* pan card */
			$imge2 = $_FILES["pan_file"]["name"];
			if($imge2!='')
			{								
				$imageFileType2 = pathinfo($imge2, PATHINFO_EXTENSION);	
				if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "PNG" && $imageFileType2 != "JPEG" && $imageFileType2 != "GIF")
				{					
						$this->session->set_flashdata('pan_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image2 = time().$imge2;
				$temp2 = $_FILES["pan_file"]["tmp_name"];
				$image_path2 = 'uploads/customer/';
				move_uploaded_file($temp2,$image_path2.$image2);
			}
			/* pan card */
			/* votar card */
			$imge3 = $_FILES["votar_file"]["name"];		
			if($imge3!='')
			{
										
				$imageFileType3 = pathinfo($imge3, PATHINFO_EXTENSION);	
				if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "PNG" && $imageFileType3 != "JPEG" && $imageFileType3 != "GIF")
				{					
						$this->session->set_flashdata('votar_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image3 = time().$imge3;
				$temp3 = $_FILES["votar_file"]["tmp_name"];
				$image_path3 = 'uploads/customer/';
				move_uploaded_file($temp3,$image_path3.$image3);
			}
			/* votar card */
			
			/* passport card */
			$imge4 = $_FILES["passport_file"]["name"];		
			if($imge4!='')
			{
										
				$imageFileType4 = pathinfo($imge3, PATHINFO_EXTENSION);	
				if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" && $imageFileType4 != "gif" && $imageFileType4 != "JPG" && $imageFileType4 != "PNG" && $imageFileType4 != "JPEG" && $imageFileType4 != "GIF")
				{					
						$this->session->set_flashdata('passport_message', 'Sorry, only image files are allowed');
						redirect(current_url());
				}
				$image4 = time().$imge4;
				$temp4 = $_FILES["passport_file"]["tmp_name"];
				$image_path4 = 'uploads/customer/';
				move_uploaded_file($temp4,$image_path4.$image4);
			}
			else
			{
				$image4 ='';
			}
			/* passport card */
			
			$field = array(							
							'customer_name'=>$this->input->post('customer_name'),
							'address'=>$this->input->post('address'),
							'district'=>$this->input->post('district'),
							'state'=>$this->input->post('state'),
							'pincode'=>$this->input->post('pincode'),
							'email'=>$this->input->post('email'),
							'phone1'=>$this->input->post('phone1'),
							'phone2'=>$this->input->post('phone2'),
							'passport_no'=>$this->input->post('passport_no'),
							'aadhar_no'=>$this->input->post('aadhar_no'),
							'votarid'=>$this->input->post('votarid'),
							'pan'=>$this->input->post('pan'),
							'dob'=>$this->input->post('dob'),
							'doa'=>$this->input->post('doa'),
							'gst_no'=>$this->input->post('gst_no'),
							'aadhar_file'=>$image1,
							'pan_file'=>$image2,
							'votar_file'=>$image3,
							'passport_file'=>$image4
							);
							
			$table['name'] = 'td_customer';	
			$data['row'] = $this->Common_model->save_data($table,$field,$id,'customer_id');
			$this->session->set_flashdata('success_message','Customer successfully updated');	
			redirect('manage_customer/customer_list');	
		}

		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-customer-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	function customer_delete($id)
	{
		$table['name'] = 'td_customer';
		if($this->Common_model->delete_data($table,$id,'customer_id'))
		{
			$this->session->set_flashdata('success_message','Customer has been Deleted successfully.');
			redirect('manage_customer/customer_list');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_customer/customer_list');
		}
	}

	################################# CUSTOMER ##########################################################
}

