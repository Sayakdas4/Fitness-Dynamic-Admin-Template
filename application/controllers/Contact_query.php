<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Contact_query extends BaseController
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_query_model');
        $this->isLoggedIn();   
    }
    public function index() 
    {
        $this->global['pageTitle'] = 'Caucasus Heritage : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL, NULL);
    }
    function contact_query_listing()
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
            
            $count = $this->contact_query_model->contact_query_listing_count($searchText);

            $returns = $this->paginationCompress ( "contact_query_listing/", $count, 5 );
            
            $data['contact'] = $this->contact_query_model->contact_query_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Caucasus Heritage : User Listing';
            
            $this->loadViews("contact_query/contact_query_listing", $this->global, $data, NULL);
        }
    }
}