<?php

function isLoggedIn($object) {
	if(!$object->session->userdata('logged_in'))
	{
		redirect('login/login', 'refresh');
	}
}

function loadTopMenuForRole($object, $path, $role, $sess) {
	if($object->session->userdata('logged_in')['role'] == $role)
		{
			$object->load->view ( $path.'/topmenu_admin', $sess );
		}
		else
		{
			$object->load->view ( $path.'/topmenu', $sess );
		}
}

