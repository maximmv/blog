<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
    function avatar(){
        $this->load->library('form_validation');
        $this->load->model('login_model');
        $data['pages']=$this->pages_model->get_pages();
        $data['pages_info'] = $this->login_model->get_info('avatar');
		$data['category'] = $this->pages_model->get_cat();
		$data['user']= $this->session->userdata('user');
		$data['user_info']['status']= $this->session->userdata('status');
		$data['user_info']['avatar']= $this->session->userdata('avatar');
		$data['error']='';
		if (!empty($data['user'])){
            if($this->input->post('change_avatar')){
                $config['upload_path'] = './images/avatars/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '1000';
                $config['encrypt_name']  = TRUE;
                $config['remove_spaces']  = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()){
                    $data['error'] = $this->upload->display_errors();
                    $name='avatar';
                    $this->template->page_view($data,$name);
                }else{
                    $this->load->model('profile_model');
                    $upload_data = $this->upload->data();
                    $avatar['avatar']=$upload_data['file_name'];
                    $this->profile_model->update_avatar($data['user'],$avatar);
                    $data['user_info']=$this->login_model->user_info($data['user']);
                    $ses_data=array(
                        'avatar'=>$data['user_info']['avatar']
                    );
                    $this->session->set_userdata($ses_data);
                    $config['source_image'] = $upload_data['full_path'];
                    $config['new_image'] = APPPATH.'../images/avatars/thumbs';
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 80;
                    $config['height'] = 80;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    $data['error'] = 'Аватар успешно сменен';
                    $name='info';
                    $this->template->page_view($data,$name);
                }
            }else{
                $name='avatar';
                $this->template->page_view($data,$name);
            }            
        }else{
            $data['error']='Пожалуйста авторизируйтесь';
            $name='info';
            $this->template->page_view($data,$name);
        }
    }
}