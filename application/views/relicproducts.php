<?php $this->load->view('header');?>
<div class="upload_page">
        <!--[if lt IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
        <![endif]-->
        <!-- Start of Whole Site Wrapper with mobile menu support -->
        <div id="whole" class="whole-site-wrapper color-scheme-one">
            <div class="front-banner">
                <div class="fadeOut owl-carousel owl-theme">
                    <div class="item">
                        <img src="<?=base_url('assets/front/images/homepage-banner-1.jpg');?>" alt="banner">
                    </div>
                    <div class="item">
                        <img src="<?=base_url('assets/front/images/homepage-banner-2.jpg');?>" alt="banner">
                    </div>
                    <div class="item">
                        <img src="<?=base_url('assets/front/images/homepage-banner-3.jpg');?>" alt="banner">
                    </div>
                </div>
            </div>
            <!-- End of Front-banner -->
            <!-- Start of Main Content Wrapper -->
            <div id="content" class="main-content-wrapper">
                
                <!-- Start of front page Wrapper -->
                <div class="front-page-wrapper mt-half">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <main id="primary1" class="site-main">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <div class="feature-box align-items-center">
                                                <div class="feature-icon"><img src="<?=base_url('assets/front/images/upload.png'); ?>" alt=""></div>
                                                <div class="feature-content">
                                                    <h2>Upload Information</h2>
                                                    <p>Upload real photographs of your product on Zefo.</p>
                                                </div>
                                                </div> <!-- end of feaure-box -->
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4">
                                                <div class="feature-box align-items-center">
                                                    <div class="feature-icon md-6"><img src="<?=base_url('assets/front/images/sellquote.png'); ?>" alt=""></div>
                                                    <div class="feature-content">
                                                        <h2>We will give a quote</h2>
                                                        <p>Our team of experts will give you a fair price quote.</p>
                                                    </div>
                                                    </div> <!-- end of feaure-box -->
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-4">
                                                    <div class="feature-box align-items-center">
                                                        <div class="feature-icon md-6"><img src="<?=base_url('assets/front/images/sellcash.png'); ?>" alt=""></div>
                                                        <div class="feature-content">
                                                            <h2>You get Money</h2>
                                                            <p>Once deal is finalized, we pick up in 2 days and give you money.</p>
                                                        </div>
                                                        </div> <!-- end of feaure-box -->
                                                    </div>
                                                </div>
                                                </main> <!-- end of #primary -->
                                            </div>
                                            </div> <!-- end of row -->
                                            </div> <!-- end of container -->
                                        </div>
                                        <!-- End of Front page Wrapper -->
                                        <section class="feature-category">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="section-title">
                                                            <h2>SELL PRODUCTS</h2>
                                                        </div>
                                                    </div>
                                                    </div> <!-- end of row -->
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="shopping-cart-wrapper">
                                                            <div id="cart_accordion" class="mt-4" role="tablist">
                                                                <div class="card">
                                                                    <div class="card-header" role="tab" id="headingCoupon">
                                                                        <h4 class="mb-0">
                                                                        <a data-toggle="collapse" href="#collapseCoupon" aria-expanded="false" aria-controls="collapseCoupon" class="collapsed">1 Fill Product Details<i class="ion ion-ios-arrow-down"></i></a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseCoupon" class="collapse" role="tabpanel" aria-labelledby="headingCoupon" data-parent="#cart_accordion" style="">
                                                                        <div class="card-body">
                                                                            <div class="col-12 col-sm-8 col-md-7">
                                                                                <div class="SellProductCard"><p class="SellProductCard__Heading">Product 1</p>
                                                                                
                                                                                <hr class="SellProductCard__Space">
                                                                                <div class="sellimage_holder">
                                                                                    <img width="100%" src="https://d24pyncn3hxs0c.cloudfront.net/sites/default/files/styles/new_image_style_339/public/brownie-red-teddy-bear-9994717gf-290118.jpg" alt="icon">
                                                                                    <i class="fa fa-times"></i>
                                                                                </div>
                                                                                <div class="PhotoUploadButton">
                                                                                    <div class="PhotoUploadButton__Cross"></div>
                                                                                    <p class="PhotoUploadButton__Text">UPLOAD</p>
                                                                                    <input type="file" class="PhotoUploadButton__FileInput" multiple=""></div><p class="SellProductCard-text">You can add more images</p></div>
                                                                                    <input type="button" value="Apply Coupon" id="button-coupon" class="btn btn-secondary">
                                                                                </div>
                                                                                <div class="col-12 col-sm-4 col-md-5">
                                                                                    <div class="SellProductForm__TipsSection">
                                                                                        <div><p class="SellTips__Heading"></p>
                                                                                        <ul class="SellTips__AttributeContainer">
                                                                                            <li class="SellTips__Attribute">You can sell multiple products at a time by clicking on add another product. However, we do not accept mobiles, curtains or furnishings at this time. Also, the products shouldn’t be structurally damaged, broken or torn.</li>
                                                                                            <li class="SellTips__Attribute">Upload real photographs of your product from 2-3 different angles. Any defects/damages MUST be included in the photographs. We do not accept any stock photographs!</li>
                                                                                            <li class="SellTips__Attribute">Our team verifies all the products at the time of pick-up basis the information provided by you and reserves the right to reject product that does not meet our standards of resale quality.</li></ul></div></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header" role="tab" id="headingTax">
                                                                                    <h4 class="mb-0">
                                                                                    <a class="collapsed" data-toggle="collapse" href="#collapseTax" aria-expanded="false" aria-controls="collapseTax">2 Contact Details<i class="ion ion-ios-arrow-down"></i></a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseTax" class="collapse" role="tabpanel" aria-labelledby="headingTax" data-parent="#cart_accordion" style="">
                                                                                    <div class="card-body">
                                                                                    our destination to get a shipping estimate.</p>
                                                                                    <form id="contact-form" action="sendemail.php" method="post">
                                                                                        <div class="form-row mb-2">
                                                                                            <div class="form-group col-12 col-sm-12 col-md-6">
                                                                                                <input type="text" name="name" class="form-control" id="com-name" placeholder="Your Name *" required="">
                                                                                            </div>
                                                                                            <div class="form-group col-12 col-sm-12 col-md-6">
                                                                                                <input type="email" name="email" class="form-control" id="com-email" placeholder="Your Email *" required="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row mb-2">
                                                                                            <div class="form-group col-12 col-sm-12 col-md-12">
                                                                                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Your Mobile No.">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row mb-2">
                                                                                            <div class="form-group col-12 col-sm-12 col-md-12">
                                                                                                <textarea id="comment" placeholder="Type Your Message....." name="message" class="form-control" required=""></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-12 col-sm-12 col-md-12">
                                                                                                <button name="send_message" type="submit" class="btn btn-secondary">Send Your Message</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="display-content">
                                                                                    <div class="input-group form-group">
                                                                                        <label class="col-12 col-sm-12 col-md-3" for="input-zone"><span class="text-danger">*</span> Region / State</label>
                                                                                        <div class="col-12 col-sm-12 col-md-9">
                                                                                            <select name="country_id" id="country_name" class="form-control nice-select" required="">
                                                                                                <option value=""> --- Please Select --- </option>
                                                                                                <option value="">Argentina</option>
                                                                                                <option value="">Germany</option>
                                                                                                <option value="">India</option>
                                                                                                <option value="">United Kingdom</option>
                                                                                                <option value="">United States</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group form-group mb-5">
                                                                                        <label class="col-12 col-sm-12 col-md-3" for="input-postcode"><span class="text-danger">*</span> Post Code</label>
                                                                                        <div class="col-12 col-sm-12 col-md-9">
                                                                                            <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control mb-0">
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="button" id="button-quote" class="btn btn-secondary">Get Quotes</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div> <!-- end of container -->
                                                </section>
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
                                                                        <input type="submit" class="btn btn-danger" name="contact" value="Subscribe">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            </div> <!-- end of row -->
                                                            </div> <!-- end of container -->
                                                        </section>
                                                        <!-- End of Newsletter Section -->
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <!-- End of Whole Site Wrapper -->
                                                
                                                <!-- jQuery JS -->
                                                <script src="js/jquery.min.js"></script>
                                                <!-- Bootstrap JS -->
                                                <script src="js/bootstrap.min.js.download"></script>
                                                <script src="js/main.js" type="text/javascript"></script>
                                                <script src="js/owl.carousel.min.js" type="text/javascript"></script>
                                            </div>
<?php $this->load->view('footer');?>			