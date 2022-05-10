<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Knowledge_library_model extends CI_Model
{
    //Addition
    function knowledge_library_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('knowledge_library as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function knowledge_library_listing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*, group_concat(ss_multi_image.knowledge_library_imageID, "-", ss_multi_image.content_preference_imageID, "-", ss_multi_image.image_files) as ss_mi');
        // $this->db->select('*');
        $this->db->from('knowledge_library as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->join('ss_multi_image', 'ss_multi_image.knowledge_library_imageID = BaseTbl.knowledge_library_id', 'LEFT');
        $this->db->group_by('BaseTbl.knowledge_library_id');
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.knowledge_library_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
        $result = $query->result();        
        return $result;
    }

    function addknowledge_library($knowledge_libraryInfo)
    {
        $this->db->trans_start();
        $this->db->insert('knowledge_library', $knowledge_libraryInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editknowledge_library($knowledge_libraryInfo, $knowledge_library_id)
    {
        $this->db->where('knowledge_library_id', $knowledge_library_id);
        $this->db->update('knowledge_library', $knowledge_libraryInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getknowledge_libraryInfo($knowledge_library_id)
    {
        $this->db->select('*');
        $this->db->from('knowledge_library');
        // $this->db->where('isDeleted', 0);
        $this->db->where('knowledge_library_id', $knowledge_library_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($knowledge_library_id)
    {
        $sql = "UPDATE knowledge_library SET isdeleted = 1 WHERE knowledge_library_id='$knowledge_library_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_content_preference(){
        $this->db->select('*');
        $this->db->from('content_preference');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_categories(){
        $this->db->select('*');
        $this->db->from('categories');
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

    function get_all_knowledge_library_count($searchText = ''){
        $this->db->select('fb.*, group_concat(categories.categories_title, "-", categories.categories_id) as cat');
        $this->db->from('knowledge_library_check_box fb');
        $this->db->join('categories', 'categories.categories_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.knowledge_libraryID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('knowledge_library fr');
        $this->db->join('content_preference', 'content_preference.content_preference_id = fr.content_preferenceID');
        // $this->db->join('categories', 'categories.categories_id = fr.categoriesID');
        $this->db->join('ss_multi_image', 'ss_multi_image.knowledge_library_imageID = fr.knowledge_library_id', 'LEFT');
        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.knowledge_libraryID = fr.knowledge_library_id');
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.knowledge_library_id');
        if(!empty($searchText)) {
            $likeCriteria = "(fr.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    function get_all_knowledge_library($searchText = '', $page, $segment){
        $this->db->select('fb.*, group_concat(categories.categories_title, "-", categories.categories_id) as cat');
        $this->db->from('knowledge_library_check_box fb');
        $this->db->join('categories', 'categories.categories_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.knowledge_libraryID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('knowledge_library fr');
        $this->db->join('content_preference', 'content_preference.content_preference_id = fr.content_preferenceID');
        // $this->db->join('categories', 'categories.categories_id = fr.categoriesID');
        $this->db->join('ss_multi_image', 'ss_multi_image.knowledge_library_imageID = fr.knowledge_library_id', 'LEFT');
        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.knowledge_libraryID = fr.knowledge_library_id');
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.knowledge_library_id');
        if(!empty($searchText)) {
            $likeCriteria = "(fr.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function get_knowledge_library_by_id($knowledge_library_id){
        $this->db->select('fb.*, group_concat(level.level_title, "-", level.level_id) as lvt');
        $this->db->from('knowledge_library_level_check_box fb');
        $this->db->join('level', 'level.level_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.knowledge_libraryID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('knowledge_library fr');
        $this->db->join('content_preference', 'content_preference.content_preference_id = fr.content_preferenceID');
        // $this->db->join('categories', 'categories.categories_id = fr.categoriesID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.knowledge_libraryID = fr.knowledge_library_id');
        $this->db->where('fr.knowledge_library_id', $knowledge_library_id);
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.knowledge_library_id');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function get_all_knowledge_library_by_ajax($filter_id){
        if(@$filter_id['filter_categoriesID']){ 
            $filter_categoriesID= $filter_id['filter_categoriesID']; 
            if($filter_categoriesID){
                $filter_categoriesID_decode = json_decode($filter_categoriesID);
                $filter_categoriesID_string = implode(',', $filter_categoriesID_decode);
            } else {
                $filter_categoriesID_string = "";
            }
        } else {
            $filter_categoriesID_string = "";
        }
        $this->db->select('fb.*, group_concat(categories.categories_title, "-", categories.categories_id) as cat');
        $this->db->from('knowledge_library_check_box fb');
        $this->db->join('categories', 'categories.categories_id = fb.check_boxID', 'LEFT');
        if($filter_categoriesID_string){
            $this->db->where_in('fb.check_boxID', $filter_categoriesID_string);
        }
        $this->db->group_by('fb.knowledge_libraryID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('knowledge_library fr');
        $this->db->join('content_preference', 'content_preference.content_preference_id = fr.content_preferenceID');
        $this->db->join('ss_multi_image', 'ss_multi_image.knowledge_library_imageID = fr.knowledge_library_id', 'LEFT');
        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.knowledge_libraryID = fr.knowledge_library_id');
        $this->db->where('fr.isdeleted', 0);
        if(@$filter_id['content_preferenceID']){ $this->db->where('fr.content_preferenceID', $filter_id['content_preferenceID']); }
        $this->db->group_by('fr.knowledge_library_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    function addknowledge_library_check_box($check_boxdata)
    {
        $this->db->trans_start();
        $this->db->insert('knowledge_library_check_box', $check_boxdata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getknowledge_library_check_boxInfo($knowledge_libraryID)
    {
        $this->db->select('*');
        $this->db->from('knowledge_library_check_box');
        $this->db->where('knowledge_libraryID', $knowledge_libraryID);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteknowledge_library_check_boxInfo($knowledge_libraryID)
    {
        $this->db->where('knowledge_libraryID', $knowledge_libraryID);
        $this->db->delete("knowledge_library_check_box");
        return true;            
    }

    function addknowledge_library_level_check_box($check_boxdata1)
    {
        $this->db->trans_start();
        $this->db->insert('knowledge_library_level_check_box', $check_boxdata1);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getknowledge_library_level_check_boxInfo($knowledge_libraryID)
    {
        $this->db->select('*');
        $this->db->from('knowledge_library_level_check_box');
        $this->db->where('knowledge_libraryID', $knowledge_libraryID);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteknowledge_library_level_check_boxInfo($knowledge_libraryID)
    {
        $this->db->where('knowledge_libraryID', $knowledge_libraryID);
        $this->db->delete("knowledge_library_level_check_box");
        return true;            
    }

    function addknowledge_library_multi_file($picdata)
    {
        $this->db->trans_start();
        $this->db->insert('ss_multi_image', $picdata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getknowledge_library_multi_fileInfo($knowledge_library_imageID)
    {
        $this->db->select('*');
        $this->db->from('ss_multi_image');
        $this->db->where('knowledge_library_imageID', $knowledge_library_imageID);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteknowledge_library_multi_fileInfo($knowledge_library_imageID)
    {
        $this->db->where('knowledge_library_imageID', $knowledge_library_imageID);
        $this->db->delete("ss_multi_image");
        return true;            
    }

}