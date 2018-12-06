<?php include 'header.php';?>
  
  
  <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li class=""> <a title="Go to Home Page" href="shop_grid.html">Women </a><span>&raquo;</span></li>
            <li><strong>Clothing</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <div class="main-container col2-left-layout">
    <div class="container">
    <div class="category-description"><a href="#"><img src="<?php echo asset_url(); ?>images/cat-img1.jpg" alt="banner"></a></div>
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
          
          <div class="shop-inner">
            <div class="page-title">
              <h2>Clothing</h2>
            </div>
            <div class="toolbar">
              
              <div class="sorter">
                <div class="short-by">
                  <label>Sort By:</label>
                  <select>
                    <option selected="selected">Position</option>
                    <option>Name</option>
                    <option>Price</option>
                    <option>Size</option>
                  </select>
                </div>
                <div class="short-by page">
                  <label>Show:</label>
                  <select>
                    <option selected="selected">18</option>
                    <option>20</option>
                    <option>25</option>
                    <option>30</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="product-grid-area">
              <ul class="products-grid">
                <?php
                          $detail = $this->Admin_model->activeProductlistByCatid($id);
                           foreach ($detail as $pro) {
                      ?>

                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                
                        <a href="<?php echo base_url() ;?>product/product_detail/<?php echo $pro->pro_id;?>" class="product-item-photo"> <img class="product-image-photo" src="<?php echo admin_asset_url(); ?>assets/img/product/<?php echo $pro->pro_image ;?>" alt=""></a> </div>
                      <div class="pro-box-info">
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="<?php echo base_url() ;?>product/product_detail/<?php echo $pro->pro_id;?>"><?php echo $pro->pro_name; ?> </a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box">
                                  <p class="special-price"> <span class="price-label">Price</span> <span class="price">Rs. <?php echo $pro->pro_price; ?></span> </p>
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-hover">
                          <div class="product-item-actions">
                            <div class="pro-actions">
                              <button class="action add-to-cart" type="button" title="Add to Cart" onclick="addToCart(<?php echo $pro->pro_id;?>);"> <span>Add to Cart</span> </button>
                            </div>
                            <div class="add-to-links" data-role="add-to-links"> <a href="wishlist.html" class="action add-to-wishlist" title="Add to Wishlist"> <span>Wishlist</span> </a> <a href="compare.html" class="action add-to-compare" title="Add to Compare"> <span>Compare</span> </a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

        <?php } ?>
              </ul>
            </div>
            <div class="pagination-area ">
              <ul>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <div class="block category-sidebar">
            <div class="sidebar-title">
              <h3>Categories</h3>
            </div>
            <ul class="product-categories">
              <li class="cat-item current-cat cat-parent"><a href= "shop_grid.html">Women</a>
                <ul class="children">
                  <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                    <ul class="children">
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Dresses</a></li>
                      <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                        <ul  class="children">
                          <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                          <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                    <ul class="children">
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; backpack</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                    </ul>
                  </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Jewellery</a> </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Swimwear</a> </li>
                </ul>
              </li>
              <li class="cat-item cat-parent"><a href="shop_grid.html">Men</a>
                <ul class="children">
                  <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                    <ul class="children">
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Casual</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Designer</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Evening</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Hoodies</a></li>
                    </ul>
                  </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Jackets</a> </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Shoes</a> </li>
                </ul>
              </li>
              <li class="cat-item"><a href="shop_grid.html">Electronics</a></li>
              <li class="cat-item"><a href="shop_grid.html">Furniture</a></li>
              <li class="cat-item"><a href="shop_grid.html">KItchen</a></li>
            </ul>
          </div>
          <div class="block shop-by-side">
            <div class="sidebar-bar-title">
              <h3>Shop By</h3>
            </div>
            <div class="block-content">
              <p class="block-subtitle">Shopping Options</p>
              <div class="layered-Category">
                <h2 class="saider-bar-title">Categories</h2>
                <div class="layered-content">
                  <ul class="check-box-list">
                    <li>
                      <input type="checkbox" id="jtv1" name="jtvc">
                      <label for="jtv1"> <span class="button"></span> Camera & Photo<span class="count">(12)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv2" name="jtvc">
                      <label for="jtv2"> <span class="button"></span> Computers<span class="count">(18)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv3" name="jtvc">
                      <label for="jtv3"> <span class="button"></span> Apple Store<span class="count">(15)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv4" name="jtvc">
                      <label for="jtv4"> <span class="button"></span> Car Electronic<span class="count">(03)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv5" name="jtvc">
                      <label for="jtv5"> <span class="button"></span> Accessories<span class="count">(04)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv7" name="jtvc">
                      <label for="jtv7"> <span class="button"></span> Game & Video<span class="count">(07)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv8" name="jtvc">
                      <label for="jtv8"> <span class="button"></span> Best selling<span class="count">(05)</span> </label>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="manufacturer-area">
                <h2 class="saider-bar-title">Manufacturer</h2>
                <div class="saide-bar-menu">
                  <ul>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Aliquam</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Duis tempus id </a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Leo quis molestie. </a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Suspendisse </a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Nunc gravida </a></li>
                  </ul>
                </div>
              </div>
 
            </div>
          </div>
          <div class="block product-price-range ">
            <div class="sidebar-bar-title">
              <h3>Price</h3>
            </div>
            <div class="block-content">
              <div class="slider-range">
                <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                <div class="amount-range-price">Range: $10 - $550</div>
                <ul class="check-box-list">
                  <li>
                    <input type="checkbox" id="p1" name="cc" />
                    <label for="p1"> <span class="button"></span> $20 - $50<span class="count">(0)</span> </label>
                  </li>
                  <li>
                    <input type="checkbox" id="p2" name="cc" />
                    <label for="p2"> <span class="button"></span> $50 - $100<span class="count">(0)</span> </label>
                  </li>
                  <li>
                    <input type="checkbox" id="p3" name="cc" />
                    <label for="p3"> <span class="button"></span> $100 - $250<span class="count">(0)</span> </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
 
          <div class="single-img-add sidebar-add-slider ">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="<?php echo asset_url(); ?>images/add-slide1.jpg" alt="slide1">
                  <div class="carousel-caption">
                    <h3><a href="single_product.php" title=" Sample Product">Sale Up to 50% off</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">shopping Now</a> </div>
                </div>
                <div class="item"> <img src="<?php echo asset_url(); ?>images/add-slide2.jpg" alt="slide2">
                  <div class="carousel-caption">
                    <h3><a href="single_product.php" title=" Sample Product">Smartwatch Collection</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">All Collection</a> </div>
                </div>
                <div class="item"> <img src="<?php echo asset_url(); ?>images/add-slide3.jpg" alt="slide3">
                  <div class="carousel-caption">
                    <h3><a href="single_product.php" title=" Sample Product">Summer Sale</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div>
              
              <!-- Controls --> 
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
          <div class="block special-product">
            <div class="sidebar-bar-title">
              <h3>Special Products</h3>
            </div>
            <div class="block-content">
              <ul>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.php" title="Sample Product" class="product-image"><img src="<?php echo asset_url(); ?>images/products/img01.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.php">Lorem ipsum dolor sit amet Consectetur</a> </p>
                    <span class="price">$19.99</span>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                  </div>
                </li>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.php" title="Sample Product" class="product-image"><img src="<?php echo asset_url(); ?>images/products/img02.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.php">Consectetur utes anet adipisicing elit</a> </p>
                    <span class="price">$89.99</span>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                  </div>
                </li>
              </ul>
              <a class="link-all" href="shop_grid.html">All Products</a> </div>
          </div>
 
        </aside>
      </div>
    </div>
  </div>
  <!-- Main Container End --> 
 <!-- our clients Slider -->
  
 
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