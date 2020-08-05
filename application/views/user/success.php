<div class="container">
	<div class="row py-5">
		<div class="col-md-6 mx-auto shadow-sm p-5">
			 <h4 class="text-success">Congrats! Your Order has been Accepted..</h4>
           <p>
              <?php if($this->session->flashdata('order_id')){
                 echo 'Your Order id is '.$this->session->flashdata('order_id');
              }
              else
              {
              	redirect(base_url());
              }
               ?>
              You can Track Your Order by Using Order ID. You can find order id in your profile.
           </p>
		</div>
	</div>
</div>