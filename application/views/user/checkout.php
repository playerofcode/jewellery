<div class="container">
	<div class="row py-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header  text-center text-white bg-danger">
					Billing Information
				</div>
				<?php foreach($customer_info as $key): ?>
				<div class="card-body">
					<form action="<?php echo base_url('user/place_order');?>" method="post">
						 <div class="row">
                                    <div class="col-sm-6">
                              <input type="hidden" name="customer_id" value="<?php echo $key->id;?>">
                              <div class="form-group">
                                 <label class="control-label">Name <span class="required">*</span></label>
                                 <input class="form-control border-form-control" value="<?php echo $key->name;?>" placeholder="Enter your name" type="text" name="name" required>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Mobile No <span class="required">*</span></label>
                                 <input class="form-control border-form-control" value="<?php echo $key->mobno;?>" placeholder="Enter your Mobile No" type="tel" name="mobno" required>
                              </div>
                           </div> 
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">State<span class="required">*</span></label>
                                 <input class="form-control border-form-control" value="<?php echo $key->state;?>" placeholder="Enter your state" type="text" name="state"required>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">City <span class="required">*</span></label>
                                 <input class="form-control border-form-control" value="<?php echo $key->city;?>" placeholder="Enter your city" type="text" name="city" required>
                              </div>
                           </div> 
                          </div>
                           <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Zip Code <span class="required">*</span></label>
                                 <input class="form-control border-form-control" value="<?php echo $key->zipcode;?>" placeholder="Enter Zip Code" type="text" name="zipcode" required>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Address <span class="required">*</span></label>
                                 <input class="form-control " value="<?php echo $key->address;?>" placeholder="Enter Address" type="text" name="address" required>
                              </div>
                           </div>  
                           </div>
                           <input type="hidden" name="grand_total" value="<?php echo $this->cart->total(); ?>">
                           <div class="form-group">
                           	<input type="submit" class="btn btn-success" value="Proceed to Payment">
                           </div>
					</form>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header text-center text-white bg-danger">
						Cart Item(s)
					</div>
					<div class="card-body">
						<?php foreach ($this->cart->contents() as $items): ?>
						<div class="cart-item p-2 my-2" style="border-bottom: 1px solid lightgrey;">
							<div class="cart-img float-left">
								<img src="<?php echo base_url($items['image']);?>" alt="" style="height:50px;object-fit: contain;" class="img-fluid">
							</div>
							<h5><?php echo $items['name']; ?></h5>
							<p class=""> <?php echo $items['myqty'].' '.$items['p_unit'].' x '.$items['qty']; ?><span class="float-right">Rs <?php echo $this->cart->format_number($items['subtotal']); ?></span></p>
						</div>
					<?php endforeach; ?>
					</div>
					<div class="card-body">
						<table width="100%">
							<tr>
								<td>Sub Total</td>
								<td class="float-right">Rs <?php echo $this->cart->format_number($this->cart->total()); ?></td>
							</tr>
							<tr>
								<td>Shipping</td>
								<td class="float-right">FREE</td>
							</tr>
							<tr>
								<td>Discount</td>
								<td class="float-right"> Rs 0</td>
							</tr>
							<tr>
								<td>Grand Total</td>
								<td class="float-right">Rs <?php echo $this->cart->format_number($this->cart->total()); ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>