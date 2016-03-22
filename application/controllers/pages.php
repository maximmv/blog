 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function index(){
		redirect(base_url());
	}
	function page($title){
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->pages_model->get_pages_info($title);
		$data['category'] = $this->pages_model->get_cat();
		$data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
		if(empty($data['pages_info'])){
			redirect(base_url());
		}
		$name='page';
		$this->template->page_view($data,$name);
	}
	
} 