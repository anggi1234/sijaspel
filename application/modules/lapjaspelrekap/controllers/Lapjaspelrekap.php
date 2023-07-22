<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapjaspelrekap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->auth->cekLogin();
        // $this->load->model('master/m_instalasi');
        $this->load->model('master/m_dokter');
        $this->load->model('master/m_penjamin');
        $this->load->model('trirja/m_medis');



    }
    function index()
    {
        $data['judul'] = "Rekap Laporan Jasa Pelayanan Medis";
        $this->load->model('master/m_instalasi');
        $data['tanggal'] = date("d-m-Y");
        // $data['status'] = $this->m_statuspulang->getStatusPulang2();
		// $data['bagian'] = $this->m_instalasi->getInstalasi();

        $data['username'] = $this->session->userdata('username');
        $cek = $this->m_medis->cekMedis($data['username']);
        if ($cek->USGRPID == '78982') {
            $data['dokter'] = $this->m_dokter->getAksesDokter($data['username']);
        } else {
            $data['dokter'] = $this->m_dokter->getDokterAll();
        }
		// $data['dokter'] = $this->m_dokter->getDokterAll();
		$data['penjamin'] = $this->m_penjamin->getAllpenjamin();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/contentstart');
        $this->load->view('vlaporan');
        $this->load->view('template/contentend');
        $this->load->view('template/js');
        $this->load->view('js_vlaporan');
        $this->load->view('template/footer');
    }
}