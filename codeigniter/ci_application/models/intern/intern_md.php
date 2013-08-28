<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intern_md extends CI_Model
{
	private $table = "person";
	private $table2 = "recommended_by";
	private $table3 = "university";
	
	public function update($id, $first_name, $last_name, $country, $phone, $mail,$worked_until){
		 
		$this->db->set("first_name",$first_name)
				 ->set("last_name",$last_name)
				 ->set("country",$country)
				 ->set("phone",$phone)
				 ->set("mail",$mail)
				 ->set("worked_until",$worked_until)
				 ->where("id_person",$id)
				 ->update($this->table);
	}
	 
	 public function get($id){
		return $this->db->where("id_person",$id)
						->get($this->table);
	 }
	 
	 public function create($first_name, $last_name, $country, $phone, $mail, $worked_until){
		$this->db->set("first_name",$first_name)
				 ->set("last_name",$last_name)
				 ->set("country",$country)
				 ->set("phone",$phone)
				 ->set("mail",$mail)
				 ->set("worked_until",$worked_until)
		 		 ->insert($this->table);  
	 }
	 
	 public function getSearchedInterns($field, $value){
		 return $this->db->query("
					SELECT id_person
					FROM ".$this->table."
					WHERE ".$this->table.".".$field." LIKE '%".$value."%'
			");
	 }
	 
	public function delete($id_person){			 
		$this->db->where('id_person', $id_person)
				 ->delete($this->table);	
	}
	
	public function getAllNames() {
		return $this->db->select("id_person")
						->select("first_name")
						->select("last_name")
						->get($this->table);
	}
		
	
	public function getAll() {
		return $this->db->query("
			SELECT p.id_person, 
				   p.first_name, 
				   p.last_name, 
				   p.country, 
				   p.phone, 
				   p.mail, 
				   p.worked_until, 
				   r.is_student, 
				   u.id_university, 
				   u.name
				FROM ".$this->table." AS p
					LEFT OUTER JOIN ".$this->table2." AS r ON p.id_person = r.id_person
					LEFT OUTER JOIN ".$this->table3." AS u ON r.id_university = u.id_university
				ORDER BY p.id_person, r.is_student DESC;");
	}	 
}
