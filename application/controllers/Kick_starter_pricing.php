<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Kick_starter_pricing extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kick_starter_pricing_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function kick_starter_pricing_listing()
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
            
            $count = $this->kick_starter_pricing_model->kick_starter_pricing_listing_count($searchText);

            $returns = $this->paginationCompress ( "kick_starter_pricing_listing/", $count, 10 );
            
            $data['kick_starter_pricings'] = $this->kick_starter_pricing_model->kick_starter_pricing_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : kick_starter_pricing Listing';
            
            $this->loadViews("kick_starter_pricing/kick_starter_pricing_listing", $this->global, $data, NULL);
        }
    }
    function addkick_starter_pricing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('kick_starter_pricing_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New kick_starter_pricing';

            $this->loadViews("kick_starter_pricing/addkick_starter_pricing", $this->global, NULL);
        }
    }

    function addkick_starter_pricingConfig()
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
                $this->addkick_starter_pricing();
            }
            else
            {
                $duration = $this->input->post('duration');
                $duration_format = $this->input->post('duration_format');
                $price = $this->input->post('price');

                $kick_starter_pricingInfo = array('duration'=>$duration, 'duration_format'=>$duration_format, 'price'=>$price, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($kick_starter_pricingInfo);

                $this->load->model('kick_starter_pricing_model');
                $result = $this->kick_starter_pricing_model->addkick_starter_pricing($kick_starter_pricingInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addkick_starter_pricing');
            }
        }
    }
    function editkick_starter_pricing($kick_starter_pricing_id = NULL)
    {
        if($this->isAdmin() == TRUE && $kick_starter_pricing_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($kick_starter_pricing_id == null)
            {
                redirect('kick_starter_pricing_listing');
            }
            $data['kick_starter_pricingInfo'] = $this->kick_starter_pricing_model->getkick_starter_pricingInfo($kick_starter_pricing_id);
            // dd($data['kick_starter_pricingInfo']);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit kick_starter_pricing';
            
            $this->loadViews("kick_starter_pricing/editkick_starter_pricing", $this->global, $data, NULL);
        }
    }
    function editkick_starter_pricingConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $kick_starter_pricing_id = $this->input->post('kick_starter_pricing_id');
            
            $this->form_validation->set_rules('duration','duration','trim|required');
            $this->form_validation->set_rules('duration_format','Duration Format','trim|required');
            $this->form_validation->set_rules('price','price','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editkick_starter_pricing($kick_starter_pricing_id);
            }
            else
            {
                $duration = $this->input->post('duration');
                $duration_format = $this->input->post('duration_format');
                $price = $this->input->post('price');
                $kick_starter_pricingInfo = array('duration'=>$duration, 'duration_format'=>$duration_format, 'price'=>$price, 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->kick_starter_pricing_model->editkick_starter_pricing($kick_starter_pricingInfo, $kick_starter_pricing_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editkick_starter_pricing/'.$kick_starter_pricing_id);
            }
        }
    }

    function kick_starter_pricing_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $kick_starter_pricing_id= $this->input->post('kick_starter_pricing_id');
            $data = $this->kick_starter_pricing_model->getkick_starter_pricingInfo($kick_starter_pricing_id);
            echo json_encode($data);
        }
    }

    function deletekick_starter_pricing($kick_starter_pricing_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->kick_starter_pricing_model->deleteInfo($kick_starter_pricing_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('kick_starter_pricing_listing');
        }
    }
}
?>