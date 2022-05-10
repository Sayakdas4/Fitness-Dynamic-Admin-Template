<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Fitness_recipe extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fitness_recipe_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function fitness_recipe_listing()
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
            
            $count = $this->fitness_recipe_model->fitness_recipe_listing_count($searchText);

            $returns = $this->paginationCompress ( "fitness_recipe_listing/", $count, 10 );
            
            $data['fitness_recipes'] = $this->fitness_recipe_model->fitness_recipe_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : fitness_recipe Listing';
            
            $this->loadViews("fitness_recipe/fitness_recipe_listing", $this->global, $data, NULL);
        }
    }
    function addfitness_recipe()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('fitness_recipe_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New fitness_recipe';
            $data['preferences'] = $this->fitness_recipe_model->get_all_preference();
            $data['recipe_types'] = $this->fitness_recipe_model->get_all_recipe_type();
            $data['macro_preferences'] = $this->fitness_recipe_model->get_all_macro_preference();
            $data['simplicity_factors'] = $this->fitness_recipe_model->get_all_simplicity_factor();

            $this->loadViews("fitness_recipe/addfitness_recipe", $this->global, $data, NULL);
        }
    }

    function addfitness_recipeConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addfitness_recipe();
            }
            else
            {
                $preferenceID = $this->input->post('preferenceID');
                $recipe_typeID = $this->input->post('recipe_typeID');

                $simplicityID = $this->input->post('simplicityID[]');
                $macroID = $this->input->post('macroID[]');

                $title = $this->input->post('title');
                $image = $this->input->post('image');
                $ingredients = $this->input->post('ingredients');
                $preparations = $this->input->post('preparations');
                $pro_tip = $this->input->post('pro_tip');
                $total_time = $this->input->post('total_time');
                $difficulty = $this->input->post('difficulty');
                $makes = $this->input->post('makes');
                $cuisine = $this->input->post('cuisine');
                $calories = $this->input->post('calories');
                $fats = $this->input->post('fats');
                $carb = $this->input->post('carb');
                $protein = $this->input->post('protein');

                $data = array(); 
                if(!empty($_FILES['image'])){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '100000'; // max_size in kb 
                    $config['file_name'] = $_FILES['image']['name'];
                    $config['encrypt_name'] = TRUE;

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('image')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        // Load Resize Library
                        $config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                        $config1['new_image'] = 'uploads/'.$filename;
                        $config1['width']     = 1920;
                        $config1['height']   = 1080;
                        $this->load->library('image_lib', $config1); 
                        if ($this->image_lib->resize()){ 
                            $data['response'] = 'successfully uploaded '.$filename; 
                        }
                        else {
                            $data['response'] = 'failed'; 
                        }
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                     $data['response'] = 'failed'; 
                } 
                // load view 
                $this->load->view('fitness_recipe/addfitness_recipe',$data);

                $fitness_recipeInfo = array('preferenceID'=>$preferenceID, 'recipe_typeID'=>$recipe_typeID, 'title'=>$title, 'image'=>$filename, 'ingredients'=>$ingredients, 'preparations'=>$preparations, 'pro_tip'=>$pro_tip, 'total_time'=>$total_time, 'difficulty'=>$difficulty, 'makes'=>$makes, 'cuisine'=>$cuisine, 'calories'=>$calories, 'fats'=>$fats, 'carb'=>$carb, 'protein'=>$protein, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($fitness_recipeInfo);

                $this->load->model('fitness_recipe_model');
                $result = $this->fitness_recipe_model->addfitness_recipe($fitness_recipeInfo);

                if(!empty($macroID)){
                    foreach($macroID as $mid){
                        $check_boxdata = array(
                            'fitness_recipeID' => $result,
                            'check_boxID' => $mid
                        );
                        
                        $check_box_result = $this->fitness_recipe_model->addfitness_recipe_check_box($check_boxdata);
                    } 
                } else{
                    $check_boxdata = array(
                        'fitness_recipeID' => $result,
                        'check_boxID' => 0
                    );
                    $check_box_result = $this->fitness_recipe_model->addfitness_recipe_check_box($check_boxdata);
                }

                if($simplicityID){
                    foreach($simplicityID as $sid){
                        $check_boxdata1 = array(
                            'fitness_recipeID' => $result,
                            'check_boxID' => $sid
                        );
                        
                        $check_box_result1 = $this->fitness_recipe_model->addfitness_recipe_simplicity_check_box($check_boxdata1);
                    } 
                }
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addfitness_recipe');
            }
        }
    }
    function editfitness_recipe($fitness_recipe_id = NULL, $fitness_recipe_check_box_id = NULL)
    {
        if($this->isAdmin() == TRUE && $fitness_recipe_id == 1 && $fitness_recipe_check_box_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($fitness_recipe_id == null && $fitness_recipe_check_box_id == null)
            {
                redirect('fitness_recipe_listing');
            }
            $data['fitness_recipeInfo'] = $this->fitness_recipe_model->getfitness_recipeInfo($fitness_recipe_id);
            // Macro
            $getfitness_recipe_check_boxInfo = $this->fitness_recipe_model->getfitness_recipe_check_boxInfo($fitness_recipe_id);
            $data['getfitness_recipe_check_boxInfo'] = $getfitness_recipe_check_boxInfo;

            $array_macroID = array();
            foreach($getfitness_recipe_check_boxInfo as $macroID){
                $check_boxID = $macroID->check_boxID;
                array_push($array_macroID, $check_boxID);
            }
            $data['array_macroID'] = $array_macroID;
            // Simplicity
            $getfitness_recipe_simplicity_check_boxInfo = $this->fitness_recipe_model->getfitness_recipe_simplicity_check_boxInfo($fitness_recipe_id);
            $data['getfitness_recipe_simplicity_check_boxInfo'] = $getfitness_recipe_simplicity_check_boxInfo;

            $array_simplicityID = array();
            foreach($getfitness_recipe_simplicity_check_boxInfo as $simplicityID){
                $check_boxID = $simplicityID->check_boxID;
                array_push($array_simplicityID, $check_boxID);
            }
            $data['array_simplicityID'] = $array_simplicityID;

            $data['preferences'] = $this->fitness_recipe_model->get_all_preference();
            $data['recipe_types'] = $this->fitness_recipe_model->get_all_recipe_type();
            $data['macro_preferences'] = $this->fitness_recipe_model->get_all_macro_preference();
            $data['simplicity_factors'] = $this->fitness_recipe_model->get_all_simplicity_factor();

            $this->global['pageTitle'] = 'Mil Paints : Edit fitness_recipe';
            
            $this->loadViews("fitness_recipe/editfitness_recipe", $this->global, $data, NULL);
        }
    }
    function editfitness_recipeConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $fitness_recipe_id = $this->input->post('fitness_recipe_id');
            $fitness_recipe_check_box_id = $this->input->post('fitness_recipe_check_box_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editfitness_recipe($fitness_recipe_id);
            }
            else
            {
                $preferenceID = $this->input->post('preferenceID');
                $recipe_typeID = $this->input->post('recipe_typeID');

                $simplicityID = $this->input->post('simplicityID[]');
                $macroID = $this->input->post('macroID[]');

                $title = $this->input->post('title');
                // $image = $this->input->post('image');
                $ingredients = $this->input->post('ingredients');
                $preparations = $this->input->post('preparations');
                $pro_tip = $this->input->post('pro_tip');
                $total_time = $this->input->post('total_time');
                $difficulty = $this->input->post('difficulty');
                $makes = $this->input->post('makes');
                $cuisine = $this->input->post('cuisine');
                $calories = $this->input->post('calories');
                $fats = $this->input->post('fats');
                $carb = $this->input->post('carb');
                $protein = $this->input->post('protein');
                
                $fitness_recipeInfo = array('preferenceID'=>$preferenceID, 'recipe_typeID'=>$recipe_typeID, 'title'=>$title, 'ingredients'=>$ingredients, 'preparations'=>$preparations, 'pro_tip'=>$pro_tip, 'total_time'=>$total_time, 'difficulty'=>$difficulty, 'makes'=>$makes, 'cuisine'=>$cuisine, 'calories'=>$calories, 'fats'=>$fats, 'carb'=>$carb, 'protein'=>$protein, 'updated_at'=>date('Y-m-d H:i:s'));
                $data = array(); 
                if($_FILES['image']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '100000'; // max_size in kb 
                    $config['file_name'] = $_FILES['image']['name'];
                    $config['encrypt_name'] = TRUE;

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('image')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        // Load Resize Library
                        $config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                        $config1['new_image'] = 'uploads/'.$filename;
                        $config1['width']     = 1920;
                        $config1['height']   = 1080;
                        $this->load->library('image_lib', $config1); 
                        if ($this->image_lib->resize()){ 
                            $data['response'] = 'successfully uploaded '.$filename; 
                        }
                        else {
                            $data['response'] = 'failed'; 
                        }
                        $fitness_recipeInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->fitness_recipe_model->editfitness_recipe($fitness_recipeInfo, $fitness_recipe_id);
                // dd($result);

                if(!empty($macroID)){
                    $this->fitness_recipe_model->deletefitness_recipe_check_boxInfo($fitness_recipe_id);
                    foreach($macroID as $mid){
                        $check_boxdata = array(
                            'fitness_recipeID' => $fitness_recipe_id,
                            'check_boxID' => $mid
                        );
                        
                        $check_box_result = $this->fitness_recipe_model->addfitness_recipe_check_box($check_boxdata);
                    } 
                } else{
                    $this->fitness_recipe_model->deletefitness_recipe_check_boxInfo($fitness_recipe_id);
                    $check_boxdata = array(
                        'fitness_recipeID' => $fitness_recipe_id,
                        'check_boxID' => 0
                    );
                    
                    $check_box_result = $this->fitness_recipe_model->addfitness_recipe_check_box($check_boxdata);
                }

                if(!empty($simplicityID)){
                    $this->fitness_recipe_model->deletefitness_recipe_simplicity_check_boxInfo($fitness_recipe_id); 
                    foreach($simplicityID as $sid){
                        $check_boxdata1 = array(
                            'fitness_recipeID' => $fitness_recipe_id,
                            'check_boxID' => $sid
                        );
                        
                        $check_box_result1 = $this->fitness_recipe_model->addfitness_recipe_simplicity_check_box($check_boxdata1);
                    } 
                } else{
                    $this->fitness_recipe_model->deletefitness_recipe_simplicity_check_boxInfo($fitness_recipe_id);
                }
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editfitness_recipe/'.$fitness_recipe_id);
            }
        }
    }

    function fitness_recipe_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $fitness_recipe_id= $this->input->post('fitness_recipe_id');
            $data = $this->fitness_recipe_model->getfitness_recipeInfo($fitness_recipe_id);
            echo json_encode($data);
        }
    }

    function deletefitness_recipe($fitness_recipe_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->fitness_recipe_model->deleteInfo($fitness_recipe_id);
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('fitness_recipe_listing');
        }
    }
}
?>