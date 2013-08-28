<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class University_md extends CI_Model
{
	private $table  = "university";
	private $table2 = "contact";
	private $table3 = "phone";
	private $table4 = "mail";
	private $table5 = "recommended_by";
	private $table6 = "person";
	
	public function update($id, $name, $address, $country, $subscription, $checking_state) {
		$this->db->set("name",$name)
				 ->set("address",$address)
				 ->set("country",$country)
				 ->set("subscription",$subscription)
				 ->set("checking_state",$checking_state)
				 ->where("id_university",$id)
				 ->update($this->table);
	}
	 
	public function addCommentOnUniversity($id, $comment) {
		 return $this->db->query("
		 			UPDATE ".$this->table."
		 			SET comment = CONCAT(comment,  '".$comment."')
					WHERE ".$this->table.".id_university = " .$id
					);
	 }
	
	public function get($id) {
		return $this->db->where("id_university",$id)
						->get($this->table);
	 }
	
	public function getComment($id) {
		return $this->db->select("comment")
						->where("id_university",$id)
						->get($this->table);
	 }
	
	public function getAllMail($id) {
		return $this->db->query("
				SELECT m.mail
				FROM ".$this->table." AS u 
					INNER JOIN ".$this->table2." AS c ON u.id_university = c.id_university
					INNER JOIN ".$this->table4." AS m ON m.id_contact = c.id_contact
				WHERE u.id_university = ".$id."
				;");
	} 
	
	public function getName($id) {
		return $this->db->select("name")
						->where("id_university",$id)
						->get($this->table);
	 }
	
	public function create($name, $address, $country, $subscription, $checking_state) {
		$this->db->set("name",$name)
				 ->set("address",$address)
				 ->set("country",$country)
				 ->set("subscription",$subscription)
				 ->set("checking_state",$checking_state)
		 		 ->insert($this->table);
		 		 
		return $this->db->query("
					SELECT MAX(id_university) as id_univ
						FROM ".$this->table.";");
	 }
	
	public function getSearchedUniversities($field, $value) {
		 return $this->db->query("
					SELECT id_university
					FROM ".$this->table."
					WHERE ".$this->table.".".$field." LIKE '%".$value."%'
			");
	 }
	
	public function delete($id_university) {
		$this->db->where('id_university', $id_university)
				 ->delete($this->table);	
	}
	
	public function getAllCountries() {
		 return $this->db->query("
					SELECT DISTINCT country
					FROM ".$this->table."
					UNION DISTINCT
					SELECT DISTINCT country
					FROM ".$this->table6."
					");
	}
	
	public function getAll() {
				return $this->db->query("
					SELECT u.id_university, u.name, u.address, u.country, u.subscription, u.checking_state, u.comment, m.mail, p.number
						FROM ".$this->table." AS u 
							INNER JOIN ".$this->table2." AS c 
							INNER JOIN ".$this->table3." AS p 
							INNER JOIN ".$this->table4." AS m
						ON u.id_university = c.id_university
							AND c.id_contact = p.id_contact
							AND c.id_contact = m.id_contact
						UNION
							SELECT u.id_university, u.name, u.address, u.country, u.subscription, u.checking_state, u.comment, 0 as mail, 0 as number
								FROM ".$this->table." AS u 
								WHERE u.id_university NOT IN (SELECT DISTINCT u.id_university
																  FROM university AS u 
																	  INNER JOIN ".$this->table2." AS c 
																	  INNER JOIN ".$this->table3." AS p 
																	  INNER JOIN ".$this->table4." AS m
																  ON u.id_university = c.id_university
																	  AND c.id_contact = p.id_contact
																	  AND c.id_contact = m.id_contact);");
	}
	
	public function getAllUniv_Contact() {
		return $this->db->query("
			SELECT u.id_university, 
				   c.id_contact,
				   c.information, 
				   m.mail, 
				   p.number,
				   p.type
				FROM ".$this->table." AS u 
					LEFT OUTER JOIN ".$this->table2." AS c ON u.id_university = c.id_university
					LEFT OUTER JOIN ".$this->table3." AS p ON c.id_contact = p.id_contact
					LEFT OUTER JOIN ".$this->table4." AS m ON c.id_contact = m.id_contact
				ORDER BY u.id_university ASC;");
	} 
	
	public function getAllUniv_Interns() {
		return $this->db->query("
			SELECT u.id_university, 
				   r.id_person, 
				   r.is_student, 
				   p.first_name, 
				   p.last_name, 
				   p.country, 
				   p.worked_until
				FROM ".$this->table." AS u 
					LEFT OUTER JOIN ".$this->table5." AS r ON u.id_university = r.id_university
					LEFT OUTER JOIN ".$this->table6." AS p ON r.id_person = p.id_person
				ORDER BY u.id_university ASC;");
	} 
	//~ 
	public function getUniv_Contact($id) {
		return $this->db->query("
			SELECT c.id_contact, c.information
				FROM ".$this->table2." AS c
				WHERE c.id_university = $id;");
	}
	
	
	public function getUniv_Intern($id) {
		return $this->db->query("
			SELECT p.first_name, 
				   p.last_name 
				FROM ".$this->table6." AS p 
					INNER JOIN ".$this->table5." AS r 
						ON p.id_person = r.id_person 
				WHERE r.id_university = $id;");
	}
	
	public function getNumberWaitingUniversities() {
		return $this->db->query("
			SELECT COUNT(*) as nb
				FROM ".$this->table." AS u 
				WHERE u.checking_state = 2
				;");
	} 
	
	public function getNumberWrongUniversities() {
		return $this->db->query("
			SELECT COUNT(*) as nb
				FROM ".$this->table." AS u 
				WHERE u.checking_state = 3
				;");
	} 
	
	function updateCheckingState($id_university, $checking_state) {
		return $this->db->query("
			UPDATE ".$this->table."
			SET checking_state = ".$checking_state."
			WHERE id_university = ".$id_university.";
		");  
	}
	
	function university_recommendedBy_intern($id_university, $id_person) {
		$this->db->set("id_university",$id_university)
				 ->set("id_person",$id_person)
		 		 ->insert($this->table5);
	}
}
