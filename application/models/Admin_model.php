<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');


    }

/*  Admin */


function auth($username,$password)
    {
        $this->db->select('*');
         $this->db->from('bt_users');
        $this->db->where('u_name',$username);
        $this->db->where('u_password    ',$password);
        $this->db->where('u_status',1);


        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }


    /**  customer detail*/

    function customerByEmail($email)
    {
        $this->db->select('*');
         $this->db->from('bt_customer');
        $this->db->where('cust_email',$email);
        
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }

       function addnewCustomer($data)
    {
        
        $this->db->insert('bt_customer', $data);
        $userid = $this->db->insert_id();
        return $userid;
    }


    public function activateaccount($email,$uid)
    {
        $this->db->set('cust_status', 1);
        $this->db->where('cust_email', $email);
        $this->db->where('cust_id', $uid);
        $data=$this->db->update('bt_customer');

        return $data;
    }


function customerLogin($username,$password)
    {
        $this->db->select('*');
         $this->db->from('bt_customer');
        $this->db->where('cust_email',$username);
        $this->db->where('cust_password',$password);
        $this->db->where('cust_status',1);


        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }



 /**  customer detail end*/
    function ifUserExist($username){
        $this->db->select('u_name');
         $this->db->from('bt_users');
        $this->db->where('u_name',$username);
        $q = $this->db->get();
        $row = $q->result();
        return $row;
    }

  function fetchAdmindata($id)
    {
        $this->db->select('*');
        $this->db->from('bt_users');
        $this->db->where('u_id', $id);
        $q = $this->db->get();
        $row = $q->result();
        return $row;
    }


function updatePassword($id,$new_pass)
    {
        $data = array(
            'u_password' => $new_pass
        );

        $this->db->where('u_id', $id);
        $query = $this->db->update('bt_users', $data);
        return $query;
    }

  

function updateProfile($u_name,$u_mobile,$u_status,$u_id,$u_image)
    {
        $data = array(
                'u_name' => $u_name,
                'u_mobile' => $u_mobile,
                'u_status' => $u_status,
                'u_image' => $u_image
        );

        $this->db->where('u_id', $u_id);
        $query = $this->db->update('bt_users', $data);
        return $query;
    }

/**Add Sub Profile */
function insertSubUser($data){
    $this->db->insert('bt_users', $data);
    $userid = $this->db->insert_id();
    return $userid;
}


    /*  Admin End */
    /**Customers List */
    function customersList(){
        return 1;
        /*
        $this->db->select('*');
        $this->db->from('bt_customer');

        $q = $this->db->get();
        $row = $q->result();
        return $row;
         * 
         */
    }
/**Customers Enable/Disable */
function customersenabledisable($id, $status)
{
    $data = array(
        'cust_status' => $status
    );

    $this->db->where('cust_id', $id);
    $query = $this->db->update('bt_customer', $data);
    return $query;
}
    /**Sales Orders*/
   function orderList($status){
    $this->db->select('*');
    $this->db->where('order_status', $status);
    $this->db->from('bt_order');
    $q = $this->db->get();
    $row = $q->result();
    return $row;
    }

     function orderTotal(){
        $this->db->select('SUM(order_total) as total');
        $this->db->from('bt_order');
        $q = $this->db->get();
        $row = $q->result();
        return $row;
      }


    /**Change Status Of Order Shipped/Cancelled/Delivered */
   function orderStatus($id, $status){
    $data = array(
        'order_status' => $status
    );

    $this->db->where('order_id', $id);
    $query = $this->db->update('bt_order', $data);
    return $query;
    }

    /** Category */

  /** Update Query For Category**/
  function updateCategory($id,$data){
    $this->db->where('ctg_id', $id);
    $userid=$this->db->update('r_category', $data);
    return $userid;
}


 /** Update Query For Product**/
 function updateProduct($id,$data){
    $this->db->where('pro_id', $id);
    $userid=$this->db->update('bt_product', $data);
    return $userid;
}
/** Fetch Particular data of a category by ID*/
    function fetchParticularCategory($ctgID)
    {
        $this->db->select('*');
        $this->db->from('r_category');
        $this->db->where('ctg_id', $ctgID);
        $q = $this->db->get();
        $row = $q->result();
        return $row;
    }
/** Fetch Particular data of a Product by ID*/
function fetchParticularProduct($proID)
{
    $this->db->select('*');
    $this->db->from('bt_product');
    $this->db->where('pro_id', $proID);
    $q = $this->db->get();
    $row = $q->result();
    return $row;
}

