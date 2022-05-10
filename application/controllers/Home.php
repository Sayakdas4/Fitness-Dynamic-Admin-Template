<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
require APPPATH . '/libraries/FrontController.php';
class Home extends FrontController {

    public function __construct(){
        parent::__construct();
        $this->load->helper('cias');
        $this->load->model('home_model');
        $this->load->model('kick_starter_pricing_model');
        $this->load->model('razorpay_model');
        $this->load->model('fitness_recipe_model');
        $this->load->model('exercise_video_model');
        $this->load->model('knowledge_library_model');
        $this->load->model('contact_query_model');

        
        $this->load->library('session');
        $session_data = $this->session->userdata('logged_in');
        $session_google_data = $this->session->userdata('user_data');
        
        // if($session_data){
        //     $user_id = $session_data['user_id'];
        // }
    }


// Home
    public function index() {
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // $data['google'] = $this->home_model->get_googleanalytics_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['home_banner'] = $this->home_model->get_home_banner_by_id();
        $data['featured_in'] = $this->home_model->get_all_featured_in_data();
        $data['home_datas'] = $this->home_model->get_home_management_data();
        $data['home_team'] = $this->home_model->get_home_management_by_id_4();
        $data['team2'] = $this->home_model->get_team_by_id_2();
        $data['team3'] = $this->home_model->get_team_by_id_3();
        $data['team4'] = $this->home_model->get_team_by_id_4();
        $data['team5'] = $this->home_model->get_team_by_id_5();
        $data['team9'] = $this->home_model->get_team_by_id_9();
        $data['success_stories'] = $this->home_model->get_all_success_stories_home();
        $data['home_sucess'] = $this->home_model->get_home_management_by_id_5();
        $data['home_pricing'] = $this->home_model->get_home_management_by_id_6();
        $data['kick_starter_pricing'] = $this->home_model->get_all_kick_starter_pricing_for_home();
        $data['coaching_pricing'] = $this->home_model->get_all_coaching_pricing_for_home();
        $data['home_compare'] = $this->home_model->get_home_management_by_id_7();
        $data['home_book'] = $this->home_model->get_home_management_by_id_8();


        $this->load->view("front/index", $data);
    }


// Team Popup
    // public function team_details(){
    //     $data= array();
    //     $status= true;
    //     $html="";
    //     $team_id= $this->input->post('team_id');
    //     $data = $this->home_model->get_team_by_id($team_id);
    //     echo json_encode($data);
    // }

// Booking Consultation
    public function booking() {
        $status= false;
        $mailData = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'phone' => $_POST['phone'],
            'date' => $_POST['date'],
            'time' => $_POST['time'],
            'message' => $_POST['message'],
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->load->model('home_model');
        $this->home_model->addcontact($mailData);
        $this->sendBooking($mailData);
        echo json_encode(['status'=>$status]);
        die;
    }

// Contact Us
    public function contact_submit() {
        $status= false;
        $mailData = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'phone' => $_POST['phone'],
            'message' => $_POST['message'],
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->load->model('home_model');
        $this->home_model->addcontact_us($mailData);
        $this->sendEmail($mailData);
        echo json_encode(['status'=>$status]);
        die;
    }

// Mail Function For Booking Consultation
    private function sendBooking($mailData){
        $this->load->library('email');
        $to = "sayakdas14091999@gmail.com";
        $from = $mailData['email'];
        $fromName = $mailData['name'];
        $mailSubject = 'Booking Request - '.$mailData['subject'];
        $mailContent = '
            <h2>Booking Request Submitted</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Phone: </b>'.$mailData['phone'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>
        ';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        return $this->email->send()?true:false;
    }

// Mail Function For Contact Us
    private function sendEmail($mailData){
        $this->load->library('email');
        $to = "sayakdas14091999@gmail.com";
        $from = $mailData['email'];
        $fromName = $mailData['name'];
        $mailSubject = 'Contact Request - '.$mailData['subject'];
        $mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Phone: </b>'.$mailData['phone'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>
        ';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        return $this->email->send()?true:false;
    }


// About Us
    public function about_us() {
        $this->global['pageTitle'] = 'Mil Paints';
        $data = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // $data['meta_data'] = $this->home_model->get_meta_tag_by_page_slug($page_slug);
        // $data['google'] = $this->home_model->get_googleanalytics_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['about_us_banner'] = $this->home_model->get_about_us_banner_by_id();
        $data['featured_in'] = $this->home_model->get_all_featured_in_data();
        $data['about_us_data'] = $this->home_model->get_about_us_management_data();
        $data['about_us_data_3'] = $this->home_model->get_about_us_management_data_3();
        $data['about_us_data_4'] = $this->home_model->get_about_us_management_data_4();
        $data['about_us_data_5'] = $this->home_model->get_about_us_management_data_5();
        $data['performance_states'] = $this->home_model->get_all_performance_state();
        $data['about_us_data_6'] = $this->home_model->get_about_us_management_data_6();

        $this->load->view("front/about-us", $data);
    }


// Team
    public function team() {
        $this->global['pageTitle'] = 'The Fit Chase';
        $data = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // $data['meta_data'] = $this->home_model->get_meta_tag_by_page_slug($page_slug);
        // $data['google'] = $this->home_model->get_googleanalytics_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['team_banner'] = $this->home_model->get_team_banner_by_id();
        $data['performance_states'] = $this->home_model->get_all_performance_state();
        $data['teams'] = $this->home_model->get_all_team();

        $this->load->view("front/team", $data);
    }

