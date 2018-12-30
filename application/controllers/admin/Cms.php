<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {
    
    protected $tbl_cms;
    
    protected $current_time;

    protected $cms_upload_dir;

    protected $cms_img_size;


    public function __construct() {
        parent::__construct();
        $this->load->helper(['utility_helper', "common_helper", "pagination_helper"]);
        $this->load->library(['pagination']);
        $this->load->model(['Admin_model', 'Crud_model']);
        
        $this->current_time = time();
        $this->tbl_cms = "r_cms";

        $this->cms_upload_dir = "uploads/cms";
        
        $this->cms_img_size = [
          "thumb"  => [
             "h" => 64,
             "w" => 64,
          ],
          "big"  => [
             "h" => 500,
             "w" => 500,
          ],
        ];
        
    }


/*
 * index to list all web pages
 * 
 */
  public function index() {
    $data = [];
    $pagging = getPaginationConfig(); // get pagging config from helper
    $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
    $offset = $this->input->get('offset', true);

    $rows = $pagging['per_page'];
    // calculate offset
    if ($page) {
      $offset = (int)$rows * ((int)($page)-1);
    }
    $data['rowSerialNumber'] = $offset;

    $optionCount = [
      "select" => "a.sid",
      "table" => "{$this->tbl_cms} as a",
      "count" => true,
    ];
    $total_rows = $this->Crud_model->fetch_result($optionCount);
    
    $option = [
      "select" => "a.sid, a.title, a.description, a.image as imagename, a.status, ",
      "table" => "{$this->tbl_cms} as a",
      "order" => ["sid" => "DESC"],
      "limit" => [$rows, $offset],                
    ];
    $data['results'] = $this->Crud_model->fetch_result($option);
    $data['image_url'] = base_url($this->cms_upload_dir);

    $queryString = "";

    $pagging['base_url'] = admin_url() ."cms/index?$queryString"; // $_SERVER['QUERY_STRING'];
    $pagging['per_page'] = $rows;
    $pagging['total_rows'] = $total_rows;
    $this->pagination->initialize($pagging);
    $data['links'] = $this->pagination->create_links();
    
    $this->load->view('admin/cms/list', $data);
  }


/*
 * add new product
 * 
 */
  public function add() {
      
    $data['image_url'] = base_url($this->cms_upload_dir);

    if($post = $this->input->post()) {
        $insertData =[
            "title" => $post["title"],
            "weburl" => strToUrl($post["title"]),
            "description" => $post["description"],
            "status" => $post["status"],
            "created_at" => $this->current_time,
        ];
        $id = $this->Crud_model->insert_row($this->tbl_cms, $insertData); // insert into product table
        if($id) {
            if(!empty($_FILES['imagefile']['name'])){
                mkdir($this->cms_upload_dir . "/{$id}", 0777 , true); // create new directory with category id
                $files = $_FILES;
                $filename = $ext = "";

                $config = array();
                $config['upload_path']      = './' . $this->cms_upload_dir . "/{$id}";

                $ext = pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);
                $filename = $this->current_time  .'.'. $ext;
                $config['file_name']        = $filename ;
                $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
                $config['file_ext_tolower'] = true;
                $config['max_size']         = 2048;
                $config['max_width'] 	= 1800;
                $config['max_height'] 	= 1800;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('imagefile')) {
                    $data = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    // resize the image here
                    $this->load->library('image_lib');
                    foreach ($this->cms_img_size as $key => $value) {
                        if(!is_dir($this->cms_upload_dir . "/{$id}/{$key}")) {
                          mkdir($this->cms_upload_dir . "/{$id}/{$key}", 0777 , true); // create new directory with category id
                        }
                        $config = array(
                            'source_image'      => $this->cms_upload_dir . "/{$id}/{$filename}", //path to the uploaded image
                            'new_image'         => $this->cms_upload_dir . "/{$id}/{$key}", //path to
                            'maintain_ratio'    => true,
                            'width'             => $this->cms_img_size[$key]["w"],
                            'height'            => $this->cms_img_size[$key]["h"]
                        );
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }
                    // update image name
                    $this->Crud_model->update_row($this->tbl_cms, ['image'=> $filename], ["sid"=> $id]); // 
                }
            }
            
            $err = ($data['error']) ? " But unexpected error occured : ".$data['error'] : "";
            $this->session->set_flashdata('success', 'Item added successfully.' . $err);
            redirect(admin_url().'cms');
        }
    }
    $this->load->view('admin/cms/add', $data);
  }


