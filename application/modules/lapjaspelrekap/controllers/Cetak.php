<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->auth->cekLogin();
    }

    function index()
    {
        if (
            $this->input->get('tglmulai') && $this->input->get('tglmulai') != NULL
        ) {
            $tglmulai = date_format(date_create($this->input->get('tglmulai')), "Y-m-d");
            $tglselesai = date_format(date_create($this->input->get('tglselesai')), "Y-m-d");
            $jenis = $this->input->get('jnslaporan');
            $this->load->model('m_laporan');
            if ($jenis == "SEMUA") {
                $laporan = $this->m_laporan->getLaporanSemua($tglmulai, $tglselesai);
                $data['laporan'] = $laporan;
                $data['tglmulai'] = $tglmulai;
                $data['tglselesai'] = $tglselesai;
                $this->load->view('cetaklap', $data);
            } else {
                $laporan = $this->m_laporan->getLaporan($tglmulai, $tglselesai, $jenis);
                $data['laporan'] = $laporan;
                $data['tglmulai'] = $tglmulai;
                $data['tglselesai'] = $tglselesai;
                $this->load->view('cetaklap', $data);
            }
        } else {
            $data['error'] = "Data keyword masih kosong";
            $this->load->view('cetaklap', $data);
        }
    }
}

