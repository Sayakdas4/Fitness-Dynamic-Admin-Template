<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Coaching_pricing extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('coaching_pricing_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function coaching_pricing_listing()
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
            
            $count = $this->coaching_pricing_model->coaching_pricing_listing_count($searchText);

            $returns = $this->paginationCompress ( "coaching_pricing_listing/", $count, 10 );
            
            $data['coaching_pricings'] = $this->coaching_pricing_model->coaching_pricing_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : coaching_pricing Listing';
            
            $this->loadViews("coaching_pricing/coaching_pricing_listing", $this->global, $data, NULL);
        }
    }
    function addcoaching_pricing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('coaching_pricing_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New coaching_pricing';

            $this->loadViews("coaching_pricing/addcoaching_pricing", $this->global, NULL);
        }
    }

    function addcoaching_pricingConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('duration','duration','trim|required');
            $this->form_validation->set_rules('duration_format','Duration Format','trim|required');
            $this->form_validation->set_rules('price','price','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addcoaching_pricing();
            }
            else
            {
                $duration = $this->input->post('duration');
                $duration_format = $this->input->post('duration_format');
                $price = $this->input->post('price');

                $coaching_pricingInfo = array('duration'=>$duration, 'duration_format'=>$duration_format, 'price'=>$price, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($coaching_pricingInfo);

                $this->load->model('coaching_pricing_model');
                $result = $this->coaching_pricing_model->addcoaching_pricing($coaching_pricingInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addcoaching_pricing');
            }
        }
    }
    function editcoaching_pricing($coaching_pricing_id = NULL)
    {
        if($this->isAdmin() == TRUE && $coaching_pricing_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($coaching_pricing_id == null)
            {
                redirect('coaching_pricing_listing');
            }
            $data['coaching_pricingInfo'] = $this->coaching_pricing_model->getcoaching_pricingInfo($coaching_pricing_id);
            // dd($data['coaching_pricingInfo']);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit coaching_pricing';
            
            $this->loadViews("coaching_pricing/editcoaching_pricing", $this->global, $data, NULL);
        }
    }
    function editcoaching_pricingConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $coaching_pricing_id = $this->input->post('coaching_pricing_id');
            
            $this->form_validation->set_rules('duration','duration','trim|required');
            $this->form_validation->set_rules('duration_format','Duration Format','trim|required');
            $this->form_validation->set_rules('price','price','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editcoaching_pricing($coaching_pricing_id);
            }
            else
            {
                $duration = $this->input->post('duration');
                $duration_format = $this->input->post('duration_format');
                $price = $this->input->post('price');
                $coaching_pricingInfo = array('duration'=>$duration, 'duration_format'=>$duration_format, 'price'=>$price, 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->coaching_pricing_model->editcoaching_pricing($coaching_pricingInfo, $coaching_pricing_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editcoaching_pricing/'.$coaching_pricing_id);
            }
        }
    }

    function coaching_pricing_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $coaching_pricing_id= $this->input->post('coaching_pricing_id');
            $data = $this->coaching_pricing_model->getcoaching_pricingInfo($coaching_pricing_id);
            echo json_encode($data);
        }
    }

    function deletecoaching_pricing($coaching_pricing_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->coaching_pricing_model->deleteInfo($coaching_pricing_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('coaching_pricing_listing');
        }
    }
}
?>