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
        $this->load->helper(['utility_helper', "common_helper"]);
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
    $option = [
      "select" => "a.sid, a.title, a.inv, a.price, a.discount_per, a.tax, a.weight, a.sku, a.cost,"
        . " a.status, a.feature_product, a.best_selling, b.title as category, c.title as imagename",
      "table" => "{$this->tbl_product} as a",
      "join" => [
        ["{$this->tbl_category} as b", " a.cat_id = b.sid ", "LEFT"],
        ["{$this->tbl_product_images} as c", " a.sid = c.pid AND (c.isdefault=1) ", "LEFT"],
      ],
      "order" => ["sid" => "DESC"],
    ];
    $data['products'] = $this->Crud_model->fetch_result($option);
    $data['image_url'] = base_url($this->product_upload_dir);
    
    $this->load->view('admin/product/list', $data);
  }


/*
 * add new product
 * 
 */
  public function add() {
//      pr($this->product_img_size);
//      
//      foreach ($this->product_img_size as $key => $value) {
//          echo $key;
//          echo "<br>";
//      }
//      die;
//      
      
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
            
            $this->session->set_flashdata('success', 'New product added successfully.' . $err);
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
      "select" => "a.title, a.isdefault",
      "table" => "{$this->tbl_product_images} as a",
      "where" => ["pid"=> $id],
    ];
    $data['pro_images'] = $this->Crud_model->fetch_result($option1); // get all product images
    $data['image_url'] = base_url($this->product_upload_dir);

    $option = [
      "select" => "a.sid, a.title, a.inv, a.price, a.discount_per, a.tax, a.weight, a.sku, a.cost,"
        . " a.status, a.feature_product, a.best_selling, b.title as category, c.title as imagename",
      "table" => "{$this->tbl_product} as a",
      "join" => [
        ["{$this->tbl_category} as b", " a.cat_id = b.sid ", "LEFT"],
        ["{$this->tbl_product_images} as c", " a.sid = c.pid AND (c.isdefault=1) ", "LEFT"],
      ],
      "single" => true
    ];
    $data['product'] = $this->Crud_model->fetch_result($option);
    
    if($post = $this->input->post()) {
        $insertData =[
            "cat_id" => $post["cat_id"],
            "name" => $post["name"],
            "code" => $post["code"],
            "modal_no" => $post["modal_no"],
            "price" => $post["price"],
            "after_discount_price" => $post["after_discount_price"],
            "tax" => $post["tax"],
            "color" => $post["color"],
            "size" => $post["size"],
            "feature_product" => $post["feature_product"],
            "best_selling" => $post["best_selling"],
            "status" => $post["status"],
            "description" => $post["description"],
            "created_at" => $this->current_time,
        ];
        $id = $this->Crud_model->insert_row($this->tbl_product, $insertData);
        if($id) {
            $this->session->set_flashdata('success', 'New product added successfully.');
            redirect(admin_url().'products');
        }
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
            $this->session->set_flashdata('success', 'Product deleted successfully.');
            redirect(admin_url().'products');
        }
    } else {
        $this->session->set_flashdata('error', 'Bad Request');
        redirect(admin_url().'products');
    }
  }


    /*     * Update Product */

    function updateProduct() {
//	print_r($_POST); die;

        if ($this->input->post('featured_pro') == '' || $this->input->post('featured_pro') == null) {
            $featured_pro = 0;
        } else {
            $featured_pro = 1;
        }

        if ($this->input->post('best_selling') == '' || $this->input->post('best_selling') == null) {
            $best_selling = 0;
        } else {
            $best_selling = 1;
        }

        $id = $this->input->post('id');
        //image upload start
        $config['upload_path'] = './assets/admin/assets/img/product';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);
        if ($_FILES['img']['size'] > 0) {
            if (!$this->upload->do_upload('img')) {

                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(admin_url() . 'catalog/productEdit/' . $id);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $image = $this->upload->data('file_name');

//image upload end
            }
        } else {
            $image = $this->input->post('image1');
        }

        $payload = array(
            'name' => $this->input->post('name'),
            'cat_id' => $this->input->post('cat_under'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'description' => $this->input->post('desc'),
            'feature_product' => $featured_pro,
            'best_selling' => $best_selling,
            'image' => $image
        );

        $userid = $this->Admin_model->updateProduct($id, $payload);
        if ($userid) {

            $this->session->set_flashdata('success', 'product is Updated successfully');
            redirect(admin_url() . 'catalog/productEdit/' . $id);
        } else {
            $this->session->set_flashdata('error', 'There is some error while updating product');
            redirect(admin_url() . 'catalog/productEdit/' . $id);
        }
    }

    /*     * Edit Category */

    function updateCategory() {
//	print_r($_POST); die;




        $id = $this->input->post('cat_id');
        //image upload start
        $config['upload_path'] = $this->upload_dir_category;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);
        if ($_FILES['cat_img']['size'] > 0) {
            if (!$this->upload->do_upload('cat_img')) {

                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(admin_url() . 'catalog/categoryedit/' . $id);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $cat_img = $this->upload->data('file_name');

//image upload end
            }
        } else {
            $cat_img = $this->input->post('cat_image1');
        }

        $payload = array(
            'ctg_name' => $this->input->post('cat_name'),
            'ctg_under' => $this->input->post('cat_under'),
            'ctg_status' => $this->input->post('cat_status'),
            'ctg_description' => $this->input->post('cat_desc'),
            'ctg_date_modified' => $this->current_time,
            'ctg_image' => $cat_img
        );

