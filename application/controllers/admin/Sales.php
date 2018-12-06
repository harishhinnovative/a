<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {


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
	public function viewSalesPages($salesPage)
	{	
		$this->load->view('admin/'.$salesPage);
	}
	/**End Of View Part */
/**Change status to Shpped/Cancelled/Delivered of Particular Orders */
public function orderStatus($order_id,$status,$salesPage){
		if ($this->Admin_model->orderStatus($order_id, $status)) {
			$this->session->set_flashdata('success', 'Order has been ' . $status . ' successfully.');
				 redirect(admin_url().'sales/viewSalesPages/'.$salesPage);
        } else {
			$this->session->set_flashdata('error', 'Error occured while ' . $status . ' order!!!');
			redirect(admin_url().'sales/viewSalesPages/'.$salesPage);
        }
	}

}
