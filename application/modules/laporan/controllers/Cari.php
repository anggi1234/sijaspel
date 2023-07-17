<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (
            $this->input->post('tgl1') && $this->input->post('tg1') != NULL
        ) {
            $tgl1 = date_format(date_create($this->input->post('tgl1')), "Y-m-d");
            $tgl2 = date_format(date_create($this->input->post('tgl2')), "Y-m-d");
            $this->load->model('mlaporan');
            if ($jenis == '1') {
                $laporan = $this->mlaporan->getRekap($tgl1, $tgl2);
                $data['laporan'] = $laporan;
                $this->load->view('vjprekap', $data);
            } else if ($jenis == '2') {
                $laporan = $this->mlaporan->getDetail($tgl1, $tgl2);
                $data['laporan'] = $laporan;
                $this->load->view('vjpdetail', $data);
            } else {
                $data['error'] = "Data keyword masih kosong";
                $this->load->view('vjprekap', $data);
            }
        }
    }
}
