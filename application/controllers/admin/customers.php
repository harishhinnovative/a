<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('utility_helper');
		$this->load->model('Admin_model');
		
		
        /*	
		if( ($this->session->userdata('role')=='') || ($this->session->userdata('useremail')==''))
		{
			redirect(base_url());

		}*/
        
	}
/**View Part */
	public function customers()
	{	
		$this->load->view('admin/customers');
	}
	/**End Of View Part */
/**Change status to enable/disable Particular customers */
public function customersenabledisable($id, $status)
{
    if ($status == 0) {
        $sta = 'disabled';
    } else {
        $sta = 'enabled';
    }

    if ($this->Admin_model->customersenabledisable($id, $status)) {
        $this->session->set_flashdata('success', 'customer has been ' . $sta . ' successfully.');
        redirect(admin_url().'customers/customers/');
    } else {
        $this->session->set_flashdata('error', 'Error occured while ' . $sta . ' customer!!!');
        redirect(admin_url().'customers/customers/');
    }

}

}
