<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Fitness_recipe_model extends CI_Model
{
    //Addition
    function fitness_recipe_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('fitness_recipe as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function fitness_recipe_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('fitness_recipe as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.fitness_recipe_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addfitness_recipe($fitness_recipeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('fitness_recipe', $fitness_recipeInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editfitness_recipe($fitness_recipeInfo, $fitness_recipe_id)
    {
        $this->db->where('fitness_recipe_id', $fitness_recipe_id);
        $this->db->update('fitness_recipe', $fitness_recipeInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getfitness_recipeInfo($fitness_recipe_id)
    {
        $this->db->select('*');
        $this->db->from('fitness_recipe');
        // $this->db->where('isDeleted', 0);
        $this->db->where('fitness_recipe_id', $fitness_recipe_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    function deleteInfo($fitness_recipe_id)
    {
        $sql = "UPDATE fitness_recipe SET isdeleted = 1 WHERE fitness_recipe_id='$fitness_recipe_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_preference(){
        $this->db->select('*');
        $this->db->from('preference');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_recipe_type(){
        $this->db->select('*');
        $this->db->from('recipe_type');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_macro_preference(){
        $this->db->select('*');
        $this->db->from('macro_preference');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_simplicity_factor(){
        $this->db->select('*');
        $this->db->from('simplicity_factor');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_fitness_recipe_count($searchText = ''){
        $this->db->select('fb.*, group_concat(macro_preference.macro_preference_title, "-", macro_preference.macro_preference_id) as mct');
        $this->db->from('fitness_recipe_check_box fb');
        $this->db->join('macro_preference', 'macro_preference.macro_preference_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.fitness_recipeID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('fitness_recipe fr');
        $this->db->join('preference', 'preference.preference_id = fr.preferenceID');
        $this->db->join('recipe_type', 'recipe_type.recipe_type_id = fr.recipe_typeID');
        // $this->db->join('simplicity_factor', 'simplicity_factor.simplicity_factor_id = fr.simplicityID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.fitness_recipeID = fr.fitness_recipe_id');
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.fitness_recipe_id');
        if(!empty($searchText)) {
            $likeCriteria = "(fr.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    function get_all_fitness_recipe($searchText = '', $page, $segment){
        $this->db->select('fb.*, group_concat(macro_preference.macro_preference_title, "-", macro_preference.macro_preference_id) as mct');
        $this->db->from('fitness_recipe_check_box fb');
        $this->db->join('macro_preference', 'macro_preference.macro_preference_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.fitness_recipeID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('fitness_recipe fr');
        $this->db->join('preference', 'preference.preference_id = fr.preferenceID');
        $this->db->join('recipe_type', 'recipe_type.recipe_type_id = fr.recipe_typeID');
        // $this->db->join('simplicity_factor', 'simplicity_factor.simplicity_factor_id = fr.simplicityID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.fitness_recipeID = fr.fitness_recipe_id');
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.fitness_recipe_id');
        if(!empty($searchText)) {
            $likeCriteria = "(fr.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function get_fitness_recipe_by_id($fitness_recipe_id){
        $this->db->select('fb.*, group_concat(macro_preference.macro_preference_title, "-", macro_preference.macro_preference_id) as mct');
        $this->db->from('fitness_recipe_check_box fb');
        $this->db->join('macro_preference', 'macro_preference.macro_preference_id = fb.check_boxID', 'LEFT');
        $this->db->group_by('fb.fitness_recipeID');
        $qs_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('fitness_recipe fr');
        $this->db->join('preference', 'preference.preference_id = fr.preferenceID');
        $this->db->join('recipe_type', 'recipe_type.recipe_type_id = fr.recipe_typeID');
        // $this->db->join('simplicity_factor', 'simplicity_factor.simplicity_factor_id = fr.simplicityID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.fitness_recipeID = fr.fitness_recipe_id');
        $this->db->where('fr.fitness_recipe_id', $fitness_recipe_id);
        $this->db->where('fr.isdeleted', 0);
        $this->db->group_by('fr.fitness_recipe_id');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    function addfitness_recipe_check_box($check_boxdata)
    {
        $this->db->trans_start();
        $this->db->insert('fitness_recipe_check_box', $check_boxdata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getfitness_recipe_check_boxInfo($fitness_recipeID)
    {
        $this->db->select('*');
        $this->db->from('fitness_recipe_check_box');
        $this->db->where('fitness_recipeID', $fitness_recipeID);
        $query = $this->db->get();
        return $query->result();
    }

    function deletefitness_recipe_check_boxInfo($fitness_recipeID)
    {
        $this->db->where('fitness_recipeID', $fitness_recipeID);
        $this->db->delete("fitness_recipe_check_box");
        return true;            
    }

    function addfitness_recipe_simplicity_check_box($check_boxdata1)
    {
        $this->db->trans_start();
        $this->db->insert('fitness_recipe_simplicity_check_box', $check_boxdata1);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getfitness_recipe_simplicity_check_boxInfo($fitness_recipeID)
    {
        $this->db->select('*');
        $this->db->from('fitness_recipe_simplicity_check_box');
        $this->db->where('fitness_recipeID', $fitness_recipeID);
        $query = $this->db->get();
        return $query->result();
    }

    function deletefitness_recipe_simplicity_check_boxInfo($fitness_recipeID)
    {
        $this->db->where('fitness_recipeID', $fitness_recipeID);
        $this->db->delete("fitness_recipe_simplicity_check_box");
        return true;            
    }

    function get_all_fitness_recipe_preference_by_ajax($filter_id){
        if(@$filter_id['filter_macroID']){ 
            $filter_macroID= $filter_id['filter_macroID']; 
            if($filter_macroID){
                $filter_macroID_decode = json_decode($filter_macroID);
                $filter_macroID_string = implode(',', $filter_macroID_decode);
            } else {
                $filter_macroID_string = "";
            }
        } else {
            $filter_macroID_string = "";
        }
        $this->db->select('fb.*, group_concat(macro_preference.macro_preference_title, "-", macro_preference.macro_preference_id) as mct');
        $this->db->from('fitness_recipe_check_box fb');
        $this->db->join('macro_preference', 'macro_preference.macro_preference_id = fb.check_boxID', 'LEFT');
        if($filter_macroID_string){
            $this->db->where_in('fb.check_boxID', $filter_macroID_string);
        }
        $this->db->group_by('fb.fitness_recipeID');
        $qs_query = $this->db->get_compiled_select();

        // Simplicity
        if(@$filter_id['filter_simplicityID']){ 
            $filter_simplicityID= $filter_id['filter_simplicityID']; 
            if($filter_simplicityID){
                $filter_simplicityID_decode = json_decode($filter_simplicityID);
                $filter_simplicityID_string = implode(',', $filter_simplicityID_decode);
            } else {
                $filter_simplicityID_string = "";
            }
        } else {
            $filter_simplicityID_string = "";
        }

        $this->db->select('fsb.*, group_concat(simplicity_factor.simplicity_factor_title, "-", simplicity_factor.simplicity_factor_id) as sct');
        $this->db->from('fitness_recipe_simplicity_check_box fsb');
        $this->db->join('simplicity_factor', 'simplicity_factor.simplicity_factor_id = fsb.check_boxID', 'LEFT');
        if($filter_simplicityID_string){
            $this->db->where_in('fsb.check_boxID', $filter_simplicityID_string);
        }
        $this->db->group_by('fsb.fitness_recipeID');
        $qs_query_simplicity = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('fitness_recipe fr');
        $this->db->join('preference', 'preference.preference_id = fr.preferenceID');
        $this->db->join('recipe_type', 'recipe_type.recipe_type_id = fr.recipe_typeID');
        // $this->db->join('simplicity_factor', 'simplicity_factor.simplicity_factor_id = fr.simplicityID');

        $this->db->join('('.$qs_query.') as fbmc', 'fbmc.fitness_recipeID = fr.fitness_recipe_id');
        $this->db->join('('.$qs_query_simplicity.') as fsbmc', 'fsbmc.fitness_recipeID = fr.fitness_recipe_id');
        $this->db->where('fr.isdeleted', 0);
        // $macro_ids = array();
        if(@$filter_id['preferenceID']){ $this->db->where('fr.preferenceID', $filter_id['preferenceID']); }
        if(@$filter_id['recipe_typeID']){ $this->db->where('fr.recipe_typeID', $filter_id['recipe_typeID']); }
        // if(@$filter_id['simplicityID']){ $this->db->where('fr.simplicityID', $filter_id['simplicityID']); }
        $this->db->group_by('fr.fitness_recipe_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function get_all_fitness_recipe_type_by_ajax($recipe_typeID){
        $this->db->select('*');
        $this->db->from('fitness_recipe');
        $this->db->where('recipe_typeID', $recipe_typeID);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_fitness_recipe_simplicity_by_ajax($simplicityID){
        $this->db->select('*');
        $this->db->from('fitness_recipe');
        $this->db->where('simplicityID', $simplicityID);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        return $query->result();
    }


}