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
	public function getProfile($email)
	{
		return $this->db->get_where('customers',array('email'=>$email))->result();
	}
	public function save_payment_details($data)
	{
		return $this->db->insert('payment',$data);
	}
	public function place_order($data)
	{
		$order_id=$this->db->insert('orders',$data);
		return $order_id?$this->db->insert_id():false;
	}
	public function place_orderItems($ordItemData)
	{
		return $this->db->insert_batch('order_items',$ordItemData);
	}
	public function getOrderHistory($email)
	{
		return $this->db->get_where('customers',array('email'=>$email))->result();
	}
	public function getOrderDetail($customer_id)
	{
		$this->db->order_by('order_id','DESC');
		return $this->db->get_where('orders',array('customer_id'=>$customer_id))->result();
	}
	public function CustomerInfoByOrderId($order_id)
	{
		return $this->db->get_where('orders',array('order_id'=>$order_id))->result();
	}
	public function orderItem($order_id)
	{
		$result=$this->db->get_where('order_items',array('order_id'=>$order_id))->result();
		$a=$this->CustomerInfoByOrderId($order_id);
		$customer_name=$a[0]->customer_name;
		$address=$a[0]->address;
		$total=$a[0]->grand_total;
		$date=$a[0]->date;
		$output ='<table border="1" cellpadding="15" cellspacing="0" width="100%">';
		$output.='<tr>
	    			<td>Customer Name</td>
	    			<td>'.$customer_name.'</td>
					<td>Order ID</td>
					<td>'.$order_id.'</td>
					</tr>';
		$output.='<tr>
		<td>Address</td>
		<td>'.$address.'</td>
		<td>Date & Time</td>
		<td>'.$date.'</td>
		</tr>';
		$output.='<tr><td colspan="4"><center>Product Description(s)</center></td></tr>';
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
	    $output.='<tr><td colspan="3"><center>Total Amount(Including Delivery Charge)</center></td><td>'.$total.'</td></tr>';
	    $output.='</table>';
	    $output.='<div style="bottom:0;position:fixed;color:navy;float:left;">www.jewellerywebsite.com</div>';
	    $output.='<div style="bottom:0;position:fixed;color:navy;float:right;">Thank you for shoping.</div>';
	    return $output;
	}
	public function locationFinder($pincode)
	{
		return $this->db->get_where('location',array('pincode'=>$pincode))->result();
	}
	public function getOrderStatus($order_id)
	{
		return $this->db->get_where('orders',array('order_id'=>$order_id))->row()->status;
	}
	public function contactInfo($data)
	{
		return $this->db->insert('contact',$data);
	}
}
?>