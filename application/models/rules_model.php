<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules_model extends CI_Model {

	public $comments_rules = array(
		array(
			'field'=>'author',
			'label'=>'Ваше имя',
			'rules'=>'required|xss_clean|min_length[4]|max_length[16]'
		),
		array(
			'field'=>'comment_text',
			'label'=>'Текст комментария',
			'rules'=>'required|xss_clean|min_length[4]|max_length[3000]'
		)
	);
    
    public $reg_rules = array(
		array(
			'field'=>'username',
			'label'=>'Логин',
			'rules'=>'required|xss_clean|min_length[2]|max_length[16]|alpha_dash'
		),
		array(
			'field'=>'email',
			'label'=>'E-mail',
			'rules'=>'required|xss_clean|valid_email'
		),
        array(
			'field'=>'pswd',
			'label'=>'Пароль',
			'rules'=>'required|xss_clean|min_length[6]|max_length[16]|alpha_dash'
		),
        array(
			'field'=>'pswd2',
			'label'=>'Пароль еще раз',
			'rules'=>'required|xss_clean|min_length[6]|max_length[16]|alpha_dash'
		),
        array(
			'field'=>'captcha',
			'label'=>'Введите символы с картинки',
			'rules'=>'required|xss_clean|exact_length[5]|alpha'
		)
        
	);
	public $forgot_rules = array(
		array(
			'field'=>'login',
			'label'=>'Логин',
			'rules'=>'required|xss_clean|min_length[4]|max_length[16]|alpha_dash'
		),
		array(
			'field'=>'email',
			'label'=>'E-mail',
			'rules'=>'required|xss_clean|valid_email'
		)                
	);
	
	
	
	/* Правила для админки */
			
	public $articles = array(
	   array
	   (
			'field' => 'title',
			'label' => 'Название',
			'rules' => 'required|xss_clean|max_length[50]'
	   ),
	   array
	   (
		   'field' => 'title_en',
		   'label' => 'Название для url',
		   'rules' => 'required|xss_clean|max_length[100]|alpha_dash' 
	   ),
	   array
	   (
		   'field' => 'description',
		   'label' => 'Описание',
		   'rules' => 'required|xss_clean|max_length[500]' 
	   ),
	   array
	   (
		   'field' => 'text',
		   'label' => 'Полная статья',
		   'rules' => 'required' 
	   ),	   
	   array
	   (
		   'field' => 'title_en',
		   'label' => 'Название для url',
		   'rules' => 'required|xss_clean|max_length[100]|alpha_dash' 
	   ),
	   array
	   (
		   'field' => 'keywords',
		   'label' => 'Ключевые слова',
		   'rules' => 'required|xss_clean|max_length[500]' 
	   ),
	   array
	   (
		   'field' => 'category',
		   'label' => 'Категория',
		   'rules' => 'required' 
	   )
	); 
 
	public $category = array(
	   array
	   (
			'field' => 'title',
			'label' => 'Название',
			'rules' => 'required|xss_clean|max_length[50]'
	   ),
	   array
	   (
		   'field' => 'title_en',
		   'label' => 'Название для url',
		   'rules' => 'required|xss_clean|max_length[100]|alpha_dash' 
	   ),
	   array
	   (
		   'field' => 'keywords',
		   'label' => 'Ключевые слова',
		   'rules' => 'required|xss_clean|max_length[500]' 
	   )
	);

	public $pages = array(
	   array
	   (
			'field' => 'title',
			'label' => 'Название',
			'rules' => 'required|xss_clean|max_length[50]'
	   ),
	   array
	   (
		   'field' => 'title_en',
		   'label' => 'Название для url',
		   'rules' => 'required|xss_clean|max_length[100]|alpha_dash' 
	   ),
	   array
	   (
		   'field' => 'text',
		   'label' => 'Текст страницы',
		   'rules' => 'required' 
	   ),
	   array
	   (
		   'field' => 'keywords',
		   'label' => 'Ключевые слова',
		   'rules' => 'required|xss_clean|max_length[500]' 
	   )
	);
    
    public $users = array(
	   array
	   (
			'field' => 'username',
			'label' => 'Логин',
            'rules'=>'required|xss_clean|min_length[4]|max_length[16]|alpha_dash'
		),
	   array
	   (
		   'field' => 'email',
		   'label' => 'E-mail',
		   'rules'=>'required|xss_clean|valid_email'
	   )
	); 

}