<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		include APPPATH . 'third_party/src/Payment.php';
		include APPPATH . 'third_party/src/Validator.php';
		include APPPATH . 'third_party/src/Crypto.php';
		$this->load->model('User_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->load->library('cart');
	}
	public function index()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$data['product_info']=$this->model->get_allProduct();
		$this->load->view('user/index',$data);
		$this->load->view('user/footer');
	}
	public function products()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$cat_id=$this->uri->segment(3);
		if(!empty($cat_id))
		{
		$data['product_info']=$this->model->get_productByCategory($cat_id);
		$this->load->view('user/products',$data);
		}
		$this->load->view('user/footer');
	}
	public function collection()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$cat_id=$this->uri->segment(3);
		if(!empty($cat_id))
		{
		$data['product_info']=$this->model->get_productByCollection($cat_id);
		$this->load->view('user/collection',$data);
		}
		$this->load->view('user/footer');
	}
	public function cart()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/cart');
		$this->load->view('user/footer');
	}
	public  function single()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$p_id=$this->uri->segment(3);
		if(!empty($p_id))
		{
		$data['product_info']=$this->model->get_productByID($p_id);
		$this->load->view('user/single',$data);
		}
		$this->load->view('user/footer');
	}
	public  function gift()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$cat_id=$this->uri->segment(3);
		if(!empty($cat_id))
		{
		$data['product_info']=$this->model->get_productByGift($cat_id);
		$this->load->view('user/gift',$data);
		}
		$this->load->view('user/footer');
	}
	public function single_collection()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$p_id=$this->uri->segment(3);
		if(!empty($p_id))
		{
		$data['product_info']=$this->model->get_CollectionProductByID($p_id);
		$this->load->view('user/single_collection',$data);
		}
		$this->load->view('user/footer');
	}
	public function single_gift()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$p_id=$this->uri->segment(3);
		if(!empty($p_id))
		{
		$data['product_info']=$this->model->get_GiftProductByID($p_id);
		$this->load->view('user/single_gift',$data);
		}
		$this->load->view('user/footer');
	}
	public  function series()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/series');
		$this->load->view('user/footer');
	}
	public  function style()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/style');
		$this->load->view('user/footer');
	}
	public  function video()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/video');
		$this->load->view('user/footer');
	}
	public  function blog()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/blog');
		$this->load->view('user/footer');
	}
	public  function about()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/about');
		$this->load->view('user/footer');
	}
	public function gifting()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/gifting');
		$this->load->view('user/footer');
	}
	public function gifting_occasions()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/gift_occasions');
		$this->load->view('user/footer');
	}
	public function add_to_cart()
	{
	if($this->input->post('pid'))
	{
	$product=$this->model->get_productByID($this->input->post('pid'));
	$data = array(
    'id'      => $product[0]->p_id,
    'qty'     => 1,
    'myqty'     => $product[0]->p_qty,
    'p_unit'     => $product[0]->p_unit,
    'price'   => $product[0]->d_price,
    'name'    => $product[0]->p_name,
    'image'    => $product[0]->p_img1,
	);
	$insert=$this->cart->insert($data);
	echo $insert?'ok':'err';
	}
	}
	public function add_to_cart_collection()
	{
	if($this->input->post('pid'))
	{
	$product=$this->model->get_CollectionProductByID($this->input->post('pid'));
	$data = array(
    'id'      => $product[0]->p_id,
    'qty'     => 1,
    'myqty'     => $product[0]->p_qty,
    'p_unit'     => $product[0]->p_unit,
    'price'   => $product[0]->d_price,
    'name'    => $product[0]->p_name,
    'image'    => $product[0]->p_img1,
	);
	$insert=$this->cart->insert($data);
	echo $insert?'ok':'err';
	}
	}
	public function add_to_cart_gift()
	{
	if($this->input->post('pid'))
	{
	$product=$this->model->get_GiftProductByID($this->input->post('pid'));
	$data = array(
    'id'      => $product[0]->p_id,
    'qty'     => 1,
    'myqty'     => $product[0]->p_qty,
    'p_unit'     => $product[0]->p_unit,
    'price'   => $product[0]->d_price,
    'name'    => $product[0]->p_name,
    'image'    => $product[0]->p_img1,
	);
	$insert=$this->cart->insert($data);
	echo $insert?'ok':'err';
	}
	}
	public function updateItemQty()
	{
		$rowid=$this->input->get('rowid');
		$qty=$this->input->get('qty');
		if(!empty($rowid) && !empty($qty))
		{
			$data=array(
				'rowid'=>$rowid,
				'qty'=>$qty
			);
			$update=$this->cart->update($data);
		}
		echo $update?'ok':'err';
	}
	public function removeItem()
	{
		if($this->input->post('rowid'))
		{
			$remove=$this->cart->remove($this->input->post('rowid'));
			echo $remove?'ok':'err';
		}
	}
	public function locationFinder()
	{
		$pincode=$this->input->post('pincode');
		if($pincode)
		{
			$res=$this->model->locationFinder($pincode);
			echo $res?'ok':'err';
		}
	}
	public function register()
	{
		$form=$this->input->post();
		$data=array(
			'name'=>$form['name'],
			'email'=>$form['email'],
			'mobno'=>$form['mobno'],
			'password'=>$form['password']
		);
		$res=$this->model->addCustomer($data);
		echo $res?'ok':'err';
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$data=array(
			'email'=>$email,
			'password'=>$password
		);
		if($res=$this->model->login($data)->num_rows()>0)
		{
			$this->session->set_userdata('email', $email);
			echo 'ok';
		}
		else
		{
			echo 'err';
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		return redirect(base_url().'user/index');
	}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'user/cart');
		}
	}
	public function checkout()
	{
		$this->check_login();
		if($this->cart->total_items()>0){
		$email=$this->session->userdata('email');
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$data['customer_info']=$this->model->getProfile($email);
		$this->load->view('user/header',$data);
		$this->load->view('user/checkout',$data);
		$this->load->view('user/footer');
		}
		else
		{
			$this->session->set_flashdata('msg', "Your Cart is empty!. Buy something to checkout");
  			return redirect(base_url().'user/cart');
		}
	}
	//payment Checkout Option Here
	public function place_order()
	{
	$customer_id=$this->input->post('customer_id');
    $name=$this->input->post('name');
	$mobno=$this->input->post('mobno');
	$state=$this->input->post('state');
	$city=$this->input->post('city');
	$zipcode=$this->input->post('zipcode');
	$address=$this->input->post('address');
	$grand_total=$this->input->post('grand_total');
	$data=array(
		'customer_id'=>$customer_id,
		'customer_name'=>$name,
		'mobno'=>$mobno,
		'state'=>$state,
		'city'=>$city,
		'zipcode'=>$zipcode,
		'address'=>$address,
		'grand_total'=>$grand_total,
		'status'=>'new_order'
	);
		$order_id=$this->model->place_order($data);
		if($order_id)
		{
			$cartItems =$this->cart->contents();
			$ordItemData = array();
			$i=0;
			foreach ($cartItems as $item) {
				$ordItemData[$i]['order_id']=$order_id ;
				$ordItemData[$i]['product_id']=$item['id'];
				$ordItemData[$i]['product_name']=$item['name'];
				$ordItemData[$i]['quantity']=$item['qty'];
				$ordItemData[$i]['sub_total']=$item['subtotal'];
				$i++;
			}
			if(!empty($ordItemData))
			{
				$insertItem=$this->model->place_orderItems($ordItemData);
				if($insertItem)
				{
					//$data['insertItem']=$insertItem;
					$this->cart->destroy();
					$this->session->set_flashdata('order_id', $order_id);
					return redirect(base_url().'user/success');
				}
			}

		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong. Try again");
  			return redirect(base_url().'user/checkout');
		}
	}
	public function success()
	{
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/success');
		$this->load->view('user/footer');
	}
	public function payment_form()
	{
		$this->load->view('user/payment_form');
	}
	public function payment_checkout()
	{
		$products='';
		foreach ($this->cart->contents() as $items){
			$products .=$items['name']." ";
		}
$fname          = $this->input->post('name');
$product_name   = $products;
$email          = $this->session->userdata('email');
$amount         = $this->input->post('grand_total');
$contact        = $this->input->post('mobno');
$country        = 'India';
$state          = $this->input->post('state');
$city           = $this->input->post('city');
$postalcode     = $this->input->post('postalcode');
$address        = $this->input->post('address');
$custom_field_1 = $this->input->post('customer_id');
$obj = new \Paykun\Checkout\Payment('907827924705710', '9ADEC6FF0C1804049C84F02B0871B3AC', 'CA4CF211861A319F3A993FE8A672CC72', false,true);
$successUrl=str_replace(base_url('user/checkout'),base_url('user/successpayment'), $_SERVER['HTTP_REFERER']);
$failUrl=str_replace(base_url('user/checkout'),base_url('user/failurepayment'), $_SERVER['HTTP_REFERER']);
$microtime = str_replace('.', '', microtime(true));
$p_id=substr($microtime, 0, 14);
$obj->initOrder($p_id, $product_name,  $amount, $successUrl,  $failUrl, 'INR');
$obj->addCustomer($fname, $email, $contact);
$obj->addShippingAddress('', '', '', '', '');
$obj->addBillingAddress('', '', '', '', '');
$obj->setCustomFields(array('udf_1' =>$custom_field_1.'0'));
echo $obj->submit();
	}
	public function successpayment()
	{
		$obj = new \Paykun\Checkout\Payment('907827924705710', '9ADEC6FF0C1804049C84F02B0871B3AC', 'CA4CF211861A319F3A993FE8A672CC72', false,true);
		$response = $obj->getTransactionInfo($_REQUEST['payment-id']);
		if(is_array($response) && !empty($response)) {

    if($response['status'] && $response['data']['transaction']['status'] == "Success") {
    	$payment_id=$response['data']['transaction']['payment_id'];
		$payment_mode=$response['data']['transaction']['payment_mode'];
		$order_id=$response['data']['transaction']['order']['order_id'];
		$payment_for=$response['data']['transaction']['order']['product_name'];
 	    $payment_status=$response['data']['transaction']['status'];
		$amount=$response['data']['transaction']['order']['gross_amount'];
		$name=$response['data']['transaction']['customer']['name'];
		$email=$response['data']['transaction']['customer']['email_id'];
		$mobno=$response['data']['transaction']['customer']['mobile_no'];
		$customer_id=$response['data']['transaction']['custom_field_1'];
		$data=array(
			'payment_id'=>$payment_id,
			'payment_mode'=>$payment_mode,
			'order_id'=>$order_id,
			'payment_for'=>$payment_for,
			'payment_status'=>$payment_status,
			'amount'=>$amount,
			'name'=>$name,
			'email'=>$email,
			'mobno'=>$mobno,
			'customer_id'=>$customer_id,
		);
		$email=$this->session->userdata('email');
        if($this->model->save_payment_details($data))
        {
       //$this->session->set_flashdata('msg', "Transaction Success"); 
		//redirect(base_url().'user/cart');
        	$data=array(
		'customer_id'=>$customer_id,
		'customer_name'=>$name,
		'mobno'=>$mobno,
		//'state'=>$state,
		//'city'=>$city,
		//'zipcode'=>$zipcode,
		//'address'=>$address,
		'grand_total'=>$amount,
		'status'=>'new_order'
	);
		$order_id=$this->model->place_order($data);
		if($order_id)
		{
			$cartItems =$this->cart->contents();
			$ordItemData = array();
			$i=0;
			foreach ($cartItems as $item) {
				$ordItemData[$i]['order_id']=$order_id ;
				$ordItemData[$i]['product_id']=$item['id'];
				$ordItemData[$i]['product_name']=$item['name'];
				$ordItemData[$i]['quantity']=$item['qty'];
				$ordItemData[$i]['sub_total']=$item['subtotal'];
				$i++;
			}
			if(!empty($ordItemData))
			{
				$insertItem=$this->model->place_orderItems($ordItemData);
				if($insertItem)
				{
					//$data['insertItem']=$insertItem;
					$this->cart->destroy();
					$this->session->set_flashdata('order_id', $order_id);
					return redirect(base_url().'user/success');
				}
			}

		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong. Try again");
  			return redirect(base_url().'user/checkout');
		}
		}
    } 
    else 
    {
        $this->session->set_flashdata('msg', "Transaction Failed"); 
			redirect(base_url().'user/cart');
    }
	}
	}
	public function failurepayment()
	{
		$obj = new \Paykun\Checkout\Payment('907827924705710', '9ADEC6FF0C1804049C84F02B0871B3AC', 'CA4CF211861A319F3A993FE8A672CC72', false,true);
		$response = $obj->getTransactionInfo($_REQUEST['payment-id']);
		if(is_array($response) && !empty($response)) {
		if($response['status'] && $response['data']['transaction']['status'] == "Failed") {
        $this->session->set_flashdata('msg', "Transaction Failed"); 
		redirect(base_url().'user/cart');
    }
	}
	}
	public function order_history()
	{	$email=$this->session->userdata('email');
		$data=$this->model->getOrderHistory($email);
		$customer_id=$data[0]->id;
		if($customer_id)
		{
		$data['orders']=$this->model->getOrderDetail($customer_id);
		$data['category']=$this->model->category();
		$data['collection']=$this->model->collection();
		$data['gift']=$this->model->gift();
		$this->load->view('user/header',$data);
		$this->load->view('user/order_history',$data);
		$this->load->view('user/footer');
		}	
	}
	public function orderItemInfo($order_id)
	{
		$this->load->library('pdf');
		if($order_id)
		{
			$html_content='<h1 align="center" style="color:orange;">Jewellery Webiste</h1>';
			$html_content.=$this->model->orderItem($order_id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("Order",array("Attachment"=>0));
		}
		else
		{
		$this->session->set_flashdata('msg', "Unable to find Order");
			return redirect(base_url().'user/cart');	
		}
	}



}


