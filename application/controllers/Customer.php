<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	
		$this->load->helper('utility_helper');
        $this->load->model('Admin_model');
	

	}

	public function signUp()
	{
        $this->load->view('signUp');
    }

        public function wishlist()
    {
        $this->load->view('wishlist');
    }

         public function my_account()
    {
        $this->load->view('my_account');
    }
    

    function createUser()
    {
        //print_r($_POST); die;
        $name = $this->input->post('name');
        $email = $this->input->post('email');
         $pass = $this->input->post('pass'); 
        $cpass = $this->input->post('cpass'); 
        $mobile = $this->input->post('mobile'); 
        $address = $this->input->post('address'); 
        
      $data = array(
                'cust_full_name' => $name,
                'cust_email' => $email,
                'cust_password' => $pass,
                'cust_contact' => $mobile,
                'cust_address' => $address
        );

      if($pass == $cpass) {

            $user = $this->Admin_model->customerByEmail($email);

            if(count($user)==0){


              $userid =  $this->Admin_model->addnewCustomer($data);
            
            if($userid) {
                        $this->verifymail($name,$email,$userid);
                $this->session->set_flashdata('success', 'Thanks for signing up with us , Please verify your mail  to continue');
                redirect(base_url().'customer/signUp');
            } else {
                 
                $this->session->set_flashdata('error', 'There is some error while adding new customer');
                redirect(base_url().'customer/signUp');
            }

        }else{
            
                $this->session->set_flashdata('error', 'Email Id already Exist');
                redirect(base_url().'customer/signUp');
        }

         }
        else{
            
                $this->session->set_flashdata('error', 'Password and Confirm Password must be same');

                redirect(base_url().'customer/signUp');

        }

        }
    

/**  Email verify after signup*/
 function verifymail($name,$toemail,$userid)
    {

        $subject='Registration and Verification mail';

       $message='<div style="width:500px; margin:auto; font-family:Helvetica,Arial; font-size:13px; color:#333; line-height:18px; background:#fafafa; border:#F1F0F0 solid 1px; padding:10px 10px 0 10px;">

<div style="margin-bottom:35px;background:#fafafa; text-align:center;"><img src="'.logo_url().'" style="height:70px;" /></div>
<div class="mobile-br"  style="font-size:25px; line-height:34px; font-weight: 600; color: #2f982e; text-align:center;">&nbsp; Welcome to <b>'.project_name().'</b> <br><br> </div>
 <div style="font-size:24px; text-align:center;"> <br>Congratulations!!!<br><br> </div>
<div style="margin-bottom:20px;">Dear '.ucfirst(strtolower($name)).',</div>
<div style="margin-bottom:10px;">Thank you for registering at <b>'.project_name().'</b> !  <br><br>
You have successfully gone through the process of registration at <b>'.project_name().'</b>. Now You can start online shooping at '.project_name().' . <br><br></div>
 <div>

 <a href="'.base_url().'customer/activateaccount?em='.base64_encode($toemail).'&uid='.base64_encode($userid).'" style="background-color:#f5774e;color:#ffffff;display:inline-block;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none; text-align="center" target="_blank">Activate Account</a><br><br>



                     </div>';

$message .='
 <div style="text-align:left; font-size:13px;" class="mobile-center body-padding w320"><br>If you have any questions regarding <b>'.project_name().'</b> please read our FAQ or use our support form wallet email address. Our support staff will be more than happy to assist you.<br><br><br></div>
<div style="margin-bottom:20px;">
<br>
<b>With Best of Regards</b>,<br>
<b>Team '.project_name().'</b> <br>
</div>
<div style="background:#1a1a1a; padding:10px; width:100%; color:#fff; box-sizing: border-box; text-align:center;">
<div style="font-size:18px; font-weight:bold; margin-bottom:5px;"><b>'.project_name().'</b></div>
<div style="margin-bottom:10px;"><b>'.base_url().'</b></div>

</div></div>';

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
        $this->email->to($toemail);

        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->send();

    }




    public function activateaccount()
    {

       if($this->input->get('em')!=false && $this->input->get('uid')!=false)
        {
            $email=base64_decode($this->input->get('em'));
            $uid=base64_decode($this->input->get('uid'));
            if($this->Admin_model->activateaccount($email,$uid))
            {
                 $this->session->set_flashdata('success', 'Your account has been verified successfully.');
                redirect(base_url().'customer/signUp');
                
                
            }else{ 
                $this->session->set_flashdata('error', 'Error occured while verify your email !!!');

               
            }
        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters !!!");
        }

        redirect(base_url().'customer/signUp');
                
    }


    
    public function login()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
           

            if($user = $this->Admin_model->customerLogin($email, $password))
            {
              $arrayName = array(
                   'cust_id' => $user[0]->cust_id,
                   'cust_full_name' => $user[0]->cust_full_name,
                   'cust_email' => $user[0]->cust_email,
                   'cust_address' =>  $user[0]->cust_address,
                   'cust_contact' =>  $user[0]->cust_contact
                   );
              $this->session->set_userdata($arrayName);
               $this->session->set_flashdata('success', 'successfully Logged In!!!');
               redirect(base_url().'customer/signUp');


            }
            else
            {
               $this->session->set_flashdata('error', 'Please enter correct username and password!!!');
               redirect(base_url().'customer/signUp');

            }

        }


         public function adminProfile()
        {
            $id = $this->session->userdata['user_id'];
              $data=$this->Admin_model->fetchAdmindata($id);
//            print_r($data[0]); die;
        $this->load->view('admin/admin_profile', $data[0]);

            
        }
      public function logout(){
        session_destroy();
        unset($_SESSION);
        redirect(base_url());
    }
}
