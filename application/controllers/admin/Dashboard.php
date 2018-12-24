<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(['utility_helper',"common_helper"]);
        $this->load->model('Admin_model');

        if ($this->session->userdata('user_id') == false || $this->session->userdata('is_Admin_in') == false) {
            redirect(admin_url() . 'logout');
        }
    }

    public function index() {
        $this->load->view('admin/dashboard');
    }

}
