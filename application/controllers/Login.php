<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Public_panel {

    protected $tblUsers;

    public function __construct() {
        parent::__construct();
        $this->load->library(["form_validation"]);
        $this->load->helper(["common_helper"]);
        $this->load->model(["Crud_model"]);
        
        $this->tblUsers = "r_customer";
    }
    


    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('dashboard'));
        }
        $data = [];
        if($post = $this->input->post()) {
//            pr($post);
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("loginMsg", validation_errors());
            } else {
                //Go to dashboard
                if ($this->doLogin($post['email'], $post['password'])) {
                    redirect(base_url('dashboard'));
                }
            }
        } else {
            
        }
        $this->load->view("login/index", $data);
    }
    
    
    private function doLogin($email, $pass) {
        if(!empty($email) && !empty($pass)) {
            if (strpos($email, "'") === FALSE && strpos($email, '"') === FALSE && strpos($email, '`') === FALSE) {
                $options = [
                    "select" => "id, fullname ",
                    "table" => $this->tblUsers,
                    "where" => ["email"=> $email, "password"=> md5($pass)],
                    "single" => true
                ];
                $result = $this->Crud_model->fetch_result($options);
            }

            if (($result)) {
              $session = [
                'login_id' => $result->id,
                'fullname' => $result->fullname
              ];
              $this->session->set_userdata('logged_in', $session);
              return TRUE;
            } else {
                $this->session->set_flashdata('loginMsg', 'Invalid username or password');
            }
        } else {
            return false;
        }
    }
    
    /*
     * User logout
     */
    public function logout() {
//        $all_data = $this->session->all_userdata();
//        $this->session->unset_userdata($all_data);
        $this->session->unset_userdata('logged_in');
        redirect(base_url('home'));
    }

    
    /*
     * User Register form
     */
    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('dashboard'));
        }
        $data = [];
        if($post = $this->input->post()) {
//            pr($post);
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data[] = "";
                $this->session->set_flashdata("errorMsg", validation_errors());
            } else {
                if($this->Crud_model->fetch_result(["select"=> "id", "table"=> $this->tblUsers, "where"=>["email"=> $post['email']], "single"=> true])) {
                  $this->session->set_flashdata("errorMsg", "Given E-mail is already registered.");
                } else {
                  $insert = [
                    "fullname"  => $post['fullname'],
                    "email"  => $post['email'],
                    "password"  => md5($post['password']),
                    "status"  => 0,
                    "created"  => time(),
                  ];
                  $insertedId = $this->Crud_model->insert_row($this->tblUsers, $insert);
                    $session = [
                      'login_id' => $insertedId,
                      'fullname' => $post['fullname']
                    ];
                    $this->session->set_userdata('logged_in', $session);
                    redirect(base_url('dashboard'));
                }
            }
        }
        $this->load->view("login/register", $data);
    }
    

}
