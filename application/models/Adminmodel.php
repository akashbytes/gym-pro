<?php

class Adminmodel extends CI_Model{

	public function __construct()
  {

	}
	
	public function adminvalid($username ,$password)
  {
      $sql="SELECT * FROM `admin` WHERE (`a_email`='$username' || `a_user`='$username') AND `a_pass`='$password'";
      $q = $this->db->query($sql);
      if ($q->num_rows())
      {
        	return $q->row_array();
      }
      else
      {
        	return FALSE;
      }
	}
        
}