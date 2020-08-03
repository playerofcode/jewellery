<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <title>Jewellery Store</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"  />
    <style>
    *{
      font-family: 'Nunito', sans-serif;
    }
    a{text-decoration: none!important;padding: 10px;text-transform: uppercase;}
    .owl-dots span{
     background:#f15060!important;
    }
    .custom-color{
      color: #f15060;
      position: relative;
    }
    .nav-link{
        color: #000!important;
    }
     .nav-link.active ,.nav-link:hover,.dropdown-item:hover
      {
        color: #f15060!important;
      }
      .navbar-brand,.dropdown-item,.nav-link{
      font-size: 14px!important;
      }
  .bg-dark
  {
background: #fff!important; 
  }
  .carousel-item img{
    height: 400px!important;
    width:100%;
  }
  .owl-carousel .item{
    min-height: 250px;
  }
  .owl-carousel .item a{
    text-decoration: none;
    color:#000;
  }
  .custom-icon{
    height: 70px;
    margin:0 auto;
  }
  .dropdown:hover>.dropdown-menu {
  display: block;
}
.nav-white{color: #fff!important;}
.btn-custom{
  height:50px;
  width:300px;
  padding: 10px 30px;
  background: #f15060;
  border-radius: 50px;
  color: white;
  text-transform: uppercase;
}
.form-custom{
  height: 50px;
  border-radius: 50px 0 0 50px;
  border:1px solid #f15060;
  width:250px;
}
.btn-custom-form
{
  height: 50px;
  width: 150px;
  padding: 10px 30px;
  background: #f15060;
  border-radius: 50px;
  color: white;
  text-transform: uppercase;
}
.box{
  overflow: hidden;
}
.box img:hover{
    transition: 0.5s;
  transform:scale(1.2);
}
.video_box{
position: relative;
}
.video_box img{
  height: 200px;
}
.overlay{
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
  color: #f15060;
  font-size: 50px;
}
.discount{
    position: absolute;
    top:0;
    left: 0;
    background: #fd7f53;
    padding: 2px;
    color:white;
    font-size: 12px;
  }
  .heart{
    position: absolute;
    top:0;
    right: 5px;
    padding: 5px;
    color:deeppink;
  }
  .btn-cart{
    font-size: 12px;
    border-radius: 50px;
    border:2px solid #f15060; 
    color: #f15060;
  }
  .btn-cart:hover
  {
    transition: 0.5s;
    background: #f15060;
    color:#fff;
  }
  </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row py-2" style="background: #f15060;">
        <div class="col-md-12 text-right" >
          <?php 
        if(!empty($this->session->userdata('email')))
        {?>
        <a class="text-white" href="<?php echo base_url('user/logout');?>">Logout</a>
          <?php }else{?>
         <a class="text-white" href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Login</a>
       <?php } ?>
         <a class="text-white" href="<?php echo base_url('user/cart');?>"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i><sup><span class="badge badge-pill badge-info"><?php echo $this->cart->total_items();?></span></sup></a>
        </div>
      </div>
    </div>
    
            <nav class="navbar navbar-expand-lg bg-dark navbar-light shadow-sm sticky-top py-3 text-uppercase">
              <div class="container-fluid">
  <!-- Brand -->
  <a class="navbar-brand mx-auto" href="<?php echo base_url('user/index');?>">Jewellery Store</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto text-center">    
    <li class="nav-item"><a href="<?php echo base_url('user/index');?>" class="nav-link active">Home</a></li>  
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Categories
      </a>
      <div class="dropdown-menu">
        <?php foreach ($category as $key) { ?>
         <a class="dropdown-item" href="<?php echo base_url('user/products/'.$key->cat_id);?>"><?php echo $key->cat_name; ?></a>
      <?php  } ?>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Collection
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">Birthstone pendants</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">birthstone bracelet</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">facets</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">classics</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">charms</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">electrify</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">glam</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">valentines</a>
        <a class="dropdown-item" href="<?php echo base_url('user/products');?>">smolitaires</a>
      </div>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/products');?>">Silver</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Coins
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('user/single');?>">1 gram</a>
        <a class="dropdown-item" href="<?php echo base_url('user/single');?>">2 grams</a>
        <a class="dropdown-item" href="<?php echo base_url('user/single');?>">4 grams</a>
        <a class="dropdown-item" href="<?php echo base_url('user/single');?>">5 grams</a>
        <a class="dropdown-item" href="<?php echo base_url('user/single');?>">10grams</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Me in Action
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('user/series');?>">MIA series</a>
        <a class="dropdown-item" href="<?php echo base_url('user/style');?>">mia style</a>
        <a class="dropdown-item" href="<?php echo base_url('user/video');?>">mia videos</a>
        <a class="dropdown-item" href="<?php echo base_url('user/blog');?>">mia stories</a>
        <a class="dropdown-item" href="<?php echo base_url('user/about');?>">about mia</a> 
      </div>
    </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        gift
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('user/gifting');?>">gifting guide</a>
        <a class="dropdown-item" href="<?php echo base_url('user/gifting_occasions') ?>">gifting occasions</a>
      </div>
    </li>
    </ul>
  </div>
    </div>
</nav>