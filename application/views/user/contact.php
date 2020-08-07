<style>
.contact-icon
{
	height: 50px;
	width:50px;
	border:2px solid #f15060;
	line-height: 50px;
	border-radius: 50%;
	margin:0px auto;
	font-size: 24px;
	cursor: pointer;
	transition: 0.4s;
}
.contact-icon:hover
{
	background: #f15060;
	color:white;
}

</style>
<div class="container">
	<div class="row py-5">
		<div class="col-md-4">
		<div class="card my-2">
			<div class="card-body shadow-sm text-center">
				<div class="contact-icon"><i class="fa fa-phone"></i></div>
				<h5 class="card-title ">Mobile Number</h5>
				<p>+91 859 857 7485,<br> +91 859 854 2582</p>
			</div>
		</div>
		</div>
		<div class="col-md-4">
		<div class="card my-2">
			<div class="card-body shadow-sm text-center">
			<div class="contact-icon"><i class="fa fa-envelope-o"></i></div>
			<h5 class="card-title">Email</h5>
			<p>info@jewellerywebsite.com<br>support@jewellery.com</p>
			</div>
		</div>
		</div>
		<div class="col-md-4">
			<div class="card my-2">
				<div class="card-body shadow-sm	text-center">
					<div class="contact-icon"><i class="fa fa-map-marker"></i></div>
					<h5 class="card-title">Address</h5>
					<p>Indira Nagar, Sectior 11,<br>
					Lucknow, Uttar Pradesh, India
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row d-flex align-items-center">
		<div class="col-md-6">
			<!-- Form Here -->
			<?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
			<h3>Write us</h3>
			<form action="<?php echo base_url('user/contactInfo');?>" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required="">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required="">
				</div>
				<div class="form-group">
					<label for="mobno">Mobile Number</label>
					<input type="tel" name="mobno" id="mobno" class="form-control" placeholder="Enter Mobile Number" required="">
				</div>
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" required="">
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" id="message" class="form-control" placeholder="Write Your Message ..." style="resize:none;" required=""></textarea>
				</div>
				<div class="form-group text-center" >
					<input type="submit" class="btn btn-success" value="Contact">
				</div>
			</form>
		</div>
		<div class="col-md-6">
		<!-- Map here -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28467.80573882506!2d80.9773643023355!3d26.88839349695637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd549ce377af%3A0xb88f53ecb02c52d8!2sIndira%20Nagar%2C%20Lucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1596796249651!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
</div>
