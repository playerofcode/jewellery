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







}