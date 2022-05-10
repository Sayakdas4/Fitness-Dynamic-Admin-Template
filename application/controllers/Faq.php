<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Faq extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('faq_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function faq_listing($title="")
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            // $title = htmlentities(escapeString($this->uri->segment(3)));
            if($title) {
                $data['faq_title'] = $this->faq_model->get_title($title);
                $data['faqs'] = $this->faq_model->get_faq_by_title($title);
                $this->global['pageTitle'] = 'The Fit Chase : FAQ Listing';
                $this->loadViews("faq/faq_listing", $this->global, $data, NULL);
            } else {
                $data['set'] = $title;
                $data['faq_title'] = $this->faq_model->get_title($title);
                $data['faqs'] = $this->faq_model->get_faq_by_title($title);
                $this->global['pageTitle'] = 'The Fit Chase : FAQ Listing';
                $this->loadViews("faq/faq_listing", $this->global, $data, NULL);
            }
            // $data['faq_title'] = $this->faq_model->get_title($title);
            // $data['faqs'] = $this->faq_model->get_faq_by_title($title);
            // $this->global['pageTitle'] = 'The Fit Chase : FAQ Listing';
            // $this->loadViews("faq/faq_listing", $this->global, $data, NULL);
        }
    }

    public function faq_details_by_title() {
        $title= $this->input->post('title');
        if((int)$title) {
            $string = base_url("faq/faq_listing/$title");
            echo $string;
        } else {
            redirect(base_url("faq/faq_listing"));
        }
    }

    function addfaq()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('faq_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New faq';

            $this->loadViews("faq/addfaq", $this->global, NULL);
        }
    }
    function addfaqConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('question','Question','trim|required');
            $this->form_validation->set_rules('answer','Answer','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addfaq();
            }
            else
            {
                $title = $this->input->post('title');
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                $data = array(); 

                $faqInfo = array('title'=>$title, 'question'=>$question, 'answer'=>$answer, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($faqInfo);

                $this->load->model('faq_model');
                $result = $this->faq_model->addfaq($faqInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addfaq');
            }
        }
    }
    function editfaq($faq_id = NULL)
    {
        if($this->isAdmin() == TRUE && $faq_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($faq_id == null)
            {
                redirect('faq_listing');
            }
            $data['faqInfo'] = $this->faq_model->getfaqInfo($faq_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit faq';
            
            $this->loadViews("faq/editfaq", $this->global, $data, NULL);
        }
    }
    function editfaqConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $faq_id = $this->input->post('faq_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('question','Question','trim|required');
            $this->form_validation->set_rules('answer','Answer','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editfaq($faq_id);
            }
            else
            {
                $title = $this->input->post('title');
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                $faqInfo = array('title'=>$title, 'question'=>$question, 'answer'=>$answer, 'updated_at'=>date('Y-m-d H:i:s'));
                $data = array(); 

                
                $result = $this->faq_model->editfaq($faqInfo, $faq_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editfaq/'.$faq_id);
            }
        }
    }

    function faq_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $faq_id= $this->input->post('faq_id');
            $title= $this->input->post('title');
            $data = $this->faq_model->get_faqid_title($faq_id, $title);
            echo json_encode($data);
        }
    }

    function deletefaq($faq_id = NULL, $title = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->faq_model->deleteInfo($faq_id, $title);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            if($title == 1) { redirect('faq_listing/1'); }
            if($title == 2) { redirect('faq_listing/2'); }
            if($title == 3) { redirect('faq_listing/3'); }
        }
    }
}
?>