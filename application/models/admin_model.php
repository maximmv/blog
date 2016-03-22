<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function check_admin($user, $pswd){
		$this->db->where('username', $user); 
		$this->db->where('password', $pswd); 
		$this->db->where('status !=', 'user'); 
		$query=$this->db->get('users');
        if ($query->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
	
    function user_info($user){
        $this->db->where('username',$user);
        $query = $this->db->get('users');
        return $query->row_array();
    }
	
	function add($page,$add){
		$this->db->insert($page,$add);
	}
	
	function get_cat(){
		$query = $this->db->get('category');
		return $query->result_array();
	}
    
	function get_editlist($page){
		$this->db->order_by('id','desc');
		$query=$this->db->get($page);
		return $query->result_array();
	}
	
	function get_editlist_author($page,$user){
		$this->db->where('author',$user);
		$this->db->order_by('id','desc');
		$query=$this->db->get($page);
		return $query->result_array();
	}
	
	function get_info($page,$id){
		$this->db->where('id',$id);
		$query=$this->db->get($page);
		return $query->row_array();
	}
    
    function edit($page,$id,$edit){
		$this->db->where('id',$id);
		$this->db->update($page,$edit);
	}
    function userslist(){
        $this->db->order_by('id','desc');
        $query = $this->db->get('users');
        return $query->result_array();
    }
	
	function del($page,$id){
        $this->db->where('id',$id);
        $this->db->delete($page);
    }
    function del_comments($art_id){
        $this->db->where('art_id',$art_id);
        $this->db->delete('comments');
    }
    
}