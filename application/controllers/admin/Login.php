<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	
		$this->load->helper('utility_helper');
        $this->load->model('Admin_model');
	

	}

	public function index()
	{
        $this->load->view('admin/login');
    }

         public function login()
        {
          

            $name = $this->input->post('username');
            $password = $this->input->post('password');
           

            if($user = $this->Admin_model->auth($name, $password))
            {
                $arrayName = array(
                   'user_id' => $user[0]->u_id,
                   'username' => $user[0]->u_name,
                   'img' => $user[0]->u_image,
                   'is_Admin_in' => 'yes',
                    'role' => $user[0]->u_rights
                   );

                $this->session->set_userdata($arrayName);
                redirect(admin_url().'dashboard');


            }
            else
            {
                $this->session->set_flashdata('error', 'Please enter correct username and password!!!');
                redirect(admin_url().'login');

            }

        }


         public function adminProfile()
        {
            $id = $this->session->userdata['user_id'];
              $data=$this->Admin_model->fetchAdmindata($id);
//            print_r($data[0]); die;
        $this->load->view('admin/admin_profile', $data[0]);

            
        }


}
