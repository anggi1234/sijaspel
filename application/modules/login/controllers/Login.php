<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin');
    }

    function index()
    {
        $this->load->view('vlogin');
    }

    public function proses()
    {
        $this->load->library('enkripdekrip');
        $d['username'] = strtoupper($this->security->xss_clean($this->input->post('username')));
        $d['password'] = $this->enkripdekrip->proses($this->security->xss_clean($this->input->post('password')));

        $x = $this->session->userdata('logx');
        $cekuser = $this->mlogin->cekuser($d);

        if ($cekuser) {
            $this->load->model('mlogin');
            $cek = $this->mlogin->cekLogin($d);

            if ($cek->Status == "A") {
                $data = array(
                    'username' => $cek->UserName,
                    'nama' => $cek->NamaLengkap,
                    'role' => $cek->USGRPID,
                    'validated' => TRUE
                );
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $x += 1;
                $this->session->set_userdata('logx', $x);
                if ($x >= 3) {
                    $this->session->set_tempdata('freeze', true, 30);
                    $this->session->unset_userdata('logx');
                }
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Gagal Login Akun Anda Non Aktif. Hubungi Admin</div>');
                redirect('');
            }
        } else {

            if ($this->session->tempdata('freeze')) {
                $this->session->set_flashdata('error', 'Anda telah mencoba masuk dan gagal 3 kali. Silahkan menunggu 30 detik untuk mencoba lagi!');
                redirect('');
            } else {
                if ($this->input->post('username') == '') {
                    $x += 1;
                    $this->session->set_userdata('logx', $x);
                    if ($x >= 3) {
                        $this->session->set_tempdata('freeze', true, 30);
                        $this->session->unset_userdata('logx');
                    }
                    $this->session->set_flashdata('error', 'Gagal masuk, Username tidak boleh kosong!' . $x);
                    redirect('');
                } else {
                    if ($this->input->post('password') == '') {
                        $x += 1;
                        $this->session->set_userdata('logx', $x);
                        if ($x >= 3) {
                            $this->session->set_tempdata('freeze', true, 30);
                            $this->session->unset_userdata('logx');
                        }
                        $this->session->set_flashdata('error', 'Gagal masuk, Password tidak boleh kosong!' . $x);
                    } else {
                        $x += 1;
                        $this->session->set_userdata('logx', $x);
                        if ($x >= 3) {
                            $this->session->set_tempdata('freeze', true, 30);
                            $this->session->unset_userdata('logx');
                        }
                        $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Gagal Login User atau Password salah</div>');
                        redirect('');
                    }
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        // $this->session->unset_tempdata('orderobatrawatjalan');
        redirect('');
    }
}
