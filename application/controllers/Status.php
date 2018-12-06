<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

	public function index() {
       $status = $this->input->post('status');
      if (empty($status)) {
            redirect(base_url());
        }



      $address        = $this->input->post('udf1');
      $city       = $this->input->post('udf2'); 
      $zip_code          = $this->input->post('udf3');
      $comment          = $this->input->post('udf4');

        $firstname    = $this->input->post('firstname');
        $amount       = $this->input->post('amount');
        $phone       = $this->input->post('phone');
        $txnid        = $this->input->post('txnid');
        $posted_hash  = $this->input->post('hash');
        $key          = $this->input->post('key');
        $productinfo  = $this->input->post('productinfo');
        $email        = $this->input->post('email');
        $salt         = "e5iIg1jwi8"; //  Your salt
        $add          = $this->input->post('additionalCharges');



        if(isset($add)) {
            $additionalCharges = $this->input->post('additionalCharges');
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||' . $comment . '|' . $zip_code . '|' . $city . '|' . $address . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq =  $salt . '|' . $status . '|||||||' . $comment . '|' . $zip_code . '|' . $city . '|' . $address . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }

         $data['hash'] = hash("sha512", $retHashSeq);
          $data['amount'] = $amount;
          $data['txnid'] = $txnid;
          $data['posted_hash'] = $posted_hash;
          $data['status'] = $status;

          if($status == 'success'){
 $invoice_id = uniqid();
 $cust_id = $this->session->userdata['cust_id'];

    $cartItem  = $this->cart->contents();
                      foreach ($cartItem as $key => $value) {
      $data = array(
                'order_invoice_id' => $invoice_id,
                'o_customer_id' => $cust_id,
                'o_cust_name' => $firstname,
                'o_cust_email' => $email,
                'o_cust_contact' => $phone,
                'shipping_address1' => $address,
                'shipping_city' => $city,
                'shipping_pincode' => $zip_code,
                 'order_comment' => $comment,
                'o_payment_method'=>'Online',
                 'o_pro_id' => $value['id'],
                 'order_item' => $value['name'],
                 'order_quantity' => $value['qty'],
                 'order_total' => $value['subtotal'],
                 'o_txn_id ' => $txnid
                );


              $userid =  $this->Admin_model->addOrder($data);
            
            }

            if($userid) {
                       // $this->verifymail($name,$email,$userid);
              $this->cart->destroy();
                $this->session->set_flashdata('success', 'Your Order has been placed successfully');
                redirect(base_url().'product/checkout');
            } else {
                 
                $this->session->set_flashdata('error', 'There is some error while placing your order');
                redirect(base_url().'product/checkout');
            }

          }

         else{
              $this->load->view('failure', $data); 
         }
     
    }
 


       public function confirmationmail($bid,$firstname,$property,$checkin,$checkout,$roomtype1,$no_of_rooms,$adult,$child,$rn,$tax,$amount,$email)
    {

        $subject='Booking Confirmation';

       

$message ='
 <table border="0" cellpadding="0" cellspacing="1" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Dear '.$firstname.',</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="100%">
                        Thank you for your booking made through <a href="http://www.cubagoa.com" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.cubagoa.com&amp;source=gmail&amp;ust=1524810318167000&amp;usg=AFQjCNEQRJS12TWtL6AIW5beYm_iRPd9Vw">www.cubagoa.com</a>. Your booking is confirmed.</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        <strong>Please print this confirmation and present it upon check-in the hotel</strong>.</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table border="0" cellpadding="0" cellspacing="0" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;padding:3px;width:100%">
                  <tbody>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="22%">
                        Your Booking Ref No &nbsp;&nbsp;</td>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="78%">
                        : <span style="background:#ffff00;color:#000000"><strong>'.$bid.'</strong></span></td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Your Name</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : '.$firstname.'</td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Your Email&nbsp;</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : <a href="mailto:iftakharahmad3@gmail.com" target="_blank"><strong>'.$email.'</strong></a></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <h3 style="color:#ff0000;font-size:16px">
                  <strong>BOOKING INFORMATION</strong></h3>
                <h4>
                  Hotel Information</h4>
                <table border="0" cellpadding="0" cellspacing="0" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;padding:3px;width:100%">
                  <tbody>
                    <tr>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="22%">
                        Hotel Name &nbsp;&nbsp;</td>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="78%">
                        : <strong style="color:#ff0000">'.$property.'</strong></td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Hotel Address</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : SOUTH END OF AGONDA BEACH, SOUTH GOA,AGONDA BEACH,Goa,India.</td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Postal Code &nbsp;</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : 403702</td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Telephone&nbsp;</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : 91 832 2647777 (HOTEL DIRECTION)</td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Fax&nbsp;</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : </td>
                    </tr>
                    <tr>
                      <td style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Email&nbsp;</td>
                      <td height="20" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        : <a href="mailto:info@cubagoa.com" target="_blank"><strong>info@cubagoa.com</strong></a></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
                <h4>
                  Your Reservation Details</h4>
                <table border="0" cellpadding="0" cellspacing="1" style="border:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="42%">
                        <strong>Check-in Date</strong></td>
                      <td style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="36%">
                        <strong>Check-out Date</strong></td>
                      <td style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="22%">
                        <strong>Nights</strong></td>
                    </tr>
                    <tr>
                      <td height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        '.$checkin.'</td>
                      <td height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        '.$checkout.'</td>
                      <td style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        2</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table border="0" cellpadding="0" cellspacing="1" style="border:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="22%">
                        <strong>Rate Plan </strong></td>
                      <td style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="27%">
                        <strong>Guest(s)</strong></td>
                      <td bgcolor="#666666" height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;display:none;vertical-align:top;vertical-align:top" width="27%">
                        <font color="#ffffff"><strong>Package </strong></font></td>
                      <td bgcolor="#666666" height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;display:none;vertical-align:top;vertical-align:top" width="22%">
                        <font color="#ffffff"><strong>Promotion </strong></font></td>
                      <td style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff" width="24%">
                        <strong>Rooms</strong></td>
                    </tr>
                    <tr>
                      <td height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;vertical-align:top">
                       '.$roomtype1.'</td>
                      <td style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;vertical-align:top">
                       '.$adult.' Adult(s), '.$child.' Child(s)<br>&nbsp;</td>
                      <td height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;display:none;vertical-align:top;vertical-align:top">
                        <font style="font-weight:normal"><br></font></td>
                      <td height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;display:none;vertical-align:top;vertical-align:top">
                        <font style="font-weight:normal"><br></font></td>
                      <td style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" valign="top">
                        '.$no_of_rooms.'<br>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table border="0" cellpadding="0" cellspacing="1" style="border:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%;display:none" width="100%">
                  <tbody>
                    <tr>
                      <td height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:52%">
                        <strong>Inclusion charge</strong></td>
                      <td align="right" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;width:48%;padding-right:7px">
                        <strong>Charge rate </strong></td>
                    </tr>
                    <tr>
                      <td height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        </td>
                      <td align="right" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;padding-right:5px" valign="top">
                        </td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table border="0" cellpadding="0" cellspacing="1" width="100%">
                  <tbody>
                    <tr>
                      <td height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:25%">
                        <strong>Arrival By</strong></td>
                      <td align="left" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;width:25%;padding-right:7px">
                        <strong>Room Number </strong></td>
                      <td align="left" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;width:25%;padding-right:7px">
                        <strong>Arrival date </strong></td>
                      <td align="left" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;width:25%;padding-right:7px">
                        <strong>Time </strong></td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        '.$firstname.'</td>
                     <td align="left" height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        '.$rn.'</td>
                      <td align="left" height="23" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        '.$checkin.'</td>
                      <td align="left" style="padding-left:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;padding-right:5px" valign="top">
                        03:00:00 AM</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table border="0" cellpadding="0" cellspacing="1" style="border:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td height="25" style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="35%">
                        <strong>Details</strong></td>
                      <td style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="33%">
                        &nbsp;</td>
                      <td style="background:#666666 none repeat scroll 0% 0%;padding-left:12px;color:#ffffff;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="32%">
                        <strong>Total Rate </strong></td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc">
                        <strong>A :</strong> Total Room Charge</td>
                      <td height="23" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                      <td align="right" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Rs '.$amount.' </td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc">
                        <strong>B :</strong> Total Tax</td>
                      <td height="23" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                      <td align="right" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Rs '.$tax.' </td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="border-top:1px solid #cccccc;padding-left:12px">
                        <strong>C :</strong> Inclusions including Tax</td>
                      <td height="23" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                      <td align="right" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Rs 0.00 </td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="border-top:1px solid #cccccc;padding-left:12px">
                        <strong>D :</strong> Adjustment</td>
                      <td height="23" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                      <td align="right" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Rs 0.00 </td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="border-top:1px solid #cccccc;padding-left:12px">
                        Total Payble Amount <strong>[ A   B   C   D ] </strong></td>
                      <td height="23" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                      <td align="right" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        <span style="background:#ffff00;color:#000000"><strong>Rs '.$amount.' </strong></span></td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="border-top:1px solid #cccccc;padding-left:12px">
                        Amount Due on Arrival at <strong>CUBA AGONDA</strong></td>
                      <td height="23" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        &nbsp;</td>
                      <td align="right" style="padding-left:12px;border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        <span style="background:#ffff00;color:#000000"><strong>Rs 0.00 </strong></span></td>
                    </tr>
                    <tr>
                      <td align="left" colspan="6" height="23" style="border-top:1px solid #cccccc;padding-right:12px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;padding-left:12px">
                        <p>
                          <strong>Special Requirements : </strong>.</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <h5 style="font-family:Verdana,Arial,Helvetica,sans-serif;color:#ff0000;font-size:14px">
                  Important Notes</h5>
                <table border="0" cellpadding="0" cellspacing="1" style="border:1px solid #cccccc;border-collapse:collapse;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc">
                        1.</td>
                      <td colspan="2" height="23" style="border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        You are due to arrive the property at 12:15:00 AM.</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc">
                        2.</td>
                      <td colspan="2" height="23" style="border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Hotel Check in time : <strong>01:00 PM</strong>&nbsp;Hotel check out time : <strong>10:00 AM</strong></td>
                    </tr>
                  </tbody>
                </table>
                <h5 style="font-family:Verdana,Arial,Helvetica,sans-serif;color:#ff0000;font-size:14px">
                  Terms &amp; Conditions</h5>
                <table border="0" cellpadding="0" cellspacing="1" style="border:1px solid #cccccc;border-collapse:collapse;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc" width="4%">
                        1.</td>
                      <td height="23" style="border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="96%">
                        For any changes to your existing reservation please contact <strong>the hotel </strong><strong>(<a href="mailto:info@cubagoa.com" target="_blank"> info@cubagoa.com </a>)</strong> directly.</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc" valign="top">
                        2.</td>
                      <td height="23" style="border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        For cancellations to your existing reservation, please notify <strong>the hotel&nbsp;</strong><strong>( <a href="mailto:info@cubagoa.com" target="_blank">info@cubagoa.com</a>&nbsp;) </strong>directly at least 24 hours prior to arrival; unless otherwise stated in the Hotel Policies below.</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc" valign="top">
                        3.</td>
                      <td height="23" style="border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Should your credit card expire or your credit card details change prior to arrival, please contact the hotel directly with the amended details.</td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="padding-left:12px;border-top:1px solid #cccccc">
                        4.</td>
                      <td height="23" style="border-top:1px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        The hotel reserves the right to pre-authorise your credit cards prior to arrival.</td>
                    </tr>
                  </tbody>
                </table>
                <h5 style="font-family:Verdana,Arial,Helvetica,sans-serif;color:#ff0000;font-size:14px">
                  Hotel Policies</h5>
                <table border="0" cellpadding="0" cellspacing="1" style="border:0px solid #cccccc;border-collapse:collapse;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="100%">
                        <div style="text-align:justify"><br>  <span style="font-family:verdana,geneva,sans-serif">- All mentioned prices are in INR (Indian rupees).<br><br>  - All prices are subject to availability.<br><br> - &nbsp;Prices are subject to change without notice.<br><br>  - Luxury tax and service tax applicable as per government of India regulations.<br><br> - Valid photo ID proof issued by Government is compulsory for all occupants including sharer. It is mandatory to produce ID at the time of check in.<br><br>  - Complimentary breakfast (in case the guests are entitled for) will be served as per Breakfast Menu between 08:30 AM to 10:30 AM only.</span></div></td>
                    </tr>
                  </tbody>
                </table>
                <h5 style="font-family:Verdana,Arial,Helvetica,sans-serif;color:#ff0000;font-size:14px">
                  Cancellation Policy</h5>
                <table border="0" cellpadding="0" cellspacing="1" style="border:0px solid #cccccc;border-collapse:collapse;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="100%">
                        1. Any Cancellation request received up to 8 days prior check in will not attract any cancellation fees.<br>2. Any Cancellation request received from 07 days to 01 days prior to check in will attract 01 night retention charges.<br>3. Any cancellation on the day of check-in will be non refundable.<br>4. No show , early check out will be non refundable.<br><br>Peak Season Cancellation ( 20th December to 5th January)<br>1. Bookings once made will not be NON-REFUNDABLE, NON-AMENDABLE</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
                <table border="0" cellpadding="0" cellspacing="1" style="border:0px solid #cccccc;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;width:100%">
                  <tbody>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px" width="100%">
                        <strong>Wishing you a pleasant stay!</strong></td>
                    </tr>
                    <tr>
                      <td align="left" height="23" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                        Mr. Dharmesh</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
                <p align="center" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
                  <span style="font-family:Verdana,Arial,Helvetica,sans-serif;color:#ff0000;font-size:12px"><strong>*</strong></span><strong>This is for your record only. Please do not reply to this email<span style="font-family:Verdana,Arial,Helvetica,sans-serif;color:#ff0000;font-size:12px">*</span></strong></p>';        

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = sending_mail();
        $config['smtp_pass']    = sending_mail_pass();
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; 
        $config['validation'] = TRUE;

        $this->load->library('email',$config);

        $this->email->from(sending_mail(), project_name());
        $this->email->to($email); 

        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->send();
            
    }


    
   }
