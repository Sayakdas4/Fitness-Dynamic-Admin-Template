<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Coaching_work extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('coaching_work_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function coaching_work_listing()
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
            
            $count = $this->coaching_work_model->coaching_work_listing_count($searchText);

            $returns = $this->paginationCompress ( "coaching_work_listing/", $count, 10 );
            
            $data['coaching_works'] = $this->coaching_work_model->coaching_work_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : coaching_work Listing';
            
            $this->loadViews("coaching_work/coaching_work_listing", $this->global, $data, NULL);
        }
    }
    function addcoaching_work()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('coaching_work_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New coaching_work';

            $this->loadViews("coaching_work/addcoaching_work", $this->global, NULL);
        }
    }

    function addcoaching_workConfig()
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
                $this->addcoaching_work();
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

                $coaching_workInfo = array('title_one'=>$title_one, 'section_one'=>$section_one, 'title_two'=>$title_two, 'section_two'=>$section_two, 'title_three'=>$title_three, 'section_three'=>$section_three, 'title_four'=>$title_four, 'section_four'=>$section_four, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($coaching_workInfo);

                $this->load->model('coaching_work_model');
                $result = $this->coaching_work_model->addcoaching_work($coaching_workInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addcoaching_work');
            }
        }
    }
    function editcoaching_work($coaching_work_id = NULL)
    {
        if($this->isAdmin() == TRUE && $coaching_work_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($coaching_work_id == null)
            {
                redirect('coaching_work_listing');
            }
            $data['coaching_workInfo'] = $this->coaching_work_model->getcoaching_workInfo($coaching_work_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit coaching_work';
            
            $this->loadViews("coaching_work/editcoaching_work", $this->global, $data, NULL);
        }
    }
    function editcoaching_workConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $coaching_work_id = $this->input->post('coaching_work_id');
            
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
                $this->editcoaching_work($coaching_work_id);
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
                
                $coaching_workInfo = array('title_one'=>$title_one, 'section_one'=>$section_one, 'title_two'=>$title_two, 'section_two'=>$section_two, 'title_three'=>$title_three, 'section_three'=>$section_three, 'title_four'=>$title_four, 'section_four'=>$section_four, 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->coaching_work_model->editcoaching_work($coaching_workInfo, $coaching_work_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editcoaching_work/'.$coaching_work_id);
            }
        }
    }

    function coaching_work_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $coaching_work_id= $this->input->post('coaching_work_id');
            $data = $this->coaching_work_model->getcoaching_workInfo($coaching_work_id);
            echo json_encode($data);
        }
    }

    function deletecoaching_work($coaching_work_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->coaching_work_model->deleteInfo($coaching_work_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('coaching_work_listing');
        }
    }
}
?>