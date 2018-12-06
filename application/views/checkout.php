    <?php include 'header.php';?>
 
       <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
           
            <li><strong>Checkout</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
<!-- Main Container -->
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9 col-xs-12">
                        <?php

                            if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-block alert-success">
                            <button type="button" class="close" data-dismiss="alert"><i
                            class="icon-remove"></i></button>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php } else if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-block alert-danger">
                            <button type="button" class="close" data-dismiss="alert"><i
                            class="icon-remove"></i></button>
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
        
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Checkout</h2>
        </div>
        <?php  if(!isset($this->session->userdata['cust_id'])){   ?> 
            <h4 class="checkout-sep">1. Checkout Method</h4>
            <div class="box-border">
                <div class="row">
                    <div class="col-sm-6">
                       
                        <p>Register with us for future convenience:</p>
                        <ul>
                            
                            <li><label><input type="radio" name="radio1" checked="">Register</label></li>
                        </ul>
                        <br>
                        <h4>Register and save time!</h4>
                        <p>Register with us for future convenience:</p>
                        <p><i class="fa fa-check-circle text-primary"></i> Fast and easy check out</p>
                        <p><i class="fa fa-check-circle text-primary"></i> Easy access to your order history and status</p>
                       <a href="<?php echo base_url() ;?>customer/signUp"> <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button> </a>
                    </div>
                    <div class="col-sm-6">
                        <h5>Login</h5>
                        <p>Already registered? Please log in below:</p>
                            <form method="post" action="<?php echo base_url(); ?>customer/login"
                                          enctype="multipart/form-data" data-parsley-validate>
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control input" >
                        <label>Password</label>
                        <input type="password" name="password" class="form-control input">
                        <p><a href="#">Forgot your password?</a></p>
                        <button class="button"><i class="icon-login"></i>&nbsp; <span>Login</span></button>
                    </form>
                    </div>

                </div>
            </div>
<?php } ?>
            <h4 class="checkout-sep">2. <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  <?php  if(isset($this->session->userdata['cust_id'])){   ?> aria-expanded="true" <?php } ?>>  Billing Infomations </a></h4>

            <form method="post" action="<?php echo base_url(); ?>product/checkoutCod">

            <div class="box-border">
            <div  id="collapseOne" class="panel-collapse collapse <?php  if(isset($this->session->userdata['cust_id'])){  echo 'in' ; }?>" >
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="first_name" class="required">Full Name</label>
                            <input type="text" class="input form-control"  id="first_name" name="cust_name" value="<?php echo $this->session->userdata['cust_full_name'] ?>">
                        </div><!--/ [col] -->
                       

                        <div class="col-sm-6">
                            <label for="email_address" class="required">Email Address</label>
                            <input type="text" class="input form-control" id="email_address" name="email" readonly="" value="<?php echo $this->session->userdata['cust_email'] ?>">
                        </div><!--/ [col] -->

                    </li><!--/ .row -->
                
                    <li class="row"> 
                        <div class="col-xs-12">

                            <label for="address" class="required">Address</label>
                           
                            <textarea  class="input form-control" name="address" id="address"><?php echo $this->session->userdata['cust_address'] ?></textarea>

                        </div><!--/ [col] -->

                    </li><!-- / .row -->

                    <li class="row">

                        <div class="col-sm-6">
                            
                            <label for="city" class="required">City</label>
                            <input class="input form-control" type="text" name="city" id="city">

                        </div><!--/ [col] -->

                             <div class="col-sm-6">

                            <label for="postal_code" class="required">Zip/Postal Code</label>
                            <input class="input form-control" type="text" name="zip_code" id="postal_code">
                        </div><!--/ [col] -->

                    </li><!--/ .row -->

                    <li class="row">
                        <div class="col-sm-6">
                            <label for="telephone" class="required">Mobile</label>
                            <input class="input form-control" type="text" name="mobile" id="telephone" value="<?php echo @$this->session->userdata['cust_contact'] ?>">
                        </div><!--/ [col] -->


                    </li><!--/ .row -->

                       <li class="row"> 
                        <div class="col-xs-12">

                            <label for="address" class="required">Comment</label>
                           
                            <textarea  class="input form-control" name="comment" id="comment"></textarea>

                        </div><!--/ [col] -->

                    </li><!-- / .row -->


              
                    <li>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">   <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button> </a>
                    </li>
                </ul>
            </div>
            </div>
            
         
            
            <h4 class="checkout-sep last">3. <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">   Order Review</a> </h4>
            
            <div class="box-border">
            <div  id="collapsefour" class="panel-collapse collapse">
            <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Avail.</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cartItem  = $this->cart->contents();
                      foreach ($cartItem as $key => $value) {
                        
                       ?>

                    <tr>
                      <td class="cart_product"><a href="#"><img src="<?php echo admin_asset_url(); ?>assets/img/product/<?php echo $value['img']; ?>" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#"><?php echo $value['name']; ?> </a></p>
                        <small><a href="#">Color : Red</a></small><br>
                        <small><a href="#">Size : M</a></small></td>
                      <td class="availability in-stock"><span class="label">In stock</span></td>
                      <td class="price"><span>Rs. <?php echo $value['price']; ?></span></td>
                      <td class="qty"><input class="form-control input-sm" type="text" readonly="" value="<?php echo $value['qty']; ?>"></td>
                      <td class="price"><span>Rs. <?php echo $value['subtotal']; ?></span></td>
                      
                    </tr>
                    <?php  
                      } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Total products (tax incl.)</td>
                            <td colspan="2">Rs. <?php echo $this->cart->total(); ?> </td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td colspan="2"><strong>Rs. <?php echo $this->cart->total(); ?> </strong></td>
                        </tr>
                    </tfoot>    
                </table>
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive">   <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button> </a>
                </div>
                </div>
                
                
            </div>

             <h4 class="checkout-sep">4.  <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive"> Payment Information </a> </h4>
            <div class="box-border">
                <div  id="collapsefive" class="panel-collapse collapse">
                <ul>
                    <li>
                        <label for="radio_button_5"><input type="radio" checked  name="payment_type" id="radio_button_5" value="cod"> Cash On Delivery</label>
                    </li>

                    <li>
            
                        <label for="radio_button_6"><input type="radio" name="payment_type" id="radio_button_6" value="other">Other</label>
                    </li>

                </ul>
                 </div>
                </div>
                
                
                <button class="button" type="submit" style="float:  right;"> <span>Checkout</span></button>
            </div>
 </form>
        </div>
      </div>
    
    </div>
  </div>
  </section>
  <!-- Main Container End -->
   <!-- our clients Slider -->
  
  <div class="our-clients">
    <div class="slider-items-products">
      <div id="our-clients-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col6"> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand1.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand2.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand3.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand4.png" alt="Image"></a> </div>
          <!-- End Item --> 
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand5.png" alt="Image"></a> </div>
          <!-- End Item --> 
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand6.png" alt="Image"></a> </div>
          <!-- End Item --> 
          <!-- Item -->
          <div class="item"> <a href="#"><img src="<?php echo asset_url() ;?>images/brand7.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-service">
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="bottom-service-box">
          <div class="box-outer">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
              <div class="service-box-center"> <span class="bottom-service-title">Buy 2 items</span>
                <div class="description">
                  <div class="heading">Get one for free!</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column">
              <div class="service-box-center"> <span class="bottom-service-title">Daily Sales</span>
                <div class="description">
                  <div class="heading">Today up to 45% off!</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column">
              <div class="service-box-center"> <span class="bottom-service-title">NEW ARRIVAL</span>
                <div class="description">
                  <div class="heading">Sale up to 75% off</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column">
              <div class="service-box-center"> <span class="bottom-service-title">UpTO 45% off</span>
                <div class="description">
                  <div class="heading">Your first purchase</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
       <?php include 'footer.php';?>
	     <script>

        $(document).ready(function () {

            setTimeout(function () {
                $(".alert").hide();
            }, 5000);
        });
</script>
   