<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relic extends Public_panel {
    
    protected $tblUsers;
    

    public function __construct() {
        parent::__construct();
        $this->load->helper(["common_helper"]);
        $this->load->model(["Crud_model"]);
        $this->tblUsers = "r_customer";
    }

    public function index() {
        $user = getUserSess(); // get the user session if logged in
        $data['loggedin'] = !empty($user) ? true : false;

        // if user logged in then get all user details
        if($data['loggedin']) {
            $option = [
              "select"  => "a.id, a.fullname, a.email, a.phone",
              "table"  => "{$this->tblUsers} as a",
              "where"  => ["id" => $user['login_id']],
              "single"  => true,
            ];
            $result = $this->Crud_model->fetch_result($option);
            
            $data['user'] = array_merge($user, (array)$result);
        }
//            pr($data['user']); die;
//        $data['user'] = ($data['loggedin']) ? $user : [];
        
        $this->load->view('relic/products', $data);
    }

}
