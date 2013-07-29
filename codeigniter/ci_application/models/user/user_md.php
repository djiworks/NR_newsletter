<?php
Class User_md extends CI_Model
{
	 function login($username, $password)
	 {
		  $query = $this -> db -> select('id_user, login, password, id_role')
		  					   -> from('user')
		  					   -> where('login', $username)
		   					   -> get();
		   					   
		  $rows = $query -> num_rows();
		   
		  if($rows == 0 || $rows > 1)
		  {
		     return false;
		  }
		  else
		  {
		  	$result = array();
		  	foreach($query->result() as $row)
		  	{
		  		if($row->password == sha1($password))
		  		{
		  			$result['id'] = $row->id_user;
		  			$result['role'] = $row->id_role;
		  			$result['login'] = $row->login;
		  			return $result;
		  		}
		  		else
		  		{
		  			return false;
		  		}
		  	}
		  }
		  $query->free_result();
	 }
}
?>
