<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Booking extends BaseController
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('booking_model');
        $this->isLoggedIn();   
    }
    public function index() 
    {
        $this->global['pageTitle'] = 'Caucasus Heritage : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL, NULL);
    }
    function Booking_listing()
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
            
            $count = $this->booking_model->booking_listing_count($searchText);

            $returns = $this->paginationCompress ( "booking_listing/", $count, 10 );
            
            $data['contact'] = $this->booking_model->booking_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'PPG';
            
            $this->loadViews("booking/booking_confirm", $this->global, $data, NULL);
        }
    }
}