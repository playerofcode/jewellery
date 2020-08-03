<!-- Footer Start -->
    <footer style="background: #444a4d;padding: 50px;">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-md-4">
            <a href="" class="nav-link nav-white">Customer Service</a>
            <a href="" class="nav-link nav-white">HELP & CONTACT</a>
            <a href="" class="nav-link nav-white">DELIVERY INFORMATION</a>
            <a href="" class="nav-link nav-white">INTERNATIONAL SHIPPING</a>
            <a href="" class="nav-link nav-white">RETURNS</a>
            <a href="" class="nav-link nav-white">PAYMENT OPTIONS</a>
            <a href="" class="nav-link nav-white">TRACK ORDER</a>
            <a href="" class="nav-link nav-white">FIND A STORE</a>
            <a href="" class="nav-link nav-white">ENCIRCLE PROGRAM</a>
            <a href="" class="nav-link nav-white">ABOUT US</a>
          </div>
          <div class="col-md-4 text-center text-white">
            <img src="<?php echo base_url();?>/assets/img/logo1.svg" alt="" class="img-fluid" style="height: 100px;">
            <p>Subscribe to receive exclusive offers</p>
            <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter Your Email Address">
  <div class="input-group-append">
    <button class="btn btn-danger" type="submit">SUBSCRIBE</button>
  </div>
</div>
<ul class="nav justify-content-center">
  <li class="nav-item"><a href="" class="nav-link nav-white"><i class="fa fa-facebook"></i></a></li>
  <li class="nav-item"><a href="" class="nav-link nav-white"><i class="fa fa-instagram"></i></a></li>
  <li class="nav-item"><a href="" class="nav-link nav-white"><i class="fa fa-whatsapp"></i></a></li>
  <li class="nav-item"><a href="" class="nav-link nav-white"><i class="fa fa-youtube"></i></a></li>
  <li class="nav-item"><a href="" class="nav-link nav-white"><i class="fa fa-twitter"></i></a></li>
</ul>
          </div>
          <div class="col-md-4 text-white">
            <p>Want Help? Click Here to chat with us on <i class="fa fa-whatsapp"></i></p>
            <p >Operating Hours: 10:00AM to 10:00PM Monday to Sunday</p>
            <a href="" class="nav-link nav-white">TERMS & CONDITIONS</a>
            <a href="" class="nav-link nav-white">PRIVACY POLICY</a>
            <a href="" class="nav-link nav-white">&copy; 2020 CONFOUNDING SOLUTIONS. All rights reserved.</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"><hr class="bg-white"></div>
        </div>
        <div class="row justify-content-center">
          <img src="<?php echo base_url();?>/assets/img/f1.svg" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f2.webp" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f3.svg" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f4.png" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f5.svg" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f6.svg" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f7.svg" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f8.webp" alt="" class="img-fluid px-3" style="height: 15px;">
          <img src="<?php echo base_url();?>/assets/img/f9.webp" alt="" class="img-fluid px-3" style="height: 15px;">
        </div>
      </div>
    </footer>
  <!-- Footer End -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <!-- <h4 class="modal-title">Jwellery Website</h4> -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified ">
   <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#login">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#register">Register</a>
  </li>
 
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container py-2" id="register">
        <form action="" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
          </div>
          <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control">
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
            </div>
            <div class="form-group">
              <label>Mobile Number</label>
              <input type="text" name="mobno" class="form-control" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="paassword" class="form-control" placeholder="Create Password">
            </div>
            <div class="form-group text-center">
              <input type="reset" value="Reset" class="btn btn-info" style="border-radius: 50px;">
              <input type="submit" value="Register" class="btn btn-danger"  style="border-radius: 50px;">
            </div>
          
        </form>
  </div>
  <div class="tab-pane active container  py-2 " id="login">
    <form action="" method="post">
          <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="paassword" class="form-control" placeholder="Create Password">
            </div>
            <div class="form-group text-center">
              <input type="reset" value="Reset" class="btn btn-info"  style="border-radius: 50px;">
              <input type="submit" value="Login" class="btn btn-danger"  style="border-radius: 50px;">
            </div>
          </div>
        </form>
  </div>
</div>
          </div>
        </div>
    </div>  
      </div>
    </div>
  </div>
</div>
    <script src="<?php echo base_url();?>/assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js" ></script>
    <script src="<?php echo base_url();?>/assets/js/owl.carousel.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
      });
    </script>
    <script>
     function updateCartItem(obj, rowid)
            {
               $.get("<?php echo base_url('user/updateItemQty/');?>",{rowid:rowid,qty:obj.value},function(resp){
                  if(resp == 'ok')
                  {
                     location.reload();
                  }
                  else
                  {
                     swal("Opps!", "Cart update failed, please try again", "error");
                  }

               });
            }
    function removeCartItem(rowid)
            {
               $.ajax({
                  url:"<?php echo base_url('user/removeItem/');?>",
                  method:"POST",
                  data:{rowid:rowid},
                  success:function(data)
                  {
                  if(data =='ok')
                     {
                     swal("Success!", "Your item removed from the Cart!", "success").then(function(){ 
                     location.reload();
                     });
                     }
                     else
                     {
                     swal("Opps!", "Cart update failed, please try again", "error");
                     }
                  }
               });
             }
        
   </script>
    <script>
      $(document).ready(function(){
        // ('.my_gallery').magnificPopup({
        //   type:'image',
        //   delegate:'a',
        //   gallery:{enabled:true}
        // });
            $(".addToCart").on('click',function(e){
                  e.preventDefault();
                  var $form=$(this).closest(".form-submit");
                  var pid=$form.find(".pid").val();
                  $.ajax({
                     url:"<?php echo base_url('user/add_to_cart/');?>",
                     method:"POST",
                     data:{pid:pid},
                     success:function(data)
                     {
                        if(data =='ok')
                        {
                        swal("Success!", "Your item added into the Cart!", "success").then(function(){ 
                        location.reload();
                        });
                        }
                        else
                        {
                        swal("Opps!", "Cart update failed, please try again", "error");
                        }
                     }
                  });
               });
      });
    </script>
    
  <!-- <script type="text/javascript">
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
  </script> -->
  <script>
  $(document).ready(function(){

$(".tb").hover(function(){

$(".tb").removeClass("tb-active");
$(this).addClass("tb-active");

current_fs = $(".active");

next_fs = $(this).attr('id');
next_fs = "#" + next_fs + "1";

$("fieldset").removeClass("active");
$(next_fs).addClass("active");

current_fs.animate({}, {
step: function() {
current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({
'display': 'block'
});
}
});
});

});
  </script>
    </body>
</html>