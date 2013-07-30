<?php
Class User_md extends CI_Model
{
	private $table  = "user";
	private $table2  = "role";

	function login($username, $password)
	{
		  $query = $this -> db -> select('id_user, login, password, id_role')
		  					   -> from($this->table)
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
	 
	 function getAllUsers()
	 {
		return $this->db->query("
			SELECT u.id_user, u.login, u.password, r.name
			FROM ".$this->table."  AS u INNER JOIN ".$this->table2." as r
			ON u.id_role = r.id_role
		");
	 }
}
?>
