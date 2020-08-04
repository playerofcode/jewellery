<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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
}