//        $userid = $this->Admin_model->updateCategory($id, $payload);
        $insertid = $this->Crud_model->update_row($this->tbl_category, $payload, ['cat_id'=> $id]);
        if ($insertid) {
            $this->session->set_flashdata('success', 'Category is Updated successfully');
            redirect(admin_url() . 'catalog/categories');
        } else {
            $this->session->set_flashdata('error', 'There is some error while updating category');
            redirect(admin_url() . 'catalog/categoryedit/' . $id);
        }
    }

    /*     * add Products */

    function addProducts() {
        if ($this->input->post('featured_pro') == '' || $this->input->post('featured_pro') == null) {
            $featured_pro = 0;
        } else {
            $featured_pro = 1;
        }

        if ($this->input->post('best_selling') == '' || $this->input->post('best_selling') == null) {
            $best_selling = 0;
        } else {
            $best_selling = 1;
        }
        //image upload start
        $config['upload_path'] = './assets/admin/assets/img/product';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {

            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(admin_url() . 'catalog/addproduct');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $image = $this->upload->data('file_name');
            //image upload end
            $payload = array(
                'name' => $this->input->post('name'),
                'cat_id' => $this->input->post('cat_under'),
                'price' => $this->input->post('price'),
                'status' => $this->input->post('status'),
                'description' => $this->input->post('desc'),
                'feature_product' => $featured_pro,
                'best_selling' => $best_selling,
                'image' => $image
            );

            $userid = $this->Admin_model->insertProduct($payload);
            if ($userid) {

                $this->session->set_flashdata('success', 'Product is added successfully');
                redirect(admin_url() . 'catalog/addproduct');
            } else {
                $this->session->set_flashdata('error', 'There is some error while adding new Product');
                redirect(admin_url() . 'catalog/addproduct');
            }
        }
    }

    /*     * addCategory */

    function addCategory() {
//	print_r($_POST); die;
        $cat_name = $this->input->post('cat_name');
        $cat_under = $this->input->post('cat_under');
        $cat_status = $this->input->post('cat_status');
        $cat_desc = $this->input->post('cat_desc');
        //image upload start
        $config['upload_path'] = $this->upload_dir_category;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('cat_img')) {

            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(admin_url() . 'catalog/addcategories');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $cat_img = $this->upload->data('file_name');

//image upload end
            $data = [
                'ctg_name' => $cat_name,
                'ctg_under' => $cat_under,
                'ctg_status' => $cat_status,
                'ctg_description' => $cat_desc,
                'ctg_image' => $cat_img,
                'ctg_date_added' => $this->current_time,
                ];
            $insertid = $this->Crud_model->insert_row($this->tbl_category, $data);
            if ($insertid) {
                $this->session->set_flashdata('success', 'Category is added successfully');
                redirect(admin_url() . 'catalog/categories');
            } else {
                $this->session->set_flashdata('error', 'There is some error while adding new category');
                redirect(admin_url() . 'catalog/addcategories');
            }
        }
    }

    public function categories() {
        $this->load->view('admin/categories');
    }

    public function addproduct() {
        $this->load->view('admin/addproduct');
    }

    public function addcategories() {
        $this->load->view('admin/addcategories');
    }

    public function categoryedit($id) {
        $data = $this->Admin_model->fetchParticularCategory($id);
        $this->load->view('admin/categoryedit', $data[0]);
    }

    public function categorydelete($id) {

        if ($this->Admin_model->categorydelete($id)) {
            $this->session->set_flashdata('success', 'Category has been deleted successfully.');
            echo 'dfsdfsd';
        } else {
            $this->session->set_flashdata('error', 'Error occured while delete Category!!!');
            echo 'false';
        }
    }

    public function productdelete($id) {

        if ($this->Admin_model->productdelete($id)) {
            $this->session->set_flashdata('success', 'Product has been deleted successfully.');
            echo 'dfsdfsd';
        } else {
            $this->session->set_flashdata('error', 'Error occured while delete Product!!!');
            echo 'false';
        }
    }

    public function productEdit($id) {
        $data = $this->Admin_model->fetchParticularProduct($id);

        $this->load->view('admin/productedit', $data[0]);
    }

    public function products() {
        $this->load->view('admin/products');
    }

    public function productenabledisable($id, $status) {
        if ($status == 0) {
            $sta = 'disabled';
        } else {
            $sta = 'enabled';
        }

        if ($this->Admin_model->productenabledisable($id, $status)) {
            $this->session->set_flashdata('success', 'product has been ' . $sta . ' successfully.');
            redirect('admin/catalog/products');
        } else {
            $this->session->set_flashdata('error', 'Error occured while ' . $sta . ' product!!!');
            redirect('admin/catalog/products');
        }
    }

    public function categoryenabledisable($id, $status) {
        if ($status == 0) {
            $sta = 'disabled';
        } else {
            $sta = 'enabled';
        }

        if ($this->Admin_model->categoryenabledisable($id, $status)) {
            $this->session->set_flashdata('success', 'category has been ' . $sta . ' successfully.');
            redirect('admin/catalog/categories');
        } else {
            $this->session->set_flashdata('error', 'Error occured while ' . $sta . ' category!!!');
            redirect('admin/catalog/categories');
        }
    }

}
