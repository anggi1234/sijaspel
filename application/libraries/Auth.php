<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{
    var $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function isLogin()
    {
        if ($this->ci->session->userdata('validated') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cekLogin()
    {
        if ($this->isLogin() != TRUE) {
            $this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak untuk mengakses halaman ini.');
            redirect('login');
        }
    }
}