    public function team_details($username) {
        $this->global['pageTitle'] = 'The Fit Chase';
        $data = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['team_detail'] = $this->home_model->get_team_details_by_id($username);
        $data['kick_starter_pricing'] = $this->home_model->get_all_kick_starter_pricing_for_home();
        $data['coaching_pricing'] = $this->home_model->get_all_coaching_pricing_for_home();
        // dd($data['team_detail']);
        $this->load->view("front/team-details", $data);
    }


// Success Stories
    public function success_stories() {
        $this->global['pageTitle'] = 'The Fit Chase';
        $data = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $this->load->library('pagination'); 
        $count = $this->home_model->get_all_success_stories_count();
        $returns = $this->paginationCompress ( "success-stories/", $count, 2 );
        
        $data['success_stories_banner'] = $this->home_model->get_success_stories_banner_by_id();
        $data['success_stories'] = $this->home_model->get_all_success_stories($returns["page"], $returns["segment"]);
        $data['teams'] = $this->home_model->get_all_team();
        $this->load->view("front/success-stories", $data);
    }


// Kick Starter
    public function kick_starter() {
        $this->global['pageTitle'] = 'The Fit Chase';
        $data = array();
        // Session
        if(!empty($this->session->userdata['logged_in'])){
            $user_data = $this->session->userdata['logged_in'];
            $data['user_data'] = $user_data;
        }
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['kick_starter_banner'] = $this->home_model->get_kick_starter_banner_by_id();
        // $data['kick_starter_nutrition'] = $this->home_model->get_nutrition_by_kick_starter_includes();
        // $data['kick_starter_workout'] = $this->home_model->get_workout_by_kick_starter_includes();
        $data['kick_starter_work'] = $this->home_model->get_kick_starter_work();
        $data['kick_starter_pricings'] = $this->home_model->get_all_kick_starter_pricing();

        $this->load->view("front/kick-starter", $data);
    }

    function kick_starter_pricing_details(){
        $data= array();
        $status= true;
        $html="";
        $kick_starter_pricing_id= $this->input->post('kick_starter_pricing_id');
        $data = $this->home_model->get_kick_starter_pricing($kick_starter_pricing_id);
        echo json_encode($data);
        // echo $data->price;
    }


// Coaching
    public function coaching() {
        $this->global['pageTitle'] = 'The Fit Chase';
        $data = array();
        if(!empty($this->session->userdata['logged_in'])){
            $user_data = $this->session->userdata['logged_in'];
            $data['user_data'] = $user_data;
        }
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['coaching_banner'] = $this->home_model->get_coaching_banner_by_id();
        // $data['coaching_nutrition'] = $this->home_model->get_nutrition_by_coaching_includes();
        // $data['coaching_workout'] = $this->home_model->get_workout_by_coaching_includes();
        // $data['coaching_mentorship'] = $this->home_model->get_mentorship_by_coaching_includes();
        $data['coaching_work'] = $this->home_model->get_coaching_work();
        $data['coaching_pricings'] = $this->home_model->get_all_coaching_pricing();

        $this->load->view("front/coaching", $data);
    }

