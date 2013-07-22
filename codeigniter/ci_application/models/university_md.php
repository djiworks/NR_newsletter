<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class University_md extends CI_Model
{
	private $table = "university";
	
	public function update($id, $name, $address, $country, $subscription, $checking_state){
		 
		$this->db->set("name",$name)
				 ->set("address",$address)
				 ->set("country",$country)
				 ->set("subscription",$subscription)
				 ->set("checking_state",$checking_state)
				 ->where("id_university",$id)
				 ->update($this->table);
	}
	 
	 public function addCommentOnUniversity($id, $comment){
		 return $this->db->query("
		 			UPDATE ".$this->table."
		 			SET comment = CONCAT(comment,  '".$comment."')
					WHERE ".$this->table.".id_university = " .$id
					);
	 }
	 
	 public function get($id){
		return $this->db->where("id_university",$id)
						->get($this->table);
	 }
	 
	 public function create($name, $address, $country, $subscription, $checking_state){
		$this->db->set("name",$name)
				 ->set("address",$address)
				 ->set("country",$country)
				 ->set("subscription",$subscription)
				 ->set("checking_state",$checking_state)
		 		 ->insert($this->table);  
	 }
	 
	 public function getSearchedUniversities($field, $value){
		 return $this->db->query("
					SELECT id_university
					FROM ".$this->table."
					WHERE ".$this->table.".".$field." LIKE '%".$value."%'
			");
	 }
	 
	public function delete($id_university){			 
		$this->db->where('id_university', $id_university)
				 ->delete($this->table);	
	}
	 
	public function getAll() {
		return $this->db->query("SELECT DISTINCT u.id_university, 
												 u.name, 
												 u.address, 
												 u.country, 
												 u.subscription, 
												 u.checking_state, 
												 u.comment, 
												 m.mail, 
												 p.phone
									FROM ".$this->table." AS u 
										INNER JOIN contact AS c 
										INNER JOIN phone AS p 
										INNER JOIN mail AS m
									ON u.id_university = c.id_university
										AND c.id_contact = p.id_contact
										AND c.id_contact = m.id_contact;");
	}
}
