<?php

class Home_model extends CI_Model
{
	function __construct() {
        parent::__construct();
		$this->load->database();
		
    }


// Contact Details
    function get_contact(){
		$contact_id=1;
		$this->db->from('tbl_contact');
		$this->db->where('contact_id',$contact_id);
		$result=$this->db->get();
		return $result->row();
	}


// Site Settings
    function get_googleanalytics_by_id() {
        $this->db->from('site_settings');
        $this->db->where('site_settings_id', 4);
        $result=$this->db->get();
        return $result->row();
    }

    function get_logo_by_id() {
        $this->db->from('site_settings');
        $this->db->where('site_settings_id', 3);
        $result=$this->db->get();
        return $result->row();
    }

    function get_enquiries_by_id() {
        $this->db->from('site_settings');
        $this->db->where('site_settings_id', 5);
        $result=$this->db->get();
        return $result->row();
    }


// CMS
    function get_meta_by_cms_by_page_slug() {
        $this->db->from('cms');
        $this->db->where('cms_id', 1);
        $result=$this->db->get();
        return $result->row();
    }

    function get_meta_tag_by_page_slug($page_slug) {
        $this->db->from('cms');
        $this->db->where('page_slug', $page_slug);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id1() {
        $this->db->from('cms');
        $this->db->where('cms_id', 1);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id2() {
        $this->db->from('cms');
        $this->db->where('cms_id', 2);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id3() {
        $this->db->from('cms');
        $this->db->where('cms_id', 3);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id4() {
        $this->db->from('cms');
        $this->db->where('cms_id', 4);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id5() {
        $this->db->from('cms');
        $this->db->where('cms_id', 5);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id6() {
        $this->db->from('cms');
        $this->db->where('cms_id', 6);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id7() {
        $this->db->from('cms');
        $this->db->where('cms_id', 7);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id8() {
        $this->db->from('cms');
        $this->db->where('cms_id', 8);
        $result=$this->db->get();
        return $result->row();
    }

    function get_cms_by_id9() {
        $this->db->from('cms');
        $this->db->where('cms_id', 9);
        $result=$this->db->get();
        return $result->row();
    }


// Banner
    function get_home_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 1);
        $result=$this->db->get();
        return $result->row();
    }

    function get_about_us_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 2);
        $result=$this->db->get();
        return $result->row();
    }

    function get_team_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 3);
        $result=$this->db->get();
        return $result->row();
    }

    function get_success_stories_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 5);
        $result=$this->db->get();
        return $result->row();
    }

    function get_kick_starter_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 6);
        $result=$this->db->get();
        return $result->row();
    }

    function get_coaching_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 7);
        $result=$this->db->get();
        return $result->row();
    }


