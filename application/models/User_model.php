<?php 

class User_model extends CI_model
{
	public function category()
	{
		return $this->db->get('product_category')->result();
	}
	public function get_productByCategory($cat_id)
	{
	return $this->db->get_where('products',array('cat_id'=>$cat_id))->result();
	}
	public function get_productByID($p_id)
	{
		return $this->db->get_where('products',array('p_id'=>$p_id))->result();	
	}
	public function get_allProduct()
	{
		return $this->db->get('products')->result();
	}
	public function addCustomer($data)
	{
		return $this->db->insert('customers',$data);
	}
	public function login($data)
	{
		return $this->db->get_where('customers',$data);
	}
}
?>