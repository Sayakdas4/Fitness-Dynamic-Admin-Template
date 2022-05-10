<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Errorr_404 extends CI_Controller
{
    // This is default constructor of the class
    public function __construct()
    {
        parent::__construct();
    }
    // Index Page for this controller.
    public function index()
    {
        $this->isLoggedIn();
    }
    // This function used to check the user is logged in or not
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('pageNotFound');
        }
    }

    // function is_signed_in()
    // {
    //     $is_signed_in = $this->session->userdata('is_signed_in');
        
    //     if(!isset($is_signed_in) || $is_signed_in != TRUE)
    //     {
    //         $this->load->view('front/signin');
    //     }
    //     else
    //     {
    //         redirect('pageNotFound');
    //     }
    // }
}

?>
