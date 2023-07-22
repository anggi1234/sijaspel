<?php
if (isset($error)) {
    echo $error;
} else {
?>
<!-- <?php
            if (isset($laporan) && $laporan) {
            ?> -->
<p>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">REKAP LAPORAN JASA PELAYANAN MEDIS </h6>

</div>


<div class="float-right">
    <div class="input-group">
        <input type="text" id='input' onkeyup='searchTableMonitoring()' class="form-control bg-light border-2 small "
            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    </div>
</div>
<table class="table table-sm table-hover table-bordered">
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#laporan"
        onclick="cetaklaporan()">
        Cetak
    </button><span>
        <button type="button" class="btn btn-info btn-sm" onclick="Export()">
            Export
        </button></span>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penjamin</th>
            <th style="text-align: right">Jml Tindakan</th>
            <th style="text-align: right">Jasa Medis</th>

        </tr>
    </thead>
    <tbody>
        <?php
                $nt = 1;
                $sumJML = 0;
                $sumJM = 0;

                foreach ($laporan as $t) {
            ?>
        <tr>
            <td><?= $nt; ?></td>
            <td><?= $t['Nama'] ?></td>
            <td>
                <div class="float-right"><b><?= number_format($t['jmlpmr'], 0, '', '.'); ?></b></div>

            </td>
            <td>
                <div class="float-right"><b><?= number_format($t['jmljaspel'], 0, '', '.'); ?></b></div>
            </td>
        </tr>
        <?php
                    $nt++;
                    $sumJML += $t['jmlpmr'];
                    $sumJM += $t['jmljaspel'];
                }
            ?>
        <tr>
            <td colspan="2"><b>Total</b></td>
            <td>
                <div class="float-right"><b><?= number_format($sumJML, 0, '', '.'); ?></b></div>
            </td>
            <td>
                <div class="float-right"><b><?= number_format($sumJM, 0, '', '.'); ?></b></div>
            </td>
        </tr>
    </tbody>
</table>
</p>
<!-- <?php } ?> -->



<!-- Modal Cetak -->
<div class="modal fade" id="laporan" tabindex="-1" aria-labelledby="slipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="printSection">
                <div id="loading-cetak-laporan">Loading...</div>
                <iframe id="cetak-laporan" frameborder="0" style="width: 100%; height: 100vh;"></iframe>
            </div>
        </div>
    </div>
</div>

<?php } ?>