<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{

    public function getLaporanSemua($tglmulai, $tglselesai)
    {
        return $this->db->query("SELECT MasterTindakan.NAMAPMR, Sum(TransPMR.JmlPmr) AS JML, Sum(MasterTindakan.JPPL*TransPMR.JasaPelayanan) AS JM
        FROM TransPMR INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR
        WHERE TransPMR.TglPMR between '$tglmulai' and '$tglselesai'
        GROUP BY MasterTindakan.NAMAPMR 
        order by MasterTindakan.NAMAPMR
      ")->result_array();
    }
    public function getLaporanRekap($tglmulai, $tglselesai)
    {
        return $this->db->query("select mj.Nama,isnull(k.jmlpmr,0) as jmlpmr, isnull(k.jp,0) as jmljaspel
        from MasterPenjamin mj
        left join (select sum(mt.JPPL*tp.JasaPelayanan) as jp, count(tp.KodePMR) as jmlpmr, tp.KodePT from TransPMR tp
        left join MasterTindakan mt on mt.KODEPMR = tp.KodePMR
        where tp.TglPMR between '$tglmulai' and '$tglselesai' and tp.DokterPeriksa='SP09'
        group by tp.KodePT) k on k.KodePT = mj.KodePT
        
        where mj.Aktif='Y' order by mj.KodePT ")->result_array();
    }

    public function getLaporanDokter($tglmulai, $tglselesai, $dokter)
    {
        return $this->db->query("SELECT MasterTindakan.NAMAPMR, Sum(TransPMR.JmlPmr) AS JML, Sum(MasterTindakan.JPPL*TransPMR.JasaPelayanan) AS JM
        FROM TransPMR INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR
        WHERE TransPMR.TglPMR between '$tglmulai' and '$tglselesai' and TransPMR.DokterPeriksa = '$dokter'
        GROUP BY MasterTindakan.NAMAPMR 
        order by MasterTindakan.NAMAPMR
      ")->result_array();
    }

    public function getLaporanBagian($tglmulai, $tglselesai, $bagian)
    {
        return $this->db->query("SELECT MasterTindakan.NAMAPMR, Sum(TransPMR.JmlPmr) AS JML, Sum(MasterTindakan.JPPL*TransPMR.JasaPelayanan) AS JM
        FROM TransPMR INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR
        WHERE TransPMR.TglPMR between '$tglmulai' and '$tglselesai' and TransPMR.KodeBagian = '$bagian'
        GROUP BY MasterTindakan.NAMAPMR 
        order by MasterTindakan.NAMAPMR
      ")->result_array();
    }

    public function getLaporanBagDok($tglmulai, $tglselesai, $bagian, $dokter)
    {
        return $this->db->query("SELECT MasterTindakan.NAMAPMR, Sum(TransPMR.JmlPmr) AS JML, Sum(MasterTindakan.JPPL*TransPMR.JasaPelayanan) AS JM
        FROM TransPMR INNER JOIN MasterTindakan ON TransPMR.KodePMR = MasterTindakan.KODEPMR
        WHERE TransPMR.TglPMR between '$tglmulai' and '$tglselesai' and TransPMR.KodeBagian = '$bagian' and TransPMR.DokterPeriksa = '$dokter'
        GROUP BY MasterTindakan.NAMAPMR 
        order by MasterTindakan.NAMAPMR
      ")->result_array();
    }
}
