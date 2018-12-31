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
                                        <h2>User Dashboard</h2>
                                    </div>
                                </div>
                            </div>
<!-- end of row -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
        <div class="login-form mt-half">
            <p>Dashboard page</p>
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