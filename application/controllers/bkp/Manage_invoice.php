<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');







class Manage_invoice extends CI_Controller {



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



		$table['name'] = 'td_invoice';



		$order_by[0] = array('field'=>'td_invoice.invoice_id','type'=>'desc');



		$join[0] = array('table'=>'td_customer','field'=>'customer_id','table_master'=>'td_invoice','field_table_master'=>'customer_id','type'=>'inner');



		$join[1] = array('table'=>'td_manufacturer','field'=>'manufacturer_id','table_master'=>'td_invoice','field_table_master'=>'manufacturer_id','type'=>'inner');



		$join[2] = array('table'=>'td_products','field'=>'product_id','table_master'=>'td_invoice','field_table_master'=>'product_id','type'=>'inner');



		$select = 'td_invoice.*,td_customer.name,td_customer.vendor_code,td_manufacturer.manufacturer_name,td_products.commodity_name';



		$data['rows'] = $this->Common_model->find_data($table,'array','','','',$join,'',$order_by);



		//echo '<pre>';print_r($data['rows']);die;



		



		$data['head'] = $this->load->view('elements/head','',true);



		$data['header'] = $this->load->view('elements/header','',true);



		$data['footer'] = $this->load->view('elements/footer','',true);



		$data['maincontent']=$this->load->view('maincontents/manage-invoice-list-view',$data,true);



