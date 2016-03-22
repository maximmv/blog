<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	function view($title){
		$this->load->library('form_validation');
        $this->load->library('comments_lib');
		$this->load->model('articles_model');
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->articles_model->get_article($title);
		$data['category'] = $this->pages_model->get_cat();
        $comments = $this->articles_model->get_comments($title);
		$data['comments'] = $this->comments_lib->render($comments);
        $data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $data['error']='';
		if(empty($data['pages_info'])){
			redirect(base_url());
		}
		$data['cnt_comments']=$this->articles_model->get_comment_cnt($title);
		$name = 'article';
       
		
		if($this->input->post('add')){
			$this->load->model('rules_model');
			$this->form_validation->set_rules($this->rules_model->comments_rules);
			$chek = $this->form_validation->run();
			if ($chek == TRUE){
                $comment_data['parent_id']=$this->input->post('parent_id');
				$comment_data['author']=$this->input->post('author');
				$comment_data['comment']=$this->input->post('comment_text');
				$comment_data['avatar']=$this->input->post('avatar');
				$comment_data['note_id']=$this->input->post('note_id');
				$comment_data['art_id']=$this->input->post('art_id');
				$comment_data['date']=date('Y-m-d');
				$comment_data['time']=date('H-i');
                
                $this->articles_model->add_comment($comment_data);
                redirect(base_url().'index.php/article/view/'.$title.'#c');
			}else{
				$this->template->page_view($data,$name);
			}
		}else{
			$this->template->page_view($data,$name);
		}
	} 
}