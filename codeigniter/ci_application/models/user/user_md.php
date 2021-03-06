<?php
Class User_md extends CI_Model
{
	private $table = 'user';
	private $table2 = 'role';

	function create($login, $password, $role)
	{
		$this -> db -> set('login', $login)
					-> set('password', $password)
					-> set('id_role', $role)
					-> insert($this->table);
	}
	
	function getPassword($id)
	{
		return $this -> db -> select('password')
					-> where('id_user', $id)
					-> get($this->table);
	}
	
	function getByLogin($login)
	{
		return $this -> db	-> where('login', $login)
							-> get($this->table);
	}
	
	function deleteUser($id)
	{
		$this -> db -> where('id_user', $id)
					-> delete($this->table);
	}
	
	function updatePassword($id, $password)
	{
		$this -> db -> set('password', $password)
					-> where('id_user', $id) 
					-> update($this->table);
	}

	function login($username, $password)
	{
		  $query = $this -> db -> select('id_user, login, password, id_role')
		  					   -> from($this->table)
		  					   -> where('login', $username)
		   					   -> get();
		   					   
		  $rows = $query -> num_rows();
		   
		  if($rows == 0 || $rows > 1)
		  {
			  //~ return $query->result();
		     return false;
		  }
		  else
		  {
		  	$result = array();
		  	foreach($query->result() as $row)
		  	{
			
		  		if($row->password == substr(crypt($password, $row->password), 0, strlen($row->password)))
		  		{
		  			$result['id'] = $row->id_user;
		  			$result['role'] = $row->id_role;
		  			$result['login'] = $row->login;
		  			return $result;
		  		}
		  		else
		  		{
					//~ $result['id'] = $password;
		  			//~ $result['role'] = $row->password;
		  			//~ $result['login'] = substr(crypt($password, $row->password), 0, strlen($row->password));
		  			//~ return $result;
		  			return false;
		  		}
		  	}
		  }
		  $query->free_result();
	 }
	 
	 function getAllUsers()
	 {
		return $this->db->query("
			SELECT u.id_user, u.login, u.password, r.id_role , r.name
			FROM ".$this->table."  AS u INNER JOIN ".$this->table2." as r
			ON u.id_role = r.id_role
		");
	 }
	 
	 function getAllRoles()
	 {
		return $this->db->query("
			SELECT r.id_role, r.name
			FROM ".$this->table2." as r
		");
	 }
	 
	 function updateRole($id_user, $id_role)
	 {
		return $this->db->query("
			UPDATE ".$this->table."
			SET id_role = ".$id_role."
			WHERE id_user = ".$id_user.";
		");  
	 }
	 
	 public function getNumberNotConfirmedUsers() {
		return $this->db->query("
			SELECT COUNT(*) as nb
				FROM ".$this->table." AS u 
				WHERE u.id_role = 5
				;");
	} 
}
?>
