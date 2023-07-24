<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-12">

        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Jasa Pelayanan Medis</h6>
            </div>
            <div class="card-body">
                <form autocomplete="off" enctype="multipart/form-data" method="POST" id="form-laporan">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="bagian">Bagian</label>
                            <select name="bagian" id="bagian" class="custom-select custom-select-sm">
                                <option value="SEMUA">SEMUA</option>
                                <?php foreach ($bagian as $s) { ?>
                                    <option value="<?= trim($s['KodeBagian']); ?>"><?= trim($s['NamaBagian']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dokter">Dokter</label>
                            <select name="dokter" id="dokter" class="custom-select custom-select-sm">
                                <option value="SEMUA">SEMUA</option>
                                <?php foreach ($dokter as $dr) { ?>
                                    <option value="<?= trim($dr['KodeDokter']); ?>"><?= trim($dr['NamaDokter']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="startdate">Waktu Mulai</label>
                            <input type="text" value="<?= isset($tanggal) ? $tanggal : ''; ?>" id="tglmulai" name="tglmulai" class="form-control form-control-sm" />
                        </div>
                       
                        <div class="form-group col-md-2">
                            <label for="enddate">Waktu Selesai</label>
                            <input type="text" value="<?= isset($tanggal) ? $tanggal : ''; ?>" id="tglselesai" name="tglselesai" class="form-control form-control-sm" />
                        </div>
                        <div class="form-group col-md-2">
                        <label for="action">Aksi</label>
                          <div></div>  
                          <button type="submit" id="carilaporan" class="btn btn-primary btn-sm"><span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span> Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="loadinglaporan" style="display: none;">Loading...</div>
        <div id="listlaporan"></div>
    </div>
</div>