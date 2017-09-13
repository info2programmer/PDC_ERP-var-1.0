<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_book extends CI_Controller {
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
	################################# BOOKING ##########################################################
	function search()
	{
	$term = $this->input->post('mid');
	//echo 'SELECT * FROM td_customer WHERE customer_id='.$term;die;exit;
	$stmt = $this->db->query('SELECT * FROM td_customer WHERE aadhar_no="'.$term.'" OR votarid="'.$term.'" OR passport_no="'.$term.'"')->result_array();
	echo $stmt[0]['customer_name'].'/'.$stmt[0]['address'].'/'.$stmt[0]['district'].'/'.$stmt[0]['state'].'/'.$stmt[0]['pincode'].'/'.$stmt[0]['email'].'/'.$stmt[0]['phone1'].'/'.$stmt[0]['phone2'].'/'.$stmt[0]['passport_no'].'/'.$stmt[0]['aadhar_no'].'/'.$stmt[0]['votarid'].'/'.$stmt[0]['pan'].'/'.$stmt[0]['dob'].'/'.$stmt[0]['doa'].'/'.$stmt[0]['gst_no'];
	}
	function room_booking_list()
	{
		$table['name'] = 'td_customer';
		$order_by[0] = array('field'=>'customer_id','type'=>'desc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);
		
		$data['search_result'] = array();
		
		if($this->input->post('mode')=='tab')
		{
			if($this->input->post('customer_name')!='') {
				
				
			
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
							'gst_no'=>$this->input->post('gst_no')
							);				
				$table['name'] = 'td_customer';	
				$data['row'] = $this->Common_model->save_data($table,$field,'','customer_id');
				
				$customer_id = $this->db->insert_id();			
				$n = substr($this->input->post('customer_name'),0,3);
				$cust_code = $n."/".date('Y').$customer_id;
				
				$field1 = array('cust_code'=>$cust_code);
				$data['row'] = $this->Common_model->save_data($table,$field1,$customer_id,'customer_id');
			} else {
				$customer_id = $this->input->post('customer_id');
			}
			
			$room_id = $this->input->post('room_id');
			$room_details = $this->db->query("select * from td_room where room_id='$room_id'")->row();
			
			$field2 = array('vacancy_status'=>1);
			$table2['name'] = 'td_room';
			$data['row2'] = $this->Common_model->save_data($table2,$field2,$room_id,'room_id');
			
			$book_count = $this->db->query("select * from td_room_book order by room_book_id desc limit 1")->row();
			if($book_count)
			{
				$no = $book_count->sl_no+1;
			}
			else
			{
				$no = 1;
			}
			$booking_no = 'RHR/R'.date('y')."/".$no;
			
			$booking_from = date_format(date_create($this->input->post('booking_from')), "Y-m-d");
			$booking_to = date_format(date_create($this->input->post('booking_to')), "Y-m-d");
			$diff = date_diff(date_create($booking_from),date_create($booking_to));  
			$no_of_days = $diff->format("%a");
			
			$room_subtotal = $no_of_days*$room_details->room_price;
			$cgst_amt = ($room_subtotal*$room_details->cgst_percent)/100;
			$sgst_amt = ($room_subtotal*$room_details->sgst_percent)/100;
			$net_total = $room_subtotal+$cgst_amt+$sgst_amt;
			
			$field3 = array(
							'room_id'=>$this->input->post('room_id'),
							'booking_date'=>date('Y-m-d'),
							'booking_from'=>date_format(date_create($this->input->post('booking_from')), "Y-m-d"),
							'booking_to'=>date_format(date_create($this->input->post('booking_to')), "Y-m-d"),
							'customer_id'=>$customer_id,
							'sl_no'=>$no,
							'booking_no'=>$booking_no,
							'no_of_adult'=>$this->input->post('no_of_adult'),
							'no_of_child'=>$this->input->post('no_of_child'),							
							'room_price'=>$room_details->room_price,
							'room_subtotal'=>$room_subtotal,
							'cgst_percent'=>$room_details->cgst_percent,
							'cgst_amt'=>$cgst_amt,
							'sgst_percent'=>$room_details->sgst_percent,
							'sgst_amt'=>$sgst_amt,
							'net_total'=>$net_total,							
							'is_adv_book'=>1,
							'vacancy_status'=>1
							);
			$table3['name'] = 'td_room_book';
			$data['row2'] = $this->Common_model->save_data($table3,$field3,'','room_book_id');
			
			
			$this->session->set_flashdata('success_message','Room successfully booked against '.$this->input->post('customer_name'));	
			redirect('manage_book/room_booking_list');
		}
		
		if($this->input->post('mode')=='search')
		{
			$from_date = date_format(date_create($this->input->post('from_date')), "Y-m-d");
			$to_date = date_format(date_create($this->input->post('to_date')), "Y-m-d");
		
			$data['search_result'] = $this->db->query("select * from td_room_book where booking_to>='$from_date' and booking_to<='$to_date'")->result();
			$data['fdate'] = $from_date;
			$data['ldate'] = $to_date;
			//echo $this->db->last_query();
			//echo '<pre>';print_r($data['search_result']);die;
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/room-booking-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	
	function room_details($room_book_id)
	{
		$data['book_room'] = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
		$room_id = $data['book_room']->room_id;
		$data['room'] = $this->db->query("select * from td_room where room_id='$room_id'")->row();
		
		$cust_id = $data['book_room']->customer_id;
		$data['customer'] = $this->db->query("select * from td_customer where customer_id='$cust_id'")->row();
		
		if($this->input->post('mode')=='tab1')
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
							'gst_no'=>$this->input->post('gst_no'),
							'aadhar_file'=>$image1,
							'pan_file'=>$image2,
							'votar_file'=>$image3,
							'passport_file'=>$image4
							);	
				//echo '<pre>';print_r($field);die;						
				$table['name'] = 'td_customer';	
				$data['row'] = $this->Common_model->save_data($table,$field,$cust_id,'customer_id');
				$this->session->set_flashdata('success_message','Details updated');	
				redirect('manage_book/room_details/'.$room_book_id);
		}	
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/room-booking-detail-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
		
	function booking_service()
	{
		if($this->input->post('mode')=='tab2')
		{
				$room_book_id = $this->input->post('room_book_id');
				$book_room = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
				
				$service_code = $this->input->post('service_code');				
				
				$service_id = $this->input->post('service_id');
				$service_qty = $this->input->post('service_qty');
				$service_subtotal = $this->input->post('service_subtotal');
				$count = count($service_code);
				
				for($i=0;$i<$count;$i++) {
				
				$service_detail = $this->db->query("select * from td_service where service_id='".$service_id[$i]."'")->row();
				$service_total = $service_detail->service_price*$service_qty[$i];
				$cgst_amt = ($service_total*$service_detail->cgst_percent)/100;
				$sgst_amt = ($service_total*$service_detail->sgst_percent)/100;
				
				$field = array(
							'room_book_id'=>$this->input->post('room_book_id'),
							'booking_no'=>$this->input->post('booking_no'),
							'service_id'=>$service_id[$i],
							'service_qty'=>$service_qty[$i],
							'service_total'=>$service_total,
							'cgst_percent'=>$service_detail->cgst_percent,
							'cgst_amt'=>$cgst_amt,
							'sgst_percent'=>$service_detail->sgst_percent,
							'sgst_amt'=>$sgst_amt,
							'service_subtotal'=>$service_subtotal[$i],
							'service_date'=>date_format(date_create($this->input->post('service_date')), "Y-m-d"),
							'service_time'=>date_format(date_create($this->input->post('service_time')), "h:i a")
							);						
				$table['name'] = 'td_booking_service';	
				$data['row'] = $this->Common_model->save_data($table,$field,'','booking_service_id');
				}
				
				$this->session->set_flashdata('success_message','Service Added');	
				redirect('manage_book/room_details/'.$room_book_id);
		}
	}
	
	function get_service()
	{
		$name = $this->input->post('name');
		$service = $this->db->query("select * from td_service where service_code='$name'")->row();
		echo json_encode($service);
	}
	
	function booking_food_menu()
	{
		if($this->input->post('mode')=='tab3')
		{
				$room_book_id = $this->input->post('room_book_id');
				$book_room = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
				
				$food_menu_id = $this->input->post('food_menu_id');
				$food_menu_qty = $this->input->post('food_menu_qty');
				$food_menu_subtotal = $this->input->post('food_menu_subtotal');
				$count = count($food_menu_id);
				
				for($i=0;$i<$count;$i++) {
				
				$food_detail = $this->db->query("select * from td_food_menu where menu_id='".$food_menu_id[$i]."'")->row();
				$food_total = $food_detail->menu_price*$food_menu_qty[$i];
				$cgst_amt = ($food_total*$food_detail->cgst_percent)/100;
				$sgst_amt = ($food_total*$food_detail->sgst_percent)/100;
				
				$field = array(
							'room_book_id'=>$this->input->post('room_book_id'),
							'booking_no'=>$this->input->post('booking_no'),
							'food_menu_id'=>$food_menu_id[$i],
							'food_menu_qty'=>$food_menu_qty[$i],
							'food_total'=>$food_total,
							'cgst_percent'=>$food_detail->cgst_percent,
							'cgst_amt'=>$cgst_amt,
							'sgst_percent'=>$food_detail->sgst_percent,
							'sgst_amt'=>$sgst_amt,
							'food_menu_subtotal'=>$food_menu_subtotal[$i],
							'food_menu_date'=>date_format(date_create($this->input->post('food_menu_date')), "Y-m-d"),
							'food_menu_time'=>date_format(date_create($this->input->post('food_menu_time')), "h:i a")
							);
				//echo '<pre>';print_r($field);die;							
				$table['name'] = 'td_booking_food_menu';	
				$data['row'] = $this->Common_model->save_data($table,$field,'','booking_food_menu_id');
				}
				
				$this->session->set_flashdata('success_message','Food Menu Added');	
				redirect('manage_book/room_details/'.$room_book_id);
		}
	}
	
	function get_food_menu()
	{
		$name = $this->input->post('name');
		$service = $this->db->query("select * from td_food_menu where menu_code='$name'")->row();
		echo json_encode($service);
	}
	
	
	function booking_liquor_menu()
	{
		if($this->input->post('mode')=='tab3')
		{
				$room_book_id = $this->input->post('room_book_id');
				$book_room = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
				
				$liquor_menu_id = $this->input->post('liquor_menu_id');
				$liquor_menu_qty = $this->input->post('liquor_menu_qty');
				$liquor_menu_subtotal = $this->input->post('liquor_menu_subtotal');
				$count = count($liquor_menu_id);
				
				for($i=0;$i<$count;$i++) {
				
				$liquor_detail = $this->db->query("select * from td_liquor_menu where liquor_id='".$liquor_menu_id[$i]."'")->row();
				$liquor_total = $liquor_detail->liquor_price*$liquor_menu_qty[$i];
				//$cgst_amt = ($food_total*$liquor_detail->cgst_percent)/100;
				//$sgst_amt = ($food_total*$liquor_detail->sgst_percent)/100;
				
				$field = array(
							'room_book_id'=>$this->input->post('room_book_id'),
							'booking_no'=>$this->input->post('booking_no'),
							'liquor_menu_id'=>$liquor_menu_id[$i],
							'liquor_menu_qty'=>$liquor_menu_qty[$i],
							'liquor_total'=>$liquor_total,
							'cgst_percent'=>0.00,
							'cgst_amt'=>0.00,
							'sgst_percent'=>0.00,
							'sgst_amt'=>0.00,
							'liquor_menu_subtotal'=>$liquor_menu_subtotal[$i],
							'liquor_menu_date'=>date_format(date_create($this->input->post('liquor_menu_date')), "Y-m-d"),
							'liquor_menu_time'=>date_format(date_create($this->input->post('liquor_menu_time')), "h:i a")
							);
				//echo '<pre>';print_r($field);							
				$table['name'] = 'td_booking_liquor_menu';	
				$data['row'] = $this->Common_model->save_data($table,$field,'','booking_liquor_menu_id');
				}
				//die;
				
				$this->session->set_flashdata('success_message','Liquor Menu Added');	
				redirect('manage_book/room_details/'.$room_book_id);
		}
	}
	
	function get_liquor_menu()
	{
		$name = $this->input->post('name');
		$service = $this->db->query("select * from td_liquor_menu where liquor_code='$name'")->row();
		echo json_encode($service);
	}
	
	function booking_extra()
	{
		$room_book_id = $this->input->post('room_book_id');
		$booking_no = $this->input->post('booking_no');
		$book_room = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
		
		$field = array(
						'misc_charges'=>$this->input->post('misc_charges'),
						'misc_charges_description'=>$this->input->post('misc_charges_description'),
						'disc_type'=>$this->input->post('disc_type'),
						'disc_amt'=>$this->input->post('disc_amt'),
						'payment_mode'=>$this->input->post('payment_mode')
					  );
		//echo '<pre>';print_r($field);							
		$table['name'] = 'td_room_book';	
		$data['row'] = $this->Common_model->save_data($table,$field,$room_book_id,'room_book_id');
		
		$this->session->set_flashdata('success_message','Other Charges updated');	
		redirect('manage_book/room_details/'.$room_book_id);
	}
	
	function room_transfer()
	{
		$old_room_id = $this->input->post('old_room_id');
		$new_room_id = $this->input->post('new_room_id');
		$booking_no = $this->input->post('booking_no');
		$booking_to = date_format(date_create($this->input->post('booking_to')), "Y-m-d");
		
		$field1 = array(
						'vacancy_status'=>0
					  );
		//echo '<pre>';print_r($field);							
		$table1['name'] = 'td_room';	
		$data['row'] = $this->Common_model->save_data($table1,$field1,$old_room_id,'room_id');
		
		$field2 = array(
						'vacancy_status'=>1
					  );
		//echo '<pre>';print_r($field);							
		$table2['name'] = 'td_room';	
		$data['row'] = $this->Common_model->save_data($table2,$field2,$new_room_id,'room_id');
		
		$data['row'] = $this->db->query("UPDATE `td_room_book` SET `room_id`='$new_room_id',`booking_to`='$booking_to' WHERE `booking_no`='$booking_no'");
		
		$this->session->set_flashdata('success_message','Room transfer successfully done');	
		redirect('manage_book/room_booking_list');
	}
	
	function room_vacant($room_book_id)
	{
		$room_book = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
		$room_id = $room_book->room_id;
		
		$field2 = array(
						'vacancy_status'=>0
					  );
		//echo '<pre>';print_r($field);							
		$table2['name'] = 'td_room';	
		$data['row'] = $this->Common_model->save_data($table2,$field2,$room_id,'room_id');
		
		$data['row'] = $this->db->query("UPDATE `td_room_book` SET `vacancy_status`=0 WHERE room_book_id='$room_book_id'");
		$this->session->set_flashdata('success_message','Room successfully vacant');	
		redirect('manage_book/room_booking_list');
	}
	
	function preview_hotel_bill($room_book_id)
	{				
		$data['room_book'] = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();				
		$this->load->view('maincontents/invoice-hotel-view',$data);		
	}
	
	function hotel_bill($room_book_id)
	{
		$table['name'] = 'td_room_book';
		$field = array('is_checkout'=>1);
		$update_checkin = $this->Common_model->save_data($table,$field,$room_book_id,'room_book_id');
		
		$room_book = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
		$room_id = $room_book->room_id;		
		$field2 = array(
						'vacancy_status'=>0
					  );							
		$table2['name'] = 'td_room';	
		$data['row'] = $this->Common_model->save_data($table2,$field2,$room_id,'room_id');		
		$data['row'] = $this->db->query("UPDATE `td_room_book` SET `vacancy_status`=0 WHERE room_book_id='$room_book_id'");
		
		$data['room_book'] = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();				
		$this->load->view('maincontents/invoice-hotel-view',$data);		
	}
	
	function invoice_list()
	{
		$table['name'] = 'td_room_book';
		$order_by[0] = array('field'=>'room_book_id','type'=>'desc');
		$conditions = array('is_checkin'=>1); 
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions,'','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/invoice-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	
	function advance_booking_list()
	{
		$table['name'] = 'td_room_book';
		$order_by[0] = array('field'=>'room_book_id','type'=>'desc');
		$conditions = array('is_adv_book'=>1); 
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions,'','','',$order_by);
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/advance-booking-list-view',$data,true);
		$this->load->view('layout-inner',$data);
	}
	
	function checkin($room_book_id)
	{
		$room_book = $this->db->query("select * from td_room_book where room_book_id='$room_book_id'")->row();
		$customer = $this->db->query("select * from td_customer where customer_id='$room_book->customer_id'")->row();
		
		$table['name'] = 'td_room_book';
		$field = array('is_checkin'=>1);
		$update_checkin = $this->Common_model->save_data($table,$field,$room_book_id,'room_book_id');
		$this->session->set_flashdata('success_message',$customer->customer_name.' successfully check in');	
		redirect('manage_book/invoice_list');
	}
	
	function service_delete($booking_service_id)
	{
		$table['name'] = 'td_booking_service';
		$service_book_detail = $this->db->query("select * from td_booking_service where booking_service_id='$booking_service_id'")->row();
		if($this->Common_model->delete_data($table,$booking_service_id,'booking_service_id'))
		{
			$this->session->set_flashdata('success_message','Service Deleted successfully.');
			redirect('manage_book/room_details/'.$service_book_detail->room_book_id);
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_book/room_details/'.$service_book_detail->room_book_id);
		}
	}
	
	function food_delete($booking_food_menu_id)
	{
		$table['name'] = 'td_booking_food_menu';
		$food_book_detail = $this->db->query("select * from td_booking_food_menu where booking_food_menu_id='$booking_food_menu_id'")->row();
		if($this->Common_model->delete_data($table,$booking_food_menu_id,'booking_food_menu_id'))
		{
			$this->session->set_flashdata('success_message','Food menu Deleted successfully.');
			redirect('manage_book/room_details/'.$food_book_detail->room_book_id);
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_book/room_details/'.$food_book_detail->room_book_id);
		}
	}
	
	function liquor_delete($booking_liquor_menu_id)
	{
		$table['name'] = 'td_booking_liquor_menu';
		$liquor_book_detail = $this->db->query("select * from td_booking_liquor_menu where booking_liquor_menu_id='$booking_liquor_menu_id'")->row();
		if($this->Common_model->delete_data($table,$booking_liquor_menu_id,'booking_liquor_menu_id'))
		{
			$this->session->set_flashdata('success_message','Liquor menu Deleted successfully.');
			redirect('manage_book/room_details/'.$liquor_book_detail->room_book_id);
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('manage_book/room_details/'.$liquor_book_detail->room_book_id);
		}
	}

	################################# BOOKING ##########################################################
}

