<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Pdf extends Dompdf
{

    public $filename;
    protected $ci;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
        $this->ci = &get_instance();
    }
    public function load_view($view, $data = array())
    {
        $html = $this->ci->load->view($view, $data, TRUE);
        $this->loadHtml($html);

        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
    }
}
