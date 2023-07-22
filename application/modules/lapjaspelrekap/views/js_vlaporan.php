<script>
    $('#tglmulai').datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $('#tglselesai').datepicker({
        dateFormat: 'dd-mm-yy'
    });

    $('#carilaporan').click(function(e) {
        e.preventDefault();
        var penjamin = $('#penjamin option:selected').val();
        var dokter = $('#dokter option:selected').val();
        var tglmulai = $('#tglmulai').val();
        var tglselesai = $('#tglselesai').val();
        $('#loadinglaporan').show();

        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>lapjaspelrekap/Cari",
            data: {
                tglmulai: tglmulai,
                tglselesai: tglselesai,
                penjamin: penjamin,
                dokter: dokter


            },
            success: function(data) {
                $("#listlaporan").html(data);
            },
            complete: function() {
                $('#loadinglaporan').hide();
            },
            error: function(err) {
                alert(err);
            }
        });
    });

    // function cetaklaporan() {
    //     //e.preventDefault();
    //     var bagian = $('#bagian option:selected').val();
    //     var tglmulai = $('#tglmulai').val();
    //     var tglselesai = $('#tglselesai').val();

    //     $('#loading-cetak-laporan').show();
    //     $.ajax({
    //         type: "GET",
    //         url: "<?= base_url(); ?>cetak/Lapjaspel",
    //         data: {
    //             tglmulai: tglmulai,
    //             tglselesai: tglselesai,
    //             bagian: bagian,
    //         },
    //         success: function(data) {
    //             $('#cetak-laporan').attr('src', '<?= base_url(); ?>cetak/Lapjaspel?tglmulai=' + tglmulai + '&tglselesai=' + tglselesai + '&bagian=' + bagian);
    //         },
    //         complete: function() {
    //             $('#loading-cetak-laporan').hide();
    //         },
    //         error: function(err) {
    //             alert(err);
    //         }
    //     });
    // }

    function cetaklaporan() {
        //e.preventDefault();
        var bagian = $('#bagian option:selected').val();
        var dokter = $('#dokter option:selected').val();

        var tglmulai = $('#tglmulai').val();
        var tglselesai = $('#tglselesai').val();

        $('#loading-cetak-laporan').show();
        $.ajax({
            type: "GET",
            url: "<?= base_url(); ?>cetak/Lapjaspel",
            data: {
                tglmulai: tglmulai,
                tglselesai: tglselesai,
                bagian: bagian,
                dokter: dokter

            },
            success: function(data) {
                $('#cetak-laporan').attr('src', '<?= base_url(); ?>cetak/Lapjaspel?tglmulai=' + tglmulai + '&tglselesai=' + tglselesai + '&dokter=' + dokter + '&bagian=' + bagian);
            },
            complete: function() {
                $('#loading-cetak-laporan').hide();
            },
            error: function(err) {
                alert(err);
            }
        });
    }

    function Export() {
        //e.preventDefault();
        var bagian = $('#bagian option:selected').val();
        var dokter = $('#dokter option:selected').val();
        var tglmulai = $('#tglmulai').val();
        var tglselesai = $('#tglselesai').val();

        $('#loading-cetak-laporan').show();
        $.ajax({
            type: "GET",
            url: "<?= base_url(); ?>excel/Lapjaspel",
            data: {
                tglmulai: tglmulai,
                tglselesai: tglselesai,
                bagian: bagian,
                dokter: dokter

            },
            success: function(data) {
                $('#cetak-laporan').attr('src', '<?= base_url(); ?>excel/Lapjaspel?tglmulai=' + tglmulai + '&tglselesai=' + tglselesai + '&dokter=' + dokter + '&bagian=' + bagian);
            },
            complete: function() {
                $('#loading-cetak-laporan').hide();
            },
            error: function(err) {
                alert(err);
            }
        });
    }

    function searchTableMonitoring() {
    var input;
    var saring;
    var status;
    var tbody;
    var tr;
    var td;
    var i;
    var j;
    input = document.getElementById("input");
    saring = input.value.toUpperCase();
    tbody = document.getElementsByTagName("tbody")[0];;
    tr = tbody.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                status = true;
            }
        }
        if (status) {
            tr[i].style.display = "";
            status = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}

function cetakIframe() {
    window.frames["cetak-laporan"].focus();
    window.frames["cetak-laporan"].print();
}
</script>