<style>
	body {
    overflow-x: hidden
}

.card {
    margin: auto;
    padding: 20px;
    border-radius: 15px;
    margin-top: 50px;
    margin-bottom: 50px
}

fieldset.active {
    display: block !important
}

fieldset {
    display: none
}

.pic0 {
    width: 400px;
    height: 500px;
    margin-left: 85px;
    margin-right: auto;
    display: block
}

.product-pic {
    padding-left: auto;
    padding-right: auto;
    width: 100%
}

.thumbnails {
    position: absolute
}

.fit-image {
    width: 100%;
    object-fit: cover
}

.tb {
    width: 62px;
    height: 62px;
    border: 1px solid grey;
    margin: 2px;
    opacity: 0.4;
    cursor: pointer
}

.tb-active {
    opacity: 1
}

.thumbnail-img {
    width: 60px;
    height: 60px
}

@media screen and (max-width: 768px) {
    .pic0 {
        width: 250px;
        height: 350px
    }
}
</style>
<div class="container">
	<div class="row">
        <?php foreach ($product_info as $key): ?>
		<div class="col-xl-5 col-lg-5 col-md-5">
			<div class="px-sm-1 py-5 mx-auto">
    <div class="row justify-content-center">
        <div class="d-flex">
            <div class="card">
                <div class="d-flex flex-column thumbnails">
                    <div id="f1" class="tb tb-active"> <img class="thumbnail-img fit-image" src="<?php echo base_url().$key->p_img1; ?>"> </div>
                    <div id="f2" class="tb"> <img class="thumbnail-img fit-image" src="<?php echo base_url().$key->p_img2; ?>"> </div>
                    <div id="f3" class="tb"> <img class="thumbnail-img fit-image" src="<?php echo base_url().$key->p_img3; ?>"> </div>
                    <div id="f4" class="tb"> <img class="thumbnail-img fit-image" src="<?php echo base_url().$key->p_img4; ?>"> </div>
                </div>
                <fieldset id="f11" class="active">
                    <div class="product-pic"> <img class="pic0" src="<?php echo base_url().$key->p_img1; ?>" class="img-fluid"> </div>
                </fieldset>
                <fieldset id="f21" class="">
                    <div class="product-pic"> <img class="pic0" src="<?php echo base_url().$key->p_img2; ?>"> </div>
                </fieldset>
                <fieldset id="f31" class="">
                    <div class="product-pic"> <img class="pic0" src="<?php echo base_url().$key->p_img3; ?>" > </div>
                </fieldset>
                <fieldset id="f41" class="">
                    <div class="product-pic"> <img class="pic0" src="<?php echo base_url().$key->p_img4; ?>"> </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
		</div>
		<div class="col-xl-7 col-lg-7 col-md-7 py-5 px-5">
			<h3 class="text-center"><?php echo $key->p_name; ?></h3>
			<a href="" class="custom-color">Description</a>
			<p class="text-justify"><?php echo $key->p_description; ?><br>
			<b><big>Price: Rs <?php echo $key->d_price; ?></big></b><br>
			<b><big>Qty: 1</big></b></p>
            <form action=""  method="post" class="form-submit">
           <input type="hidden"  class="pid"  value="<?php echo $key->p_id;?>">
           <button  class="addToCartSilver btn btn-custom" <?php if($key->status==0){echo 'disabled';} ?>><i class="mdi mdi-cart-outline"></i>Add to Cart</button>
           </form>
			<!-- <button class="btn btn-custom">Add to cart</button> -->
		</div>      
        <?php endforeach ?>
	</div>
</div>
<div class="container">
	<div class="row d-flex justify-content-centerss align-items-center py-5 shadow-sm m-2">
		<div class="col-md-4">
			<p>The state-of-the-art Karatmeter present in every Tanishq store is a very accurate way of measuring the purity of gold thus making our gold as pure as we say it is.</p>
		</div>
		<div class="col-md-4">
			<h4>YOU NEVER PAY FOR STONES AT THE RATE OF GOLD</h4>
			<p>We charge only for the actual weight of gold, after subtracting the weight of stones from the total weight of the piece. You are never charged the price of gold for the weight of stones.</p>
		</div>
		<div class="col-md-4">
			<h4>100% EXCHANGE VALUE FOR DIAMONDS, POLKI, RUBIES, EMERALDS</h4>
			<p>All our precious stones are carefully selected to deliver best-in-class quality. So much so, we offer 100% buyback on them at current prices. No wonder we are Indias leading diamond jeweler.</p>
		</div>
	</div>
</div>