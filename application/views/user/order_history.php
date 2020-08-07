<div class="container">
	<div class="row py-5">	
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-white bg-danger text-center">
						Order History
				</div>
				<div class="card-body">
					<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td>S.No.</td>
							<td>Order Id</td>
							<td>Customer Name</td>
							<td>Mobile Number</td>
							<td>Grand Total</td>
							<td>Status</td>
							<td>Date</td>
							<td>Inovice</td>
						</tr>
						<?php 
						$i=1;
						foreach ($orders as $key): ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $key->order_id; ?></td>
							<td><?php echo $key->customer_name; ?></td>
							<td><?php echo $key->mobno; ?></td>
							<td><?php echo $key->grand_total; ?></td>
							<td><?php if($key->status == 'new_order'){echo "ordered";}else{echo $key->status;} ?></td>
							<td><?php echo $key->date; ?></td>
							<td><a href="<?php echo base_url('user/orderItemInfo/'.$key->order_id);?>" class="btn btn-primary btn-sm">Show</a></td>
						</tr>
					<?php $i++;endforeach; ?>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>