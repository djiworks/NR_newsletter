<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intern_md extends CI_Model
{
	private $table = "intern";
	private $table2 = "person";
	private $table3 = "recommended_by";
	private $table4 = "university";
	
	public function update($id, $first_name, $last_name, $country, $phone, $mail){
		 
		$this->db->set("first_name",$first_name)
				 ->set("last_name",$last_name)
				 ->set("country",$country)
				 ->set("phone",$phone)
				 ->set("mail",$mail)
				 ->set("work_until",$work_until)
				 ->where("id_intern",$id)
				 ->update($this->table);
	}
	 
	 public function get($id){
		return $this->db->where("id_intern",$id)
						->get($this->table);
	 }
	 
	 public function create($first_name, $address, $country, $phone, $mail){
		$this->db->set("first_name",$first_name)
				 ->set("last_name",$last_name)
				 ->set("country",$country)
				 ->set("phone",$phone)
				 ->set("mail",$mail)
				 ->set("work_until",$work_until)
		 		 ->insert($this->table);  
	 }
	 
	 public function getSearchedInterns($field, $value){
		 return $this->db->query("
					SELECT id_intern
					FROM ".$this->table."
					WHERE ".$this->table.".".$field." LIKE '%".$value."%'
			");
	 }
	 
	public function delete($id_intern){			 
		$this->db->where('id_intern', $id_intern)
				 ->delete($this->table);	
	}
	
	public function getAll() {
		return $this->db->query("
			SELECT p.id_person, 
			p.first_name, 
			p.last_name, 
			p.phone, 
			p.mail, 
			p.worked_until, 
			r.id_person, 
			r.id_university, 
			u.id_university, 
			u.name
				FROM ".$this->table2." AS p
					LEFT OUTER JOIN ".$this->table3." AS r 
						ON p.id_person = r.id_person
					LEFT OUTER JOIN ".$this->table4." AS u 
						ON r.id_university = u.id_university");
	}	 
}
