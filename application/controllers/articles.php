<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {

	function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/articles/index';
        $config['total_rows'] = $this->db->count_all('articles');
        $config['per_page'] = '5';
        $config['full_tag_open'] = "<p style='text-align:center;'>";
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'В начало';
        $config['last_link'] = 'В конец';
        

        $this->pagination->initialize($config);
        
		$this->load->model('articles_model');
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->pages_model->get_pages_info('articles');
		$data['category'] = $this->pages_model->get_cat();   
		$data['articles']=$this->articles_model->get_all_articles($config['per_page'],$this->uri->segment(3));
		$data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $name = 'articles';
		$this->template->page_view($data,$name);
	}
	function cat($cat){
        $this->load->library('pagination');
		$this->load->model('articles_model');
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->pages_model->get_pages_info('articles');
		$data['category'] = $this->pages_model->get_cat();   
		$data['articles']=$this->articles_model->get_cat_articles($cat);
		$data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $name = 'articles';
		$this->template->page_view($data,$name);

	}
    function author($author){
        $this->load->library('pagination');
		$this->load->model('articles_model');
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->pages_model->get_pages_info('articles');
		$data['category'] = $this->pages_model->get_cat();   
		$data['articles']=$this->articles_model->get_cat_articles($cat);
		$data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $name = 'articles';
		$this->template->page_view($data,$name);

	}
} 