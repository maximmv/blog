<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    public function page_view($data,$name)
    {
		$CI =& get_instance();
		$CI->load->view('blocks/scripts_view',$data);
		$CI->load->view('blocks/menu_view',$data);
		if(empty($data['user'])){
			$CI->load->view('blocks/authorization_view',$data);
		}else{ 
			$CI->load->view('blocks/cabinet_view',$data);
		}
		$CI->load->view('blocks/sidebar_view',$data );
		$CI->load->view( $name.'_view',$data);
		$CI->load->view('blocks/footmenu_view');
		$CI->load->view('blocks/footer_view');
		
    }
    public function  admin_view($data,$name)
    {
		$CI =& get_instance();
		$CI->load->view('admin/blocks/scripts_view',$data);
		$CI->load->view('admin/blocks/header_view');
		$CI->load->view('admin/blocks/menu_view',$data);
		$CI->load->view('admin/'.$name.'_view',$data);
		$CI->load->view('admin/blocks/footer_view');
		 
    }
    public function  author_view($data,$name)
    {
		$CI =& get_instance();
		$CI->load->view('author/blocks/scripts_view',$data);
		$CI->load->view('author/blocks/header_view');
		$CI->load->view('author/blocks/menu_view',$data);
		$CI->load->view('author/'.$name.'_view',$data);
		$CI->load->view('author/blocks/footer_view');
		 
    } 
}
