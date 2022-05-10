<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Signup extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('cias');
        $this->load->model('home_model');
        $this->load->model('signup_model');
    }

    public function index(){
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        $this->load->view("front/signup", $data);
    }

    function checkEmailExists()
    {
        $user_id = $this->input->post("user_id");
        $email = $this->input->post("email");

        if(empty($user_id)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $user_id);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

    function signupme()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('phone','Mobile Number','required');
        $this->form_validation->set_rules('country','Country','required');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');

        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            if($this->signup_model->check_email(strtolower($this->security->xss_clean($this->input->post('email')))) == FALSE){
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $country = ucwords(strtolower($this->security->xss_clean($this->input->post('country'))));
                $state = ucwords(strtolower($this->security->xss_clean($this->input->post('state'))));
                $address = ucwords(strtolower($this->security->xss_clean($this->input->post('address'))));
                $password = $this->input->post('password');
                
                $signupInfo = array('name'=> $name, 'email'=>$email, 'phone'=>$phone, 'country'=>$country, 'state'=>$state, 'address'=>$address, 'password'=>getHashedPassword($password), 'created_at'=>date('Y-m-d H:i:s'));
                // dd($signupInfo);
                $this->load->model('signup_model');
                $result = $this->signup_model->add_new_signup($signupInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Your account has been successfully created');
                }
                else
                {
                    $this->session->set_flashdata('error', 'signup creation failed');
                }
                redirect('signin');
            } else {
                $this->session->set_flashdata('error', 'Email Address already exists');
                redirect('signup/index');
            }
        }
    }

    function emailExists($email)
    {
        // $userId = $this->vendorId;
        // $return = false;

        if(empty($user_id)){
            $result = $this->signup_model->checkEmailExists($email);
        } else {
            $result = $this->signup_model->checkEmailExists($email, $user_id);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
}