function fetchParticularProductByName($pro_name)
{
    $this->db->select('*');
    $this->db->from('bt_product');
    $this->db->where('pro_name', $pro_name);
    $q = $this->db->get();
    $row = $q->result();
    return $row;
}
	
    
    function insertCategory($cat_name, $cat_under, $cat_status, $cat_desc, $cat_img)
    {
        //$now = date("Y-m-d h:i:sa") ;
        $data = array(
            'ctg_name' => $cat_name,
            'ctg_under' => $cat_under,
            'ctg_status' => $cat_status,
            'ctg_description' => $cat_desc,
            'ctg_image' => $cat_img

        );
        $this->db->insert('r_category', $data);
        $userid = $this->db->insert_id();
        return $userid;
    }
    /**Insert New Product */
    function insertProduct($data)
    {
        //$now = date("Y-m-d h:i:sa") ;
       
        $this->db->insert('bt_product', $data);
        $userid = $this->db->insert_id();
        return $userid;
    }

    function categorylist()
    {
        $this->db->select('*');
        $this->db->from('r_category');

        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }
    
    function categoryName($pro_ctg_id)
    {
        $this->db->select('ctg_name');
        $this->db->from('r_category');
        $this->db->where('ctg_id',$pro_ctg_id);
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }

    function subcategorylist()
    {
        $this->db->select('*');
        $this->db->from('r_category');
        $this->db->where('ctg_under !=','NONE');
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }

    function subcategorylistbycatid($id)
    {
        $this->db->select('*');
        $this->db->from('r_category');
        $this->db->where('ctg_under',$id);
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }

    function maincategorylist()
    {
        $this->db->select('*');
        $this->db->from('r_category');
        $this->db->where('ctg_under','NONE');
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }



    function productcountbycatid($id)
    {
        $this->db->select('*');
        $this->db->from('bt_product');
        $this->db->where('pro_ctg_id', $id);
        $q = $this->db->get();
        $count = $q->num_rows();
        return $count;

    }


    function productlist()
    {
        $this->db->select('*');
        $this->db->from('bt_product as pro');

        $this->db->join('r_category as cat', 'pro.pro_ctg_id  = cat.ctg_id', 'left');

        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }


    function activeProductlist()
    {
        $this->db->select('*');
        $this->db->from('bt_product');
        $this->db->where('pro_status',1);   
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }


   function activeFeaturedProduct()
    {
        $this->db->select('*');
        $this->db->from('bt_product');
        $this->db->where('pro_status',1);   
        $this->db->where('pro_feature_product',1);   
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }



   function activeBestSelling()
    {
        $this->db->select('*');
        $this->db->from('bt_product');
        $this->db->where('pro_status',1);   
        $this->db->where('pro_best_selling',1);   
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }

/** Active product list by  category id */
        function activeProductlistByCatid($id)
    {
        $this->db->select('*');
        $this->db->from('bt_product');
        $this->db->where('pro_status',1);  
        $this->db->where('pro_ctg_id',$id);   
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }


    function categoryenabledisable($id, $status)
    {
        $data = array(
            'ctg_status' => $status
        );

        $this->db->where('ctg_id', $id);
        $query = $this->db->update('r_category', $data);
        return $query;
    }

    function categorydelete($id)
    {


        $this->db->where('ctg_id', $id);
        $this->db->delete('r_category');
        return true;
    }


    function productdelete($id)
    {


        $this->db->where('pro_id', $id);
        $this->db->delete('bt_product');
        return true;
    }

    function productenabledisable($id, $status)
    {
        $data = array(
            'pro_status' => $status
        );

        $this->db->where('pro_id', $id);
        $query = $this->db->update('bt_product', $data);
        return $query;
    }


    function getroomno($roomtype, $no_of_rooms)
    {
        $this->db->select('*');
        $this->db->from('room_detail');
        $this->db->where('room_type_id', $roomtype);
        $this->db->where('status', '');

        $this->db->limit($no_of_rooms);
        $q = $this->db->get();
        $row = $q->result();
        return $row;

    }

/** Search  */
    public function getallproduct($term)
    {

        $q1 =  "SELECT pro_name FROM bt_product WHERE bt_product.pro_name LIKE '%$term%' and bt_product.pro_status=1";

        $query = $this->db->query($q1);
        $data=$query->result_array();

        return $data;
    }



    /* Order */

     function addOrder($data)
        {
            
            $this->db->insert(' bt_order', $data);
            $userid = $this->db->insert_id();
            return $userid;
        }


}


?>
