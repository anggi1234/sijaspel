<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapjaspel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Fungsi untuk menampilkan menu laporan penerima bantuan
     * @param none
     * @return void
     **/
    function index()
    {
        // $this->load->model('mhome');
        $this->load->view('vlapjaspel');
    }
}