/*
 * Edit Page
 * 
 */
  public function edit($id) {

    $data['image_url'] = base_url($this->cms_upload_dir);

    $option = [
      "select" => "a.sid, a.title, a.status, a.image as imagename, a.description",
      "table" => "{$this->tbl_cms} as a",
      "single" => true,
      "where" => ["a.sid"=> $id]
    ];
    $data['cms'] = $this->Crud_model->fetch_result($option);

    if($post = $this->input->post()) {
        $insertData =[
            "title" => $post["title"],
            "weburl" => strToUrl($post["title"]),
            "description" => $post["description"],
            "status" => $post["status"],
            "updated_at" => $this->current_time,
        ];

        if(!empty($_FILES['imagefile']['name'])){

            exec("rm uploads/cms/$id/* -rf"); // remove product images too
            
            $filename = $ext = "";

            $config = array();
            $config['upload_path']      = './' . $this->cms_upload_dir . "/{$id}";

            $ext = pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);
            $filename = $this->current_time .'.'. $ext;
            $config['file_name']        = $filename ;
            $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
            $config['file_ext_tolower'] = true;
            $config['max_size']         = 2048;
            $config['max_width'] 	= 1800;
            $config['max_height'] 	= 1800;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imagefile')) {
                $data = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());

                // resize the image here
                $this->load->library('image_lib');
                foreach ($this->cms_img_size as $key => $value) {
                    if(!is_dir($this->cms_upload_dir . "/{$id}/{$key}")) {
                      mkdir($this->cms_upload_dir . "/{$id}/{$key}", 0777 , true); // create new directory with category id
                    }
                    $config = array(
                        'source_image'      => $this->cms_upload_dir . "/{$id}/{$filename}", //path to the uploaded image
                        'new_image'         => $this->cms_upload_dir . "/{$id}/{$key}", //path to
                        'maintain_ratio'    => true,
                        'width'             => $this->cms_img_size[$key]["w"],
                        'height'            => $this->cms_img_size[$key]["h"]
                    );
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                }
            }
            $insertData['image'] = $filename;
        }
        
        $this->Crud_model->update_row($this->tbl_cms, $insertData, ["sid"=> $id]);
        
        $this->session->set_flashdata('success', 'Item updated successfully.');
        redirect(admin_url().'cms');
    }
    $this->load->view('admin/cms/add', $data);
  }


/*
 * Delete product
 * 
 */
  public function delete($id='') {
    if(!empty($id)) {
        if($this->Crud_model->delete_row($this->tbl_cms, ['sid'=> $id])) {
            exec("rm uploads/cms/$id -rf"); // remove product images too
            $this->session->set_flashdata('success', 'Item deleted successfully.');
            redirect(admin_url().'cms');
        }
    } else {
        $this->session->set_flashdata('error', 'Bad Request');
        redirect(admin_url().'cms');
    }
  }


    // enable disable product
    public function enabledisable($id, $status) {
        if ($status == 0) {
            $sta = 'disabled';
        } else {
            $sta = 'enabled';
        }
        if ($this->Crud_model->update_row($this->tbl_cms, ['status'=> $status], ["sid"=> $id])) {
            $this->session->set_flashdata('success', 'Status has been ' . $sta . ' successfully.');
        } else {
            $this->session->set_flashdata('error', 'Error occured while ' . $sta . ' item.');
        }
        redirect('admin/cms');
    }


}
