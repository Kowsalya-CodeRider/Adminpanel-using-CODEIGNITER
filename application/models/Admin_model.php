<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function Adminlogin($data)
	{
		return $this->db->where('a_email',$data['a_email'],'a_password',$data['a_password'])->get('admin_login');
	}
	
	public function getDashboard()
	{
		$query = "SELECT (SELECT COUNT(bbusers.u_id) FROM bbusers) as ucount,
				  (SELECT COUNT(bbproducts.p_id) FROM bbproducts) as pcount";
		$result = $this->db->query($query);
		return $result->row();
	}
		
	public function GetProducts()
	{
		return $this->db->get('products')->result_array();
	}
	
	public function productdelete($p_id)
	{
		return $this->db->where('p_id',$p_id)->delete('products');
	}
	
	public function GetInProduct($pid)
	{
		return $this->db->where('p_id',$pid)->get('products')->row();
	}
	
	
}
