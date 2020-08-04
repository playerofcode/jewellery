<?php 

class User_model extends CI_model
{
	public function category()
	{
		return $this->db->get_where('product_category',array('cat_status'=>'active'))->result();
	}
	public function collection()
	{
		return $this->db->get_where('collection_category',array('cat_status'=>'active'))->result();
	}
	public function gift()
	{
		return $this->db->get_where('gift_category',array('cat_status'=>'active'))->result();
	}
	public function get_productByCategory($cat_id)
	{
	return $this->db->get_where('products',array('cat_id'=>$cat_id))->result();
	}
	public function get_productByCollection($cat_id)
	{
		return $this->db->get_where('collections',array('cat_id'=>$cat_id))->result();
	}
	public function get_productByGift($cat_id)
	{
		return $this->db->get_where('gifts',array('cat_id'=>$cat_id))->result();
	}
	public function get_productByID($p_id)
	{
		return $this->db->get_where('products',array('p_id'=>$p_id))->result();	
	}
	public function get_CollectionProductByID($p_id)
	{
	return $this->db->get_where('collections',array('p_id'=>$p_id))->result();
	}
	public function get_GiftProductByID($p_id)
	{
	return $this->db->get_where('gifts',array('p_id'=>$p_id))->result();
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