    function coaching_pricing_details(){
        $data= array();
        $status= true;
        $html="";
        $coaching_pricing_id= $this->input->post('coaching_pricing_id');
        $data = $this->home_model->get_coaching_pricing($coaching_pricing_id);
        echo json_encode($data);
        // echo $data->price;
    }


// Contact Details
    public function contact()
    {
        $data['contact']=$this->home_model->get_contact();
        $this->load->view('fincludes/footer', $data);
    }


// FAQ's
    public function faq(){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        $data['cms1'] = $this->home_model->get_cms_by_id1();
        // $data['google'] = $this->home_model->get_googleanalytics_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $data['faq_type_1'] = $this->home_model->get_faq_by_type_1();
        $data['faq_type_2'] = $this->home_model->get_faq_by_type_2();
        $data['faq_type_3'] = $this->home_model->get_faq_by_type_3();
        $data['faq_type_3_count'] = $this->home_model->get_faq_by_type_3_count();
        // dd($data['faq_type_3_count']);

        $this->load->view("front/faq", $data);
    }


// Fitness Recipe
    public function fitness_recipe(){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->fitness_recipe_model->get_all_fitness_recipe_count($searchText);
        $returns = $this->paginationCompress ( "fitness-recipe/", $count, 9 );

        $data['preferences'] = $this->fitness_recipe_model->get_all_preference();
        $data['recipe_types'] = $this->fitness_recipe_model->get_all_recipe_type();
        $data['macro_preferences'] = $this->fitness_recipe_model->get_all_macro_preference();
        $data['simplicity_factors'] = $this->fitness_recipe_model->get_all_simplicity_factor();
        $data['fitness_recipes'] = $this->fitness_recipe_model->get_all_fitness_recipe($searchText, $returns["page"], $returns["segment"]);

        $this->load->view("front/fitness-recipe", $data);
    }

    public function fitness_recipe_ajax(){
        $data= array();
        $status= true;
        $html="";
        $preferenceID= $this->input->post('preferenceID');
        $recipe_typeID= $this->input->post('recipe_typeID');
        // $simplicityID= $this->input->post('simplicityID');

        $data = $this->fitness_recipe_model->get_all_fitness_recipe_preference_by_ajax($this->input->post());
        // $data = $this->fitness_recipe_model->get_all_fitness_recipe_checkbox_preference_by_ajax($this->input->post());
        $data['fitness_recipes'] = $data;
        $this->load->view("front/fitness-recipe-ajax", $data);
    }

    public function fitness_recipe_details($fitness_recipe_id = NULL){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $data['preferences'] = $this->fitness_recipe_model->get_all_preference();
        $data['recipe_types'] = $this->fitness_recipe_model->get_all_recipe_type();
        $data['macro_preferences'] = $this->fitness_recipe_model->get_all_macro_preference();
        $data['simplicity_factors'] = $this->fitness_recipe_model->get_all_simplicity_factor();
        $data['fitness_recipe_details'] = $this->fitness_recipe_model->get_fitness_recipe_by_id($fitness_recipe_id);
        // dd($data['fitness_recipe_details']);

        $this->load->view("front/fitness-recipe-details", $data);
    }


// Exercise Video
    public function exercise_video(){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->exercise_video_model->get_all_exercise_video_count($searchText);
        $returns = $this->paginationCompress ( "exercise-video/", $count, 9 );

        $data['body_parts'] = $this->exercise_video_model->get_all_body_part();
        $data['equipments'] = $this->exercise_video_model->get_all_equipment();
        $data['levels'] = $this->exercise_video_model->get_all_level();
        $data['exercise_videos'] = $this->exercise_video_model->get_all_exercise_video($searchText, $returns["page"], $returns["segment"]);

        $this->load->view("front/exercise-video", $data);
    }

    public function exercise_video_ajax(){
        $data= array();
        $status= true;
        $html="";
        $body_partID= $this->input->post('body_partID');
        $equipmentID= $this->input->post('equipmentID');

        $data = $this->exercise_video_model->get_all_exercise_video_by_ajax($this->input->post());
        $data['exercise_videos'] = $data;
        $this->load->view("front/exercise-video-ajax", $data);
    }

