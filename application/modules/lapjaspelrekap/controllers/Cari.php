<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->auth->cekLogin();
    }

    function index()
    {
        if (
            $this->input->post('tglmulai') && $this->input->post('tglmulai') != NULL
            && $this->input->post('penjamin') && $this->input->post('penjamin') != "-"
        ) {
            $tglmulai = date_format(date_create($this->input->post('tglmulai')), "Y-m-d");
            $tglselesai = date_format(date_create($this->input->post('tglselesai')), "Y-m-d");
            $penjamin = $this->input->post('penjamin');
            $dokter= $this->input->post('dokter');

            $this->load->model('m_laporan');
            if ($penjamin == "SEMUA" && $dokter =="SEMUA") {
                $laporan = $this->m_laporan->getLaporanSemua($tglmulai, $tglselesai);
                $data['laporan'] = $laporan;
                $this->load->view('vlapjaspelrekap', $data);  
            }
            else if ($penjamin != "SEMUA" && $dokter =="SEMUA" ) {
                $laporan = $this->m_laporan->getLaporanPenjamin($tglmulai, $tglselesai, $penjamin);
                $data['laporan'] = $laporan;
                $this->load->view('vlapjaspelrekap', $data);  
            }
            else if ($penjamin == "SEMUA" && $dokter !="SEMUA" ) {
                $laporan = $this->m_laporan->getLaporanDokter($tglmulai, $tglselesai, $dokter);
                $data['laporan'] = $laporan;
                $this->load->view('vlapjaspelrekap', $data);  
            }
            else if ($penjamin != "SEMUA" && $dokter !="SEMUA" ) {
                $laporan = $this->m_laporan->getLaporanPD($tglmulai, $tglselesai, $penjamin, $dokter);
                $data['laporan'] = $laporan;
                $this->load->view('vlapjaspelrekap', $data);  
            }
          

        } else {
            $data['error'] = "Data keyword masih kosong";
            $this->load->view('vlapjaspelrekap', $data);
        }
    }
}