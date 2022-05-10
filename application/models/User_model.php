<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    // This function is used to get the user listing count
    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.empid, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.address, BaseTbl.fathername, BaseTbl.multi_file, BaseTbl.dob, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_admin as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.empid, BaseTbl.email, BaseTbl.name, BaseTbl.address, BaseTbl.fathername, BaseTbl.multi_file, BaseTbl.dob, BaseTbl.mobile, BaseTbl.createdDtm, Role.role','BaseTbl.multi_file');
        $this->db->from('tbl_admin as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function userList($result)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.empid, BaseTbl.email, BaseTbl.name, BaseTbl.address, BaseTbl.fathername, BaseTbl.multi_file, BaseTbl.dob, BaseTbl.mobile, BaseTbl.createdDtm, Role.role','BaseTbl.multi_file');
        $this->db->from('tbl_admin as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    // This function is used to get the user roles information
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    // This function is used to check whether email id is already exist or not
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_admin");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    // This function is used to add new user to system
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_admin', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function checkempid($empid)
    {
        $this->db->where('empid', $empid);
        $query = $this->db->get('tbl_admin');
        if( $query->num_rows() > 0 )
        { 
            return TRUE; 
        } 
        else 
        { 
            return FALSE; 
        }
    }
    // This function used to get user information by id
    function getUserInfo($userId)
    {
        $this->db->select('userId, empid, name, email, dob, mobile, address, roleId, fathername, multi_file');
        $this->db->from('tbl_admin');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }
    // This function is used to update the user information
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_admin', $userInfo);
        
        return TRUE;
    }
    // This function is used to delete the user information
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_admin', $userInfo);
        
        return $this->db->affected_rows();
    }
    // This function is used to match users password for change password
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_admin');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    // This function is used to change users password
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_admin', $userInfo);
        
        return $this->db->affected_rows();
    }
    // This function is used to get user login history
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get user login history
    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    // This function used to get user information by id
    function getUserInfoById($userId)
    {
        $this->db->select('userId, empid, name, email, dob, mobile, address, roleId, fathername, multi_file');
        $this->db->from('tbl_admin');
        // $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        $result1 = $query->row();
        return $result1;
    }
    // This function used to get user information by id with role
    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.empid, BaseTbl.email, BaseTbl.name, BaseTbl.address, fathername, BaseTbl.multi_file, BaseTbl.dob, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_admin as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }
    //Addition
    function userListingCount1($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.page_name, BaseTbl.title, BaseTbl.multi_file, BaseTbl.description, BaseTbl.createdDtm, , BaseTbl.meta_title, , BaseTbl.meta_description, BaseTbl.meta_tag');
        $this->db->from('tbl_add as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.page_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function userListing1($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.page_name, BaseTbl.title, BaseTbl.multi_file, BaseTbl.description, BaseTbl.createdDtm, BaseTbl.createdDtm, , BaseTbl.meta_title, , BaseTbl.meta_description, BaseTbl.meta_tag');
        $this->db->from('tbl_add as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.page_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }


    // function listing1($id)
    // {
    //     $this->db->select('BaseTbl.id, BaseTbl.page_name, BaseTbl.title, BaseTbl.multi_file, BaseTbl.description');
    //     $this->db->from('tbl_add as BaseTbl');
    //     $this->db->where('id', $id);
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $query = $this->db->get();
        
    //     $result = $query->result();        
    //     return $result;
    // }
    function addConfig($userInfo1)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_add', $userInfo1);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editCon($userInfo1, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_add', $userInfo1);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getEditInfo($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_add');
        // $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($cms_id)
    {
        $sql = "UPDATE tbl_add SET isDeleted = 1 WHERE id='$cms_id';";
        $result = $this->db->query($sql);
        // return $cms_id;               
    }
    // function deleteInfo($id, $userInfo1)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update('tbl_add', $userInfo1);
        
    //     return $this->db->affected_rows();
    // }
    
    function contact($contact_id)
    {
        $this->db->select('BaseTbl.contact_id, BaseTbl.email, BaseTbl.phone, BaseTbl.address, BaseTbl.fb_link, BaseTbl.insta_link, BaseTbl.linkedin_link, BaseTbl.description');
        $this->db->from('tbl_contact as BaseTbl');
        $this->db->where('contact_id', $contact_id);
        $this->db->order_by('BaseTbl.contact_id', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function conConfig($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_contact', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editContact($userInfo2, $contact_id)
    {
        $this->db->where('contact_id', $contact_id);
        $this->db->update('tbl_contact', $userInfo2);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getContactInfo($contact_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        // $this->db->where('isDeleted', 0);
        $this->db->where('contact_id', $contact_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function GetPageListAll()
	{
		$sql="SELECT * FROM tbl_add where isDeleted=0";
		$result = $this->db->query($sql);
		
		return $result->result();
	}
}