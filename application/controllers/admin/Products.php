<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
    
    protected $tbl_category;
    protected $tbl_product;
    protected $tbl_product_images;
    
    protected $current_time;

    protected $product_upload_dir;

    protected $product_img_size;


    public function __construct() {
        parent::__construct();
        $this->load->helper(['utility_helper', "common_helper", "pagination_helper"]);
        $this->load->library(['pagination']);
        $this->load->model(['Admin_model', 'Crud_model']);
        
        $this->current_time = time();
        $this->tbl_product = "r_product";
        $this->tbl_product_images = "r_product_images";
        $this->tbl_category = "r_category";

        $this->product_upload_dir = "uploads/product";
        
        $this->product_img_size = [
          "thumb"  => [
             "h" => 64,
             "w" => 64,
          ],
          "small"  => [
             "h" => 256,
             "w" => 256,
          ],
          "big"  => [
             "h" => 500,
             "w" => 500,
          ],
        ];
        
    }


/*
 * index to list all products
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
      "table" => "{$this->tbl_product} as a",
      "count" => true,
    ];
    $total_rows = $this->Crud_model->fetch_result($optionCount);
    
    $option = [
      "select" => "a.sid, a.title, a.inv, a.price, a.discount_per, a.tax, a.weight, a.sku, a.cost,"
        . " a.status, a.feature_product, a.best_selling, b.title as category, c.title as imagename",
      "table" => "{$this->tbl_product} as a",
      "join" => [
        ["{$this->tbl_category} as b", " a.cat_id = b.sid ", "LEFT"],
        ["{$this->tbl_product_images} as c", " a.sid = c.pid AND (c.isdefault=1) ", "LEFT"],
      ],
      "order" => ["sid" => "DESC"],
      "limit" => [$rows, $offset],                
    ];
    $data['products'] = $this->Crud_model->fetch_result($option);
    $data['image_url'] = base_url($this->product_upload_dir);

    $queryString = "";

    $pagging['base_url'] = admin_url() ."products/index?$queryString"; // $_SERVER['QUERY_STRING'];
    $pagging['per_page'] = $rows;
    $pagging['total_rows'] = $total_rows;
    $this->pagination->initialize($pagging);
    $data['links'] = $this->pagination->create_links();
    
    $this->load->view('admin/product/list', $data);
  }


/*
 * add new product
 * 
 */
  public function add() {
      
    $option = [
      "select" => "a.title, a.sid",
      "table" => "{$this->tbl_category} as a",
      "where" => ["status"=> 1],
    ];
    $data['categories'] = $this->Crud_model->fetch_result($option); // get all active category
    $data['image_url'] = base_url($this->product_upload_dir);

    if($post = $this->input->post()) {
        $insertData =[
            "cat_id" => $post["cat_id"],
            "title" => $post["title"],
            "inv" => $post["inv"],
            "sku" => $post["sku"],
            "cost" => $post["cost"],
            "price" => $post["price"],
            "discount_per" => $post["discount_per"],
            "weight" => $post["weight"],
            "tax" => $post["tax"],
            "feature_product" => $post["feature_product"],
            "best_selling" => $post["best_selling"],
            "status" => $post["status"],
            "description" => $post["description"],
            "created_at" => $this->current_time,
        ];
        $id = $this->Crud_model->insert_row($this->tbl_product, $insertData); // insert into product table
        if($id) {            
            if(!empty($_FILES['imagefile']['name']['0'])){
                mkdir($this->product_upload_dir . "/{$id}", 0777 , true); // create new directory with product id
                $files = $_FILES;
                $cpt = count($_FILES['imagefile']['name']);
                $pro_images = [];
                $filename = $ext = "";
                for($i=0; $i<$cpt; $i++)
                {
                    $_FILES['imagefile']['name']        = $files['imagefile']['name'][$i];
                    $_FILES['imagefile']['type']        = $files['imagefile']['type'][$i];
                    $_FILES['imagefile']['tmp_name']    = $files['imagefile']['tmp_name'][$i];
                    $_FILES['imagefile']['error']       = $files['imagefile']['error'][$i];
                    $_FILES['imagefile']['size']        = $files['imagefile']['size'][$i];

                    $config = array();
                    $config['upload_path']      = './' . $this->product_upload_dir . "/{$id}";
                    
                    $ext = pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);
                    $filename = $this->current_time ."_" .($i) .'.'. $ext;
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
                        foreach ($this->product_img_size as $key => $value) {
                            if(!is_dir($this->product_upload_dir . "/{$id}/{$key}")) {
                              mkdir($this->product_upload_dir . "/{$id}/{$key}", 0777 , true); // create new directory with product id
                            }
                            $config = array(
                                'source_image'      => $this->product_upload_dir . "/{$id}/{$filename}", //path to the uploaded image
                                'new_image'         => $this->product_upload_dir . "/{$id}/{$key}", //path to
                                'maintain_ratio'    => true,
                                'width'             => $this->product_img_size[$key]["w"],
                                'height'            => $this->product_img_size[$key]["h"]
                            );
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                        }
 
                    }
                    
                    $pro_images[] = [
                        "title" => $filename ,
                        "pid" => $id,
                        "isdefault" => ($i==0) ? 1 : 0,
                    ];
                }
            }

            $this->Crud_model->insertDataBatch($this->tbl_product_images, $pro_images);
            
            $err = ($data['error']) ? " But unexpected error occured : ".$data['error'] : "";
            
            $this->session->set_flashdata('success', 'Item added successfully.' . $err);
            redirect(admin_url().'products');
        }
    }
    $this->load->view('admin/product/add', $data);
  }


