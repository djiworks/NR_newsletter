<?php

function isLoggedInRedirect($object) {
	if(!$object->session->userdata('logged_in'))
	{
		redirect('login/login', 'refresh');
	}
	else
	{
		$sess = $object->session->userdata('logged_in');
		if($sess['role'] >= 5)
		{
			redirect('login/login', 'refresh');
		}
	}
}

function isAdmin($object) {
	if($object->session->userdata('logged_in'))
	{
		$sess = $object->session->userdata('logged_in');
		
		if($sess['role'] != 1) {
			redirect('university/university', 'refresh');
		}
	}
	else
	{
		isLoggedInRedirect($object);
	}
}

function isAllowed($object, $permission) {
	if($object->session->userdata('logged_in'))
	{
		$sess = $object->session->userdata('logged_in');
		
		if($sess['role'] > $permission) {
			redirect('university/university', 'refresh');
		}
	}
	else
	{
		isLoggedInRedirect($object);
	}
}

function isAllowedToView($object, $permission, $view, $data = NULL) {
		$sess = $object->session->userdata('logged_in');
	
		if($sess['role'] <= $permission) {
			$object->load->view ($view, $data);
		}
}

function loadTopMenu($object, $path, $sess) {
	$sess = $object->session->userdata('logged_in');
	$data = array();
	$data['username'] = $sess['username'];
	$data['role'] = $sess['role'];
	$data['path'] = $path;
	
	$object->load->view ( '/topmenu', $data );
}

