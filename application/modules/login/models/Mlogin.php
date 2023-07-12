<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin extends CI_Model
{
    function cekLogin($data)
    {
        return $this->db->query("SELECT lg.*, lp.USGRPID FROM Login lg
        LEFT JOIN LogGroup lp ON lp.UserName = lg.UserName
        WHERE lg.UserName = '" . $data['username'] . "' AND lg.Password = '" . $data['password'] . "'")->row();
    }

    function getLevel($id)
    {
        return $this->db->query("SELECT * FROM LogGroup WHERE UserName = '$id'")->result_array();
    }

    function cekuser($data)
    {
        return $this->db->query("SELECT lg.*, lp.USGRPID FROM Login lg
        LEFT JOIN LogGroup lp ON lp.UserName = lg.UserName
        WHERE lg.UserName = '" . $data['username'] . "' AND lg.Password = '" . $data['password'] . "'")->row();
    }
}
