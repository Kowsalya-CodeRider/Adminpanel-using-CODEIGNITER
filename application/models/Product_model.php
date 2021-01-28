<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function GetProducts($start)
	{
		return $this->db->from('products')->limit(2,$start)->get();
	}
	
	public function Productdata($p_id)
	{
		return $this->db->where('p_id',$p_id)->get('products')->row();
	}
	
	public function userlogin($data)
	{
		return $this->db->where('u_email',$data['u_email'],'u_password',$data['u_password'])->get('users');
	}
	
	public function getcart($u_id)
	{
		return $this->db->where('u_id',$u_id)->get('addtocart')->num_rows();
	}
	
	public function getCartItems($u_id)
	{
		return $this->db->where('u_id',$u_id)->join('products', 'products.p_id =addtocart.p_id', 'left')->get('addtocart')->result_array();
	}
	
	public function getOrders($u_id)
	{
		return $this->db->where('u_id',$u_id)->join('products', 'products.p_id =orders.p_id', 'left')->get('orders')->result_array();
	}
}