    public function exercise_video_details($exercise_video_id = NULL){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $data['body_parts'] = $this->exercise_video_model->get_all_body_part();
        $data['equipments'] = $this->exercise_video_model->get_all_equipment();
        $data['levels'] = $this->exercise_video_model->get_all_level();
        $data['exercise_video_details'] = $this->exercise_video_model->get_exercise_video_by_id($exercise_video_id);
        // dd($data['exercise_video_details']);

        $this->load->view("front/exercise-video-details", $data);
    }


// Knowledge Library
    public function knowledge_library(){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->knowledge_library_model->get_all_knowledge_library_count($searchText);
        $returns = $this->paginationCompress ( "exercise-video/", $count, 9 );

        $data['content_preferences'] = $this->knowledge_library_model->get_all_content_preference();
        $data['categoriess'] = $this->knowledge_library_model->get_all_categories();
        $data['levels'] = $this->knowledge_library_model->get_all_level();
        $data['knowledge_librarys'] = $this->knowledge_library_model->get_all_knowledge_library($searchText, $returns["page"], $returns["segment"]);
        // dd($data['knowledge_librarys']);

        $this->load->view("front/knowledge-library", $data);
    }

    public function knowledge_library_ajax(){
        $data= array();
        $status= true;
        $html="";
        $content_preferenceID= $this->input->post('content_preferenceID');

        $data = $this->knowledge_library_model->get_all_knowledge_library_by_ajax($this->input->post());
        $data['knowledge_librarys'] = $data;
        $this->load->view("front/knowledge-library-ajax", $data);
    }

    public function knowledge_library_details($knowledge_library_id = NULL){
        $this->global['pageTitle'] = 'TFC';
        $data = $formData = array();
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        // Main
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        
        $data['content_preferences'] = $this->knowledge_library_model->get_all_content_preference();
        $data['categoriess'] = $this->knowledge_library_model->get_all_categories();
        $data['levels'] = $this->knowledge_library_model->get_all_level();
        $data['knowledge_library_details'] = $this->knowledge_library_model->get_knowledge_library_by_id($knowledge_library_id);
        $data['getknowledge_library_multi_fileInfo'] = $this->knowledge_library_model->getknowledge_library_multi_fileInfo($knowledge_library_id);
        // dd($data['getknowledge_library_multi_fileInfo']);

        $this->load->view("front/knowledge-library-details", $data);
    }


// Contact Us
    public function contact_us() {
        $this->global['pageTitle'] = 'Mil Paints';
        $data = $formData = array();
        // header
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        $data['google'] = $this->home_model->get_googleanalytics_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        $data['logo'] = $this->home_model->get_logo_by_id();
        $data['about_us_data_2'] = $this->home_model->get_about_us_management_data_2();
        // Main
        $data['banners'] = $this->home_model->get_contact_us_banner();
        $data['contact']=$this->home_model->get_contact();


        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('subject','Subject','trim|required');
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('message','Message','trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("front/contact-us", $data);
        }
        else
        {

            if($this->input->post('contactSubmit')){
                $formData = $this->input->post();  
                $mailData = array(
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'subject' => $formData['subject'],
                    'phone' => $formData['phone'],
                    'message' => $formData['message'],
                    'created_at'=>date('Y-m-d H:i:s')
                );
                $this->load->model('home_model');
                $result=$this->home_model->addcontact_us($mailData);
                $send = $this->sendEmail($mailData);
                if($send && $result){
                    $this->session->set_flashdata('success', 'Your booking request has been submitted successfully.');
                }else{
                    $this->session->set_flashdata('error', 'Some problems occured, please try again.');
                }
            }
            $data['postData'] = $formData;
            
            $this->load->view("front/contact-us", $data);
        }
    }
    
    
// Privacy Policy
    function privacy_policy(){
        // header
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();

        $this->load->view("front/privacy-policy", $data);
    }
// Terms & Conditions
    function terms_conditions(){
        // header
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();

        $this->load->view("front/terms-conditions", $data);
    }
// Refund Policy
    function refund_policy(){
        // header
        $data['meta'] = $this->home_model->get_meta_by_cms_by_page_slug();
        // footer
        $data['contact']=$this->home_model->get_contact();

        $this->load->view("front/refund-policy", $data);
    }
}
?>