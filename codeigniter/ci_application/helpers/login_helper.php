<?php

function isLoggedIn($object) {
	if(!$object->session->userdata('logged_in'))
	{
		redirect('login/login', 'refresh');
	}
}


function isAdmin($object) {
	if(!$object->session->userdata('logged_in'))
	{
		$tmp = $object->session->userdata('logged_in');
		
		if($tmp['role'] != 1) {
			redirect('admin/error', 'refresh');
		}
	}
}

function loadTopMenu($object, $path, $sess) {
	$tmp = $object->session->userdata('logged_in');
	
	if($tmp['role'] == 1)
	{
		$object->load->view ( $path.'/topmenu_admin', $sess );
	}
	else
	{
		$object->load->view ( $path.'/topmenu', $sess );
	}
}

