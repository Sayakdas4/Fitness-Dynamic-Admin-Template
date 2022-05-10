<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Order extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('razorpay_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function order_listing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->razorpay_model->get_all_razorpay_listing_count($searchText);

            $returns = $this->paginationCompress ( "order_listing/", $count, 10 );
            
            $data['orders'] = $this->razorpay_model->get_all_razorpay_listing($searchText, $returns["page"], $returns["segment"]);
            // dd($data['orders']);
            $this->global['pageTitle'] = 'Mil Paints : Order Listing';
            
            $this->loadViews("order/order_listing", $this->global, $data, NULL);
        }
    }

    function order_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $order_id= $this->input->post('order_id');
            $data = $this->razorpay_model->getorderInfo($order_id);
            echo json_encode($data);
        }
    }

    function deleteorder($order_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->razorpay_model->deleteInfo($order_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('order_listing');
        }
    }
}
?>