<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Kick_starter_work extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kick_starter_work_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function kick_starter_work_listing()
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
            
            $count = $this->kick_starter_work_model->kick_starter_work_listing_count($searchText);

            $returns = $this->paginationCompress ( "kick_starter_work_listing/", $count, 10 );
            
            $data['kick_starter_works'] = $this->kick_starter_work_model->kick_starter_work_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : kick_starter_work Listing';
            
            $this->loadViews("kick_starter_work/kick_starter_work_listing", $this->global, $data, NULL);
        }
    }
    function addkick_starter_work()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('kick_starter_work_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New kick_starter_work';

            $this->loadViews("kick_starter_work/addkick_starter_work", $this->global, NULL);
        }
    }

    function addkick_starter_workConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title_one','Title 1','trim|required');
            $this->form_validation->set_rules('section_one','Section 1','trim|required');
            $this->form_validation->set_rules('title_two','Title 2','trim|required');
            $this->form_validation->set_rules('section_two','Section 2','trim|required');
            $this->form_validation->set_rules('title_three','Title 3','trim|required');
            $this->form_validation->set_rules('section_three','Section 3','trim|required');
            $this->form_validation->set_rules('title_four','Title 4','trim|required');
            $this->form_validation->set_rules('section_four','Section 4','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addkick_starter_work();
            }
            else
            {
                $title_one = $this->input->post('title_one');
                $section_one = $this->input->post('section_one');
                $title_two = $this->input->post('title_two');
                $section_two = $this->input->post('section_two');
                $title_three = $this->input->post('title_three');
                $section_three = $this->input->post('section_three');
                $title_four = $this->input->post('title_four');
                $section_four = $this->input->post('section_four');

                $kick_starter_workInfo = array('title_one'=>$title_one, 'section_one'=>$section_one, 'title_two'=>$title_two, 'section_two'=>$section_two, 'title_three'=>$title_three, 'section_three'=>$section_three, 'title_four'=>$title_four, 'section_four'=>$section_four, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($kick_starter_workInfo);

                $this->load->model('kick_starter_work_model');
                $result = $this->kick_starter_work_model->addkick_starter_work($kick_starter_workInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addkick_starter_work');
            }
        }
    }
    function editkick_starter_work($kick_starter_work_id = NULL)
    {
        if($this->isAdmin() == TRUE && $kick_starter_work_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($kick_starter_work_id == null)
            {
                redirect('kick_starter_work_listing');
            }
            $data['kick_starter_workInfo'] = $this->kick_starter_work_model->getkick_starter_workInfo($kick_starter_work_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit kick_starter_work';
            
            $this->loadViews("kick_starter_work/editkick_starter_work", $this->global, $data, NULL);
        }
    }
    function editkick_starter_workConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $kick_starter_work_id = $this->input->post('kick_starter_work_id');
            
            $this->form_validation->set_rules('title_one','Title 1','trim|required');
            $this->form_validation->set_rules('section_one','Section 1','trim|required');
            $this->form_validation->set_rules('title_two','Title 2','trim|required');
            $this->form_validation->set_rules('section_two','Section 2','trim|required');
            $this->form_validation->set_rules('title_three','Title 3','trim|required');
            $this->form_validation->set_rules('section_three','Section 3','trim|required');
            $this->form_validation->set_rules('title_four','Title 4','trim|required');
            $this->form_validation->set_rules('section_four','Section 4','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editkick_starter_work($kick_starter_work_id);
            }
            else
            {
                $title_one = $this->input->post('title_one');
                $section_one = $this->input->post('section_one');
                $title_two = $this->input->post('title_two');
                $section_two = $this->input->post('section_two');
                $title_three = $this->input->post('title_three');
                $section_three = $this->input->post('section_three');
                $title_four = $this->input->post('title_four');
                $section_four = $this->input->post('section_four');
                
                $kick_starter_workInfo = array('title_one'=>$title_one, 'section_one'=>$section_one, 'title_two'=>$title_two, 'section_two'=>$section_two, 'title_three'=>$title_three, 'section_three'=>$section_three, 'title_four'=>$title_four, 'section_four'=>$section_four, 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->kick_starter_work_model->editkick_starter_work($kick_starter_workInfo, $kick_starter_work_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editkick_starter_work/'.$kick_starter_work_id);
            }
        }
    }

    function kick_starter_work_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $kick_starter_work_id= $this->input->post('kick_starter_work_id');
            $data = $this->kick_starter_work_model->getkick_starter_workInfo($kick_starter_work_id);
            echo json_encode($data);
        }
    }

    function deletekick_starter_work($kick_starter_work_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->kick_starter_work_model->deleteInfo($kick_starter_work_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('kick_starter_work_listing');
        }
    }
}
?>