  <?php include 'header.php';?>  
 

 
  <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li><strong>My Account</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      
        
        <div class="page-content">
          
            <div class="account-login">
              
   
          
              <div class="box-authentication">
                <h4>Login</h4>
               <p class="before-login-text">Welcome back! Sign in to your account</p>
                <form method="post" action="<?php echo base_url(); ?>customer/login"
                                          enctype="multipart/form-data" data-parsley-validate>
                <label for="emmail_login">Email address<span class="required">*</span></label>
                <input id="emmail_login" type="email" name="email" class="form-control" required="">
                <label for="password_login">Password<span class="required">*</span></label>
                <input id="password_login" type="password" name="password" class="form-control" required="">
                <p class="forgot-pass"><a href="#">Lost your password?</a></p>
                <button class="button" type="submit"><i class="fa fa-lock"></i>&nbsp; <span>Login</span></button><label class="inline" for="rememberme">
													<input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me
												</label>
                    </form>
              </div>
              <div class="box-authentication">
                <h4>Register</h4><p>Create your very own account</p> 			
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
                                    <h3>Category Info</h3>
                                    <form method="post" action="<?php echo base_url(); ?>customer/createUser"
                                          enctype="multipart/form-data" data-parsley-validate>

                <label for="emmail_register">Full Name<span class="required">*</span></label>
                <input id="emmail_register" name="name" type="text" class="form-control" required="">

                 <label for="emmail_register">Email address<span class="required">*</span></label>
                <input id="emmail_register" type="email" name="email" class="form-control">

                 <label for="emmail_register">Password<span class="required">*</span></label>
                <input id="emmail_register" type="text" name="pass" class="form-control">

                 <label for="emmail_register">Confirm Password<span class="required">*</span></label>
                <input id="emmail_register" type="text" name="cpass" class="form-control">

                 <label for="emmail_register">Moblibe No. <span class="required">*</span></label>
                <input id="emmail_register" type="text" name="mobile" class="form-control">

                 <label for="emmail_register">Address<span class="required">*</span></label>
                 <textarea name="address" class="form-control"> </textarea>
          

              

                <button class="button"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>
                

                </form>
                <div class="register-benefits">
												<h5>Sign up today and you will be able to :</h5>
												<ul>
													<li>Speed your way through checkout</li>
													<li>Track your orders easily</li>
													<li>Keep a record of all your purchases</li>
												</ul>
											</div>
              </div>
   
    
        </div>
      </div>

    </div>
  </section>
  <!-- Main Container End --> 
 
 
 
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
   