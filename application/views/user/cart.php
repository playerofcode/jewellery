
<div class="container-fluid">
	<div class="row py-2">
		<div class="col-md-6 col-10 mx-auto">
			<?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
		</div>
	</div>
	<div class="row py-5">
		<div class="col-md-8">
			<h4 class="text-center"> Cart Item(s)</h4>
			<table class="table">
				<thead>
					<tr>
						<td colspan="2">Items</td>
						<td>Quantity</td>
						<td>Total</td>
						<td>Clear</td>
					</tr>
				</thead>
				<tbody>
					<?php if($this->cart->total_items()>0){
                              foreach ($this->cart->contents() as $items): ?>
					<tr class="justify-content-center align-items-center">
						<td><img src="<?php echo base_url($items['image']);?>" class="img-fluid" style="height:70px;"></td>
						<td><h5><?php echo $items['name'];?></h5></td>
						<td><input type="number" min="1"  value="<?php echo $items['qty'];?>" onchange=" updateCartItem(this, '<?php echo $items["rowid"]?>')" class="form-control" style="width:100px;"></td>
						<td><i class="fa fa-inr"></i> <?php echo $this->cart->format_number($items['subtotal']); ?></td>
						<td class="action"><a  class="custom-color" onclick="removeCartItem('<?php echo $items['rowid'];?>');"><i class="fa fa-trash"></i></a></td>
					</tr>
					 <?php endforeach;}else {?>
                              <tr>
                                 <td colspan="5"><center><span class="text-danger">Your Cart is empty!</span></center></td>
                              </tr>
                           <?php } ?>
				</tbody>
			</table>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>SHIPPING METHOD</th>
						<th>COUNTRY</th>
						<th>PIN-CODE/ZIP-CODE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><button class="btn btn-danger" style="border-radius: 50px;">Home Delivery</button></td>
						<td>
							<select name="" class="form-control">
								<option value="">India</option>
								<option value="">Other</option>
							</select>
						</td>
						<td>
							<form  method="post">   
							<div class="input-group mb-3">
  								<input type="text" id="pincode"  class="form-control"  placeholder="Pin Code" style="border-radius: 50px 0 0 50px;">
  							<div class="input-group-append">
    						<button class="locationFinder btn btn-danger" type="submit" style="border-radius:0 50px 50px 0;">CHECK</button>
  							</div>
							</div>
							</form>
					</td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-4">
			<h4 class="text-center text-capitalize">Order Summary</h4>
			<ul class="nav nav-tabs nav-justified text-uppercase">
  				<li class="nav-item">
   					 <a class="nav-link active" data-toggle="tab" href="#voucher">Enter Voucher Code</a>
  				</li>
  				<li class="nav-item">
   					 <a class="nav-link" data-toggle="tab" href="#promo">View promo codes</a>
  				</li>
			</ul>
			<div class="tab-content">
 				 <div class="tab-pane active container py-2 border" id="voucher">
 				 	<form action="">   
							<div class="input-group mb-3">
  								<input type="text" class="form-control" placeholder="VOUCHER CODE" style="border-radius: 50px 0 0 50px;">
  							<div class="input-group-append">
    						<button class="btn btn-danger" type="submit" style="border-radius:0 50px 50px 0;">APPLY</button>
  							</div>
							</div>
							</form>
 				 </div>
 				  <div class="tab-pane container py-2  border" id="promo">
						<h6>No Promo Codes Available</h6>
 				  </div>
 			</div>
 			<div class="card">
 				<div class="card-body">
 					<table width="100%">
 						<tr>
 							<td>Order Total (1 Items)</td>
 							<td><i class="fa fa-inr"></i> <?php echo $sub_total=$this->cart->format_number($this->cart->total()); ?></td>
 						</tr>
 						<tr>
 							<td>Shipping</td>
 							<td>FREE</td>
 						</tr>
 						<tr>
 							<td>Discount</td>
 							<td><i class="fa fa-inr"> 0</i></td>
 						</tr>
 						<tr>
 							<td>YOU PAY</td>
 							<td><i class="fa fa-inr"></i> <?php echo $sub_total;?></td>
 						</tr>
 						<tr>
 							<td colspan="2"><b>INCLUSIVE OF ALL TAXES*</b></td>
 						</tr>
 					</table>
 					<form action="<?php echo base_url('user/checkout');?>" method="post">
 					<button <?php if(empty($this->cart->total_items())){echo 'disabled';}?> type="submit" class="btn btn-danger form-control text-uppercase py-2" style="border-radius: 50px;">proceed to checkout</button>
 					</form>
 					<div class="py-3 text-center"><a href="" class="custom-color text-uppercase">continue shopping</a></div>
 				</div>
 			</div>
		</div>
	</div>
</div>