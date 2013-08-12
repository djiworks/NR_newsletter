<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_md extends CI_Model {
	private $table = "contact";
	private $table2 = "mail";
	private $table3 = "phone";

	function createContact($info, $id_univ)
	{
		//Insertion of the new contact
		$this->db->set("information",$info)
				 ->set("id_university",$id_univ)
		 		 ->insert($this->table);
		 		 
		return $this->db->query("
					SELECT MAX(id_contact) as id_contact
						FROM ".$this->table.";");
	}
	
	function addMail2Contact($mail, $id_contact)
	{
		//Insertion of the mail for a contact
		$this->db->set("mail",$mail)
				 ->set("id_contact",$id_contact)
		 		 ->insert($this->table2);
	}
	
	function addPhone2Contact($phone, $type, $id_contact)
	{
		//Insertion of the phone for a contact
		$this->db->set("number",$phone)
				 ->set("type",$type)
				 ->set("id_contact",$id_contact)
		 		 ->insert($this->table3);
	}
}
