<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Exercise_video_model extends CI_Model
{
    //Addition
    function exercise_video_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('exercise_video as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function exercise_video_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('exercise_video as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.exercise_video_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addexercise_video($exercise_videoInfo)
    {
        $this->db->trans_start();
        $this->db->insert('exercise_video', $exercise_videoInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editexercise_video($exercise_videoInfo, $exercise_video_id)
    {
        $this->db->where('exercise_video_id', $exercise_video_id);
        $this->db->update('exercise_video', $exercise_videoInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getexercise_videoInfo($exercise_video_id)
    {
        $this->db->select('*');
        $this->db->from('exercise_video');
        // $this->db->where('isDeleted', 0);
        $this->db->where('exercise_video_id', $exercise_video_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($exercise_video_id)
    {
        $sql = "UPDATE exercise_video SET isdeleted = 1 WHERE exercise_video_id='$exercise_video_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_body_part(){
        $this->db->select('*');
        $this->db->from('body_part');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_equipment(){
        $this->db->select('*');
        $this->db->from('equipment');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_level(){
        $this->db->select('*');
        $this->db->from('level');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_exercise_video_count($searchText = ''){
        $this->db->select('fb.*, group_concat(level.level_title, "-", level.level_id) as lvt');
        $this->db->from('exercise_video_check_box fb');
        $this->db->join('level', 'level.level_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.exercise_videoID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('exercise_video fr');
        $this->db->join('body_part', 'body_part.body_part_id = fr.body_partID');
        $this->db->join('equipment', 'equipment.equipment_id = fr.equipmentID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.exercise_videoID = fr.exercise_video_id');
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.exercise_video_id');
        if(!empty($searchText)) {
            $likeCriteria = "(fr.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    function get_all_exercise_video($searchText = '', $page, $segment){
        $this->db->select('fb.*, group_concat(level.level_title, "-", level.level_id) as lvt');
        $this->db->from('exercise_video_check_box fb');
        $this->db->join('level', 'level.level_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.exercise_videoID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('exercise_video fr');
        $this->db->join('body_part', 'body_part.body_part_id = fr.body_partID');
        $this->db->join('equipment', 'equipment.equipment_id = fr.equipmentID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.exercise_videoID = fr.exercise_video_id');
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.exercise_video_id');
        if(!empty($searchText)) {
            $likeCriteria = "(fr.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function get_exercise_video_by_id($exercise_video_id){
        $this->db->select('fb.*, group_concat(level.level_title, "-", level.level_id) as lvt');
        $this->db->from('exercise_video_check_box fb');
        $this->db->join('level', 'level.level_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.exercise_videoID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('exercise_video fr');
        $this->db->join('body_part', 'body_part.body_part_id = fr.body_partID');
        $this->db->join('equipment', 'equipment.equipment_id = fr.equipmentID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.exercise_videoID = fr.exercise_video_id');
        $this->db->where('fr.exercise_video_id', $exercise_video_id);
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.exercise_video_id');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function get_all_exercise_video_by_ajax($filter_id){
        if(@$filter_id['filter_levelID']){ 
            $filter_levelID= $filter_id['filter_levelID']; 
            if($filter_levelID){
                $filter_levelID_decode = json_decode($filter_levelID);
                $filter_levelID_string = implode(',', $filter_levelID_decode);
            } else {
                $filter_levelID_string = "";
            }
        } else {
            $filter_levelID_string = "";
        }
        $this->db->select('fb.*, group_concat(level.level_title, "-", level.level_id) as lvt');
        $this->db->from('exercise_video_check_box fb');
        $this->db->join('level', 'level.level_id = fb.check_boxID', 'LEFT');
        if($filter_levelID_string){
            $this->db->where_in('fb.check_boxID', $filter_levelID_string);
        }
        $this->db->group_by('fb.exercise_videoID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('exercise_video fr');
        $this->db->join('body_part', 'body_part.body_part_id = fr.body_partID');
        $this->db->join('equipment', 'equipment.equipment_id = fr.equipmentID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.exercise_videoID = fr.exercise_video_id');
        $this->db->where('fr.isdeleted', 0);
        if(@$filter_id['body_partID']){ $this->db->where('fr.body_partID', $filter_id['body_partID']); }
        if(@$filter_id['equipmentID']){ $this->db->where('fr.equipmentID', $filter_id['equipmentID']); }
        $this->db->group_by('fr.exercise_video_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    
    function addexercise_video_check_box($check_boxdata)
    {
        $this->db->trans_start();
        $this->db->insert('exercise_video_check_box', $check_boxdata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getexercise_video_check_boxInfo($exercise_videoID)
    {
        $this->db->select('*');
        $this->db->from('exercise_video_check_box');
        $this->db->where('exercise_videoID', $exercise_videoID);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteexercise_video_check_boxInfo($exercise_videoID)
    {
        $this->db->where('exercise_videoID', $exercise_videoID);
        $this->db->delete("exercise_video_check_box");
        return true;            
    }

}