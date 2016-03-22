<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    function index(){
        $data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $data['info']='';
        if(empty($data['user']) || $data['user_info']['status']=='user' ){
            if($this->input->post('enter')){
                $login=$this->input->post('login');
                $pswd=$this->input->post('password');
                $pswd=sha1(md5($pswd));
                $check=$this->admin_model->check_admin($login,$pswd);
                if($check==TRUE){
                    $data['user_info']=$this->admin_model->user_info($login);
                    $ses_data=array(
                        'user'=>$login,
                        'status'=>$data['user_info']['status'],
                        'avatar'=>$data['user_info']['avatar'] 
                    );
                    $this->session->set_userdata($ses_data);
                    redirect(base_url().'index.php/admin'); 
                }else{
                    $data['info']='Введены неверные данные';
                }
            }
            $this->load->view('admin/login_view',$data);      
        }elseif(!empty($data['user']) && $data['user_info']['status'] == 'admin'){
            $name='main';
            $this->template->admin_view($data,$name);
        }else{
            $name='main';
            $this->template->author_view($data,$name);
        }
    }
	function add($page){
        $data['user'] = $this->session->userdata('user');
        $data['user_info']['status'] = $this->session->userdata('status');
        $data['user_info']['avatar'] = $this->session->userdata('avatar');
        $data['categories'] = $this->admin_model->get_cat();
        $data['info'] = '';        
        if(!empty($data['user']) && $data['user_info']['status'] == 'admin'){  
            $this->form_validation->set_rules($this->rules_model->$page);
            if($this->form_validation->run() && $this->input->post('add')){
				if($page == 'articles'){
					$config['upload_path'] = './images/articles/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$config['encrypt_name']  = TRUE;
					$config['remove_spaces']  = TRUE;

					$this->load->library('upload', $config);

					$this->upload->do_upload();
					
					$upload_data = $this->upload->data();
                    $add['mini_img']=$upload_data['file_name'];
				}
				
                $add['title'] = $this->input->post('title');
                $add['title_en'] = $this->input->post('title_en');
                $add['description'] = $this->input->post('description');
                $add['text'] = $this->input->post('text');
                $add['author'] = $this->input->post('author');
                $add['keywords'] = $this->input->post('keywords');
                $add['category'] = $this->input->post('category');
                $add['date'] = $this->input->post('date');
                $add['hidden'] = $this->input->post('hidden');
                $add['position'] = $this->input->post('position');
                
                foreach ($add as $key=>$val)
                {
                   if(!$add[$key]){
                      unset($add[$key]);
                   }
                }
                
                $this->admin_model->add($page,$add);
                
                $data['info'] = "Операция прошла успешно!";
                $name = 'info';
                $this->template->admin_view($data,$name);
            }else{
                $name = 'add/'.$page;
                $this->template->admin_view($data,$name);
            }    
        }elseif(!empty($data['user']) && $data['user_info']['status'] == 'author'){
            if($page=='articles'){
                $this->form_validation->set_rules($this->rules_model->$page);
                if($this->form_validation->run() && $this->input->post('add')){
                    $config['upload_path'] = './images/articles/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '1000';
                    $config['encrypt_name']  = TRUE;
                    $config['remove_spaces']  = TRUE;

                    $this->load->library('upload', $config);

                    $this->upload->do_upload();
                    
                    $upload_data = $this->upload->data();
                    $add['mini_img']=$upload_data['file_name'];
                    
                    
                    $add['title'] = $this->input->post('title');
                    $add['title_en'] = $this->input->post('title_en');
                    $add['description'] = $this->input->post('description');
                    $add['text'] = $this->input->post('text');
                    $add['author'] = $this->input->post('author');
                    $add['keywords'] = $this->input->post('keywords');
                    $add['category'] = $this->input->post('category');
                    $add['date'] = $this->input->post('date');
                    $add['hidden'] = $this->input->post('hidden');
                    $add['position'] = $this->input->post('position');
                    
                    foreach ($add as $key=>$val)
                    {
                       if(!$add[$key]){
                          unset($add[$key]);
                       }
                    }
                    
                    $this->admin_model->add($page,$add);
                    
                    $data['info'] = "Операция прошла успешно!";
                    $name = 'info';
                    $this->template->author_view($data,$name);
                }else{
                    $name = 'add/'.$page;
                    $this->template->author_view($data,$name);
                }  
            }
            
        }else{
            redirect(base_url().'index.php/admin');
        }    
    }
	
	function editlist($page){
        $data['user'] = $this->session->userdata('user');
        $data['user_info']['status'] = $this->session->userdata('status');
        $data['user_info']['avatar'] = $this->session->userdata('avatar');
        $data['categories'] = $this->admin_model->get_cat();
        $data['info'] = '';        
        if(!empty($data['user']) && $data['user_info']['status'] == 'admin'){ 
            $data['page'] = $page;
            $data['edit'] = $this->admin_model->get_editlist($page);
            if($page == 'pages') $name = 'edit/pageslist';
            else $name = 'edit/editlist';     
            $this->template->admin_view($data,$name);
        }elseif(!empty($data['user']) && $data['user_info']['status'] == 'author'){
			if($page=='articles'){
				$data['page'] = $page;
				$data['edit'] = $this->admin_model->get_editlist_author($page,$data['user']);
				$name = 'edit/editlist';     
				$this->template->author_view($data,$name);
			}
		}else{
            redirect(base_url().'index.php/admin');
        }   
    }
    
    function edit($page,$id = ''){
        $data['user'] = $this->session->userdata('user');
        $data['user_info']['status'] = $this->session->userdata('status');
        $data['user_info']['avatar'] = $this->session->userdata('avatar');
        $data['categories'] = $this->admin_model->get_cat();
        $data['pages_info'] = $this->admin_model->get_info($page,$id);
        $data['info'] = '';        
        if(!empty($data['user']) && $data['user_info']['status'] == 'admin'){
            $this->form_validation->set_rules($this->rules_model->$page);
            if($this->form_validation->run() && $this->input->post('edit')){
                if($page == 'articles'){
					$config['upload_path'] = './images/articles/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$config['encrypt_name']  = TRUE;
					$config['remove_spaces']  = TRUE;

					$this->load->library('upload', $config);

					$this->upload->do_upload();
					
					$upload_data = $this->upload->data();
                    $edit['mini_img']=$upload_data['file_name'];
				}                
                $edit['title'] = $this->input->post('title');
                $edit['title_en'] = $this->input->post('title_en');
                $edit['description'] = $this->input->post('description');
                $edit['text'] = $this->input->post('text');
                $edit['author'] = $this->input->post('author');
                $edit['keywords'] = $this->input->post('keywords');
                $edit['category'] = $this->input->post('category');
                $edit['date'] = $this->input->post('date');
                $edit['hidden'] = $this->input->post('hidden');
                $edit['position'] = $this->input->post('position');
                
                $edit['username'] = $this->input->post('username');
                $edit['email'] = $this->input->post('email');
                $edit['status'] = $this->input->post('status');
                
                foreach ($edit as $key=>$val){
                   if(!$edit[$key]){
                      unset($edit[$key]);
                   }
                }
                
                $this->admin_model->edit($page,$id,$edit);
                
                $data['info'] = "Операция прошла успешно!";
                $name = 'info';
                $this->template->admin_view($data,$name);
            }else{
                $name = 'edit/'.$page;
                $this->template->admin_view($data,$name);
            }    
        }elseif(!empty($data['user']) && $data['user_info']['status'] == 'author' && $page == 'articles'){
			$this->form_validation->set_rules($this->rules_model->$page);
            if($this->form_validation->run() && $this->input->post('edit')){
			
				$config['upload_path'] = './images/articles/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces']  = TRUE;

				$this->load->library('upload', $config);

				$this->upload->do_upload();
				
				$upload_data = $this->upload->data();
				$edit['mini_img']=$upload_data['file_name'];
				               
                $edit['title'] = $this->input->post('title');
                $edit['title_en'] = $this->input->post('title_en');
                $edit['description'] = $this->input->post('description');
                $edit['text'] = $this->input->post('text');
                $edit['author'] = $this->input->post('author');
                $edit['keywords'] = $this->input->post('keywords');
                $edit['category'] = $this->input->post('category');
                $edit['date'] = $this->input->post('date');
                $edit['hidden'] = $this->input->post('hidden');
                $edit['position'] = $this->input->post('position');
                
                $edit['username'] = $this->input->post('username');
                $edit['email'] = $this->input->post('email');
                $edit['status'] = $this->input->post('status');
                
                foreach ($edit as $key=>$val){
                   if(!$edit[$key]){
                      unset($edit[$key]);
                   }
                }
                
                $this->admin_model->edit($page,$id,$edit);
                
                $data['info'] = "Операция прошла успешно!";
                $name = 'info';
                $this->template->author_view($data,$name);
            }else{
                $name = 'edit/'.$page;
                $this->template->author_view($data,$name);
            }
		}else{
            redirect(base_url().'index.php/admin');
        }
    }
    
    function userslist(){
        $data['user'] = $this->session->userdata('user');
        $data['user_info']['status'] = $this->session->userdata('status');
        $data['user_info']['avatar'] = $this->session->userdata('avatar');
        $data['categories'] = $this->admin_model->get_cat();
        $data['info'] = '';        
        if(!empty($data['user']) && $data['user_info']['status'] == 'admin')
        { 
            $data['edit'] = $this->admin_model->userslist();
            $name = 'edit/userslist';     
            $this->template->admin_view($data,$name);
        }
        else
        {
            redirect(base_url().'index.php/admin');
        } 
    }
	
	function del($page){
        $data['user'] = $this->session->userdata('user');
        $data['user_info']['status'] = $this->session->userdata('status');
        $data['user_info']['avatar'] = $this->session->userdata('avatar');
        $data['categories'] = $this->admin_model->get_cat();
        $data['info'] = '';        
        if(!empty($data['user']) && $data['user_info']['status'] == 'admin'){  
            $data['edit'] = $this->admin_model->get_editlist($page,$data);
            if($this->input->post('del')){   
                $id = $this->input->post('id');
                $this->admin_model->del($page,$id);
                if($page=='articles'){
                    $this->admin_model->del_comments($id);
                }
                
                $data['info'] = "Операция прошла успешно!";
                $name = 'info';
                $this->template->admin_view($data,$name);
            }else{
                if($page == 'comments'){
                    $name = 'del/comments';
                }elseif($page == 'users'){
                    $name = 'del/deluser';
                }else{
                    $name = 'del/dellist';
                }
                $this->template->admin_view($data,$name);
            }    
        }elseif(!empty($data['user']) && $data['user_info']['status'] == 'author' && $page == 'articles'){
			$data['edit'] = $this->admin_model->get_editlist_author($page,$data['user']);
            if($this->input->post('del')){   
                $id = $this->input->post('id');
                $this->admin_model->del($page,$id);
                
                $data['info'] = "Операция прошла успешно!";
                $name = 'info';
                $this->template->author_view($data,$name);
            }else{
				$name = 'del/dellist';                
                $this->template->author_view($data,$name);
            }    
		}else{
            redirect(base_url().'index.php/admin');
        }
    }
	
    
    
}