<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function index(){
		$this->load->model('login_model');
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->login_model->get_info('register');
		$data['category'] = $this->pages_model->get_cat();
        $data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $data['error'] = '';
		$name ='info';
		
		
		if($this->input->post('enter') && $this->input->post('login') && $this->input->post('password')){
			$username=$this->input->post('login');
			$password=$this->input->post('password');
			$login=$this->login_model->login($username,$password=sha1(md5($password)));
			if($login==TRUE){
                $data['user_info']= $this->login_model->user_info($username);
				$ses_data=array(
					'user'=>$username,
					'status'=>$data['user_info']['status'],
					'avatar'=>$data['user_info']['avatar']
					                    
				);
				$this->session->set_userdata($ses_data);
				redirect(base_url());
			}else{
				$data['error'] = 'Логин или пароль не совпадают!';
			}
		}else{
			$data['error'] = 'Не введен логин или пароль';
		}
		$this->template->page_view($data,$name);
	}
	
	function register(){
        
        $this->load->model('articles_model');
		$this->load->model('login_model');
        $this->load->library('form_validation');
        $data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->login_model->get_info('register');
		$data['category'] = $this->pages_model->get_cat();
        $data['error'] = '';
       	$name ='register';
        if($this->input->post('register')){
            $this->load->model('rules_model');
			$this->form_validation->set_rules($this->rules_model->reg_rules);
			$check = $this->form_validation->run();
            if ( $check==TRUE){
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('pswd');
				$password_again = $this->input->post('pswd2');
                $captcha = $this->input->post('captcha');
				$login_check=$this->login_model->check_login($username);
				$email_check=$this->login_model->check_email($email);
				$info_msg = '';
				if ($login_check == FALSE){
					$info_msg = $info_msg."Этот логин уже занят!<br />";
				}
				if ($email_check == FALSE){
					$info_msg = $info_msg."Этот E-mail уже занят!<br />";
				}
				if ($password != $password_again){
					$info_msg = $info_msg."Пароли не совпадают!<br />";
				}
				if($captcha!=$this->session->userdata['captcha']){
					$info_msg = $info_msg."Символы с изображения введены неверно!";
				}
				if($login_check == TRUE && $email_check == TRUE && $password == $password_again && $captcha==$this->session->userdata['captcha']){
					$new['username']=$username;
					$new['email']=$email;
					$new['password']=sha1(md5($password));
					
					
					$this->login_model->register($new);
					redirect(base_url()."index.php/login/successreg");
				} 
				$data['error'] = $info_msg;
                $data['captcha']=$this->captcha->get_captcha();
                $this->template->page_view($data,$name);				
            }else{
                $data['captcha']=$this->captcha->get_captcha();
                $this->template->page_view($data,$name);
            }                      
        }else{
            $data['captcha']=$this->captcha->get_captcha();
            $this->template->page_view($data,$name);
        }
	}
	function successreg(){
		$this->load->model('login_model');
		$data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->login_model->get_info('register');
		$data['category'] = $this->pages_model->get_cat();
        $name ='successreg';
		$this->template->page_view($data,$name);
	}
    function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('avatar');
        redirect(base_url());
    }
	function forgot(){
		$this->load->model('articles_model');
		$this->load->model('login_model');
        $this->load->library('form_validation');
        $data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
        $data['pages']=$this->pages_model->get_pages();
		$data['pages_info'] = $this->login_model->get_info('forgot');
		$data['category'] = $this->pages_model->get_cat();
        $data['error'] = '';
        if($this->input->post('send_pswd')){
			$this->load->model('rules_model');
			$this->form_validation->set_rules($this->rules_model->forgot_rules);
			$check = $this->form_validation->run();
            if ( $check==TRUE){ 
				$login=$this->input->post('login');
				$email=$this->input->post('email');
				$check_forgot=$this->login_model->check_forgot($login,$email);
				if ($check_forgot==TRUE){
					$this->load->helper('string');
					$new['password'] = random_string('alpha',8);
					
					$message ='Ваш новый пароль:'.$new['password'];
					// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
					$message = wordwrap($message, 70, "\r\n");
					mail($email, 'Восстановление пароля', $message);
						
					$new['password'] = sha1(md5($new['password']));	
					$this->login_model->update_pswd($login,$new);
					$data['error']="Ваш пароль был успешно изменен и отправлен на емайл!".$message;
					$name ='info';
					$this->template->page_view($data,$name);
				}else{
					$data['error']="Комбинации логин и емайл не найдено!";
					$name ='forgot';
					$this->template->page_view($data,$name);
				}
			}else{
				$name ='forgot';
				$this->template->page_view($data,$name);
			}
			
		}else{
			$name ='forgot';
			$this->template->page_view($data,$name);
		}
	}
}