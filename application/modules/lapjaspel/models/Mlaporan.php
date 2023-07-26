<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{

    public function getLaporanSemua($tglmulai, $tglselesai)
    {
        return $this->db->query("SELECT
            MasterTindakan.NAMAPMR,
            SUM ( TransPMR.JmlPmr ) AS JML,
            SUM ( MasterTindakan.JPPL* TransPMR.JasaPelayanan ) AS JM 
        FROM
            TransPMR
            INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR 
        WHERE
            TransPMR.TglPMR BETWEEN '$tglmulai' 
            AND '$tglselesai' 
        GROUP BY
            MasterTindakan.NAMAPMR 
        ORDER BY
            MasterTindakan.NAMAPMR")->result_array();
    }
    public function getLaporanRekap($tglmulai, $tglselesai)
    {
        return $this->db->query("SELECT
            mj.Nama,
            isnull( k.jmlpmr, 0 ) AS jmlpmr,
            isnull( k.jp, 0 ) AS jmljaspel 
        FROM
            MasterPenjamin mj
            LEFT JOIN (
            SELECT SUM
                ( mt.JPPL* tp.JasaPelayanan ) AS jp,
                COUNT ( tp.KodePMR ) AS jmlpmr,
                tp.KodePT 
            FROM
                TransPMR tp
                LEFT JOIN MasterTindakan mt ON mt.KODEPMR = tp.KodePMR 
            WHERE
                tp.TglPMR BETWEEN '$tglmulai' 
                AND '$tglselesai' 
                AND tp.DokterPeriksa= 'SP09' 
            GROUP BY
                tp.KodePT 
            ) k ON k.KodePT = mj.KodePT 
        WHERE
            mj.Aktif= 'Y' 
        ORDER BY
            mj.KodePT")->result_array();
    }

    public function getLaporanDokter($tglmulai, $tglselesai, $dokter)
    {
        return $this->db->query("SELECT
            MasterTindakan.NAMAPMR,
            SUM ( TransPMR.JmlPmr ) AS JML,
            SUM ( MasterTindakan.JPPL* TransPMR.JasaPelayanan ) AS JM 
        FROM
            TransPMR
            INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR 
        WHERE
            TransPMR.TglPMR BETWEEN '$tglmulai' 
            AND '$tglselesai' 
            AND TransPMR.DokterPeriksa = '$dokter' 
        GROUP BY
            MasterTindakan.NAMAPMR 
        ORDER BY
            MasterTindakan.NAMAPMR")->result_array();
    }

    public function getLaporanBagian($tglmulai, $tglselesai, $bagian)
    {
        return $this->db->query("SELECT
            MasterTindakan.NAMAPMR,
            SUM ( TransPMR.JmlPmr ) AS JML,
            SUM ( MasterTindakan.JPPL* TransPMR.JasaPelayanan ) AS JM 
        FROM
            TransPMR
            INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR 
        WHERE
            TransPMR.TglPMR BETWEEN '$tglmulai' 
            AND '$tglselesai' 
            AND TransPMR.KodeBagian = '$bagian' 
        GROUP BY
            MasterTindakan.NAMAPMR 
        ORDER BY
            MasterTindakan.NAMAPMR")->result_array();
    }

    public function getLaporanBagDok($tglmulai, $tglselesai, $bagian, $dokter)
    {
        return $this->db->query("SELECT
            MasterTindakan.NAMAPMR,
            SUM ( TransPMR.JmlPmr ) AS JML,
            SUM ( MasterTindakan.JPPL* TransPMR.JasaPelayanan ) AS JM 
        FROM
            TransPMR
            INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR 
        WHERE
            TransPMR.TglPMR BETWEEN '$tglmulai' 
            AND '$tglselesai' 
            AND TransPMR.KodeBagian = '$bagian' 
            AND TransPMR.DokterPeriksa = '$dokter' 
        GROUP BY
            MasterTindakan.NAMAPMR 
        ORDER BY
            MasterTindakan.NAMAPMR")->result_array();
    }
}
