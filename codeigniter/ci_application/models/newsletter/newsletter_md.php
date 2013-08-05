<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_md extends CI_Model
{
	private $table = "newsletter";
	private $table2 = "contact";
	
	public function update(){
	}
	 
	 public function addCommentOnNewsletter($id, $comment){
		 return $this->db->query("
		 			UPDATE ".$this->table."
		 			SET comment = CONCAT(comment,  '".$comment."')
					WHERE ".$this->table.".id_newsletter = " .$id
					);
	 }
	 
	 public function get($id){
		return $this->db->where("id_newsletter",$id)
						->get($this->table);
	 }
	 
	 public function create(){
 
	 }
	 
	 public function getSearchedNewsletter($field, $value){
		 return $this->db->query("
					SELECT id_newsletter
					FROM ".$this->table."
					WHERE ".$this->table.".".$field." LIKE '%".$value."%'
			");
	 }
	 
	function delete($id)
	{
		$this -> db -> where('id_user', $id)
					-> delete($this->table);
	}
	 
	public function getAll() {
		return $this->db->query("
			SELECT n.id_newsletter,
				   n.name,
				   n.description,
				   n.creation_date,
				   n.checking_state,
				   n.cover
				FROM ".$this->table." AS n;");
	}
}
