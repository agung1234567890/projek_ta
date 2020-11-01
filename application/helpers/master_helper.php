<?php
function cek_login()
{
    $CI = &get_instance();

    if (!$CI->session->userdata('id_admin')) {
        redirect('admin/login');
    }
}
