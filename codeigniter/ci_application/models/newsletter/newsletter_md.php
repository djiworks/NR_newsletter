<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_md extends CI_Model
{
	private $table = "newsletter";
	private $table2 = "contact";
	 
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
	 
	 public function create ( $name, $cover, $path, $content, $description, $creation_date, $checking_state){
		$this->db->set("name",$name)
				 ->set("cover",$cover)
				 ->set("path",$path)
				 ->set("content",$content)
				 ->set("description",$description)
				 ->set("creation_date",$creation_date)
				 ->set("checking_state",$checking_state)
		 		 ->insert($this->table);  
	 }
	 
	 public function update ( $id, $name, $cover, $path, $content, $description, $creation_date, $checking_state){
		$this->db->set("name",$name)
				 ->set("cover",$cover)
				 ->set("path",$path)
				 ->set("content",$content)
				 ->set("description",$description)
				 ->set("creation_date",$creation_date)
				 ->set("checking_state",$checking_state)
				 ->where("id_newsletter", $id)
		 		 ->update($this->table);  
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
		$this -> db -> where('id_newsletter', $id)
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
	public function getNewsletterList() {
		return $this->db->query("
			SELECT n.id_newsletter,
				   n.name,
				   n.description,
				   n.creation_date,
				   n.checking_state,
				   n.cover
				FROM ".$this->table." AS n
				WHERE n.checking_state <= 1;");
	}
	public function getNumberWaitingNewsletters() {
		return $this->db->query("
			SELECT COUNT(*) as nb
				FROM ".$this->table." AS u 
				WHERE u.checking_state = 2
				;");
	} 
	
	public function getNumberWrongNewsletters() {
		return $this->db->query("
			SELECT COUNT(*) as nb
				FROM ".$this->table." AS u 
				WHERE u.checking_state = 3
				;");
	} 
	
	function updateCheckingState($id_newsletter, $checking_state)
	 {
		return $this->db->query("
			UPDATE ".$this->table."
			SET checking_state = ".$checking_state."
			WHERE id_newsletter = ".$id_newsletter.";
		");  
	 }
}