		$this->load->view('layout-after-login',$data);



	}







	######################################################################################	







	function add()
	{	

		$data['action'] = 'Add';
		$data['row'] = array();

		if($this->input->post('mode')=='invoice')
		{		
				$fields1 = array(
				'name' => $this->input->post('name'),
				'vendor_code' => $this->input->post('vendor_code'),
				'state' => $this->input->post('state'),
				'pincode' => $this->input->post('pincode'),
				'postal_address' => $this->input->post('postal_address'),
				'district' => $this->input->post('district'),
				'commissionrate' => $this->input->post('commissionrate'),
				'gstin' => $this->input->post('gstin')
				);
				
				$table1['name'] = 'td_customer';
				$name= $this->input->post('name');
				$cust_count = $this->db->query("SELECT * FROM `td_customer` WHERE `name` = '$name'")->row();
				//echo '<pre>';print_r($cust_count);die;
				if($cust_count)
				{
					$cust_id = $cust_count->customer_id;
					$data1 = $this->Common_model->save_data($table1,$fields1,$cust_id,'customer_id');
					$customer_id = $cust_id;
				}
				else
				{
					$data1 = $this->Common_model->save_data($table1,$fields1,'','customer_id');
					$customer_id = $this->db->insert_id();	
				}
				$fields2 = array(
				'manufacturer_name' => $this->input->post('manufacturer_name'),
				'manufacturer_address' => $this->input->post('manufacturer_address'),
				'manufacturer_gstin' => $this->input->post('manufacturer_gstin')
				);
				$table2['name'] = 'td_manufacturer';
				$manufacturer_name= $this->input->post('manufacturer_name');
				$manufac_count = $this->db->query("SELECT * FROM `td_manufacturer` WHERE `manufacturer_name` = '$manufacturer_name'")->row();
				
				if($manufac_count)
				{				
					$manufac_id = $manufac_count->manufacturer_id;
					$data2 = $this->Common_model->save_data($table2,$fields2,$manufac_id,'manufacturer_id');
					$manufacturer_id = $manufac_id;
				}
				else
				{
					$data2 = $this->Common_model->save_data($table2,$fields2,'','manufacturer_id');
					$manufacturer_id = $this->db->insert_id();
				}
				/*$fields4 = array(
				'commodity_name' => $this->input->post('excisable_commodity'),
				'net_weight' => $this->input->post('net_weight'),
				'assessable_value' => $this->input->post('assessable_value'),
				'sgst' => $this->input->post('sgst'),
				'cgst' => $this->input->post('cgst'),
				'igst' => $this->input->post('igst'),
				'edu_cess' => $this->input->post('edu_cess'),
				'she_cess' => $this->input->post('she_cess')
				);
				$table4['name'] = 'td_products';
				$commodity_name= $this->input->post('excisable_commodity');
				$product_count = $this->db->query("SELECT * FROM `td_products` WHERE `commodity_name` = '$commodity_name'")->row();
				if($product_count>0)
				{				
					$prdt_id = $product_count->product_id;
					$data2 = $this->Common_model->save_data($table4,$fields4,$prdt_id,'product_id');
					$product_id = $prdt_id;
				}
				else
				{
					$data4 = $this->Common_model->save_data($table4,$fields4,'','product_id');
					$product_id = $this->db->insert_id();
				}*/

				$product_id = $this->input->post('product_id');
				$net_wt = $this->input->post('net_weight');						

				$fields = array(
								'product_id'=>$product_id,
								'stock_type'=>'out',
								'stock_amt'=>$this->input->post('net_wt'),
								'stock_date'=>date_format(date_create($this->input->post('bill_date')), "Y-m-d")
							  );
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_stock';
				$data = $this->Common_model->save_data($table,$fields,'','stock_id');

				$fields3 = array(
				'customer_id' => $customer_id,
				'manufacturer_id' => $manufacturer_id,
				'product_id' => $product_id,
				'bill_no' => $this->input->post('bill_no'),
				'bill_date' => date_format(date_create($this->input->post('bill_date')), "Y-m-d"),
				'challan_no' => $this->input->post('challan_no'),
				'challan_date' => date_format(date_create($this->input->post('challan_date')), "Y-m-d"),
				'po_no' => $this->input->post('po_no'),
				'po_date' => date_format(date_create($this->input->post('po_date')), "Y-m-d"),
				'c_note_no' => $this->input->post('c_note_no'),
				'excisable_commodity' => $this->input->post('excisable_commodity'),
				'goods_entry_no' => $this->input->post('goods_entry_no'),
				'removal_time_of_goods' => $this->input->post('removal_time_of_goods'),
				'net_wt' => $this->input->post('net_wt'),
				'rate_per_unit' => $this->input->post('rate_per_unit'),
				'sub_total' => $this->input->post('sub_total'),
				'igst_percent' => $this->input->post('igst_percent'),
				'igst_value' => $this->input->post('igst_value'),
				'cgst_percent' => $this->input->post('cgst_percent'),
				'cgst_value' => $this->input->post('cgst_value'),
				'sgst_percent' => $this->input->post('sgst_percent'),
				'sgst_value' => $this->input->post('sgst_value'),
				'fraight_charges' => $this->input->post('fraight_charges'),
				'total' => $this->input->post('total'),
				'packing' => $this->input->post('packing'),
				'packing_hscode' => $this->input->post('packing_hscode'),
				'remarks1' => $this->input->post('remarks1'),
				'remarks2' => $this->input->post('remarks2'),
				'remarks3' => $this->input->post('remarks3')
				);
				//echo '<pre>';print_r($fields3);die;
				$table3['name'] = 'td_invoice';
				$data3 = $this->Common_model->save_data($table3,$fields3,'','invoice_id');
				if($data3)
				{
				$this->session->set_flashdata('success_message','Invoice successfully inserted');
				redirect(base_url().'manage_invoice');
				}
		}
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['footer'] = $this->load->view('elements/footer','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-invoice-view',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	
	######################################################################################	







	function edit($id)



	{



		$data['action'] = 'Edit';		







		$conditions=array('invoice_id'=>$id);



		$table['name'] = 'td_invoice';



		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);



		



		$customer_id = $data['row']->customer_id;



		$data['cust_detail'] = $this->db->query("select * from td_customer where customer_id='$customer_id'")->row();



		



		$manufacturer_id = $data['row']->manufacturer_id;



		$data['manufac_detail'] = $this->db->query("select * from td_manufacturer where manufacturer_id='$manufacturer_id'")->row();



		



		$product_id = $data['row']->product_id;



		$data['product_detail'] = $this->db->query("select * from td_products where product_id='$product_id'")->row();



		



		if($this->input->post('mode')=='invoice')



		{



			



				$fields1 = array(



				'name' => $this->input->post('name'),



				'vendor_code' => $this->input->post('vendor_code'),



				'state' => $this->input->post('state'),



				'pincode' => $this->input->post('pincode'),



				'postal_address' => $this->input->post('postal_address'),



				'district' => $this->input->post('district'),



				'commissionrate' => $this->input->post('commissionrate'),



				'gstin' => $this->input->post('gstin')



				);



				$table1['name'] = 'td_customer';



				



				$name= $this->input->post('name');



				$cust_count = $this->db->query("SELECT * FROM `td_customer` WHERE `name` = '$name'")->row();



				if($cust_count)



				{				



					$cust_id = $cust_count->customer_id;



					$data1 = $this->Common_model->save_data($table1,$fields1,$cust_id,'customer_id');



					$customer_id = $cust_id;



				}



				else



				{



					$data1 = $this->Common_model->save_data($table1,$fields1,'','customer_id');



					$customer_id = $this->db->insert_id();	



				}



				



				$fields2 = array(



				'manufacturer_name' => $this->input->post('manufacturer_name'),



				'manufacturer_address' => $this->input->post('manufacturer_address'),



				'manufacturer_gstin' => $this->input->post('manufacturer_gstin')



				);



				$table2['name'] = 'td_manufacturer';



				



				$manufacturer_name= $this->input->post('manufacturer_name');



				$manufac_count = $this->db->query("SELECT * FROM `td_manufacturer` WHERE `manufacturer_name` = '$manufacturer_name'")->row();



				if($manufac_count)



				{				



					$manufac_id = $manufac_count->manufacturer_id;



					$data2 = $this->Common_model->save_data($table2,$fields2,$manufac_id,'manufacturer_id');



					$manufacturer_id = $manufac_id;



				}



				else



				{



					$data2 = $this->Common_model->save_data($table2,$fields2,'','manufacturer_id');



					$manufacturer_id = $this->db->insert_id();



				}



				



				



				



				



				



				$fields4 = array(



				'commodity_name' => $this->input->post('excisable_commodity'),



				'net_weight' => $this->input->post('net_weight'),



				'assessable_value' => $this->input->post('assessable_value'),



				'sgst' => $this->input->post('sgst'),



				'cgst' => $this->input->post('cgst'),



				'igst' => $this->input->post('igst'),



				'edu_cess' => $this->input->post('edu_cess'),



				'she_cess' => $this->input->post('she_cess')



				);



				$table4['name'] = 'td_products';



				$commodity_name= $this->input->post('excisable_commodity');



				$product_count = $this->db->query("SELECT * FROM `td_products` WHERE `commodity_name` = '$commodity_name'")->row();



				if($product_count>0)



				{				



					$prdt_id = $product_count->product_id;



					$data2 = $this->Common_model->save_data($table4,$fields4,$prdt_id,'product_id');



					$product_id = $prdt_id;



				}



				else



				{



					$data4 = $this->Common_model->save_data($table4,$fields4,'','product_id');



					$product_id = $this->db->insert_id();



				}



				



				$fields3 = array(



				'customer_id' => $customer_id,



				'manufacturer_id' => $manufacturer_id,



				'product_id' => $product_id,



				'bill_no' => $this->input->post('bill_no'),



				'bill_date' => date_format(date_create($this->input->post('bill_date')), "Y-m-d"),



				'challan_no' => $this->input->post('challan_no'),



				'challan_date' => date_format(date_create($this->input->post('challan_date')), "Y-m-d"),



				'po_no' => $this->input->post('po_no'),



				'po_date' => date_format(date_create($this->input->post('po_date')), "Y-m-d"),
				
				'c_note_no' => $this->input->post('c_note_no'),



				'excisable_commodity' => $this->input->post('excisable_commodity'),



				'goods_entry_no' => $this->input->post('goods_entry_no'),



				'removal_time_of_goods' => $this->input->post('removal_time_of_goods'),



				'net_wt' => $this->input->post('net_wt'),



				'rate_per_unit' => $this->input->post('rate_per_unit'),



				'sub_total' => $this->input->post('sub_total'),



				'igst_percent' => $this->input->post('igst_percent'),



				'igst_value' => $this->input->post('igst_value'),



				'cgst_percent' => $this->input->post('cgst_percent'),



				'cgst_value' => $this->input->post('cgst_value'),



				'sgst_percent' => $this->input->post('sgst_percent'),



				'sgst_value' => $this->input->post('sgst_value'),



				'fraight_charges' => $this->input->post('fraight_charges'),



				'total' => $this->input->post('total'),



				'packing' => $this->input->post('packing'),



				'packing_hscode' => $this->input->post('packing_hscode'),



				'remarks' => $this->input->post('remarks')



				);



				$table3['name'] = 'td_invoice';



				$data3 = $this->Common_model->save_data($table3,$fields3,$id,'invoice_id');



				



				



				if($data3)



				{



				$this->session->set_flashdata('success_message','Invoice successfully updated');	



				redirect(base_url().'manage_invoice');



				}



			



		}







		$data['head'] = $this->load->view('elements/head','',true);



		$data['header'] = $this->load->view('elements/header','',true);



		$data['footer'] = $this->load->view('elements/footer','',true);



		$data['maincontent']=$this->load->view('maincontents/add-edit-invoice-view',$data,true);



		$this->load->view('layout-after-login',$data);



	}







	######################################################################################	







	function confirmDelete($id)



	{



		$table['name'] = 'td_invoice';



		if($this->Common_model->delete_data($table,$id,'invoice_id'))



		{



			$this->session->set_flashdata('success_message','Invoice has been Deleted successfully.');



			redirect('manage_invoice');



		}



		else



		{



			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');



			redirect('manage_invoice');



		}



	}	







	##############################################################################################	



	



	function get_customer()



	{



		$name = $this->input->post('name');



		$customer_detail = $this->db->query("select * from td_customer where name = '$name'")->row();



		echo json_encode($customer_detail);	



	}



	



	function get_manufacturer()



	{



		$name = $this->input->post('manu_name');



		$manu_detail = $this->db->query("select * from td_manufacturer where manufacturer_name = '$name'")->row();



		echo json_encode($manu_detail);	



	}



	



	function get_product()
	{
		$name = $this->input->post('manu_name');
		$manu_details = $this->db->query("select * from td_products where commodity_name = '$name'")->result();
		
		if($manu_details) 
		{
			foreach($manu_details as $manu_detail) 
			{		

		$stock_in = $this->db->query("select sum(stock_amt) as stockin from td_stock where product_id='$manu_detail->product_id' and stock_type='in'")->row();
		$stock_out = $this->db->query("select sum(stock_amt) as stockout from td_stock where product_id='$manu_detail->product_id' and stock_type='out'")->row();
		$stock = ($stock_in->stockin-$stock_out->stockout); 		

		$return_data[] = array(
							'product_id'=>$manu_detail->product_id,
							'commodity_name'=>$manu_detail->commodity_name,
							'net_weight'=>$manu_detail->net_weight,
							'stock'=>$stock
							);
			}
		}
		echo json_encode($return_data);
	}

	function search()



	{



		if($this->input->post('mode')=='search')



		{



			$type = $this->input->post('type');



			$keyword = $this->input->post('keyword');



			$password = $this->input->post('password');



			



			$data['type'] = $type;



			$data['keyword'] = $keyword;



			$data['password'] = $password;



			



			$data['check']= $this->db->query("select * from td_users where id='3'")->row();



			



			if($type=='inv_no')



			{ 



				 $data['searchs'] = $this->db->query("select * from td_invoice where bill_no='$keyword'")->result();			



			}



			else if($type=='goods_no')



			{ 



				 $goods_query= $this->db->query("select * from td_products where commodity_name='$keyword'")->row();



				 $product_id = $goods_query->product_id;



				 $data['searchs'] = $this->db->query("select * from td_invoice where product_id='$product_id'")->result();



			}



			else if($type=='customer')



			{ 



				 $cust_query= $this->db->query("select * from td_customer where name='$keyword'")->row();



				 $customer_id = $cust_query->customer_id;



				 $data['searchs'] = $this->db->query("select * from td_invoice where customer_id='$customer_id'")->result();



			}				 



		}



		else



		{



			$data['check'] = array();	



		}



		



		$data['head'] = $this->load->view('elements/head','',true);



		$data['header'] = $this->load->view('elements/header','',true);



		$data['footer'] = $this->load->view('elements/footer','',true);



		$data['maincontent']=$this->load->view('maincontents/search-view',$data,true);



		$this->load->view('layout-after-login',$data);



	}



	



	function csv_report($type,$key)



	{



		$keyword = urldecode($key);



		



		if($type=='inv_no')



		{ 



			$data['searchs'] = $this->db->query("select * from td_invoice where bill_no='$keyword'")->result();			



		}



		else if($type=='goods_no')



		{ 



			$goods_query= $this->db->query("select * from td_products where commodity_name='$keyword'")->row();



			$product_id = $goods_query->product_id;



		 	$data['searchs'] = $this->db->query("select * from td_invoice where product_id='$product_id'")->result();



		}



		else if($type=='customer')



		{ 



			$cust_query= $this->db->query("select * from td_customer where name='$keyword'")->row();



			$customer_id = $cust_query->customer_id;



		 	$data['searchs'] = $this->db->query("select * from td_invoice where customer_id='$customer_id'")->result();



		}



		$this->load->view('maincontents/csv-report-view',$data);



	}



	



	function print_tax_invoice($id)



	{



		$table['name'] = 'td_invoice';



		$order_by[0] = array('field'=>'td_invoice.invoice_id','type'=>'desc');



		$conditions = array('td_invoice.invoice_id'=>$id);



		$join[0] = array('table'=>'td_customer','field'=>'customer_id','table_master'=>'td_invoice','field_table_master'=>'customer_id','type'=>'inner');



		$join[1] = array('table'=>'td_manufacturer','field'=>'manufacturer_id','table_master'=>'td_invoice','field_table_master'=>'manufacturer_id','type'=>'inner');



		$join[2] = array('table'=>'td_products','field'=>'product_id','table_master'=>'td_invoice','field_table_master'=>'product_id','type'=>'inner');



		$select = 'td_invoice.*,td_customer.*,td_manufacturer.manufacturer_name,td_products.commodity_name';



		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions,'',$join,'',$order_by);



		//echo '<pre>';print_r($data['row']);die;


		$data['cgst_words'] = $this->convert_number($data['row']->cgst_value);
		



		$this->load->view('maincontents/tax-invoice',$data);



	}


	




}