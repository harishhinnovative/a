<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Base Controller for the admin panel
 * Here put all common methods in class : MY_Controller
 */
/*
class MY_Controller extends CI_Controller {

    protected $_PER_PAGE = 0;

    public function __construct() {
        parent::__construct();

        $this->_PER_PAGE = 20;

        // check login session here
        if($this->session->userdata('user_id')==false || $this->session->userdata('is_Admin_in')==false ){
            redirect(admin_url().'logout');
        }
    }

    /**
     * Upload File Icon
     * @param  String $name   input[type file] name
     * @param  Object $file   file
     * @param  Object $config config library upload
     * @return Object         
     

    protected function _upload_file($name, $file, $config) {
        //process upload picture
        $this->load->library('upload');
        $this->upload->initialize($config);
        //validation upload FALSE
        if (!$this->upload->do_upload($name)) {
            $response = array(
                'status' => FALSE,
                'message' => $this->upload->display_errors()
            );
            return $response;
        } else {//validation upload TRUE/success
            $upload = $this->upload->data();
            $filename = $upload['file_name'];
            $response = array(
                'status' => TRUE,
                'filename' => $filename,
                'message' => ''
            );
            return $response;
        }
    }

}
*/



/*
 * The Base class for admin panel
 * 
 */
class Admin_panel extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        // check login session here
        if($this->session->userdata('user_id')==false || $this->session->userdata('is_Admin_in')==false ){
            redirect(admin_url().'logout');
        }
    }

}


/*
 * The Base class for public panel
 * 
 */
class Public_panel extends CI_Controller
{
    public function __construct() {
        parent::__construct();
//        $this->check_session();
    }

    private function check_session(){
        if ($this->session->userdata('logged_in') == null) {
            redirect('login', 'refresh');
        } else {
            redirect('dashboard', 'refresh');
        }
    }
    
}






/*
 * End of file MY_Controller.php
 * Location: ./application/core/MY_Controller.php
*/

