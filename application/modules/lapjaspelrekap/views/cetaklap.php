<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

</head>
<body>

<?php
if (isset($error)) {
    echo $error;
} else {
    $totpen = 0;
?>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
            padding: 3px;
        }

        th {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        h6 {
            margin-bottom: 3px;
            margin-left: 5px;
        }
    </style>
    <table style="width: 100%; border: 0;">
        <tr>
            <td style="text-align: center; padding: 0; margin: 0; width: 60px; border: 0;"><img src="<?= base_url(); ?>assets/img/logo-pbg.png" width="60" height="60" /></td>
            <td colspan="3" style="text-align: center; padding-left: -60px; border: 0;">
                <b>PEMERINTAH KABUPATEN PURBALINGGA</b><br />
                <b>DINAS KESEHATAN</b><br />
                <b>UPTD RSUD PANTI NUGROHO</b><br />
                Jl. Soekarno-Hatta Km. 02 Telp. (0281) 891434, IGD (0281) 8901558<br />
                <!-- FAX (0281) 894064 PURBALINGGA 53371<br />
            Email: rsudpantinugroho@purbalinggakab.go.id<br />
            Website: rspantinugroho.purbalinggakab.go.id<br /> -->
            </td>
        </tr>
    </table>

    <table style="width: 100%; border: 0;">
        <tr>
            <td style="border: 0;">
                <hr />
            </td>
        </tr>
    </table>
    <p>
    <h3 style="text-align: center; padding: 0; margin: 0;">LAPORAN STATUS PULANG</h3>
    <!-- <h6>Periode :<?= $tglmulai; ?> S.D <?= $tglselesai; ?></h6> -->
    <table class="table table-sm table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl. Pulang</th>
                <th>No. RM</th>
                <th>Nama PAsien</th>
                <th>Penjamin</th>
                <th>Alamat</th>
                <th>Rawat</th>
                <th>Sts. Pulang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nt = 1;
            foreach ($laporan as $t) {
            ?>
                <tr>
                    <td><?= $nt; ?></td>
                    <td><?= $t['TanggalPulang'] ?></td>
                    <td><?= $t['Nopasien'] ?></td>
                    <td><?= $t['NamaPasien'] ?></td>
                    <td><?= $t['Nama'] ?></td>
                    <td><?= $t['AlamatPasien'] ?> <?= $t['RT'] ?>/<?= $t['RW'] ?></td>
                    <td><?= $t['NamaBagian'] ?></td>
                    <td><?= $t['NamaStatusPulang'] ?></td>
                </tr>
            <?php
                $nt++;
            }
            ?>
        </tbody>
    </table>
    </p>

<?php } ?>

<script>
  window.print();
</script>
                    
</body>
</html>