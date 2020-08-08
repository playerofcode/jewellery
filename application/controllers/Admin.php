<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0)
			{
				$this->session->set_userdata('email', $email);
		  	 	return redirect(base_url().'admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
  				return redirect(base_url().'admin/index');
			}
		}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'admin/index');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'admin/index');
	}
	public function dashboard()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	public function category()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category');
		$this->load->view('admin/footer');
	}
	public function add_category()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$this->form_validation->set_rules('cat_name','Category Name','required|is_unique[product_category.cat_name]');
		if($this->form_validation->run() && $this->upload->do_upload('cat_image'))
		{
			$cat_name=$this->input->post('cat_name');
			$cat_status=$this->input->post('cat_status');
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
			$data=array(
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status,
				'cat_image'=>$cat_image
			);
			if($this->model->add_category($data))
			{
				$this->session->set_flashdata('msg','Category added successfully.');
				return redirect(base_url().'admin/category');
			}
			else
			{
				$this->session->set_flashdata('msg',"Something went wrong/. Try again later.");
				return redirect(base_url().'admin/category');
			}
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category',$data);
		$this->load->view('admin/footer');
		}
	}
	public function all_category()
	{
		$this->check_login();
		$data['category']=$this->model->get_category();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/allcategory',$data);
		$this->load->view('admin/footer');
	}
	public function delete_category($cat_id)
	{
		$data=$this->model->get_category($cat_id);
		$cat_image=$data[0]->cat_image;
		if(!empty($cat_image))
		{
			@unlink($cat_image);
		}
		if($this->model->delete_category($cat_id))
		{
			$this->session->set_flashdata('msg',"Category deleted successfully");
			return redirect(base_url().'admin/all_category');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/all_category');
		}
	}
	public function edit_category($cat_id)
	{
		$this->check_login();
		$data['category']=$this->model->get_category($cat_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editcategory',$data);
		$this->load->view('admin/footer');
	}
	public function update_category()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$cat_name=$this->input->post('cat_name');
		$cat_status=$this->input->post('cat_status');
		$cat_id=$this->input->post('cat_id');
		$data=$this->model->get_category($cat_id);
		$old_cat_image=$data[0]->cat_image;
		if($this->upload->do_upload('cat_image'))
		{
			if(!empty($old_cat_image))
			{
				unlink($old_cat_image);
			}
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$cat_image=$old_cat_image;
		}
		$data=array(
			'cat_name'=>$cat_name,
			'cat_status'=>$cat_status,
			'cat_image'=>$cat_image
		);
		if($this->model->update_category($data,$cat_id))
		{
			$this->session->set_flashdata('msg',"Category updated successfully");
			return redirect(base_url().'admin/all_category');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_category');
		}
	}
	public function product()
	{
		$this->check_login();
		$data['category']=$this->model->get_category();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/product',$data);
		$this->load->view('admin/footer');
	}
	public function add_product()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpg'
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('products') && $this->upload->do_upload('p_img1'))
		{
			$cat_id=$this->input->post('cat_id');
			$p_name=$this->input->post('p_name');
			$p_qty=$this->input->post('p_qty');
			$m_price=$this->input->post('m_price');
			$d_price=$this->input->post('d_price');
			$p_unit=$this->input->post('p_unit');
			$availability=$this->input->post('availability');
			$status=$this->input->post('status');
			$p_description=$this->input->post('p_description');
			$d=$m_price-$d_price;
			$offer=($d/$m_price)*100;
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 if($this->upload->do_upload('p_img2'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img2='';	
			 }
			 if($this->upload->do_upload('p_img3'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img3='';	
			 }
			 if($this->upload->do_upload('p_img4'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img4='';	
			 }
			$data=array(
				'cat_id'=>$cat_id,
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4
			);
			if($this->model->add_product($data))
			{
		  	 	$this->session->set_flashdata('msg', "Product added successfully");
  				return redirect(base_url().'admin/product');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/product');
			}
		}
		else
		{
			$this->check_login();
			$data['category']=$this->model->get_category();
			$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/product',$data);
			$this->load->view('admin/footer');
		}
	}
	public function all_product()
	{
		$this->check_login();
		$data['product']=$this->model->get_product();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/allproduct',$data);
		$this->load->view('admin/footer');
	}
	public function delete_product($p_id)
	{
		$data=$this->model->get_product($p_id);
		$p_img1=$data[0]->p_img1;
		$p_img2=$data[0]->p_img2;
		$p_img3=$data[0]->p_img3;
		$p_img4=$data[0]->p_img4;
		if($p_img1){unlink($p_img1);}
		if($p_img2){unlink($p_img2);}
		if($p_img3){unlink($p_img3);}
		if($p_img4){unlink($p_img4);}
		if($this->model->delete_product($p_id))
		{
			$this->session->set_flashdata('msg',"Product deleted successfully");
			return redirect(base_url().'admin/all_product');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_product');
		}
	}
	public function edit_product($p_id)
	{
		$this->check_login();
		$data['category']=$this->model->get_category();
		$data['product_info']=$this->model->get_product($p_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editproduct',$data);
		$this->load->view('admin/footer');
	}
	//Update product query here
	public function update_product()
	{
		$config=[
			'upload_path'=>'./upload/product_image/',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$p_id=$this->input->post('p_id');
		$data=$this->model->get_product($p_id);
		$old_p_img1=$data[0]->p_img1;
		$old_p_img2=$data[0]->p_img2;
		$old_p_img3=$data[0]->p_img3;
		$old_p_img4=$data[0]->p_img4;
		$cat_id=$this->input->post('cat_id');
		$p_name=$this->input->post('p_name');
		$p_qty=$this->input->post('p_qty');
		$m_price=$this->input->post('m_price');
		$d_price=$this->input->post('d_price');
		$p_unit=$this->input->post('p_unit');
		$availability=$this->input->post('availability');
		$status=$this->input->post('status');
		$p_description=$this->input->post('p_description');
		$d=$m_price-$d_price;
		$offer=($d/$m_price)*100;
		if($this->upload->do_upload('p_img1'))
		{
			if(!empty($old_p_img1))
			{
				unlink($old_p_img1);
			}
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img1=$old_p_img1;
		}
		if($this->upload->do_upload('p_img2'))
		{
			if(!empty($old_p_img2))
			{
				unlink($old_p_img2);//product image remove
			}
			$image=$this->upload->data();
			$p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img2=$old_p_img2;
		}
		if($this->upload->do_upload('p_img3'))
		{
			if(!empty($old_p_img3))
			{
				unlink($old_p_img3);//product image remove
			}
			$image=$this->upload->data();
			$p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img3=$old_p_img3;
		}
		if($this->upload->do_upload('p_img4'))
		{
			if(!empty($old_p_img4))
			{
				unlink($old_p_img4);//product image remove
			}
			$image=$this->upload->data();
			$p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img4=$old_p_img4;
		}

		$data=array(
			'cat_id'=>$cat_id,
			'p_name'=>$p_name,
			'p_qty'=>$p_qty,
			'p_unit'=>$p_unit,
			'm_price'=>$m_price,
			'd_price'=>$d_price,
			'offer'=>number_format($offer),
			'availability'=>$availability,
			'status'=>$status,
			'p_description'=>$p_description,
			'p_img1'=>$p_img1,
			'p_img2'=>$p_img2,
			'p_img3'=>$p_img3,
			'p_img4'=>$p_img4
		);
		if($this->model->update_product($data,$p_id))
		{
			$this->session->set_flashdata('msg',"Product updated successfully");
			return redirect(base_url().'admin/all_product');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_product');
		}
	}
	public function location()
	{
		$data['location']=$this->model->allLocation();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/location',$data);
		$this->load->view('admin/footer');
	}
	public function delete_location()
	{
		$id=$this->uri->segment(3);
		if($this->model->delete_location($id))
		{
			$this->session->set_flashdata('msg',"Location deleted successfully");
			return redirect(base_url().'admin/location');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/location');
		}
	}
	public function add_location()
	{
		$city_name=$this->input->post('city_name');
		$pincode=$this->input->post('pincode');
		$data=array(
			'city_name'=>$city_name,
			'pincode'=>$pincode
		);
		if($this->model->add_location($data))
		{
			$this->session->set_flashdata('msg',"Location added successfully");
			return redirect(base_url().'admin/location');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/location');
		}
	}
	public function collection()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/collection');
		$this->load->view('admin/footer');
	}
	public function add_collection()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$this->form_validation->set_rules('cat_name','Category Name','required|is_unique[collection_category.cat_name]');
		if($this->form_validation->run() && $this->upload->do_upload('cat_image'))
		{
			$cat_name=$this->input->post('cat_name');
			$cat_status=$this->input->post('cat_status');
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
			$data=array(
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status,
				'cat_image'=>$cat_image
			);
			if($this->model->add_collection($data))
			{
				$this->session->set_flashdata('msg','Category added successfully.');
				return redirect(base_url().'admin/collection');
			}
			else
			{
				$this->session->set_flashdata('msg',"Something went wrong/. Try again later.");
				return redirect(base_url().'admin/collection');
			}
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/collection',$data);
		$this->load->view('admin/footer');
		}
	}
	public function all_collection()
	{
		$this->check_login();
		$data['collection']=$this->model->get_collection();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_collection',$data);
		$this->load->view('admin/footer');
	}
	public function delete_collection($cat_id)
	{
		$data=$this->model->get_collection($cat_id);
		$cat_image=$data[0]->cat_image;
		if(!empty($cat_image))
		{
			@unlink($cat_image);
		}
		if($this->model->delete_collection($cat_id))
		{
			$this->session->set_flashdata('msg',"Category deleted successfully");
			return redirect(base_url().'admin/all_collection');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/all_collection');
		}
	}
	public function edit_collection($cat_id)
	{
		$this->check_login();
		$data['collection']=$this->model->get_collection($cat_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_collection',$data);
		$this->load->view('admin/footer');
	}
	public function update_collection()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$cat_name=$this->input->post('cat_name');
		$cat_status=$this->input->post('cat_status');
		$cat_id=$this->input->post('cat_id');
		$data=$this->model->get_collection($cat_id);
		$old_cat_image=$data[0]->cat_image;
		if($this->upload->do_upload('cat_image'))
		{
			if(!empty($old_cat_image))
			{
				unlink($old_cat_image);
			}
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$cat_image=$old_cat_image;
		}
		$data=array(
			'cat_name'=>$cat_name,
			'cat_status'=>$cat_status,
			'cat_image'=>$cat_image
		);
		if($this->model->update_collection($data,$cat_id))
		{
			$this->session->set_flashdata('msg',"Category updated successfully");
			return redirect(base_url().'admin/all_collection');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_collection');
		}
	}
	public function collections()
	{
		$this->check_login();
		$data['collection']=$this->model->get_collection();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/collections',$data);
		$this->load->view('admin/footer');
	}
	public function add_collections()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpg'
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('products') && $this->upload->do_upload('p_img1'))
		{
			$cat_id=$this->input->post('cat_id');
			$p_name=$this->input->post('p_name');
			$p_qty=$this->input->post('p_qty');
			$m_price=$this->input->post('m_price');
			$d_price=$this->input->post('d_price');
			$p_unit=$this->input->post('p_unit');
			$availability=$this->input->post('availability');
			$status=$this->input->post('status');
			$p_description=$this->input->post('p_description');
			$d=$m_price-$d_price;
			$offer=($d/$m_price)*100;
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 if($this->upload->do_upload('p_img2'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img2='';	
			 }
			 if($this->upload->do_upload('p_img3'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img3='';	
			 }
			 if($this->upload->do_upload('p_img4'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img4='';	
			 }
			$data=array(
				'cat_id'=>$cat_id,
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4
			);
			if($this->model->add_collections($data))
			{
		  	 	$this->session->set_flashdata('msg', "Product added successfully");
  				return redirect(base_url().'admin/collections');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/collections');
			}
		}
		else
		{
			$this->check_login();
			$data['collection']=$this->model->get_collection();
			$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/collections',$data);
			$this->load->view('admin/footer');
		}
	}
	public function all_collections()
	{
		$this->check_login();
		$data['product']=$this->model->get_collections();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_collections',$data);
		$this->load->view('admin/footer');
	}
	public function delete_collections($p_id)
	{
		$data=$this->model->get_collections($p_id);
		$p_img1=$data[0]->p_img1;
		$p_img2=$data[0]->p_img2;
		$p_img3=$data[0]->p_img3;
		$p_img4=$data[0]->p_img4;
		if(!empty($p_img1)){@unlink($p_img1);}
		if(!empty($p_img2)){@unlink($p_img2);}
		if(!empty($p_img3)){@unlink($p_img3);}
		if(!empty($p_img4)){@unlink($p_img4);}
		if($this->model->delete_collections($p_id))
		{
			$this->session->set_flashdata('msg',"Product deleted successfully");
			return redirect(base_url().'admin/all_collections');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_collections');
		}
	}
	public function edit_collections($p_id)
	{
		$this->check_login();
		$data['collection']=$this->model->get_collection();
		$data['product_info']=$this->model->get_collections($p_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_collections',$data);
		$this->load->view('admin/footer');
	}
	public function update_collections()
	{
		$config=[
			'upload_path'=>'./upload/product_image/',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$p_id=$this->input->post('p_id');
		$data=$this->model->get_collections($p_id);
		$old_p_img1=$data[0]->p_img1;
		$old_p_img2=$data[0]->p_img2;
		$old_p_img3=$data[0]->p_img3;
		$old_p_img4=$data[0]->p_img4;
		$cat_id=$this->input->post('cat_id');
		$p_name=$this->input->post('p_name');
		$p_qty=$this->input->post('p_qty');
		$m_price=$this->input->post('m_price');
		$d_price=$this->input->post('d_price');
		$p_unit=$this->input->post('p_unit');
		$availability=$this->input->post('availability');
		$status=$this->input->post('status');
		$p_description=$this->input->post('p_description');
		$d=$m_price-$d_price;
		$offer=($d/$m_price)*100;
		if($this->upload->do_upload('p_img1'))
		{
			if(!empty($old_p_img1))
			{
				unlink($old_p_img1);
			}
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img1=$old_p_img1;
		}
		if($this->upload->do_upload('p_img2'))
		{
			if(!empty($old_p_img2))
			{
				unlink($old_p_img2);//product image remove
			}
			$image=$this->upload->data();
			$p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img2=$old_p_img2;
		}
		if($this->upload->do_upload('p_img3'))
		{
			if(!empty($old_p_img3))
			{
				unlink($old_p_img3);//product image remove
			}
			$image=$this->upload->data();
			$p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img3=$old_p_img3;
		}
		if($this->upload->do_upload('p_img4'))
		{
			if(!empty($old_p_img4))
			{
				unlink($old_p_img4);//product image remove
			}
			$image=$this->upload->data();
			$p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img4=$old_p_img4;
		}

		$data=array(
			'cat_id'=>$cat_id,
			'p_name'=>$p_name,
			'p_qty'=>$p_qty,
			'p_unit'=>$p_unit,
			'm_price'=>$m_price,
			'd_price'=>$d_price,
			'offer'=>number_format($offer),
			'availability'=>$availability,
			'status'=>$status,
			'p_description'=>$p_description,
			'p_img1'=>$p_img1,
			'p_img2'=>$p_img2,
			'p_img3'=>$p_img3,
			'p_img4'=>$p_img4
		);
		if($this->model->update_collections($data,$p_id))
		{
			$this->session->set_flashdata('msg',"Product updated successfully");
			return redirect(base_url().'admin/all_collections');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_collections');
		}
	}
	public function gift()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gift');
		$this->load->view('admin/footer');
	}
	public function add_gift()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$this->form_validation->set_rules('cat_name','Category Name','required|is_unique[gift_category.cat_name]');
		if($this->form_validation->run() && $this->upload->do_upload('cat_image'))
		{
			$cat_name=$this->input->post('cat_name');
			$cat_status=$this->input->post('cat_status');
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
			$data=array(
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status,
				'cat_image'=>$cat_image
			);
			if($this->model->add_gift($data))
			{
				$this->session->set_flashdata('msg','Category added successfully.');
				return redirect(base_url().'admin/gift');
			}
			else
			{
				$this->session->set_flashdata('msg',"Something went wrong/. Try again later.");
				return redirect(base_url().'admin/gift');
			}
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gift',$data);
		$this->load->view('admin/footer');
		}
	}
	public function all_gift()
	{
		$this->check_login();
		$data['gift']=$this->model->get_gift();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_gift',$data);
		$this->load->view('admin/footer');
	}
	public function delete_gift($cat_id)
	{
	$data=$this->model->get_gift($cat_id);
		$cat_image=$data[0]->cat_image;
		if(!empty($cat_image))
		{
			@unlink($cat_image);
		}
		if($this->model->delete_gift($cat_id))
		{
			$this->session->set_flashdata('msg',"Category deleted successfully");
			return redirect(base_url().'admin/all_gift');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/all_gift');
		}	
	}
	public function edit_gift($cat_id)
	{
	$this->check_login();
	$data['gift']=$this->model->get_gift($cat_id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_gift',$data);
	$this->load->view('admin/footer');
	}
	public function update_gift()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$cat_name=$this->input->post('cat_name');
		$cat_status=$this->input->post('cat_status');
		$cat_id=$this->input->post('cat_id');
		$data=$this->model->get_gift($cat_id);
		$old_cat_image=$data[0]->cat_image;
		if($this->upload->do_upload('cat_image'))
		{
			if(!empty($old_cat_image))
			{
				unlink($old_cat_image);
			}
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$cat_image=$old_cat_image;
		}
		$data=array(
			'cat_name'=>$cat_name,
			'cat_status'=>$cat_status,
			'cat_image'=>$cat_image
		);
		if($this->model->update_gift($data,$cat_id))
		{
			$this->session->set_flashdata('msg',"Category updated successfully");
			return redirect(base_url().'admin/all_gift');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_gift');
		}
	}
	public function gifts()
	{
		$this->check_login();
		$data['gift']=$this->model->get_gift();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gifts',$data);
		$this->load->view('admin/footer');
	}
	public function add_gifts()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpg'
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('products') && $this->upload->do_upload('p_img1'))
		{
			$cat_id=$this->input->post('cat_id');
			$p_name=$this->input->post('p_name');
			$p_qty=$this->input->post('p_qty');
			$m_price=$this->input->post('m_price');
			$d_price=$this->input->post('d_price');
			$p_unit=$this->input->post('p_unit');
			$availability=$this->input->post('availability');
			$status=$this->input->post('status');
			$p_description=$this->input->post('p_description');
			$d=$m_price-$d_price;
			$offer=($d/$m_price)*100;
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 if($this->upload->do_upload('p_img2'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img2='';	
			 }
			 if($this->upload->do_upload('p_img3'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img3='';	
			 }
			 if($this->upload->do_upload('p_img4'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img4='';	
			 }
			$data=array(
				'cat_id'=>$cat_id,
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4
			);
			if($this->model->add_gifts($data))
			{
		  	 	$this->session->set_flashdata('msg', "Product added successfully");
  				return redirect(base_url().'admin/gifts');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/gifts');
			}
		}
		else
		{
			$this->check_login();
			$data['gift']=$this->model->get_gift();
			$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/gifts',$data);
			$this->load->view('admin/footer');
		}
	}
	public function all_gifts()
	{
		$this->check_login();
		$data['gift']=$this->model->get_gifts();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_gifts',$data);
		$this->load->view('admin/footer');
	}
	public function delete_gifts($p_id)
	{
		$data=$this->model->get_gifts($p_id);	
		$p_img1=$data[0]->p_img1;
		$p_img2=$data[0]->p_img2;
		$p_img3=$data[0]->p_img3;
		$p_img4=$data[0]->p_img4;
		if(!empty($p_img1)){@unlink($p_img1);}
		if(!empty($p_img2)){@unlink($p_img2);}
		if(!empty($p_img3)){@unlink($p_img3);}
		if(!empty($p_img4)){@unlink($p_img4);}
		if($this->model->delete_gifts($p_id))
		{
			$this->session->set_flashdata('msg',"Product deleted successfully");
			return redirect(base_url().'admin/all_gifts');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_gifts');
		}
	}
	public function edit_gifts($p_id)
	{
		$this->check_login();
		$data['gift']=$this->model->get_gift();
		$data['product_info']=$this->model->get_gifts($p_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_gifts',$data);
		$this->load->view('admin/footer');
	}
	public function update_gifts()
	{
	$config=[
			'upload_path'=>'./upload/product_image/',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$p_id=$this->input->post('p_id');
		$data=$this->model->get_gifts($p_id);
		$old_p_img1=$data[0]->p_img1;
		$old_p_img2=$data[0]->p_img2;
		$old_p_img3=$data[0]->p_img3;
		$old_p_img4=$data[0]->p_img4;
		$cat_id=$this->input->post('cat_id');
		$p_name=$this->input->post('p_name');
		$p_qty=$this->input->post('p_qty');
		$m_price=$this->input->post('m_price');
		$d_price=$this->input->post('d_price');
		$p_unit=$this->input->post('p_unit');
		$availability=$this->input->post('availability');
		$status=$this->input->post('status');
		$p_description=$this->input->post('p_description');
		$d=$m_price-$d_price;
		$offer=($d/$m_price)*100;
		if($this->upload->do_upload('p_img1'))
		{
			if(!empty($old_p_img1))
			{
				unlink($old_p_img1);
			}
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img1=$old_p_img1;
		}
		if($this->upload->do_upload('p_img2'))
		{
			if(!empty($old_p_img2))
			{
				unlink($old_p_img2);//product image remove
			}
			$image=$this->upload->data();
			$p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img2=$old_p_img2;
		}
		if($this->upload->do_upload('p_img3'))
		{
			if(!empty($old_p_img3))
			{
				unlink($old_p_img3);//product image remove
			}
			$image=$this->upload->data();
			$p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img3=$old_p_img3;
		}
		if($this->upload->do_upload('p_img4'))
		{
			if(!empty($old_p_img4))
			{
				unlink($old_p_img4);//product image remove
			}
			$image=$this->upload->data();
			$p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img4=$old_p_img4;
		}

		$data=array(
			'cat_id'=>$cat_id,
			'p_name'=>$p_name,
			'p_qty'=>$p_qty,
			'p_unit'=>$p_unit,
			'm_price'=>$m_price,
			'd_price'=>$d_price,
			'offer'=>number_format($offer),
			'availability'=>$availability,
			'status'=>$status,
			'p_description'=>$p_description,
			'p_img1'=>$p_img1,
			'p_img2'=>$p_img2,
			'p_img3'=>$p_img3,
			'p_img4'=>$p_img4
		);
		if($this->model->update_gifts($data,$p_id))
		{
			$this->session->set_flashdata('msg',"Product updated successfully");
			return redirect(base_url().'admin/all_gifts');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_gifts');
		}
	}
	public function customer_list()
	{
		$data['customer_list']=$this->model->customer_list();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/customer_list',$data);
		$this->load->view('admin/footer');
	}
	public function new_order()
	{
		$data['order']=$this->model->getNewOrder();	
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/order',$data);
		$this->load->view('admin/footer');
	}
	public function order_item_info($order_id)
	{
		$this->load->library('pdf');
		if($order_id)
		{
			$html_content='<h1 align="center" style="color:orange;">Jewellery Website</h1>';
			$html_content.=$this->model->orderItem($order_id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("Order",array("Attachment"=>0));
		}
		else
		{
		$this->session->set_flashdata('msg', "Unable to find Order");
			return redirect(base_url().'admin/new_order');	
		}
	}
	public function change_status()
	{
		$order_id=$this->input->post('order_id');
		$status=$this->input->post('status');
			if($this->model->updateOrderStatus($order_id,$status))
			{
			$this->session->set_flashdata('msg', "Order Status change successfuly");
			return redirect(base_url().'admin/new_order');	
			}
			else
			{
			$this->session->set_flashdata('msg', "Unable to update Order Status");
			return redirect(base_url().'admin/new_order');	
			}
	}
	public function change_statusPacked()
	{
		$order_id=$this->input->post('order_id');
		$status=$this->input->post('status');
			if($this->model->updateOrderStatus($order_id,$status))
			{
			$this->session->set_flashdata('msg', "Order Status change successfuly");
			return redirect(base_url().'admin/confirm_order');	
			}
			else
			{
			$this->session->set_flashdata('msg', "Unable to update Order Status");
			return redirect(base_url().'admin/confirm_order');	
			}
	}
	public function confirm_order()
	{
		$data['order']=$this->model->getConfirmOrder();	
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/confirm_order',$data);
		$this->load->view('admin/footer');
	}
	public function complete_order()
	{
		$data['order']=$this->model->getCompleteOrder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/complete_order',$data);
		$this->load->view('admin/footer');
	}
	public function contact()
	{
		$data['contact']=$this->model->getContactInfo();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/contact',$data);
		$this->load->view('admin/footer');
	}
	public function deleteContact()
	{
		$id=$this->uri->segment(3);
		if($this->model->deleteContact($id))
		{
			$this->session->set_flashdata('msg','Contact deleted successfully');
			return redirect(base_url().'admin/contact');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong.');
			return redirect(base_url().'admin/contact');
		}
	}
	public function coins()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/coins');
		$this->load->view('admin/footer');
	}
	public function add_coin()
	{
	$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpg'
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('products') && $this->upload->do_upload('p_img1'))
		{
			$cat_id='';
			$p_name=$this->input->post('p_name');
			$p_qty=$this->input->post('p_qty');
			$m_price=$this->input->post('m_price');
			$d_price=$this->input->post('d_price');
			$p_unit=$this->input->post('p_unit');
			$availability=$this->input->post('availability');
			$status=$this->input->post('status');
			$p_description=$this->input->post('p_description');
			$d=$m_price-$d_price;
			$offer=($d/$m_price)*100;
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 if($this->upload->do_upload('p_img2'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img2='';	
			 }
			 if($this->upload->do_upload('p_img3'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img3='';	
			 }
			 if($this->upload->do_upload('p_img4'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img4='';	
			 }
			$data=array(
				'cat_id'=>'',
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4
			);
			if($this->model->add_coins($data))
			{
		  	 	$this->session->set_flashdata('msg', "Product added successfully");
  				return redirect(base_url().'admin/coins');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/coins');
			}
		}
		else
		{
			$this->check_login();
			$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/coins');
			$this->load->view('admin/footer');
		}	
	}
	public function all_coins()
	{
		$data['coins']=$this->model->get_coins();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_coins',$data);
		$this->load->view('admin/footer');
	}
	public function delete_coins($p_id)
	{
		$data=$this->model->get_coins($p_id);	
		$p_img1=$data[0]->p_img1;
		$p_img2=$data[0]->p_img2;
		$p_img3=$data[0]->p_img3;
		$p_img4=$data[0]->p_img4;
		if(!empty($p_img1)){@unlink($p_img1);}
		if(!empty($p_img2)){@unlink($p_img2);}
		if(!empty($p_img3)){@unlink($p_img3);}
		if(!empty($p_img4)){@unlink($p_img4);}
		if($this->model->delete_coins($p_id))
		{
			$this->session->set_flashdata('msg',"Product deleted successfully");
			return redirect(base_url().'admin/all_coins');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_coins');
		}
	}
	public function edit_coins($p_id)
	{
		$this->check_login();
		$data['product_info']=$this->model->get_coins($p_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_coins',$data);
		$this->load->view('admin/footer');
	}
	public function update_coins()
	{
		$config=[
			'upload_path'=>'./upload/product_image/',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$p_id=$this->input->post('p_id');
		$data=$this->model->get_coins($p_id);
		$old_p_img1=$data[0]->p_img1;
		$old_p_img2=$data[0]->p_img2;
		$old_p_img3=$data[0]->p_img3;
		$old_p_img4=$data[0]->p_img4;
		$cat_id=$this->input->post('cat_id');
		$p_name=$this->input->post('p_name');
		$p_qty=$this->input->post('p_qty');
		$m_price=$this->input->post('m_price');
		$d_price=$this->input->post('d_price');
		$p_unit=$this->input->post('p_unit');
		$availability=$this->input->post('availability');
		$status=$this->input->post('status');
		$p_description=$this->input->post('p_description');
		$d=$m_price-$d_price;
		$offer=($d/$m_price)*100;
		if($this->upload->do_upload('p_img1'))
		{
			if(!empty($old_p_img1))
			{
				unlink($old_p_img1);
			}
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img1=$old_p_img1;
		}
		if($this->upload->do_upload('p_img2'))
		{
			if(!empty($old_p_img2))
			{
				unlink($old_p_img2);//product image remove
			}
			$image=$this->upload->data();
			$p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img2=$old_p_img2;
		}
		if($this->upload->do_upload('p_img3'))
		{
			if(!empty($old_p_img3))
			{
				unlink($old_p_img3);//product image remove
			}
			$image=$this->upload->data();
			$p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img3=$old_p_img3;
		}
		if($this->upload->do_upload('p_img4'))
		{
			if(!empty($old_p_img4))
			{
				unlink($old_p_img4);//product image remove
			}
			$image=$this->upload->data();
			$p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img4=$old_p_img4;
		}

		$data=array(
			'cat_id'=>$cat_id,
			'p_name'=>$p_name,
			'p_qty'=>$p_qty,
			'p_unit'=>$p_unit,
			'm_price'=>$m_price,
			'd_price'=>$d_price,
			'offer'=>number_format($offer),
			'availability'=>$availability,
			'status'=>$status,
			'p_description'=>$p_description,
			'p_img1'=>$p_img1,
			'p_img2'=>$p_img2,
			'p_img3'=>$p_img3,
			'p_img4'=>$p_img4
		);
		if($this->model->update_coins($data,$p_id))
		{
			$this->session->set_flashdata('msg',"Product updated successfully");
			return redirect(base_url().'admin/all_coins');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_coins');
		}
	}
	public function silver()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/silver');
		$this->load->view('admin/footer');
	}
	public function add_silver()
	{
		$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$this->form_validation->set_rules('cat_name','Category Name','required|is_unique[gift_category.cat_name]');
		if($this->form_validation->run() && $this->upload->do_upload('cat_image'))
		{
			$cat_name=$this->input->post('cat_name');
			$cat_status=$this->input->post('cat_status');
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
			$data=array(
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status,
				'cat_image'=>$cat_image
			);
			if($this->model->add_silver($data))
			{
				$this->session->set_flashdata('msg','Category added successfully.');
				return redirect(base_url().'admin/silver');
			}
			else
			{
				$this->session->set_flashdata('msg',"Something went wrong/. Try again later.");
				return redirect(base_url().'admin/silver');
			}
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/silver',$data);
		$this->load->view('admin/footer');
		}
	}
	public function all_silver()
	{
		$this->check_login();
		$data['silver']=$this->model->get_silver();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_silver',$data);
		$this->load->view('admin/footer');	
	}
	public function silvers()
	{
		$this->check_login();
		$data['silver']=$this->model->get_silver();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/silvers',$data);
		$this->load->view('admin/footer');
	}
	public function add_silvers()
	{	
	$config=[
			'upload_path'=>'./upload/product_image',
			'allowed_types'=>'gif|jpg|png|pdf|jpg'
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('products') && $this->upload->do_upload('p_img1'))
		{
			$cat_id=$this->input->post('cat_id');
			$p_name=$this->input->post('p_name');
			$p_qty=$this->input->post('p_qty');
			$m_price=$this->input->post('m_price');
			$d_price=$this->input->post('d_price');
			$p_unit=$this->input->post('p_unit');
			$availability=$this->input->post('availability');
			$status=$this->input->post('status');
			$p_description=$this->input->post('p_description');
			$d=$m_price-$d_price;
			$offer=($d/$m_price)*100;
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 if($this->upload->do_upload('p_img2'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img2='';	
			 }
			 if($this->upload->do_upload('p_img3'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img3='';	
			 }
			 if($this->upload->do_upload('p_img4'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img4='';	
			 }
			$data=array(
				'cat_id'=>$cat_id,
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4
			);
			if($this->model->add_silvers($data))
			{
		  	 	$this->session->set_flashdata('msg', "Product added successfully");
  				return redirect(base_url().'admin/silvers');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/silvers');
			}
		}
		else
		{
			$this->check_login();
			$data['silver']=$this->model->get_silver();
			$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/silvers',$data);
			$this->load->view('admin/footer');
		}	
	}
	public function all_silvers()
	{
		$this->check_login();
		$data['silver']=$this->model->get_silvers();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_silvers',$data);
		$this->load->view('admin/footer');
	}
	public function delete_silvers($p_id)
	{
	$data=$this->model->get_silvers($p_id);	
	$p_img1=$data[0]->p_img1;
	$p_img2=$data[0]->p_img2;
	$p_img3=$data[0]->p_img3;
	$p_img4=$data[0]->p_img4;
	if(!empty($p_img1)){@unlink($p_img1);}
	if(!empty($p_img2)){@unlink($p_img2);}
	if(!empty($p_img3)){@unlink($p_img3);}
	if(!empty($p_img4)){@unlink($p_img4);}
	if($this->model->delete_silvers($p_id))
	{
		$this->session->set_flashdata('msg',"Product deleted successfully");
		return redirect(base_url().'admin/all_silvers');
	}
	else
	{
		$this->session->set_flashdata('msg',"Something went wrong");
		return redirect(base_url().'admin/all_silvers');
	}	
	}
	public function edit_slivers($p_id)
	{
		$this->check_login();
		$data['silver']=$this->model->get_silver();
		$data['product_info']=$this->model->get_silvers($p_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_slivers',$data);
		$this->load->view('admin/footer');
	}
	public function update_silvers()
	{
	$config=[
			'upload_path'=>'./upload/product_image/',
			'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		];
		$this->load->library('upload',$config);
		$p_id=$this->input->post('p_id');
		$data=$this->model->get_silvers($p_id);
		$old_p_img1=$data[0]->p_img1;
		$old_p_img2=$data[0]->p_img2;
		$old_p_img3=$data[0]->p_img3;
		$old_p_img4=$data[0]->p_img4;
		$cat_id=$this->input->post('cat_id');
		$p_name=$this->input->post('p_name');
		$p_qty=$this->input->post('p_qty');
		$m_price=$this->input->post('m_price');
		$d_price=$this->input->post('d_price');
		$p_unit=$this->input->post('p_unit');
		$availability=$this->input->post('availability');
		$status=$this->input->post('status');
		$p_description=$this->input->post('p_description');
		$d=$m_price-$d_price;
		$offer=($d/$m_price)*100;
		if($this->upload->do_upload('p_img1'))
		{
			if(!empty($old_p_img1))
			{
				unlink($old_p_img1);
			}
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img1=$old_p_img1;
		}
		if($this->upload->do_upload('p_img2'))
		{
			if(!empty($old_p_img2))
			{
				unlink($old_p_img2);//product image remove
			}
			$image=$this->upload->data();
			$p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img2=$old_p_img2;
		}
		if($this->upload->do_upload('p_img3'))
		{
			if(!empty($old_p_img3))
			{
				unlink($old_p_img3);//product image remove
			}
			$image=$this->upload->data();
			$p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img3=$old_p_img3;
		}
		if($this->upload->do_upload('p_img4'))
		{
			if(!empty($old_p_img4))
			{
				unlink($old_p_img4);//product image remove
			}
			$image=$this->upload->data();
			$p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_img4=$old_p_img4;
		}

		$data=array(
			'cat_id'=>$cat_id,
			'p_name'=>$p_name,
			'p_qty'=>$p_qty,
			'p_unit'=>$p_unit,
			'm_price'=>$m_price,
			'd_price'=>$d_price,
			'offer'=>number_format($offer),
			'availability'=>$availability,
			'status'=>$status,
			'p_description'=>$p_description,
			'p_img1'=>$p_img1,
			'p_img2'=>$p_img2,
			'p_img3'=>$p_img3,
			'p_img4'=>$p_img4
		);
		if($this->model->update_silvers($data,$p_id))
		{
			$this->session->set_flashdata('msg',"Product updated successfully");
			return redirect(base_url().'admin/all_silvers');
		}
		else
		{
			$this->session->set_flashdata('msg',"Something went wrong");
			return redirect(base_url().'admin/all_silvers');
		}	
	}
}









