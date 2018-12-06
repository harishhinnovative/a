 
   <?php include 'header.php';?>
 
  
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
          
            
            <div class="order-detail-content">
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
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
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
                      <td class="qty"><input class="form-control input-sm" type="text" value="<?php echo $value['qty']; ?>"></td>
                      <td class="price"><span>Rs. <?php echo $value['subtotal']; ?></span></td>
                      <td class="action"><button class="action add-to-cart" type="button" title="Remove from Cart" onclick="remove('<?php echo $value['rowid'];?>');"><i class="icon-close"></i></a></td>
                    </tr>
                    <?php  
                      } ?>
               

                  </tbody>
             <tfoot>
                    <tr class="first last">
                      <td colspan="50" class="a-right last"><button type="button" title="Continue Shopping" class="button btn-continue" onclick="setLocation('#')"><span>Continue Shopping</span></button>
                        <button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span>Update Cart</span></button>
                        <button type="button" name="update_cart_action" value="empty_cart" title="Clear Cart" onclick="clearCart();"  class="button btn-empty" id="empty_cart_button"><span>Clear Cart</span></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              
            </div>
            
            <div class="cart-collaterals row">
            <div class="col-sm-4">
              <div class="shipping">
                <h3>Estimate Shipping and Tax</h3>
                <div class="shipping-form">
                  <form action="#estimatePost/" method="post" id="shipping-zip-form">
                    <p>Enter your destination to get a shipping estimate.</p>
                    <ul class="form-list">
                      <li>
                        <label for="country" class="required"><em>*</em>Country</label>
                        <div class="input-box">
                          <select name="country_id" id="country" class="validate-select" title="Country">
                            <option value=""> </option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="VG">British Virgin Islands</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos [Keeling] Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo - Brazzaville</option>
                            <option value="CD">Congo - Kinshasa</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d’Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong SAR China</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Laos</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macau SAR China</option>
                            <option value="MK">Macedonia</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar [Burma]</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="KP">North Korea</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territories</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn Islands</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russia</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">São Tomé and Príncipe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="KR">South Korea</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syria</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US" selected="selected">United States</option>
                            <option value="UY">Uruguay</option>
                            <option value="UM">U.S. Minor Outlying Islands</option>
                            <option value="VI">U.S. Virgin Islands</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VA">Vatican City</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                          </select>
                        </div>
                      </li>
                      <li>
                        <label for="region_id">State/Province</label>
                        <div class="input-box">
                          <select class="required-entry validate-select" defaultvalue="" id="region_id" name="region_id" title="State/Province" style="">
                            <option value="">Please select region, state or province</option>
                            <option title="Alabama" value="1">Alabama</option>
                            <option title="Alaska" value="2">Alaska</option>
                            <option title="American Samoa" value="3">American Samoa</option>
                            <option title="Arizona" value="4">Arizona</option>
                            <option title="Arkansas" value="5">Arkansas</option>
                            <option title="Armed Forces Africa" value="6">Armed Forces Africa</option>
                            <option title="Armed Forces Americas" value="7">Armed Forces Americas</option>
                            <option title="Armed Forces Canada" value="8">Armed Forces Canada</option>
                            <option title="Armed Forces Europe" value="9">Armed Forces Europe</option>
                            <option title="Armed Forces Middle East" value="10">Armed Forces Middle East</option>
                            <option title="Armed Forces Pacific" value="11">Armed Forces Pacific</option>
                            <option title="California" value="12">California</option>
                            <option title="Colorado" value="13">Colorado</option>
                            <option title="Connecticut" value="14">Connecticut</option>
                            <option title="Delaware" value="15">Delaware</option>
                            <option title="District of Columbia" value="16">District of Columbia</option>
                            <option title="Federated States Of Micronesia" value="17">Federated States Of Micronesia</option>
                            <option title="Florida" value="18">Florida</option>
                            <option title="Georgia" value="19">Georgia</option>
                            <option title="Guam" value="20">Guam</option>
                            <option title="Hawaii" value="21">Hawaii</option>
                            <option title="Idaho" value="22">Idaho</option>
                            <option title="Illinois" value="23">Illinois</option>
                            <option title="Indiana" value="24">Indiana</option>
                            <option title="Iowa" value="25">Iowa</option>
                            <option title="Kansas" value="26">Kansas</option>
                            <option title="Kentucky" value="27">Kentucky</option>
                            <option title="Louisiana" value="28">Louisiana</option>
                            <option title="Maine" value="29">Maine</option>
                            <option title="Marshall Islands" value="30">Marshall Islands</option>
                            <option title="Maryland" value="31">Maryland</option>
                            <option title="Massachusetts" value="32">Massachusetts</option>
                            <option title="Michigan" value="33">Michigan</option>
                            <option title="Minnesota" value="34">Minnesota</option>
                            <option title="Mississippi" value="35">Mississippi</option>
                            <option title="Missouri" value="36">Missouri</option>
                            <option title="Montana" value="37">Montana</option>
                            <option title="Nebraska" value="38">Nebraska</option>
                            <option title="Nevada" value="39">Nevada</option>
                            <option title="New Hampshire" value="40">New Hampshire</option>
                            <option title="New Jersey" value="41">New Jersey</option>
                            <option title="New Mexico" value="42">New Mexico</option>
                            <option title="New York" value="43">New York</option>
                            <option title="North Carolina" value="44">North Carolina</option>
                            <option title="North Dakota" value="45">North Dakota</option>
                            <option title="Northern Mariana Islands" value="46">Northern Mariana Islands</option>
                            <option title="Ohio" value="47">Ohio</option>
                            <option title="Oklahoma" value="48">Oklahoma</option>
                            <option title="Oregon" value="49">Oregon</option>
                            <option title="Palau" value="50">Palau</option>
                            <option title="Pennsylvania" value="51">Pennsylvania</option>
                            <option title="Puerto Rico" value="52">Puerto Rico</option>
                            <option title="Rhode Island" value="53">Rhode Island</option>
                            <option title="South Carolina" value="54">South Carolina</option>
                            <option title="South Dakota" value="55">South Dakota</option>
                            <option title="Tennessee" value="56">Tennessee</option>
                            <option title="Texas" value="57">Texas</option>
                            <option title="Utah" value="58">Utah</option>
                            <option title="Vermont" value="59">Vermont</option>
                            <option title="Virgin Islands" value="60">Virgin Islands</option>
                            <option title="Virginia" value="61">Virginia</option>
                            <option title="Washington" value="62">Washington</option>
                            <option title="West Virginia" value="63">West Virginia</option>
                            <option title="Wisconsin" value="64">Wisconsin</option>
                            <option title="Wyoming" value="65">Wyoming</option>
                          </select>
                          <input type="text" id="region" name="region" value="" title="State/Province" class="input-text required-entry" style="display:none;">
                        </div>
                      </li>
                      <li>
                        <label for="postcode">Zip/Postal Code</label>
                        <div class="input-box">
                          <input type="text" class="input-text validate-postcode" id="postcode" name="estimate_postcode" value="">
                        </div>
                      </li>
                    </ul>
                    <div class="buttons-set11">
                      <button type="button" title="Get a Quote" onclick="coShippingMethodForm.submit()" class="button get-quote"><span>Get a Quote</span></button>
                    </div>
                    <!--buttons-set11-->
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="discount">
                <h3>Discount Codes</h3>
                <form id="discount-coupon-form" action="#couponPost/" method="post">
                  <label for="coupon_code">Enter your coupon code if you have one.</label>
                  <input type="hidden" name="remove" id="remove-coupone" value="0">
                  <input type="text" class="input-text fullwidth" id="coupon_code" name="coupon_code" value="">
                  <button type="button" title="Apply Coupon" class="button coupon " onclick="discountForm.submit(false)" value="Apply Coupon"><span>Apply Coupon</span></button>
                </form>
              </div>
            </div>
            <div class="totals col-sm-4">
              <h3>Shopping Cart Total</h3>
              <div class="inner">
                <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                  <colgroup>
                  <col>
                  <col width="1">
                  </colgroup>
                  <tfoot>
                    <tr>
                      <td style="" class="a-left" colspan="1"><strong>Grand Total</strong></td>
                      <td style="" class="a-right"><strong><span class="price">Rs. <?php echo $this->cart->total(); ?></span></strong></td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td style="" class="a-left" colspan="1"> Subtotal </td>
                      <td style="" class="a-right"><span class="price">Rs. <?php echo $this->cart->total(); ?></span></td>
                    </tr>
                  </tbody>
                </table>
                <ul class="checkout">
                  <li>
                 <a href="<?php echo base_url() ;?>product/checkout">  <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout"><span>Proceed to Checkout</span></button></a>
                  </li>
 
                  <br>
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
          </div>
        </div>
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