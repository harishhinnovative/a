<?php include('header.php'); ?>

		<!-- End of Header Section -->

		<!--Breadcrumb Section-->
		<section id="breadcrumb-section" data-bg-img="../assets/img/breadcrumb.jpg">
			<div class="inner-container container">
				<div class="ravis-title">
					<div class="inner-box">
						
						
					</div>
				</div>

				
			</div>
		</section>
		<!--End of Breadcrumb Section-->
		<!--Contact Section-->
		<section id="contact-section">
			<div class="inner-container container">
				<div class="t-sec">
					<!--<div class="ravis-title-t-2">
						<div class="title"><span>Login </span></div>
						

				</div>-->

				<div class="form">
      <h3 style="color:white;font-size:16px">
									<strong>Booking Confermation</strong></h3>
      <div class="tab-content">
        <div id="signup">   
         <br>
          
         <div id=":1e9" class="ii gt "><div id=":1e8" class="a3s aXjCH m1630072b03addc66"><table align="center" border="0" cellpadding="0" cellspacing="0" style="border:3px solid #f4f4f4;width:70%">
	<tbody>
		
		<tr>
			<td>
				&nbsp;</td>
			<td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
					<tbody>
						<tr>
							<td>
								 <br>
								&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
								
								<form action="<?php echo $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
								
					
		               
						<input type="hidden" name="key" value="<?php echo $mkey; ?>" />
		                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		                <input type="hidden" name="txnid" value="<?php echo $tid; ?>" />
		                <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
		                <input type="hidden" name="productinfo" value="<?php echo $productinfo; ?>"/>
		                <input type="hidden" name="firstname" value="<?php echo $name; ?>" />
		                <input type="hidden" name="email" value="<?php echo $mailid; ?>" />
		                <input type="hidden" name="phone" value="<?php echo $phoneno; ?>"/>

		                 <input type="hidden" name="udf1" value="<?php echo $address; ?>"/>
		                <input type="hidden" name="udf2" value="<?php echo $city; ?>" />
		                <input type="hidden" name="udf3" value="<?php echo $zip_code; ?>" />
		                <input type="hidden" name="udf4" value="<?php echo $comment; ?>"/>

		              
		               
								<table border="0" cellpadding="0" cellspacing="0" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;padding:3px;width:130%">
									<tbody>
									
										<tr>
											<td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
												Total Amount</td>
											<td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
												: <?php echo $amount; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
										</tr>
										
									</tbody>
									
								</table>
								<br>
								<br>
								<div class="w3-bar">
   
   <button type="submit" class="btn btn-default" style="color:#fff;margin-top:30px;margin-left:40px;padding:7px 30px;font-size:18px;background:black" name="sub">Confirm</button>
   <a href="<?php echo base_url(); ?>pages/cancel_booking"" type="button" class="btn btn-default" style="color:#fff;margin-top:30px;margin-left:40px;padding:7px 30px;font-size:18px;background:orange" name="cancel">Cancel</a>
  </div>
								
								<br>
								 <input name="surl" value="<?php echo $sucess; ?>" size="64" type="hidden" />
		                    <input name="furl" value="<?php echo $failure; ?>" size="64" type="hidden" />  
		                    <!--for test environment comment  service provider   -->
		                    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
		                    <input name="curl" value="<?php echo $cancel; ?> " type="hidden" />

		                    </form>
								
								
							</td>
						</tr>
						<tr>
							<td>
								&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td>
				&nbsp;</td>
			<td height="9">
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table><div class="yj6qo"></div><div class="adL">


</div></div></div>
        </div>
        
        <div id="login">   
          
          
          

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
			</div>
		</section>
		<!--End of Contact Section-->

		<!--Footer Section-->
				<?php include('footer.php'); ?>
