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
	 
	 
}
