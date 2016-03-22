<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments_lib {

    function render($comments){
        $CI =& get_instance();
        $html = '';        
        if($comments != false){            
            foreach($comments as $comment){
                $data['comment'] = $comment;
                $html .= $CI->load->view('comment_tpl',$data,TRUE);                
            }
            return $html;        
        }
        else{
            return false;
        }
    }
}