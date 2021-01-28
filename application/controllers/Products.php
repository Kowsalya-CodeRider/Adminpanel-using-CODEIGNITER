<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta");
class Products extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('Product_model');
	}
	 
	public function index()
	{
		$start = 0;
		$data['product'] = $this->Product_model->GetProducts($start);
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id = $this->session->userdata('u_id');
			$data['c_count'] = $this->Product_model->getcart($u_id);
		}
		$this->load->view('Products/header',$data);
		$this->load->view('Products/index',$data);
		$this->load->view('Products/footer');
	}
	
	public function productdetails($p_id)
	{
		$data['productdata'] = $this->Product_model->Productdata($p_id);
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id = $this->session->userdata('u_id');
			$data['c_count'] = $this->Product_model->getcart($u_id);
		}
		$this->load->view('Products/header',$data);
		$this->load->view('Products/productdetails',$data);
		$this->load->view('Products/footer');
	}
	
	public function loadajax()
	{
		$start = $this->input->post('start');
		$product = $this->Product_model->GetProducts($start);
		$data = $product->result_array();
		print_r(json_encode($data));die;
	}
	
	public function Userlogin()
	{
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/User_Login');
	}
	
	public function Userlogincheck()
	{
		$u_email 	= $this->security->xss_clean($this->input->post('u_email'));
		$u_password = $this->security->xss_clean($this->input->post('u_password'));
		$u_data = array(
						'u_email' 	 => $u_email,
						'u_password' => md5($u_password)
					);
		$is_user = $this->Product_model->userlogin($u_data);
		$rowdata = $is_user->row(); 
		if($is_user->num_rows()>0)
		{
			$sessiondata = array(
									'u_name'	  => $rowdata->u_name,
									'u_email'  	  => $rowdata->u_email,
									'u_password'  => $rowdata->u_password,
									'u_id'		  => $rowdata->u_id,
									'logged_in'   => TRUE
								);
			$this->session->set_userdata($sessiondata);
			redirect('Products/index');
		}
		else
		{
			$data['error'] = 'Invalid Login Credentials';
			$this->load->view('Admin/Login_header');
			$this->load->view('Admin/User_Login',$data);
		}
	}
	
	public function Userlogout()
	{
		$logout = $this->security->xss_clean($this->input->post('data'));
		if($logout=='logout')
		{
			$this->session->sess_destroy();
			redirect('Products/index');
		}
	}
	
	public function addtocart()
	{
		$p_id   	= $this->security->xss_clean($this->input->post('p_id'));
		$p_quantity = $this->security->xss_clean($this->input->post('p_quantity'));
		$u_id		= $this->session->userdata('u_id');
		$created_at = date("Y-m-d H:i:s");
		$data 		= array(
								'p_id'			=>	$p_id,
								'p_quantity'	=>	$p_quantity,
								'u_id'			=>	$u_id,
								'created_at'	=>	$created_at,
							);
		$this->db->insert('addtocart',$data);
		$udata = $this->Product_model->getcart($u_id);
		echo $udata;die;
	}
	
	public function ViewCart()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id = $this->session->userdata('u_id');
			$data['c_count'] = $this->Product_model->getcart($u_id);
			$data['cartitems'] = $this->Product_model->getCartItems($u_id);
		}
		else
		{
			$data = '';
		}
		$this->load->view('Products/header',$data);
		$this->load->view('Products/cartdetails',$data);
		$this->load->view('Products/footer');
	}
	
	public function Cartdata()
	{
		$c_id = $this->security->xss_clean(($this->input->post('c_id')));
		$u_id = $this->security->xss_clean(($this->input->post('u_id')));
		$this->db->where('c_id',$c_id);
		$this->db->delete('addtocart');
		$data = $this->Product_model->getCartItems($u_id);
		print_r(json_encode($data));die;
	}
	
	public function Orders()
	{
		$data = $this->input->post('array_1'); 
		$u_id = $this->session->userdata('u_id');
		$p_id = $data[1];
		$p_quantity = $data[3];
		$p_price = $data[4];
		$c_id = $data[5];
		$this->db->where('c_id',$c_id);
		$this->db->delete('addtocart');
		$data = array(
						'u_id'			=>	$u_id,
						'p_id'			=>	$p_id,
						'p_quantity'	=>	$p_quantity,
						'p_price'		=>	$p_price,
						'order_date'	=>  date("Y-m-d H:i:s")
					);
		$this->db->insert('orders',$data);
	}
	
	public function Myorders()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id = $this->session->userdata('u_id');
			$data['c_count'] = $this->Product_model->getcart($u_id);
			$data['orders'] = $this->Product_model->getOrders($u_id);
		}
		else
		{
			$data = '';
		}
		$this->load->view('Products/header',$data);
		$this->load->view('Products/orders',$data);
		$this->load->view('Products/footer');
	}
	
}
