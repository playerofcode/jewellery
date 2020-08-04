
<div class="container">
	<div class="row py-5">
		<?php if(count($product_info) >0){ ?>
			<?php foreach ($product_info as $key): ?>
		<div class="col-md-3 col-sm-6 col-6">
			<div class="card shadow-sm m-2" style="min-height: 300px;">
				<div class="card-body text-center">
					<img src="<?php echo base_url().$key->p_img1;?>" alt="" class="img-fluid" style="height:200px;padding: 5px;">
					<a href="<?php echo base_url('user/single_collection/'.$key->p_id);?>" style="font-size:14px;"><?php echo $key->p_name; ?></a>
					<p><i class="fa fa-inr"></i> <?php echo $key->d_price; ?> <del><i class="fa fa-inr"></i> <?php echo $key->m_price; ?></del>	</p>
					<form action=""  class="form-submit" method="post">
                      <input type="hidden"  class="pid"  value="<?php echo $key->p_id;?>">
                     <button  class="addToCartCollection btn btn-cart text-uppercase" <?php if($key->status==0){echo 'disabled';} ?>><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</button>
                     </form>
				<div class="discount"><?php echo $key->offer; ?>% OFF</div>
				<div class="heart"><i class="fa fa-heart"></i></div>
				</div>
			</div>
		</div>
		<?php endforeach ?>
	<?php } else {?>
			<div class="col-md-12 p-5 text-center"><h3>Product not found.</h3></div>

	<?php } ?>
		
		
	</div>
</div>