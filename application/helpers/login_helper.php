<?php

function is_already_login() {
    $ci = get_instance();
    if ($ci->session->userdata('id_role') == 1) {
        redirect('dashboard');
    }else {
        redirect('persetujuan');
    }
}

function is_not_login() {
    $ci = get_instance();
    if (!$ci->session->userdata('id_role')) {
		redirect('auth');
	}
}