<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper','adminmsg');
        $this->load->model('Admin_model');
    }
    public function adminProfile()
    {
        $id   = $this->session->userdata['user_id'];
        $data = $this->Admin_model->fetchAdmindata($id);
        //            print_r($data[0]); die;
        $this->load->view('admin/admin_profile', $data[0]);
        
        
    }
    #*** User insertion 
    #** 7 Sep 18
    public function subUserProfile()
    {
        //Check if user exist
        $userExist = $this->Admin_model->ifUserExist($this->input->post('sub_name'));
        if (count($userExist) > 0) {
            $this->session->set_flashdata('error', USER_EXIST);
            redirect(admin_url() . 'Admin_profile/users');
        } else {
            //Password and confirm password if not match
            if ($this->input->post('sub_password') != $this->input->post('sub_conPassword')) {
                $this->session->set_flashdata('error', CONFIRM_PASSWORD);
                redirect(admin_url() . 'Admin_profile/users');
                return;
            }
            $config['upload_path']   = './assets/admin/assets/img/profile';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 30000;
            
            $this->load->library('upload', $config);
            if ($_FILES['sub_image']['size'] > 0) {
                if (!$this->upload->do_upload('sub_image')) {
                    
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(admin_url() . 'Admin_profile/users');
                    
                } else {
                    $data    = array(
                        'upload_data' => $this->upload->data()
                    );
                    $u_image = $this->upload->data('file_name');
                    
                    //image upload end
                }
            } else {
                $u_image = $this->input->post('sub_image1');
                
            }
            //image upload end
            $payload = array(
                'u_name' => $this->input->post('sub_name'),
                'u_password' => $this->input->post('sub_password'),
                'u_mobile' => $this->input->post('sub_mobile'),
                'u_status' => $this->input->post('sub_status'),
                'u_rights' => $this->input->post('sub_role'),
                'u_image' => $u_image,
                'u_created'=> time()
            );
            
            $userid = $this->Admin_model->insertSubUser($payload);
            if ($userid) {
                $this->session->set_flashdata('success', 'Sub User is added successfully');
                redirect(admin_url() . 'Admin_profile/users');
            } else {
                $this->session->set_flashdata('error', 'There is some error while adding new Sub User');
                redirect(admin_url() . 'Admin_profile/users');
            }
        }
    }
    /**View for Subuser Form */
    public function users()
    {
        $this->load->view('admin/users');
    }
    
    public function changePassword()
    {
        
        
        $this->load->view('admin/changePassword');
        
        
    }
    
    
    public function updatePassword()
    {
        $id        = $this->session->userdata['user_id'];
        $curr_pass = $this->input->post('curr_pass');
        $new_pass  = $this->input->post('new_pass');
        $con_pass  = $this->input->post('con_pass');
        
        
        $data = $this->Admin_model->fetchAdmindata($id);
        
        if ($con_pass != $new_pass) {
            $this->session->set_flashdata('error', 'new password and confirm new password does not match');
            redirect(admin_url() . 'Admin_profile/changePassword');
        } elseif ($curr_pass != $data[0]->u_password) {
            $this->session->set_flashdata('error', 'current password does not match');
            redirect(admin_url() . 'Admin_profile/changePassword');
        } else {
            
            if ($this->Admin_model->updatePassword($id, $new_pass)) {
                $this->session->set_flashdata('success', 'password updated successfully');
                redirect(admin_url() . 'Admin_profile/changePassword');
            } else {
                $this->session->set_flashdata('error', 'There is some error while updateing password');
                redirect(admin_url() . 'Admin_profile/changePassword');
            }
            
        }
        
        
    }
    
    public function updateProfile()
    {
        $u_name   = $this->input->post('u_name');
        $u_mobile = $this->input->post('u_mobile');
        $u_status = $this->input->post('u_status');
        
        $u_id     = $this->input->post('u_id');
        $u_image1 = $this->input->post('u_image1');
        
        
        
        //image upload start
        $config['upload_path']   = './assets/admin/assets/img/profile';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 30000;
        
        $this->load->library('upload', $config);
        if ($_FILES['u_image']['size'] > 0) {
            if (!$this->upload->do_upload('u_image')) {
                
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(admin_url() . 'Admin_profile/adminProfile');
            } else {
                $data    = array(
                    'upload_data' => $this->upload->data()
                );
                $u_image = $this->upload->data('file_name');
                
                //image upload end
            }
        } else {
            $u_image = $u_image1;
            
        }
        
        if ($this->Admin_model->updateProfile($u_name, $u_mobile, $u_status, $u_id, $u_image)) {
            $this->session->set_flashdata('success', 'Admin Detail has been updated successfully.');
            redirect(admin_url() . 'Admin_profile/adminProfile');
        } else {
            $this->session->set_flashdata('error', 'Error occurred while update Admin  detail !!!');
            redirect(admin_url() . 'Admin_profile/adminProfile');
        }
        $this->session->set_flashdata('error', 'Error occurred while update Admin detail !!!');
        
        
        redirect(admin_url() . 'Admin_profile/adminProfile');
        
        
    }
    
    
    
}