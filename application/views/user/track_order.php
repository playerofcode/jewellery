<div class="container">
	<div class="row py-5">
		<div class="col-md-6 mx-auto">
			<div class="card">
				<?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success text-center"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
				<div class="card-header text-center text-white" style="background: #f15060;">
					Track Your Order
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('user/track_order_status/');?>" method="post">
						<div class="form-group">
							<input type="text" name="order_id" class="form-control" placeholder="Enter Order Id">
						</div>
						<div class="form-group text-center">
							<input type="submit" class="btn btn-success" value="Track Order">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>