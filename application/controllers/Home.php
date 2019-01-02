<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
                $this->load->helper(["common_helper"]);
                $this->load->model(['Crud_model']);
        }
	public function index()
	{
            $options = [
              'select' => "rp.sid,rp.title as ptitle, rp.inv, rp.description, rp.price, rp.discount_per, rpi.title",
              'table' => "r_product as rp",
              'join' => [
                ["r_product_images as rpi", "rp.sid = rpi.pid", "LEFT"]
              ],
              'where' => ["rpi.isdefault"=> 1,
                          "rp.status"=>1,
                          "rp.feature_product"=>1],
                'limit' =>["8","0"],
            ];
            $data['featureproducts'] = $this->Crud_model->fetch_result($options); //Featured products 
            
            $options = [
              'select' => "rp.sid,rp.title as ptitle, rp.inv, rp.description, rp.price, rp.discount_per, rpi.title",
              'table' => "r_product as rp",
              'join' => [
                ["r_product_images as rpi", "rp.sid = rpi.pid", "LEFT"]
              ],
              'where' => ["rpi.isdefault"=> 1,
                          "rp.status"=>1,
                          "rp.best_selling"=>1],
                'limit' =>["8","0"],
            ];
            $data['bestSell'] = $this->Crud_model->fetch_result($options); //Featured products 
            
	    $this->load->view('home',$data);
	}
}
