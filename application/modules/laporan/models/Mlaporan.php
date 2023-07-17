<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{
    public function getRekap($tgl1, $tgl2)
    {
        return $this->db->query("SELECT
            MasterPenjamin.Nama AS PENJAMIN,
            SUM ( MasterTindakan.JPPL* TransPMR.JasaPelayanan ) AS JM 
        FROM
            TransPMR
            INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR
            INNER JOIN MasterPenjamin ON TransPMR.KodePT = MasterPenjamin.KodePT 
        WHERE
            TransPMR.DokterPeriksa = 'SP09' 
            AND TransPMR.TglPMR  BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY
            MasterPenjamin.Nama")->result_array();
    }

    public function getDetail($tgl1, $tgl2)
    {
        return $this->db->query("SELECT
            MasterPenjamin.Nama AS PENJAMIN,
            SUM (TransPMR.JmlPmr) AS JML,
            SUM ( MasterTindakan.JPPL* TransPMR.JasaPelayanan ) AS JM 
        FROM
            TransPMR
            INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR
            INNER JOIN MasterPenjamin ON TransPMR.KodePT = MasterPenjamin.KodePT 
        WHERE
            TransPMR.DokterPeriksa = 'SP09'
            AND TransPMR.KodePT = '0001' 
            AND TransPMR.TglPMR  BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY
            MasterPenjamin.Nama")->result_array();
    }
}
