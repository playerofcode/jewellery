
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url();?>/assets/img/banner1.jpg" alt="Banner 1">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>/assets/img/banner2.jpg" alt="Banner 2">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>/assets/img/banner3.jpg" alt="Banner 3">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>/assets/img/banner4.jpg" alt="Banner 4">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>/assets/img/banner5.jpg" alt="Banner 5">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
        </div>
      </div>
    </div>
    <!-- Style Squad Start -->
    <div class="container">
      <div class="row py-5">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h3 class="text-center">Style Squad</h3>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <img src="<?php echo base_url();?>/assets/img/banner3.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-4 col-md-4 p-4">
            <h6 class="text-center">MIA STYLE SQUAD</h6>
            <p>In collaboration with 4 celebrity divas, we're brewing up something exciting for you guys! Each prima donna experiments with Mia by Tanishq jewelley to create magic on screen.</p>
            <p>Watch our for the MIA Style squad featuring kubbra sait, Amyra Dastur, Aahana Kumra and Mithila Palkar, as they grt styled by our celebrity stylist Tanya Chayri.</p>
          </div>
        </div>
    </div>
    <!-- Style Squad End -->
    <!-- Discover Mia Start -->
 <div class="container">
      <div class="row py-5">
        <div class="col-lg-12 col-md-12">
          <h3 class="text-center">Discover Mia</h3>
          <div class="owl-carousel owl-theme">
              <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img1.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >EARRINGS</a></h6>
              </div>
              <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img2.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >RINGS</a></h6>
              </div>
              <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img3.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >BRACELETS</a></h6>
              </div>
              <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img4.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >BANGLES</a></h6>
              </div>
               <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img5.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >PENDANTS</a></h6>
              </div>
              <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img6.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >NECKLACE</a></h6>
              </div>
              <div class="item">
                  <img src="<?php echo base_url();?>/assets/img/img7.jpg" alt="" class="img-fluid">
                  <h6 class="text-center"><a href="/shop/earrings" >NOSEPINS</a></h6>
              </div>
        </div>
        </div>
      </div>
    </div>
    <!-- Discover Mia End -->
  <!-- Top Sellers Start -->
  <div class="container">
      <div class="row py-5">
        <div class="col-lg-12 col-md-12">
          <h4 class="text-center">Top Sellers</h4>
        </div>
        <div class="col-lg-12 col-md-12">
           <div class="owl-carousel owl-theme">
            <?php foreach ($product_info as $key): ?>
              <div class="item">
                <div class="card shadow-sm m-2" style="min-height: 300px;">
        <div class="card-body text-center">
          <img src="<?php echo base_url($key->p_img1);?>" alt="" class="img-fluid" style="height:150px;padding: 5px;">
          <a href="<?php echo base_url('user/single/'.$key->p_id);?>" style="font-size:14px;"><?php echo $key->p_name; ?></a>
          <p><i class="fa fa-inr"></i> <?php  echo $key->d_price; ?> <del><i class="fa fa-inr"></i> <?php  echo $key->m_price; ?></del> </p>
         <form action=""  class="form-submit" method="post">
                      <input type="hidden"  class="pid"  value="<?php echo $key->p_id;?>">
                     <button  class="addToCart btn btn-cart text-uppercase" <?php if($key->status==0){echo 'disabled';} ?>><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</button>
                     </form>
        <div class="discount"><?php echo $key->offer ?>% OFF</div>
        <div class="heart"><i class="fa fa-heart"></i></div>
        </div>
      </div>
              </div>
              <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Top Sellers End -->
  <!-- Moment Start -->
<div class="container">
  <div class="py-5">
    <h3 class="text-center text-uppercase">#MyMiaMoments</h3>
  </div>
  <div class="row no-gutters my_gallery py-5">
    <div class="col-md-4">
      <a href="<?php echo base_url();?>/assets/img/img1.jpg" target="_blank"><img src="<?php echo base_url();?>/assets/img/img1.jpg" alt="" class="img-fluid"></a>
    </div>  
     <div class="col-md-4">
      <a href="<?php echo base_url();?>/assets/img/img2.jpg" target="_blank"><img src="<?php echo base_url();?>/assets/img/img2.jpg" alt="" class="img-fluid"></a>
    </div> 
     <div class="col-md-4">
      <a href="<?php echo base_url();?>/assets/img/img3.jpg" target="_blank"><img src="<?php echo base_url();?>/assets/img/img3.jpg" alt="" class="img-fluid"></a>
    </div> 
     <div class="col-md-4">
      <a href="<?php echo base_url();?>/assets/img/img4.jpg" target="_blank"><img src="<?php echo base_url();?>/assets/img/img4.jpg" alt="" class="img-fluid"></a>
    </div> 
     <div class="col-md-4">
      <a href="<?php echo base_url();?>/assets/img/img5.jpg" target="_blank"><img src="<?php echo base_url();?>/assets/img/img5.jpg" alt="" class="img-fluid"></a>
    </div> 
     <div class="col-md-4">
      <a href="<?php echo base_url();?>/assets/img/img6.jpg" target="_blank"><img src="<?php echo base_url();?>/assets/img/img6.jpg" alt="" class="img-fluid"></a>
    </div> 
  </div>
</div>
  <!-- Moment End -->
  <!-- Location Section Start -->
  <div class="container-fluid">
    <div class="py-3">
      <h3 class="text-center text-uppercase">find a store near you</h3>
    </div>
    <div class="row text-center py3"> 
      <div class="col-lg-6 col-md-6 p-2"> 
          <button id="getMyLocation" class="btn btn-custom"><i class="fa fa-map-marker"></i> use my current location</button>
          </div>
      <div class="col-ld-6 col-md-6 p-2">
          <form method="post">
          <div class="input-group mb-3">
          <input type="text" id="pincode" class="form-custom" placeholder="Enter a pin code or city" style="outline: none;">
          <div class="input-group-append">
          <button class="locationFinder btn btn-custom-form" type="submit">CHECK</button>
          </div>
          </div>
        </form>
      </div>
      </div>
  </div>
  <!-- Location Section End -->
  <!-- Quality Start -->
<div class="container-fluid">
    <div class="row py-5" style="background: #f6f6f6;">
    <div class="col-md-4 text-center">
      <img src="assets/img/icon1.svg" alt="" class="img-fluid custom-icon">
      <h6>100% ORIGINAL</h6>
      <p>ALL PRODUCTS ARE ORIGINAL AND GO THROUGH STRICT QUALITY CHECK.</p>
    </div>
    <div class="col-md-4 text-center">
      <img src="assets/img/icon1.svg" alt="" class="img-fluid custom-icon">
      <h6>SHIPPING</h6>
      <p>SHIPPING IN INDIA IS FREE | SHIPPING CHARGES APPLICABLE FOR INTERNATIONAL LOCATIONS.</p>
    </div>
    <div class="col-md-4 text-center">
      <img src="assets/img/icon1.svg" alt="" class="img-fluid custom-icon">
      <h6>7 DAY RETURN</h6>
      <p>USE OUR HASSLE FREE METHOD TO RETURN.</p>
    </div>
    </div>
  </div>
  <!-- Quality End -->