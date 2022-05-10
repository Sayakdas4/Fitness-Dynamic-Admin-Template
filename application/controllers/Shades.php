<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Shades extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('shades_model');
        $this->load->library('csvimport');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function shades_listing_1()
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
            
            $count = $this->shades_model->shades_listing_count_1($searchText);

            $returns = $this->paginationCompress ( "federal-standard-595c/", $count, 10 );
            
            $data['shadess1'] = $this->shades_model->shades_listing_1($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : shades Listing';
            
            $this->loadViews("shades/shades_listing_1", $this->global, $data, NULL);
        }
    }

    public function shades_listing_2()
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
            
            $count = $this->shades_model->shades_listing_count_2($searchText);

            $returns = $this->paginationCompress ( "ral-card-shades/", $count, 10 );
            
            $data['shadess2'] = $this->shades_model->shades_listing_2($searchText, $returns["page"], $returns["segment"]);
            // dd($data['shadess2']);
            $this->global['pageTitle'] = 'Mil Paints : shades Listing';
            
            $this->loadViews("shades/shades_listing_2", $this->global, $data, NULL);
        }
    }

    public function shades_listing_3()
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
            
            $count = $this->shades_model->shades_listing_count_3($searchText);

            $returns = $this->paginationCompress ( "bs-381c-color-chart/", $count, 10 );
            
            $data['shadess3'] = $this->shades_model->shades_listing_3($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : shades Listing';
            
            $this->loadViews("shades/shades_listing_3", $this->global, $data, NULL);
        }
    }

    function addshades()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('shades_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New shades';


            $this->loadViews("shades/addshades", $this->global, NULL);
        }
    }
    function addshadesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('type','Card Type','trim|required');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('code','Code','trim|required');
            $this->form_validation->set_rules('color','Color','trim|required');
            if($this->form_validation->run() == FALSE)
            {
                $this->addshades();
            }
            else
            {
                $type = $this->input->post('type');
                $title = $this->input->post('title');
                $code = $this->input->post('code');
                $color = $this->input->post('color');
                $name = $this->input->post('name');

                $shadesInfo = array('type'=>$type, 'title'=>$title, 'code'=>$code, 'color'=>$color, 'name'=>$name, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($shadesInfo);
                $result = $this->shades_model->addshades($shadesInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                if($type == 1) { redirect('federal-standard-595c'); }
                if($type == 2) { redirect('ral-card-shades'); }
                if($type == 3) { redirect('bs-381c-color-chart'); }
            }
        }
    }
    function editshades($shades_id = NULL)
    {
        if($this->isAdmin() == TRUE && $shades_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($shades_id == null)
            {
                redirect('shades_listing');
            }
            $data['shadesInfo'] = $this->shades_model->getshadesInfo($shades_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit shades';
            
            $this->loadViews("shades/editshades", $this->global, $data, NULL);
        }
    }
    function editshadesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $shades_id = $this->input->post('shades_id');
            
            $this->form_validation->set_rules('type','Card Type','trim|required');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('code','Code','trim|required');
            $this->form_validation->set_rules('color','Color','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editshades($shades_id);
            }
            else
            {
                $type = $this->input->post('type');
                $title = $this->input->post('title');
                $code = $this->input->post('code');
                $color = $this->input->post('color');
                $name = $this->input->post('name');

                $shadesInfo = array('type'=>$type, 'title'=>$title, 'code'=>$code, 'color'=>$color, 'name'=>$name, 'updated_at'=>date('Y-m-d H:i:s'));
                $result = $this->shades_model->editshades($shadesInfo, $shades_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                if($type == 1) { redirect('federal-standard-595c'); }
                if($type == 2) { redirect('ral-card-shades'); }
                if($type == 3) { redirect('bs-381c-color-chart'); }
            }
        }
    }
    function bulk_upload(){
        $this->global['pageTitle'] = 'Mil Paints : Shades Card';
        $this->loadViews("shades/bulk_upload", $this->global, NULL);
    }
    function import()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            // $this->data['groups']    = $this->question_group_m->get_order_by_question_group();

            $file_data  = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
            // dd($file_data);
            foreach($file_data  as $row)
            {
                $type = $row['type'];
                $code = $row['code'];
                $shades_card_type = $this->shades_model->check_card($type);
                $shades_card = $this->shades_model->check_card($code);
                if((!empty($shades_card)) && $shades_card_type == $shades_card->type){
                    $shadesID = $shades_card->shades_id;
                }
                else{
                    $type = $type;
                    $title = $row['title'];
                    $code = $code;
                    $color = $row['color'];
                    $name = $row['name'];
                    $shadesInfo = array('type'=>$type, 'title'=>$title, 'code'=>$code, 'color'=>rgb2hex2rgb($color), 'name'=>$name, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s'));
                    // dd($shadesInfo);
                    $shadesID = $this->shades_model->addshades($shadesInfo);
                }
            }
            if($shadesID > 0) {
                $this->session->set_flashdata('success', 'Add successfully');
            } else {
                $this->session->set_flashdata('error', 'Creation failed');
            }
            
            if($row['type'] == 1) { redirect('federal-standard-595c'); }
            if($row['type'] == 2) { redirect('ral-card-shades'); }
            if($row['type'] == 3) { redirect('bs-381c-color-chart'); }
        }
    }

    function deleteshades($shades_id = NULL, $type=NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->shades_model->deleteInfo($shades_id, $type);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            if($type == 1) { redirect('federal-standard-595c'); }
            if($type == 2) { redirect('ral-card-shades'); }
            if($type == 3) { redirect('bs-381c-color-chart'); }
        }
    }
}
?>