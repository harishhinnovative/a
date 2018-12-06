  <?php include 'header.php';?>
 
 
 
 
 
  <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li><strong>Wishlist</strong></li>
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
          <div class="my-account">
            <div class="page-title">
              <h2>My Wishlist</h2>
            </div>
            <div class="wishlist-item table-responsive">
              <table class="col-md-12">
                <thead>
                  <tr>
                    <th class="th-delate">Remove</th>
                    <th class="th-product">Images</th>
                    <th class="th-details">Product Name</th>
                    <th class="th-price">Unit Price</th>
                    <th class="th-total th-add-to-cart">Add to Cart </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="th-delate"><a href="#">X</a></td>
                    <td class="th-product"><a href="#"><img  src="<?php echo asset_url() ;?>images/products/img03.jpg" alt="cart"></a></td>
                    <td class="th-details"><h2><a href="#">Lorem Ipsum is simply</a></h2></td>
                    <td class="th-price">$125.00</td>
                    <th class="td-add-to-cart"><a href="#"> Add to Cart</a></th>
                  </tr>
                  <tr>
                    <td class="th-delate"><a href="#">X</a></td>
                    <td class="th-product"><a href="#"><img  src="<?php echo asset_url() ;?>images/products/img13.jpg" alt="cart"></a></td>
                    <td class="th-details"><h2><a href="#">Leo quis molestie</a></h2></td>
                    <td class="th-price">$99.00</td>
                    <th class="td-add-to-cart"><a href="#"> Add to Cart</a></th>
                  </tr>
                  <tr>
                    <td class="th-delate"><a href="#">X</a></td>
                    <td class="th-product"><a href="#"><img  src="<?php echo asset_url() ;?>images/products/img02.jpg" alt="cart"></a></td>
                    <td class="th-details"><h2><a href="#">Lorem Ipsum is simply</a></h2></td>
                    <td class="th-price">$179.89</td>
                    <th class="td-add-to-cart"><a href="#"> Add to Cart</a></th>
                  </tr>
                  <tr>
                    <td class="th-delate"><a href="#">X</a></td>
                    <td class="th-product"><a href="#"><img  src="<?php echo asset_url() ;?>images/products/img01.jpg" alt="cart"></a></td>
                    <td class="th-details"><h2><a href="#">Leo quis molestie</a></h2></td>
                    <td class="th-price">$199.00</td>
                    <th class="td-add-to-cart"><a href="#"> Add to Cart</a></th>
                  </tr>
                </tbody>
              </table>
             </div>
          </div>
        </div>
        <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>My Account</h3>
            </div>
            <div class="block-content">
              <ul>
                <li><a>Account Dashboard</a></li>
                <li><a href="#">Account Information</a></li>
                <li><a href="#">Address Book</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Billing Agreements</a></li>
                <li><a href="#">Recurring Profiles</a></li>
                <li><a href="#">My Product Reviews</a></li>
                <li><a href="#">My Tags</a></li>
                <li class="current"><a href="#">My Wishlist</a></li>
                <li><a href="#">My Downloadable</a></li>
                <li class="last"><a href="#">Newsletter Subscriptions</a></li>
              </ul>
            </div>
          </div>
          <div class="compare block">
            <div class="sidebar-bar-title">
              <h3>Compare Products (2)</h3>
            </div>
            <div class="block-content">
              <ol id="compare-items">
                <li class="item"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name">Vestibulum porta tristique porttitor.</a> </li>
                <li class="item"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name">Lorem ipsum dolor sit amet</a> </li>
              </ol>
              <div class="ajax-checkout">
                <button type="submit" title="Submit" class="button button-compare"> <span><i class="fa fa-signal"></i> Compare</span></button>
                <button type="submit" title="Submit" class="button button-clear"> <span><i class="fa fa-eraser"></i> Clear All</span></button>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
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
		
		