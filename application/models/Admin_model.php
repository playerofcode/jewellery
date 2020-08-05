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
	public function add_collection($data)
	{
		return $this->db->insert('collection_category',$data);
	}
	public function get_collection($cat_id='')
	{
		if($cat_id)
		{
			return $this->db->get_where('collection_category',array('cat_id'=>$cat_id))->result();
		}
		else
		{
			$this->db->order_by('cat_id','DESC');
			return $this->db->get('collection_category')->result();
		}
	}
	public function delete_collection($cat_id)
	{
		$this->db->delete('collections',array('cat_id'=>$cat_id));
		return $this->db->delete('collection_category',array('cat_id'=>$cat_id));
	}
	public function update_collection($data,$cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->update('collection_category',$data);	
	}
	public function add_collections($data)
	{
	return $this->db->insert('collections',$data);	
	}
	public function get_collections($p_id='')
	{
	if($p_id)
		{
			return $this->db->get_where('collections',array('p_id'=>$p_id))->result();
		}
		else
		{
			$this->db->order_by('p_id','DESC');
			return $this->db->get('collections')->result();	
		}
	}
	public function delete_collections($p_id)
	{
	return $this->db->delete('collections',array('p_id'=>$p_id));	
	}
	public function update_collections($data,$p_id)
	{
		$this->db->where('p_id',$p_id);
		return $this->db->update('collections',$data);
	}
	public function add_gift($data)
	{
		return $this->db->insert('gift_category',$data);
	}
	public function get_gift($cat_id='')
	{
		if($cat_id)
		{
			return $this->db->get_where('gift_category',array('cat_id'=>$cat_id))->result();
		}
		else
		{
			$this->db->order_by('cat_id','DESC');
			return $this->db->get('gift_category')->result();
		}
	}
	public function delete_gift($cat_id)
	{
		$this->db->delete('collections',array('cat_id'=>$cat_id));
		return $this->db->delete('gift_category',array('cat_id'=>$cat_id));
	}
	public function update_gift($data,$cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->update('gift_category',$data);
	}
	public function add_gifts($data)
	{
	return $this->db->insert('gifts',$data);	
	}
	public function get_gifts($p_id='')
	{
		if($p_id)
		{
			return $this->db->get_where('gifts',array('p_id'=>$p_id))->result();
		}
		else
		{
			$this->db->order_by('p_id','DESC');
			return $this->db->get('gifts')->result();	
		}
	}
	public function delete_gifts($p_id)
	{
	return $this->db->delete('gifts',array('p_id'=>$p_id));		
	}
	public function update_gifts($data,$p_id)
	{
	$this->db->where('p_id',$p_id);
	return $this->db->update('gifts',$data);
	}
	public function customer_list()
	{
		$this->db->order_by('id','DESC');
		return $this->db->get('customers')->result();
	}
	public function getNewOrder()
	{
		$this->db->order_by('order_id','DESC');
		return $this->db->get_where('orders',array('status'=>'new_order'))->result();
	}
	public function orderItem($order_id)
	{
		$result=$this->db->get_where('order_items',array('order_id'=>$order_id))->result();
		$output ='<table border="1" cellpadding="5" cellspacing="0" width="100%">';
  		$output.='<tr>
		              <td>Product ID</td>
					  <td>Product Name</td>
		              <td>Quantity</td>
		              <td>Sub Total</td>
	             </tr>';	
	    	
	    foreach ($result as $key) {
	    $output.='<tr><td>'.$key->product_id.'</td>';
	    $output.='<td>'.$key->product_name.'</td>';
	    $output.='<td>'.$key->quantity.'</td>';
	    $output.='<td>'.$key->sub_total.'</td></tr>';
	    }
	    $output.='</table>';
	    return $output;
	}
}
?>











