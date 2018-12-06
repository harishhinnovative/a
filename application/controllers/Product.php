<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
		error_reporting(0);
		$this->load->model('Admin_model');

       
    }


	public function product_catalog($id)
	{	
		$data['id']= $id;
		$this->load->view('product_catalog',$data);
	}



		public function product_detail($id)
	{
		$data=$this->Admin_model->fetchParticularProduct($id);
		$this->load->view('product_detail',$data[0]);
	}



		public function product_detail_search()
	{
		 	$pro_name = $this->input->post('pro_name');
		$data=$this->Admin_model->fetchParticularProductByName($pro_name);
		$this->load->view('product_detail',$data[0]);
	}



		public function view_cart()
	{
		$this->load->view('shopping_cart');
	}

		public function checkout()
	{
		$this->load->view('checkout');
	}



	public function addToCart($id)
	{

		$pro =$this->Admin_model->fetchParticularProduct($id);

			if($this->input->post('qty')){
		$qty = $this->input->post('qty');
	}else{
		$qty = 1;
	}

		$data = array(
		'id'      => $id,
		'qty'     => $qty,
		'price'   => $pro[0]->pro_price,
		'name'    => $pro[0]->pro_name,
		'img'    => $pro[0]->pro_image,
		'options' => array('Size' => 'L', 'Color' => 'Red')
		);

		$this->cart->insert($data);

		print_r(json_encode($this->cart->contents()));
	
	}



	public function removeFromCart($id)
			{

		
			$this->cart->remove($id);


			print_r(json_encode($this->cart->contents()));
			}



	public function clearCart()
			{

			$this->cart->destroy();
			print_r(json_encode($this->cart->contents()));
			}


public function cartTotal()
			{
			$total_items = $this->cart->total_items();	
			$total = $this->cart->total();

			print_r($total_items.' item(s) : Rs. '.$total);
			}



function search()
    {
if (isset($_GET['term'])){
  $term = $_GET['term'];
      $return1 =  $this->Admin_model->getallproduct($term);
       // $return_arr = array("used","dfsd","sdsas");
 foreach ($return1 as $key => $value)
   {
          $return_arr[] =  $value['pro_name'];
      }


}
else{
  $return_arr = array("used","dfsd");
}
     echo json_encode($return_arr);



    }


	public function checkoutCod()

		{
			if(isset($this->session->userdata['cust_id'])){

		$cust_name = $this->input->post('cust_name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile'); 
        $address = $this->input->post('address'); 
        $city = $this->input->post('city'); 
        $zip_code = $this->input->post('zip_code'); 
        $comment = $this->input->post('comment'); 

        $cust_id = $this->session->userdata['cust_id'];

        $invoice_id = uniqid();

        $amount = $this->cart->total();
			
		if($this->input->post('payment_type')=='cod'){	
	

		$cartItem  = $this->cart->contents();
                      foreach ($cartItem as $key => $value) {
			$data = array(
				'order_invoice_id' => $invoice_id,
                'o_customer_id' => $cust_id,
                'o_cust_name' => $cust_name,
                'o_cust_email' => $email,
                'o_cust_contact' => $mobile,
                'shipping_address1' => $address,
                'shipping_city' => $city,
                'shipping_pincode' => $zip_code,
                 'order_comment' => $comment,
                'o_payment_method'=>'Cash On Delivery',
                 'o_pro_id' => $value['id'],
                 'order_item' => $value['name'],
                 'order_quantity' => $value['qty'],
                 'order_total' => $value['subtotal']
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
           }else{


	    	//payumoney details
	    
	   // $MERCHANT_KEY = "gtKFFx";
	     	$MERCHANT_KEY = "rjQUPktU"; //change  merchant with yours
	        $SALT 		  = "e5iIg1jwi8";  //change salt with yours 

	        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	        //optional udf values 
	       	$udf1 = $address;
	        $udf2 = $city;
	        $udf3 =  $zip_code;
	        $udf4 = $comment;

	      
	     $product_info = 'product Item';
	        
	         $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $cust_name . '|' . $email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|||||||' . $SALT;
	         $hash = strtolower(hash('sha512', $hashstring));
	         
	        $success = base_url() . 'Status';  
	        $fail = base_url() . 'Status';
	        $cancel = base_url() . 'Status';
	        
	        
	         $data = array(
	            'mkey' => $MERCHANT_KEY,
	            'tid' => $txnid,
	            'hash' => $hash,
	            'amount' => $amount,           
	            'name' => $cust_name,
	            'productinfo' => $product_info,
	            'mailid' => $email,
 
	           	'phoneno' => $mobile,
	           	'address' => $address,
                'city' 	  => $city,
                'zip_code' => $zip_code,
                'comment' => $comment,
	            
	            'action' => "https://test.payu.in", //for live change action  https://secure.payu.in
	            'sucess' => $success,
	            'failure' => $fail,
	            'cancel' => $cancel            
	        );

	        $this->load->view('booking_confirmation', $data);   



           } }else {
                 
                $this->session->set_flashdata('error', 'Please Login first');
                redirect(base_url().'product/checkout');
            }

			
		}




	}
