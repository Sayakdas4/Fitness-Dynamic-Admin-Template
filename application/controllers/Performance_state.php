<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Performance_state extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('performance_state_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function performance_state_listing()
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
            
            $count = $this->performance_state_model->performance_state_listing_count($searchText);

            $returns = $this->paginationCompress ( "performance_state_listing/", $count, 10 );
            
            $data['performance_states'] = $this->performance_state_model->performance_state_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : performance_state Listing';
            
            $this->loadViews("performance_state/performance_state_listing", $this->global, $data, NULL);
        }
    }
    function addperformance_state()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('performance_state_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New performance_state';

            $this->loadViews("performance_state/addperformance_state", $this->global, NULL);
        }
    }

    function addperformance_stateConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('count','Count','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addperformance_state();
            }
            else
            {
                $title = $this->input->post('title');
                $count = $this->input->post('count');

                $performance_stateInfo = array('title'=>$title, 'count'=>$count, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($performance_stateInfo);

                $this->load->model('performance_state_model');
                $result = $this->performance_state_model->addperformance_state($performance_stateInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addperformance_state');
            }
        }
    }
    function editperformance_state($performance_state_id = NULL)
    {
        if($this->isAdmin() == TRUE && $performance_state_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($performance_state_id == null)
            {
                redirect('performance_state_listing');
            }
            $data['performance_stateInfo'] = $this->performance_state_model->getperformance_stateInfo($performance_state_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit performance_state';
            
            $this->loadViews("performance_state/editperformance_state", $this->global, $data, NULL);
        }
    }
    function editperformance_stateConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $performance_state_id = $this->input->post('performance_state_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('count','Count','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editperformance_state($performance_state_id);
            }
            else
            {
                $title = $this->input->post('title');
                $count = $this->input->post('count');
                $performance_stateInfo = array('title'=>$title, 'count'=>$count, 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->performance_state_model->editperformance_state($performance_stateInfo, $performance_state_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editperformance_state/'.$performance_state_id);
            }
        }
    }

    function performance_state_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $performance_state_id= $this->input->post('performance_state_id');
            $data = $this->performance_state_model->getperformance_stateInfo($performance_state_id);
            echo json_encode($data);
        }
    }

    function deleteperformance_state($performance_state_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->performance_state_model->deleteInfo($performance_state_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('performance_state_listing');
        }
    }
}
?>