/*
 * Edit product
 * 
 */
  public function edit($id) {
    $option = [
      "select" => "a.title, a.sid",
      "table" => "{$this->tbl_category} as a",
      "where" => ["status"=> 1],
    ];
    $data['categories'] = $this->Crud_model->fetch_result($option); // get all active category
    $option1 = [
      "select" => "a.sid, a.title, a.isdefault",
      "table" => "{$this->tbl_product_images} as a",
      "where" => ["pid"=> $id],
    ];
    $data['pro_images'] = $this->Crud_model->fetch_result($option1); // get all product images
    $data['image_url'] = base_url($this->product_upload_dir);

    $option = [
      "select" => "a.sid, a.title, a.description, a.cat_id, a.inv, a.price, a.discount_per, a.tax, a.weight, a.sku, a.cost,"
        . " a.status, a.feature_product, a.best_selling, b.title as category, c.title as imagename",
      "table" => "{$this->tbl_product} as a",
      "join" => [
        ["{$this->tbl_category} as b", " a.cat_id = b.sid ", "LEFT"],
        ["{$this->tbl_product_images} as c", " a.sid = c.pid AND (c.isdefault=1) ", "LEFT"],
      ],
      "single" => true,
      "where" => ["a.sid"=> $id]
    ];
    $data['product'] = $this->Crud_model->fetch_result($option);
//    pr($data['product']); die;
    
    if($post = $this->input->post()) {
        $insertData =[
            "cat_id" => $post["cat_id"],
            "title" => $post["title"],
            "inv" => $post["inv"],
            "sku" => $post["sku"],
            "cost" => $post["cost"],
            "price" => $post["price"],
            "discount_per" => $post["discount_per"],
            "weight" => $post["weight"],
            "tax" => $post["tax"],
            "feature_product" => $post["feature_product"],
            "best_selling" => $post["best_selling"],
            "status" => $post["status"],
            "description" => $post["description"],
            "updated_at" => $this->current_time,
        ];
        $this->Crud_model->update_row($this->tbl_product, $insertData, ["sid"=> $id]);
        if(!empty($_FILES['imagefile']['name']['0'])){
            mkdir($this->product_upload_dir . "/{$id}", 0777 , true); // create new directory with product id
            $files = $_FILES;
            $cpt = count($_FILES['imagefile']['name']);
            $pro_images = [];
            $filename = $ext = "";
            for($i=0; $i<$cpt; $i++)
            {
                $_FILES['imagefile']['name']        = $files['imagefile']['name'][$i];
                $_FILES['imagefile']['type']        = $files['imagefile']['type'][$i];
                $_FILES['imagefile']['tmp_name']    = $files['imagefile']['tmp_name'][$i];
                $_FILES['imagefile']['error']       = $files['imagefile']['error'][$i];
                $_FILES['imagefile']['size']        = $files['imagefile']['size'][$i];

                $config = array();
                $config['upload_path']      = './' . $this->product_upload_dir . "/{$id}";

                $ext = pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);
                $filename = $this->current_time ."_" .($i) .'.'. $ext;
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
                    foreach ($this->product_img_size as $key => $value) {
                        if(!is_dir($this->product_upload_dir . "/{$id}/{$key}")) {
                          mkdir($this->product_upload_dir . "/{$id}/{$key}", 0777 , true); // create new directory with product id
                        }
                        $config = array(
                            'source_image'      => $this->product_upload_dir . "/{$id}/{$filename}", //path to the uploaded image
                            'new_image'         => $this->product_upload_dir . "/{$id}/{$key}", //path to
                            'maintain_ratio'    => true,
                            'width'             => $this->product_img_size[$key]["w"],
                            'height'            => $this->product_img_size[$key]["h"]
                        );
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }

                }

                // delete the old db entry and images from folder
                $this->Crud_model->delete_row($this->tbl_product_images, ['pid'=> $id]); // delete product image entry from table
                exec("rm uploads/product/$id -rf"); // remove product images too

                $pro_images[] = [
                    "title" => $filename ,
                    "pid" => $id,
                    "isdefault" => ($i==0) ? 1 : 0,
                ];
            }
        }
        if(!empty($post['defaultimg'])) {
            $this->Crud_model->update_row($this->tbl_product_images, ['isdefault'=> 0], ["pid"=> $id]); // set other to zero
            $this->Crud_model->update_row($this->tbl_product_images, ['isdefault'=> 1], ["sid"=> $post['defaultimg']]); // set new image as default selection
        }

        $this->session->set_flashdata('success', 'Item updated successfully.');
        redirect(admin_url().'products');
    }
    $this->load->view('admin/product/add', $data);
  }


/*
 * Delete product
 * 
 */
  public function delete($id='') {
    if(!empty($id)) {
        if($this->Crud_model->delete_row($this->tbl_product, ['sid'=> $id])) {
            $this->Crud_model->delete_row($this->tbl_product_images, ['pid'=> $id]); // delete product image entry from table
            exec("rm uploads/product/$id -rf"); // remove product images too
            $this->session->set_flashdata('success', 'Item deleted successfully.');
            redirect(admin_url().'products');
        }
    } else {
        $this->session->set_flashdata('error', 'Bad Request');
        redirect(admin_url().'products');
    }
  }


    // enable disable product
    public function enabledisable($id, $status) {
        if ($status == 0) {
            $sta = 'disabled';
        } else {
            $sta = 'enabled';
        }
        if ($this->Crud_model->update_row($this->tbl_product, ['status'=> $status], ["sid"=> $id])) {
            $this->session->set_flashdata('success', 'Status has been ' . $sta . ' successfully.');
        } else {
            $this->session->set_flashdata('error', 'Error occured while ' . $sta . ' item.');
        }
        redirect('admin/products');
    }


}
