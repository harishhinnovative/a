<?php
$this->load->view("header");
?>
<section>
    <div class="login-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="user-login">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="section-title left-aligned with-border" style="margin-top: 25px">
                                        <h2>Create your account</h2>
                                    </div>
                                </div>
                            </div>
<!-- end of row -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
        <?php
        if($error = $this->session->flashdata('errorMsg')) {
            echo "<div class='alert-danger alert'>".$error."</div>";            
        }
        ?>
        <div class="registration-form login-form mt-half">
            <form action="<?php echo base_url("login/register")?>" method="post" name="register">
                <div class="login-info mb-half">
                    <p>Already have an account? <a href="<?php echo base_url("login")?>">Log in instead!</a></p>
                </div>
                <div class="form-group row align-items-center">
                    <label class="col-12 col-sm-12 col-md-4 col-form-label">Title</label>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="form-row">
                            <div class="col-6 col-sm-3">
                                <div class="custom-radio">
                                    <input class="form-check-input" type="radio" name="gender" id="male">
                                    <span class="checkmark"></span>
                                    <label class="form-check-label" for="male">Mr.</label>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="custom-radio">
                                    <input class="form-check-input" type="radio" name="gender" id="female">
                                    <span class="checkmark"></span>
                                    <label class="form-check-label" for="female">Mrs.</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-name" class="col-12 col-sm-12 col-md-4 col-form-label">Full Name</label>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <input type="text" class="form-control" id="fullname" name="fullname" required="" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-12 col-sm-12 col-md-4 col-form-label">Email Address</label>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <input type="text" class="form-control" id="email" name="email" required="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-12 col-sm-12 col-md-4 col-form-label">Password</label>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <input type="password" class="form-control" id="password" name="password" required="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="c-password" class="col-12 col-sm-12 col-md-4 col-form-label">Confirm Password</label>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <input type="password" class="form-control" id="c-password" required="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birth" class="col-12 col-sm-12 col-md-4 col-form-label">Birthdate (Optional)</label>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <input type="text" class="form-control" id="birth" name="birth" placeholder="MM / DD / YYYY" />
                    </div>
                </div>
                <div class="form-check row p-0 mt-5">
                    <div class="col-12 col-sm-12 col-md-8 offset-md-4 col-lg-6 offset-lg-4">
                        <div class="custom-checkbox">
                            <input class="form-check-input" type="checkbox" id="offer" name="tnc" value="1" />
                            <span class="checkmark"></span>
                            <label class="form-check-label" for="offer">Accept <a href="#">All Terms & Condition</a></label>
                        </div>
                    </div>
                </div>
                <div class="register-box d-flex justify-content-end mt-half">
                    <button type="submit" class="default-btn tiny-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
                        </div> <!-- end of user-login -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>

</section>
<!-- End of  Section -->
<!-- Start of Newsletter Section -->
<section class="newsletter-section vpadding bgc-offset">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                <div class="newsletter-title d-lg-flex justify-content-lg-start">
                    <h6>Subscribe to our Newsletter</h6>
                    <h3>Subscribe to our newsletter and know first about all the promotions and discounts. Be always trendy.</h3>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="newsletter-form-wrapper">
                    <form action="index.html" method="post">
                        <input type="email" name="email" placeholder="Enter you email address here..." value="" required=""> 
                        <input type="submit" class="default-btn" name="contact" value="Subscribe">
                    </form>
                </div>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section>

<?php
$this->load->view("footer");
?>