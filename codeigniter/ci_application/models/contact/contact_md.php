<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_md extends CI_Model {
	private $table = "contact";
	private $table2 = "mail";
	private $table3 = "phone";

	public function createContact($info, $id_univ)
	{
		//Insertion of the new contact
		$this->db->set("information",$info)
				 ->set("id_university",$id_univ)
		 		 ->insert($this->table);
		 		 
		return $this->db->query("
					SELECT MAX(id_contact) as id_contact
						FROM ".$this->table.";");
	}
	
	public function addMail2Contact($mail, $id_contact)
	{
		//Insertion of the mail for a contact
		$this->db->set("mail",$mail)
				 ->set("id_contact",$id_contact)
		 		 ->insert($this->table2);
	}
	
	public function addPhone2Contact($phone, $type, $id_contact)
	{
		//Insertion of the phone for a contact
		$this->db->set("number",$phone)
				 ->set("type",$type)
				 ->set("id_contact",$id_contact)
		 		 ->insert($this->table3);
	}
	
	public function getInfoContact($id) {
		return $this->db->query("
			SELECT c.information, p.number, p.type, m.mail 
				FROM ".$this->table." AS c 
					LEFT OUTER JOIN ".$this->table2." AS m ON c.id_contact = m.id_contact 
					LEFT OUTER JOIN ".$this->table3." AS p ON c.id_contact = p.id_contact
				WHERE c.id_contact = ".$id.";");
	}
	
	public function getInfoMail($id) {
		return $this->db->query("
			SELECT m.mail 
				FROM ".$this->table2." AS m 
				WHERE m.id_contact = ".$id.";");
	}
	
	public function getInfoPhone($id) {
		return $this->db->query("
			SELECT p.number, p.type
				FROM ".$this->table3." AS p 
				WHERE p.id_contact = ".$id.";");
			
			
			
	}
	
}
