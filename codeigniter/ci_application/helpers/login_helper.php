<?php

function isLoggedInRedirect($object) {
	if(!$object->session->userdata('logged_in'))
	{
		$tmp = $object->session->userdata('logged_in');
		redirect('login/login', 'refresh');

	}
	else
	{
		$tmp = $object->session->userdata('logged_in');
		if(!($tmp['role'] < 5))
		{
			redirect('login/login', 'refresh');
		}
	}
}

function isAdmin($object) {
	if(!$object->session->userdata('logged_in'))
	{
		$tmp = $object->session->userdata('logged_in');
		
		if($tmp['role'] != 1) {
			redirect('university/university', 'refresh');
		}
	}
}

function isAllowed($object, $permission) {
	if(!$object->session->userdata('logged_in'))
	{
		$tmp = $object->session->userdata('logged_in');
		
		if($tmp['role'] <= $permission) {
			redirect('university/university', 'refresh');
		}
	}
}

function loadTopMenu($object, $path, $sess) {
	$tmp = $object->session->userdata('logged_in');
	$data = array();
	$data['username'] = $tmp['username'];
	$data['role'] = $tmp['role'];
	$data['path'] = $path;
	
	$object->load->view ( '/topmenu', $data );
}

