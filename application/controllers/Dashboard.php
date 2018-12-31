<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Public_panel {

    protected $tblUsers;

    public function __construct() {
        parent::__construct();
        $this->load->library(["form_validation"]);
        $this->load->helper(["common_helper"]);
        $this->load->model(["Crud_model"]);
        
        $this->tblUsers = "r_customer";

        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
    


    public function index() {
        $data = [];
        $this->load->view("dashboard/index", $data);
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

            if (count($result)) {
              $session = [
                'login_id' => $result->id,
                'fullname' => $result->fullname
              ];
              $this->session->set_userdata('logged_in', $session);
              pr($this->session->userdata('logged_in')); die;
              return TRUE;
            } else {
                $this->session->set_flashdata('loginMsg', 'Invalid username or password');
            }
        } else {
            return false;
        }
    }
    
    public function logout() {
        $all_data = $this->session->all_userdata();
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata($all_data);
        redirect('home', 'refresh');
    }
    
    

}
