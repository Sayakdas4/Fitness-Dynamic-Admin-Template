<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('cias');
        $this->load->model('home_model');
        $this->load->model('signin_model');
        $this->load->model('razorpay_model');
        // $this->is_signed_in();

        $this->load->library('session');
        $session_data = $this->session->userdata('logged_in');
        $session_google_data = $this->session->userdata('user_data');
        $user_id = $session_data['user_id'];
            
        if(!isset($this->session->userdata['logged_in']['user_id']))
        {
            redirect(base_url('/signin'));
        }
    }

    public function index(){
        // Session
        $data = $this->session->userdata['logged_in'];
        // dd($data);
        // $data_google = $this->session->userdata['user_data'];
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // Main
        $data['user_data'] = $this->signin_model->get_user_info_id($data['user_id']);
        $data['order_data'] = $this->razorpay_model->get_all_razorpay_by_user($data['user_id']);
        $order_data = $data['order_data'];
        // dd($data['order_data']);
        // footer
        $data['contact']=$this->home_model->get_contact();
        $this->load->view("front/dashboard", $data);
    }

    function signout() {
        $this->session->sess_destroy ();
        
        redirect ( 'signin' );
    }

}