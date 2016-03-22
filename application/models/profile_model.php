<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
	function update_avatar($user,$avatar){
		$this->db->where('username',$user);
		$this->db->update('users',$avatar);
	}
}