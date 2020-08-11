<!-- Footer Start -->
    <footer style="background: #444a4d;padding: 50px;">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-md-4">
            <a href="" class="nav-link nav-white">Customer Service</a>
            <a href="<?php echo base_url('user/contact');?>" class="nav-link nav-white">HELP & CONTACT</a>
            <a href="<?php echo base_url('user/faq');?>" class="nav-link nav-white">DELIVERY INFORMATION</a>
            <a href="" class="nav-link nav-white">INTERNATIONAL SHIPPING</a>
            <a href="" class="nav-link nav-white">RETURNS</a>
            <a href="" class="nav-link nav-white">PAYMENT OPTIONS</a>
            <a href="<?php echo base_url('user/track_order');?>" class="nav-link nav-white">TRACK ORDER</a>
            <a href="" class="nav-link nav-white">FIND A STORE</a>
            <a href="" class="nav-link nav-white">ENCIRCLE PROGRAM</a>
            <a href="<?php echo base_url('user/about');?>" class="nav-link nav-white">ABOUT US</a>
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
            <a href="#" class="nav-link nav-white">TERMS & CONDITIONS</a>
            <a href="<?php echo base_url('user/privacy_policy'); ?>" class="nav-link nav-white">PRIVACY POLICY</a>
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
        <form id="registerform" action="" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name" required>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" required="">
            </div>
            <div class="form-group">
              <label>Mobile Number</label>
              <input type="text" name="mobno" id="mobno" class="form-control" placeholder="Enter Mobile Number" required="">
            </div>
             <div class="form-group">
              <label>State</label>
              <input type="text" name="state" id="state" class="form-control" placeholder="Enter State" required="">
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" id="city" class="form-control" placeholder="Enter City" required="">
            </div>
            <div class="form-group">
              <label>Pincode</label>
              <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Pincode" required="">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" id="address" class="form-control" placeholder="Enter Full Address" required="">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Create Password" required="">
            </div>
            <div class="form-group text-center">
              <input type="reset" value="Reset" class="btn btn-info" style="border-radius: 50px;">
              <input type="submit" onclick="resis"value="Register" class="btn btn-danger"  style="border-radius: 50px;">
            </div>
          
        </form>
  </div>
  <div class="tab-pane active container  py-2 " id="login">
    <form action="" id="loginform" method="post">
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" id="loginemail" class="form-control" placeholder="Enter Email Address" required="">
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="loginpassword" class="form-control" placeholder="Create Password" required="">
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
   $(document).ready(function() {
  $('.my_gallery').magnificPopup({delegate: 'a',gallery: {
      enabled: true
    },type:'image'});
});
</script>
    <script>
    $(document).ready(function(){
      $('#getMyLocation').click(function(){

        //$('#pincode').val('you will get pincode soon');
          $.ajax({
  url: "https://geolocation-db.com/jsonp",
  jsonpCallback: "callback",
  dataType: "jsonp",
  success: function(location) {
     $('#pincode').val(location.postal);
  }
});//ajax close
          $('.locationFinder').click(function(e){
            e.preventDefault();
              var pincode=$('#pincode').val();
              $.ajax({
                url:"<?php echo base_url('user/locationFinder/');?>",
                method:"POST",
                data:{pincode:pincode},
                success:function(data)
                {
                  if(data =='ok')
                  {
                    swal("Success!", "Jewellery Website available in your location", "success").then(function(){
            location.reload();
            });
                  }
                  else
                  {
                  swal("Sorry!", "Jewellery Website not available in your location", "warning");
                  }
                }
              });
          });
      });
      $("#registerform").submit(function(e){
        e.preventDefault();
        var name=$("#name").val();
        var email=$("#email").val();
        var mobno=$("#mobno").val();
        var password=$("#password").val();
        var state=$("#state").val();
        var city=$("#city").val();
        var zipcode=$("#zipcode").val();
        var address=$("#address").val();
         $.ajax({
         url:"<?php echo base_url('user/register/');?>",
         method:"POST",
         data:{name:name,email:email,mobno:mobno,password:password,state:state,city:city,zipcode:zipcode,address:address},
         success:function(data)
         {
            if(data =='ok')
            {
              $('#myModal').hide();
            swal("Success!", "You're registered successfully", "success").then(function(){ 
            location.reload();
            });
            }
            else
            {
            swal("Opps!", "Something went wrong, please try again", "error");
            }
         }
      });
      });
      $('#loginform').submit(function(e){
        e.preventDefault();
        var email=$("#loginemail").val();
        var password=$("#loginpassword").val();
        $.ajax({
         url:"<?php echo base_url('user/login/');?>",
         method:"POST",
         data:{email:email,password:password},
         success:function(data)
         {
            if(data =='ok')
            {
              $('#myModal').hide();
            swal("Success!", "You're login successfully", "success").then(function(){ 
            location.reload();
            });
            }
            else
            {
              $('#myModal').hide();
            swal("Opps!", "Email/Password is incorrect, please try again", "warning").then(function(){ 
            location.reload();
            });
            }
         }
      });//login ajax close
      });//login close
    });

    </script>
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
            items:2
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
            $(".addToCartCollection").on('click',function(e){
                  e.preventDefault();
                  var $form=$(this).closest(".form-submit");
                  var pid=$form.find(".pid").val();
                  $.ajax({
                     url:"<?php echo base_url('user/add_to_cart_collection/');?>",
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
            $(".addToCartGift").on('click',function(e){
                  e.preventDefault();
                  var $form=$(this).closest(".form-submit");
                  var pid=$form.find(".pid").val();
                  $.ajax({
                     url:"<?php echo base_url('user/add_to_cart_gift/');?>",
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
                  $('.addToCartCoin').on('click',function(e){
                  e.preventDefault();
                  var $form=$(this).closest(".form-submit");
                  var pid=$form.find(".pid").val();
                  $.ajax({
                     url:"<?php echo base_url('user/add_to_cart_coin/');?>",
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
                  $('.addToCartSilver').on('click',function(e){
                  e.preventDefault();
                  var $form=$(this).closest(".form-submit");
                  var pid=$form.find(".pid").val();
                  $.ajax({
                     url:"<?php echo base_url('user/add_to_cart_silver/');?>",
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