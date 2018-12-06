  <?php include 'header.php';?>

  <!-- End Mobile Menu --> 
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
              <h2>My Account </h2>
            </div>
            
			
			
			
			
			<form>
					<div class="row">
						<div class="col-sm-6">
							<fieldset id="personal-details">
								<legend>Personal Details</legend>
								<div class="form-group required">
									<label for="input-firstname" class="control-label">First Name</label>
									<input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="" name="firstname">
								</div>
								<div class="form-group required">
									<label for="input-lastname" class="control-label">Last Name</label>
									<input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="" name="lastname">
								</div>
								<div class="form-group required">
									<label for="input-email" class="control-label">E-Mail</label>
									<input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email">
								</div>
								<div class="form-group required">
									<label for="input-telephone" class="control-label">Telephone</label>
									<input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="" name="telephone">
								</div>
								<div class="form-group">
									<label for="input-fax" class="control-label">Fax</label>
									<input type="text" class="form-control" id="input-fax" placeholder="Fax" value="" name="fax">
								</div>
							</fieldset>
							<br>
						</div>
						<div class="col-sm-6">
							<fieldset>
								<legend>Change Password</legend>
								<div class="form-group required">
									<label for="input-password" class="control-label">Old Password</label>
									<input type="password" class="form-control" id="input-password" placeholder="Old Password" value="" name="old-password">
								</div>
								<div class="form-group required">
									<label for="input-password" class="control-label">New Password</label>
									<input type="password" class="form-control" id="input-password" placeholder="New Password" value="" name="new-password">
								</div>
								<div class="form-group required">
									<label for="input-confirm" class="control-label">New Password Confirm</label>
									<input type="password" class="form-control" id="input-confirm" placeholder="New Password Confirm" value="" name="new-confirm">
								</div>
							</fieldset>
							<fieldset>
								<legend>Newsletter</legend>
								<div class="form-group">
									<label class="col-md-2 col-sm-3 col-xs-3 control-label">Subscribe</label>
									<div class="col-md-10 col-sm-9 col-xs-9">
										<label class="radio-inline">
											<input type="radio" value="1" name="newsletter"> Yes
										</label>
										<label class="radio-inline">
											<input type="radio" checked="checked" value="0" name="newsletter"> No
										</label>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<fieldset id="address">
								<legend>Payment Address</legend>
								<div class="form-group">
									<label for="input-company" class="control-label">Company</label>

									<input type="text" class="form-control" id="input-company" placeholder="Company" value="" name="company">

								</div>
								<div class="form-group required">
									<label for="input-address-1" class="control-label">Address 1</label>
									<input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="" name="address_1">
								</div>
								<div class="form-group required">
									<label for="input-city" class="control-label">City</label>
									<input type="text" class="form-control" id="input-city" placeholder="City" value="" name="city">
								</div>
								<div class="form-group required">
									<label for="input-postcode" class="control-label">Post Code</label>
									<input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="" name="postcode">
								</div>
								<div class="form-group required">
									<label for="input-country" class="control-label">Country</label>
									<select class="form-control" id="input-country" name="country_id">
										<option value=""> --- Please Select --- </option>
										<option value="244">Aaland Islands</option>
										<option value="1">Afghanistan</option>
										<option value="2">Albania</option>
										<option value="3">Algeria</option>
										<option value="4">American Samoa</option>
										<option value="5">Andorra</option>
										<option value="6">Angola</option>
										<option value="7">Anguilla</option>
										<option value="8">Antarctica</option>
										<option value="9">Antigua and Barbuda</option>
										<option value="10">Argentina</option>
										<option value="11">Armenia</option>
										<option value="12">Aruba</option>
								   
									</select>
								</div>
								<div class="form-group required">
									<label for="input-zone" class="control-label">Region / State</label>
									<select class="form-control" id="input-zone" name="zone_id">
										<option value=""> --- Please Select --- </option>
										<option value="3513">Aberdeen</option>
										<option value="3514">Aberdeenshire</option>
										<option value="3515">Anglesey</option>
										<option value="3516">Angus</option>
										<option value="3517">Argyll and Bute</option>
										<option value="3518">Bedfordshire</option>
										<option value="3519">Berkshire</option>
								 
									</select>
								</div>
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset id="shipping-address">
								<legend>Shipping Address</legend>
								<div class="form-group">
									<label for="input-company" class="control-label">Company</label>
									<input type="text" class="form-control" id="input-company" placeholder="Company" value="" name="company">
								</div>
								<div class="form-group required">
									<label for="input-address-1" class="control-label">Address 1</label>
									<input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="" name="address_1">
								</div>
								<div class="form-group required">
									<label for="input-city" class="control-label">City</label>
									<input type="text" class="form-control" id="input-city" placeholder="City" value="" name="city">
								</div>
								<div class="form-group required">
									<label for="input-postcode" class="control-label">Post Code</label>
									<input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="" name="postcode">
								</div>
								<div class="form-group required">
									<label for="input-country" class="control-label">Country</label>
									<select class="form-control" id="input-country" name="country_id">
										<option value=""> --- Please Select --- </option>
										<option value="244">Aaland Islands</option>
										<option value="1">Afghanistan</option>
										<option value="2">Albania</option>
										<option value="3">Algeria</option>
										<option value="4">American Samoa</option>
										<option value="5">Andorra</option>
										<option value="6">Angola</option>
										<option value="7">Anguilla</option>
										<option value="8">Antarctica</option>
										<option value="9">Antigua and Barbuda</option>
										<option value="10">Argentina</option>
										<option value="11">Armenia</option>
										<option value="12">Aruba</option>
									
									</select>
								</div>
								<div class="form-group required">
									<label for="input-zone" class="control-label">Region / State</label>
									<select class="form-control" id="input-zone" name="zone_id">
										<option value=""> --- Please Select --- </option>
										<option value="3513">Aberdeen</option>
										<option value="3514">Aberdeenshire</option>
										<option value="3515">Anglesey</option>
										<option value="3516">Angus</option>
										<option value="3517">Argyll and Bute</option>
										<option value="3518">Bedfordshire</option>
										<option value="3519">Berkshire</option>
									   
									</select>
								</div>
							</fieldset>
						</div>
					</div>



					<div class="buttons clearfix">
						<div class="pull-right">
							<input type="submit" class="btn btn-md btn-primary" value="Save Changes">
						</div>
					</div>
				</form>
			
			
			
			
			
			
			
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
  
  <div class="our-clients">
    <div class="slider-items-products">
      <div id="our-clients-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col6"> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand1.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand2.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand3.png" alt="Image"></a> </div>
          <!-- End Item --> 
          
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand4.png" alt="Image"></a> </div>
          <!-- End Item --> 
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand5.png" alt="Image"></a> </div>
          <!-- End Item --> 
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand6.png" alt="Image"></a> </div>
          <!-- End Item --> 
          <!-- Item -->
          <div class="item"> <a href="#"><img  src="<?php echo asset_url() ;?>images/brand7.png" alt="Image"></a> </div>
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
  
  <!-- Footer -->
   <?php include 'footer.php';?>