// Featured In
    function get_all_featured_in_data(){
        $this->db->select('*');
        $this->db->from('featured_in');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


// Home
    function get_home_management_data($limit = 3, $offset = 0){
        $this->db->from('home_management');
        $this->db->where('isdeleted', 0);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_home_management_by_id_4(){
        $this->db->from('home_management');
        $this->db->where('home_management_id', 4);
        $result=$this->db->get();
        return $result->row();
    }

    function get_home_management_by_id_5(){
        $this->db->from('home_management');
        $this->db->where('home_management_id', 5);
        $result=$this->db->get();
        return $result->row();
    }

    function get_home_management_by_id_6(){
        $this->db->from('home_management');
        $this->db->where('home_management_id', 6);
        $result=$this->db->get();
        return $result->row();
    }

    function get_home_management_by_id_7(){
        $this->db->from('home_management');
        $this->db->where('home_management_id', 7);
        $result=$this->db->get();
        return $result->row();
    }

    function get_home_management_by_id_8(){
        $this->db->from('home_management');
        $this->db->where('home_management_id', 8);
        $result=$this->db->get();
        return $result->row();
    }

    function get_all_success_stories_home(){
        $this->db->select('*');
        $this->db->from('success_stories');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


// About Us
    function get_about_us_management_data(){
        $this->db->select('*');
        $this->db->from('about_us_management');
        $this->db->where(array('isdeleted' => 0, 'about_us_management_id !=' => 3, 'about_us_management_id !=' => 4, 'about_us_management_id !=' => 5, 'about_us_management_id !=' => 6));
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_about_us_management_data_3(){
        $this->db->from('about_us_management');
        $this->db->where('about_us_management_id', 3);
        $result=$this->db->get();
        return $result->row();
    }

    function get_about_us_management_data_4(){
        $this->db->from('about_us_management');
        $this->db->where('about_us_management_id', 4);
        $result=$this->db->get();
        return $result->row();
    }

    function get_about_us_management_data_5(){
        $this->db->from('about_us_management');
        $this->db->where('about_us_management_id', 5);
        $result=$this->db->get();
        return $result->row();
    }

    function get_about_us_management_data_6(){
        $this->db->from('about_us_management');
        $this->db->where('about_us_management_id', 6);
        $result=$this->db->get();
        return $result->row();
    }


// Performance State
    function get_all_performance_state(){
        $this->db->select('*');
        $this->db->from('performance_state');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


// Team
    function get_all_team(){
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_team_by_id_2(){
        $this->db->from('team');
        $this->db->where('team_id', 2);
        $result=$this->db->get();
        return $result->row();
    }

    function get_team_by_id_3(){
        $this->db->from('team');
        $this->db->where('team_id', 3);
        $result=$this->db->get();
        return $result->row();
    }

    function get_team_by_id_4(){
        $this->db->from('team');
        $this->db->where('team_id', 4);
        $result=$this->db->get();
        return $result->row();
    }

    function get_team_by_id_5(){
        $this->db->from('team');
        $this->db->where('team_id', 5);
        $result=$this->db->get();
        return $result->row();
    }

    function get_team_by_id_9(){
        $this->db->from('team');
        $this->db->where('team_id', 9);
        $result=$this->db->get();
        return $result->row();
    }

    // function get_all_latest_team($limit = 5, $offset = 1){
    //     $this->db->select('*');
    //     $this->db->from('team');
    //     $this->db->where('isdeleted', 0);
    //     $this->db->limit($limit, $offset);
    //     $query = $this->db->get();
    //     $result = $query->result();        
    //     return $result;
    // }

    function get_team_details_by_id($username){
        $this->db->from('team');
        $this->db->where('username',$username);
        $this->db->where('isdeleted', 0);
        $result=$this->db->get();
        return $result->row();
    }


// Success Stories
    function get_all_success_stories_count()
    {
        $this->db->select('*');
        $this->db->from('success_stories');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_success_stories($page, $segment){
        $this->db->select('*');
        $this->db->from('success_stories');
        $this->db->where('isdeleted', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


// Kick Starter
    function get_nutrition_by_kick_starter_includes(){
        $this->db->from('kick_starter_includes');
        $this->db->where('kick_starter_includes_id', 1);
        $result=$this->db->get();
        return $result->row();
    }

    function get_workout_by_kick_starter_includes(){
        $this->db->from('kick_starter_includes');
        $this->db->where('kick_starter_includes_id', 2);
        $result=$this->db->get();
        return $result->row();
    }

    function get_all_kick_starter_pricing_for_home($limit = 1, $offset = 0){
        $this->db->select('*');
        $this->db->from('kick_starter_pricing');
        // $this->db->where('display', 1);
        $this->db->where('isdeleted', 0);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    function get_all_kick_starter_pricing(){
        $this->db->select('*');
        $this->db->from('kick_starter_pricing');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_kick_starter_pricing($kick_starter_pricing_id)
    {
        $this->db->select('*');
        $this->db->from('kick_starter_pricing');
        $this->db->where('kick_starter_pricing_id', $kick_starter_pricing_id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_kick_starter_work()
    {
        $this->db->select('*');
        $this->db->from('kick_starter_work');
        $this->db->where('kick_starter_work_id', 1);
        $query = $this->db->get();
        return $query->row();
    }


// Coaching
    function get_nutrition_by_coaching_includes(){
        $this->db->from('coaching_includes');
        $this->db->where('coaching_includes_id', 1);
        $result=$this->db->get();
        return $result->row();
    }

    function get_workout_by_coaching_includes(){
        $this->db->from('coaching_includes');
        $this->db->where('coaching_includes_id', 2);
        $result=$this->db->get();
        return $result->row();
    }

    function get_mentorship_by_coaching_includes(){
        $this->db->from('coaching_includes');
        $this->db->where('coaching_includes_id', 3);
        $result=$this->db->get();
        return $result->row();
    }

    function get_all_coaching_pricing_for_home($limit = 1, $offset = 0){
        $this->db->select('*');
        $this->db->from('coaching_pricing');
        // $this->db->where('display', 1);
        $this->db->where('isdeleted', 0);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    function get_all_coaching_pricing(){
        $this->db->select('*');
        $this->db->from('coaching_pricing');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_coaching_pricing($coaching_pricing_id)
    {
        $this->db->select('*');
        $this->db->from('coaching_pricing');
        // $this->db->where('isDeleted', 0);
        $this->db->where('coaching_pricing_id', $coaching_pricing_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    function get_coaching_work()
    {
        $this->db->select('*');
        $this->db->from('coaching_work');
        $this->db->where('coaching_work_id', 1);
        $query = $this->db->get();
        return $query->row();
    }


// FAQ's
    function get_faq_by_type_1(){
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('title', 1);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_faq_by_type_2(){
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('title', 2);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_faq_by_type_3(){
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('title', 3);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_faq_by_type_3_count(){
        // $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('title', 3);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->num_rows();        
        return $result;
    }


// Contact Us
    public function addcontact($data)
	{
		if($this->db->insert('booking',$data))
   		{
           return $this->db->insert_id();
   		}
   		else
   		{
          return false;
   		}
	}

    public function addcontact_us($data)
    {
        if($this->db->insert('tbl_mail',$data))
        {
           return $this->db->insert_id();
        }
        else
        {
          return false;
        }
    }
}
?>