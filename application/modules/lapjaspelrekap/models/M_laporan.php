<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function getLaporanSemua($tglmulai, $tglselesai)
    {
        return $this->db->query("select mj.Nama,isnull(k.jmlpmr,0) as jmlpmr, isnull(k.jp,0) as jmljaspel
        from MasterPenjamin mj
        left join (select sum(mt.JPPL*tp.JasaPelayanan) as jp, count(tp.KodePMR) as jmlpmr, tp.KodePT from TransPMR tp
        left join MasterTindakan mt on mt.KODEPMR = tp.KodePMR
        where tp.TglPMR between '$tglmulai' and '$tglselesai'
        group by tp.KodePT) k on k.KodePT = mj.KodePT
        Where mj.KodePT in('0001','0015','0016')
        
        order by k.jp DESC       
      ")->result_array();
    }
    public function getLaporanPenjamin($tglmulai, $tglselesai,$penjamin)
    {
        return $this->db->query("select mj.Nama,isnull(k.jmlpmr,0) as jmlpmr, isnull(k.jp,0) as jmljaspel
        from MasterPenjamin mj
        left join (select sum(mt.JPPL*tp.JasaPelayanan) as jp, count(tp.KodePMR) as jmlpmr, tp.KodePT from TransPMR tp
        left join MasterTindakan mt on mt.KODEPMR = tp.KodePMR
        where tp.TglPMR between '$tglmulai' and '$tglselesai' and tp.KodePT='$penjamin'
        group by tp.KodePT) k on k.KodePT = mj.KodePT
        Where mj.KodePT in('0001','0015','0016')
        order by k.jp DESC ")->result_array();
    }

    public function getLaporanDokter($tglmulai, $tglselesai,$dokter)
    {
        return $this->db->query("select mj.Nama,isnull(k.jmlpmr,0) as jmlpmr, isnull(k.jp,0) as jmljaspel
        from MasterPenjamin mj
        left join (select sum(mt.JPPL*tp.JasaPelayanan) as jp, count(tp.KodePMR) as jmlpmr, tp.KodePT from TransPMR tp
        left join MasterTindakan mt on mt.KODEPMR = tp.KodePMR
        where tp.TglPMR between '$tglmulai' and '$tglselesai' and tp.DokterPeriksa='$dokter'
        group by tp.KodePT) k on k.KodePT = mj.KodePT
        Where mj.KodePT in('0001','0015','0016')
        order by k.jp DESC ")->result_array();
    }

    public function getLaporanPD($tglmulai, $tglselesai,$penjamin,$dokter)
    {
        return $this->db->query("select mj.Nama,isnull(k.jmlpmr,0) as jmlpmr, isnull(k.jp,0) as jmljaspel
        from MasterPenjamin mj
        left join (select sum(mt.JPPL*tp.JasaPelayanan) as jp, count(tp.KodePMR) as jmlpmr, tp.KodePT from TransPMR tp
        left join MasterTindakan mt on mt.KODEPMR = tp.KodePMR
        where tp.TglPMR between '$tglmulai' and '$tglselesai' and tp.DokterPeriksa='$dokter' and tp.KodePT='$penjamin'
        group by tp.KodePT) k on k.KodePT = mj.KodePT
        Where mj.KodePT in('0001','0015','0016')
        order by k.jp DESC ")->result_array();
    }
    
    
}