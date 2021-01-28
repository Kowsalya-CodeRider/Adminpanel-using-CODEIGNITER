<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('Admin_model');
	}
	 
	public function index()
	{
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/Login');
	}
	
	public function Dashboard()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['dashboard'] = $this->Admin_model->getDashboard();
			$data1['uri'] = $this->uri->segment(2);
			$this->load->view('Admin/header');
			$this->load->view('Admin/navbar');
			$this->load->view('Admin/leftsidebar',$data1);
			$this->load->view('Admin/dashboard',$data);
			$this->load->view('Admin/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function ProductList()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['product'] = $this->Admin_model->GetProducts();
			$data1['uri'] = $this->uri->segment(2);
			$this->load->view('Admin/header');
			$this->load->view('Admin/navbar');
			$this->load->view('Admin/leftsidebar',$data1);
			$this->load->view('Admin/ProductList',$data);
			$this->load->view('Admin/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function AddProduct()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['product'] = $this->Admin_model->GetProducts();
			$data1['uri'] = $this->uri->segment(2);
			$this->load->view('Admin/header');
			$this->load->view('Admin/navbar');
			$this->load->view('Admin/leftsidebar',$data1);
			$this->load->view('Admin/AddProduct',$data);
			$this->load->view('Admin/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function logincheck()
	{
		$a_email 	= $this->security->xss_clean($this->input->post('a_email'));
		$a_password = $this->security->xss_clean($this->input->post('a_password'));
		$a_data = array(
						'a_email' 	 => $a_email,
						'a_password' => $a_password
					);
		$is_user = $this->Admin_model->Adminlogin($a_data);
		$rowdata = $is_user->row();
		if($is_user->num_rows()>0)
		{
			$sessiondata = array(
									'a_name'	  => $rowdata->a_name,
									'a_email'  	  => $rowdata->a_email,
									'a_password'  => $rowdata->a_password,
									'a_id'		  => $rowdata->a_id,
									'logged_in'   => TRUE
								);
			$this->session->set_userdata($sessiondata);
			redirect('Admin/Dashboard');
		}
		else
		{
			$data['error'] = 'Invalid Login Credentials';
			$this->load->view('Admin/Login_header');
			$this->load->view('Admin/Login',$data);
		}
	}
	
	public function Adminlogout()
	{
		$this->session->sess_destroy();
		redirect('Admin/index');
	}
	
	public function error()
	{
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/error');
	}
	
	public function InsertProduct()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$p_name 	= $this->input->post('p_name');
			$p_price 	= $this->input->post('p_price');
			$p_sku 		= $this->input->post('p_sku');
			$p_stock  	= $this->input->post('p_stock');
			$p_image 	= $this->input->post('p_image');
			
			if(!empty($_FILES['p_image']['name']))
			{
				$_FILES['file']['name']      = $_FILES['p_image']['name']; 
				$_FILES['file']['type']      = $_FILES['p_image']['type']; 
				$_FILES['file']['tmp_name']  = $_FILES['p_image']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['p_image']['error']; 
				$_FILES['file']['size']      = $_FILES['p_image']['size']; 
				 
				$uploadPath = './productimages/'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				  
				
				if ( ! $this->upload->do_upload('file'))
				{
					$error = $this->upload->display_errors();
					$errordata['error'] = strip_tags($error);
					$errordata['output'] = 0;
					print_r(json_encode($errordata));die;
				}
				else
				{
					$fileData = $this->upload->data(); 
					$uploadData['file_name'] = $fileData['file_name']; 				
					$p_image = $uploadData['file_name'];
					
				}
			}
			$data = $this->security->xss_clean(array(
							'p_name' 	=> $p_name,
							'p_price' 	=> $p_price,
							'p_sku' 	=> $p_sku,
							'p_stock'   => $p_stock,
							'p_image'	=> $p_image,
							'created_at'=> date("Y-m-d H:i:s")
						));
			$this->db->insert('products',$data);
			redirect('Admin/ProductList');
		}
		else
		{
			$this->error();
		}
	}
	
	public function deleteproduct()
	{
		$p_id = $this->security->xss_clean($this->input->post('p_id'));
		$result = $this->Admin_model->productdelete($p_id);
		print_r($result);die;
	}
	
	public function ViewProduct($p_id)
	{
		if($this->session->userdata('logged_in')==TRUE)
		{			
			$data['product'] = $this->Admin_model->GetInProduct($p_id);
			if(!empty($data['product']))
			{
				$data1['uri'] = $this->uri->segment(2);
				$this->load->view('Admin/header');
				$this->load->view('Admin/navbar');
				$this->load->view('Admin/leftsidebar',$data1);
				$this->load->view('Admin/ViewProduct',$data);
				$this->load->view('Admin/footer');
			}
		}
		else
		{
			$this->error();
		}
	}
	
	public function EditProduct($p_id)
	{
		if($this->session->userdata('logged_in')==TRUE)
		{			
			$data['product'] = $this->Admin_model->GetInProduct($p_id);
			if(!empty($data['product']))
			{
				$data1['uri'] = $this->uri->segment(2);
				$this->load->view('Admin/header');
				$this->load->view('Admin/navbar');
				$this->load->view('Admin/leftsidebar',$data1);
				$this->load->view('Admin/Editproduct',$data);
				$this->load->view('Admin/footer');
			}
		}
		else
		{
			$this->error();
		}
	}
	
	public function UpdateProduct()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$p_id 		= $this->security->xss_clean($this->input->post('p_id'));
			$p_name 	= $this->input->post('p_name');
			$p_price 	= $this->input->post('p_price');
			$p_sku 		= $this->input->post('p_sku');
			$p_stock  	= $this->input->post('p_stock');
						
			if(!empty($_FILES['p_image_1']['name']))
			{
				$_FILES['file']['name']      = $_FILES['p_image_1']['name']; 
				$_FILES['file']['type']      = $_FILES['p_image_1']['type']; 
				$_FILES['file']['tmp_name']  = $_FILES['p_image_1']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['p_image_1']['error']; 
				$_FILES['file']['size']      = $_FILES['p_image_1']['size']; 
				 
				$uploadPath = './productimages/'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				  
				
				if ( ! $this->upload->do_upload('file'))
				{
					$error = $this->upload->display_errors();
					$errordata['error'] = strip_tags($error);
					$errordata['output'] = 0;
					print_r(json_encode($errordata));die;
				}
				else
				{
					$fileData = $this->upload->data(); 
					$uploadData['file_name'] = $fileData['file_name']; 				
					$p_image = $uploadData['file_name'];
					
				}
			}
			else
			{
				$p_image 	= $this->input->post('p_image');
			}
			$data = $this->security->xss_clean(array(
							'p_name' 	=> $p_name,
							'p_price' 	=> $p_price,
							'p_sku' 	=> $p_sku,
							'p_stock'   => $p_stock,
							'p_image'	=> $p_image,
							'created_at'=> date("Y-m-d H:i:s")
						));
			$this->db->where('p_id',$p_id);
			$this->db->update('products',$data);
			redirect('Admin/ProductList');
		}
		else
		{
			$this->error();
		}
	}
	
	public function Register()
	{
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/User_Register');
	}
	
	public function Addusers()
	{
		$u_name 	= $this->security->xss_clean($this->input->post('u_name'));
		$u_email 	= $this->security->xss_clean($this->input->post('u_email'));
		$u_password = $this->security->xss_clean($this->input->post('u_password'));
		$u_number 	= $this->security->xss_clean($this->input->post('u_number'));
		$u_data = array(
						'u_name' 	 => $u_name,
						'u_email' 	 => $u_email,
						'u_password' => md5($u_password),
						'u_number'	 => $u_number
					);
		$this->db->insert('users',$u_data);
		$data['success'] = 'Registration Successfully Completed!';
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/User_Register',$data);
	}
	
}
