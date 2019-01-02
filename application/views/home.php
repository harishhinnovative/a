<?php $this->load->view('header');?>			
<div class="front-banner mb-half">
				<div class="fadeOut1 owl-carousel owl-theme">
					<div class="item">
						<img src="<?php echo base_url('assets/front/images/Banner-01.jpg') ?>" alt="banner">
					</div>
					<div class="item">
						<img src="<?php echo base_url('assets/front/images/Banner-02.jpg') ?>" alt="banner">
					</div>
				</div>
			</div>
			<section>
				<div class="product_sec mb-half">
					<div class="container">
						<div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="promo-banner hover-effect-1">
                                <a href="#">
                                    <img src="images/banner-4.jpg" alt="Promo Banner">
                                </a>
                            </div>
                        </div> <!-- end of promo-banner -->
                    </div>
						<div class="row">
							<div class="col-12 col-xs-12 col-md-12 col-lg-12">
								<h2 class="widgettitle">Popular Products</h2>
							</div>
							<div class="col-12 col-xs-12 col-md-12 col-lg-12 shop-products-wrapper">
								<div class="row">
								<?php foreach($featureproducts as $fdet) {
                                                                    $realprice  = getActualPrice($fdet->price,$fdet->discount_per);
                                                                    $imgurl     = base_url('uploads/product/'.$fdet->sid.'/big/'.$fdet->title);
                                                                    $getSortDes  = getSortDes($fdet->description);
                                                                    ?>
                                                                    
                                                                    <div class="product-layout product-grid col-6 col-sm-6 col-md-4 col-lg-3">
									<div class="product-thumb">
										<div class="product-inner">
											<div class="product-image">
												
												<a href="single-product.html">
													<img src="<?=$imgurl;?>" alt="<?=$fdet->title;?>">
												</a>
												</div> <!-- end of product-image -->
												<div class="product-caption">
													<h4 class="product-name"><a href="single-product.html"><?=$fdet->ptitle; ?></a></h4>
													<p class="product_cont"><a href=""><?=$getSortDes;?></a> 
												</p>
													<p class="product-price">
														<span class="price-old">Rs.<?=$fdet->price; ?></span>
														<span class="price-new">Rs.<?=$realprice; ?></span>
													</p>
													</div><!-- end of product-caption -->
													</div><!-- end of product-inner -->
													</div><!-- end of product-thumb -->
												</div>
												<!-- end of product-layout -->
                                                                <?php } ?>                
											</div>
										</div>
										<!-- Start of Strip Section -->
										<div class="strip mb-half col-xs-12 col-md-12 col-lg-12">
											<div class="row">
			<h2>Sell Your Relic Product on Our Website</h2>
			<a href="#" class="btn btn-secondary align-self-end">Upload Your Antique Products here</a>
		</div>
	</div>
	<!-- End of Strip Section -->
	<!-- Start of Best Selling Section -->
							<div class="col-12 col-xs-12 col-md-12 col-lg-12 mb-half best-selling">
								<h2 class="widgettitle">BEST SELLING PRODUCTS</h2>
								<div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 shop-products-wrapper">
          <div class="owl-carousel owl-theme">
            <?php foreach($bestSell as $sdet) {
                        $realprice  = getActualPrice($sdet->price,$sdet->discount_per);
                        $imgurl     = base_url('uploads/product/'.$sdet->sid.'/big/'.$sdet->title);
                        $getSortDes  = getSortDes($sdet->description);
                ?>
              <div class="item">
              <div class="product-layout product-grid">
									<div class="product-thumb">
										<div class="product-inner">
											<div class="product-image">
												
												<a href="single-product.html">
													<img src="<?=$imgurl;?>" alt="<?=$sdet->title;?>">
												</a>
												</div> <!-- end of product-image -->
												<div class="product-caption">
													<h4 class="product-name"><a href="single-product.html"><?=$sdet->ptitle; ?></a></h4>
													<p class="product_cont"><a href="">
													<?=$getSortDes;?></a> 
												</p>
													<p class="product-price">
														<span class="price-old">Rs.<?=$fdet->price; ?></span>
														<span class="price-new">Rs.<?=$realprice; ?></span>
													</p>
													</div><!-- end of product-caption -->
													</div><!-- end of product-inner -->
													</div><!-- end of product-thumb -->
												</div>
												<!-- end of product-layout -->
            </div>
            <?php } ?>
            
            
          </div>
      </div>
  </div>

							</div>


<!-- End of Best Selling Section -->
<div class="home_about_cont col-sm-12 col-lg-12 col-md-12">
	<div class="row">
		<div class="col-sm-12 col-lg-12 col-md-12">
		<h2>Welcome to Relic Gift</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions....</p>
		<a href="#">Read More</a>
	</div>
	</div>
	</div>
										</div>
									</div>
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
            <!-- End of Newsletter Section -->
<?php $this->load->view('footer');?>			