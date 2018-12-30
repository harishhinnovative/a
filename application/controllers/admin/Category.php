<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_panel {
    
    protected $tbl_category;
    
    protected $current_time;

    protected $category_upload_dir;
    
    protected $category_img_size;

    

    public function __construct() {
        parent::__construct();
        $this->load->helper(['utility_helper', "common_helper", "pagination_helper"]);
        $this->load->library(['pagination']);
        $this->load->model(['Admin_model', 'Crud_model']);
        
        $this->current_time = time();
        $this->tbl_category = "r_category";

        $this->category_upload_dir = "uploads/category";

        $this->category_img_size = [
          "thumb"  => [
             "h" => 64,
             "w" => 64,
          ],
          "small"  => [
             "h" => 256,
             "w" => 256,
          ],
        ];

    }


/*
 * index to list all
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
      "table" => "{$this->tbl_category} as a",
      "count" => true,
    ];
    $total_rows = $this->Crud_model->fetch_result($optionCount);
    
    $option = [
      "select" => "a.sid, a.title, a.status, a.image as imagename, a.description",
      "table" => "{$this->tbl_category} as a",
      "order" => ["sid" => "DESC"],
      "limit" => [$rows, $offset],
    ];
    $data['category'] = $this->Crud_model->fetch_result($option);
    $data['image_url'] = base_url($this->category_upload_dir);
    
    $queryString = "";

    $pagging['base_url'] = admin_url() ."category/index?$queryString"; // $_SERVER['QUERY_STRING'];
    $pagging['per_page'] = $rows;
    $pagging['total_rows'] = $total_rows;
    $this->pagination->initialize($pagging);
    $data['links'] = $this->pagination->create_links();
    $this->load->view('admin/category/list', $data);
  }


/*
 * add new category
 * 
 */
  public function add() {
    $data = [];
    if($post = $this->input->post()) {
        $insertData =[
            "title" => $post["title"],
            "description" => $post["description"],
            "status" => $post["status"],
            "created_at" => $this->current_time,
        ];
        $id = $this->Crud_model->insert_row($this->tbl_category, $insertData); // insert into category table
        if($id) {            
            if(!empty($_FILES['imagefile']['name'])){
                mkdir($this->category_upload_dir . "/{$id}", 0777 , true); // create new directory with category id
                $files = $_FILES;
                $filename = $ext = "";

                $config = array();
                $config['upload_path']      = './' . $this->category_upload_dir . "/{$id}";

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
                    foreach ($this->category_img_size as $key => $value) {
                        if(!is_dir($this->category_upload_dir . "/{$id}/{$key}")) {
                          mkdir($this->category_upload_dir . "/{$id}/{$key}", 0777 , true); // create new directory with category id
                        }
                        $config = array(
                            'source_image'      => $this->category_upload_dir . "/{$id}/{$filename}", //path to the uploaded image
                            'new_image'         => $this->category_upload_dir . "/{$id}/{$key}", //path to
                            'maintain_ratio'    => true,
                            'width'             => $this->category_img_size[$key]["w"],
                            'height'            => $this->category_img_size[$key]["h"]
                        );
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }
                    // update image name
                    $this->Crud_model->update_row($this->tbl_category, ['image'=> $filename], ["sid"=> $id]); // 
                }
            }
            
            $err = ($data['error']) ? " But unexpected error occured : ".$data['error'] : "";
            
            $this->session->set_flashdata('success', 'Item added successfully.' . $err);
            redirect(admin_url().'category');
        }
    }
    $this->load->view('admin/category/add', $data);
  }


/*
 * Edit category
 * 
 */
  public function edit($id) {

    $data['image_url'] = base_url($this->category_upload_dir);

    $option = [
      "select" => "a.sid, a.title, a.status, a.image as imagename, a.description",
      "table" => "{$this->tbl_category} as a",
      "single" => true,
      "where" => ["a.sid"=> $id]
    ];
    $data['category'] = $this->Crud_model->fetch_result($option);

    if($post = $this->input->post()) {
        $insertData =[
            "title" => $post["title"],
            "description" => $post["description"],
            "status" => $post["status"],
            "updated_at" => $this->current_time,
        ];

        if(!empty($_FILES['imagefile']['name'])){

            exec("rm uploads/category/$id/* -rf"); // remove product images too
            
            $filename = $ext = "";

            $config = array();
            $config['upload_path']      = './' . $this->category_upload_dir . "/{$id}";

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
                foreach ($this->category_img_size as $key => $value) {
                    if(!is_dir($this->category_upload_dir . "/{$id}/{$key}")) {
                      mkdir($this->category_upload_dir . "/{$id}/{$key}", 0777 , true); // create new directory with category id
                    }
                    $config = array(
                        'source_image'      => $this->category_upload_dir . "/{$id}/{$filename}", //path to the uploaded image
                        'new_image'         => $this->category_upload_dir . "/{$id}/{$key}", //path to
                        'maintain_ratio'    => true,
                        'width'             => $this->category_img_size[$key]["w"],
                        'height'            => $this->category_img_size[$key]["h"]
                    );
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                }
            }
                
            $insertData['image'] = $filename;
        }
        
        
        $this->Crud_model->update_row($this->tbl_category, $insertData, ["sid"=> $id]);
        
        $this->session->set_flashdata('success', 'Item updated successfully.');
        redirect(admin_url().'category');
    }
    $this->load->view('admin/category/add', $data);
  }


/*
 * Delete category
 * 
 */
    public function delete($id='') {
      if(!empty($id)) {
          if($this->Crud_model->delete_row($this->tbl_category, ['sid'=> $id])) {
              exec("rm uploads/category/$id -rf"); // remove category images too
              $this->session->set_flashdata('success', 'Item deleted successfully.');
              redirect(admin_url().'category');
          }
      } else {
          $this->session->set_flashdata('error', 'Bad Request');
          redirect(admin_url().'category');
      }
    }

    // enable disable category
    public function enabledisable($id, $status) {
        if ($status == 0) {
            $sta = 'disabled';
        } else {
            $sta = 'enabled';
        }
        if ($this->Crud_model->update_row($this->tbl_category, ['status'=> $status], ["sid"=> $id])) {
            $this->session->set_flashdata('success', 'Status has been ' . $sta . ' successfully.');
        } else {
            $this->session->set_flashdata('error', 'Error occured while ' . $sta . ' item.');
        }
        redirect(admin_url().'category');
    }


}
