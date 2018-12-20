<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
    
    protected $tbl_product;
    protected $tbl_category;
    
    protected $current_time;

    protected $upload_dir_product;


    public function __construct() {
        parent::__construct();
        $this->load->helper(['utility_helper', "common_helper"]);
        $this->load->model(['Admin_model', 'Crud_model']);
        
        $this->current_time = time();
        $this->tbl_product = "bt_product";
        $this->tbl_category = "bt_category";

        $this->upload_dir_product = "uploads/product";
    }


/*
 * index to list all products
 * 
 */
  public function index() {
    $data = [];
    $option = [
      "select" => "a.pro_id, a.pro_name, a.pro_code, a.pro_price, a.after_discount_price, a.pro_tax, a.pro_color, a.pro_size, a.pro_modal_no,"
        . " a.pro_image, a.pro_status, a.pro_feature_product, a.pro_best_selling, b.ctg_name ",
      "table" => "{$this->tbl_product} as a",
      "join" => [
        ["{$this->tbl_category} as b", " a.pro_ctg_id = b.ctg_id ", "LEFT"],
      ],
      "order" => ["pro_id" => "DESC"],
    ];
    $data['products'] = $this->Crud_model->fetch_result($option);
//    pr($data);
    $data['image_url'] = base_url($this->upload_dir_product);
    
    $this->load->view('admin/product/list', $data);
  }


/*
 * add new product
 * 
 */
  public function add() {
    $option = [
      "select" => "a.ctg_name, a.ctg_id",
      "table" => "{$this->tbl_category} as a",
      "where" => ["ctg_status"=> 1],
    ];
    $data['categories'] = $this->Crud_model->fetch_result($option); // get all active category
    $data['image_url'] = base_url($this->upload_dir_product);

    if($post = $this->input->post()) {
        $insertData =[
            "pro_ctg_id" => $post["pro_ctg_id"],
            "pro_name" => $post["pro_name"],
            "pro_code" => $post["pro_code"],
            "pro_modal_no" => $post["pro_modal_no"],
            "pro_price" => $post["pro_price"],
            "after_discount_price" => $post["after_discount_price"],
            "pro_tax" => $post["pro_tax"],
            "pro_color" => $post["pro_color"],
            "pro_size" => $post["pro_size"],
            "pro_feature_product" => $post["pro_feature_product"],
            "pro_best_selling" => $post["pro_best_selling"],
            "pro_status" => $post["pro_status"],
            "pro_description" => $post["pro_description"],
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
 * Edit product
 * 
 */
  public function edit($id) {
    $option = [
      "select" => "a.ctg_name, a.ctg_id",
      "table" => "{$this->tbl_category} as a",
      "where" => ["ctg_status"=> 1],
    ];
    $data['categories'] = $this->Crud_model->fetch_result($option); // get all active category
    $data['image_url'] = base_url($this->upload_dir_product);

    if($post = $this->input->post()) {
        $insertData =[
            "pro_ctg_id" => $post["pro_ctg_id"],
            "pro_name" => $post["pro_name"],
            "pro_code" => $post["pro_code"],
            "pro_modal_no" => $post["pro_modal_no"],
            "pro_price" => $post["pro_price"],
            "after_discount_price" => $post["after_discount_price"],
            "pro_tax" => $post["pro_tax"],
            "pro_color" => $post["pro_color"],
            "pro_size" => $post["pro_size"],
            "pro_feature_product" => $post["pro_feature_product"],
            "pro_best_selling" => $post["pro_best_selling"],
            "pro_status" => $post["pro_status"],
            "pro_description" => $post["pro_description"],
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
        if($this->Crud_model->delete_row($this->tbl_product, ['pro_id'=> $id])) {
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

        $id = $this->input->post('pro_id');
        //image upload start
        $config['upload_path'] = './assets/admin/assets/img/product';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);
        if ($_FILES['pro_img']['size'] > 0) {
            if (!$this->upload->do_upload('pro_img')) {

                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(admin_url() . 'catalog/productEdit/' . $id);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $pro_image = $this->upload->data('file_name');

//image upload end
            }
        } else {
            $pro_image = $this->input->post('pro_image1');
        }

        $payload = array(
            'pro_name' => $this->input->post('pro_name'),
            'pro_ctg_id' => $this->input->post('cat_under'),
            'pro_price' => $this->input->post('pro_price'),
            'pro_status' => $this->input->post('pro_status'),
            'pro_description' => $this->input->post('pro_desc'),
            'pro_feature_product' => $featured_pro,
            'pro_best_selling' => $best_selling,
            'pro_image' => $pro_image
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
        $insertid = $this->Crud_model->update_row($this->tbl_category, $payload, ['ctg_id'=> $id]);
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

        if (!$this->upload->do_upload('pro_img')) {

            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(admin_url() . 'catalog/addproduct');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $pro_image = $this->upload->data('file_name');
            //image upload end
            $payload = array(
                'pro_name' => $this->input->post('pro_name'),
                'pro_ctg_id' => $this->input->post('cat_under'),
                'pro_price' => $this->input->post('pro_price'),
                'pro_status' => $this->input->post('pro_status'),
                'pro_description' => $this->input->post('pro_desc'),
                'pro_feature_product' => $featured_pro,
                'pro_best_selling' => $best_selling,
                'pro_image' => $pro_image
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
