<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends CI_Model {

	function get_all_articles($num, $offset){
		$this->db->order_by("date", "desc"); 
		$query=$this->db->get('articles',$num,$offset);
		return $query->result_array();
	}
	function get_cat_articles($cat){
		$this->db->order_by("date", "desc"); 
		$this->db->where("category",$cat);
		$query=$this->db->get('articles');
		return $query->result_array();
	}
    function get_author_articles($author){
		$this->db->order_by("date", "desc"); 
		$this->db->where("author",$author);
		$query=$this->db->get('articles');
		return $query->result_array();
	}
	function get_article($title){
		$this->db->where('title_en', $title);
		$query = $this->db->get('articles');
		return $query->row_array();
	}
    
    function add_comment($add){
		$this->db->insert('comments',$add);
	}
	/* function get_comments($title){
		$this->db->order_by('id','desc');
		$this->db->where("note_id",$title);
		$query=$this->db->get('comments');
		return $query->result_array();
	} */
    function get_comments($title){
		$this->db->where('note_id',$title);
        $query = $this->db->get('comments');
        if($query->num_rows() > 0){
            $result = $query->result_array();
            $comments = array();
            foreach($result as $row){
                $comments[$row['id']] = $row;
            }
            $comments = $this->_build_tree($comments);
            return $comments;
        }
        return false;
    }
    

    function _build_tree($data){
        $tree = array();
        foreach($data as $id => &$row){
            if(empty($row['parent_id'])){
                $tree[$id] = &$row;
            }
            else{
                $data[$row['parent_id']]['childs'][$id] = &$row;
            }
        }
        return $tree;
    }
    function get_comment_cnt($title){
		$this->db->where('note_id',$title);
        $query = $this->db->get('comments');
        $result = $query->result_array();
        $comment_cnt=count($result);
        return $comment_cnt;
    }

}  