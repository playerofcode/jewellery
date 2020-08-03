<?php 

class Admin_model extends CI_model
{
	public function login($email,$password)
	{
		return  $this->db->get_where('admin', array('email' => $email,'password'=>$password));
	}
	public function add_category($data)
	{
		return $this->db->insert('product_category',$data);
	}
	public function get_category($cat_id='')
	{
		if($cat_id)
		{
			return $this->db->get_where('product_category',array('cat_id'=>$cat_id))->result();
		}
		else
		{
			$this->db->order_by('cat_id','DESC');
			return $this->db->get('product_category')->result();
		}
	}
	public function delete_category($cat_id)
	{
		$this->db->delete('products',array('cat_id'=>$cat_id));
		return $this->db->delete('product_category',array('cat_id'=>$cat_id));

	}
	public function update_category($data,$cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->update('product_category',$data);
	}
	public function add_product($data)
	{
		return $this->db->insert('products',$data);
	}
	public function get_product($p_id='')
	{
		if($p_id)
		{
			return $this->db->get_where('products',array('p_id'=>$p_id))->result();
		}
		else
		{
			$this->db->order_by('p_id','DESC');
			return $this->db->get('products')->result();	
		}
	}
	public function delete_product($p_id)
	{
		return $this->db->delete('products',array('p_id'=>$p_id));
	}
	public function update_product($data,$p_id)
	{
		$this->db->where('p_id',$p_id);
		return $this->db->update('products',$data);
	}
	public function allLocation()
	{
		return $this->db->get('location')->result();
	}
	public function delete_location($id)
	{
		return $this->db->delete('location',array('id'=>$id));
	}
	public function add_location($data)
	{
		return $this->db->insert('location',$data);
	}
}
?>











