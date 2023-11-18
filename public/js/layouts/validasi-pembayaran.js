$(document).ready(function(){
    $('.btn-view-modal').on('click', function(){
        var modal = $('#viewModal');
        var form = modal.find('#modal-form-validasi');
        var nisn_input = form.find('#nisn');
        var siswa_input = form.find('#nama_siswa');
        var id_tagihan_input = form.find('#id_tagihan');
        var nama_tagihan_input = form.find('#nama_tagihan');
        var harga_tagihan_input = form.find('#harga_tagihan');

        nisn_input.val($(this).data('nisn'));
        siswa_input.val($(this).data('nama-siswa'));
        id_tagihan_input.val($(this).data('id-tagihan'));
        nama_tagihan_input.val($(this).data('nama-tagihan'));
        harga_tagihan_input.val($(this).data('harga-tagihan'));
        gambar_pembayaran.src = 'img/img_validasi/' + $(this).data('gambar-pembayaran');
    });

    $('#btn-valid-pembayaran').on('click', function(){
        var modal = $('#viewModal');
        var form = modal.find('#modal-form-validasi');

        var newRoute = '/validasi-pembayaran/valid/';

        form.attr('action', newRoute);
    });

    $('#btn-tolak-pembayaran').on('click', function(){
        var modal = $('#viewModal');
        var form = modal.find('#modal-form-validasi');

        var newRoute = '/validasi-pembayaran/denied/';

        form.attr('action', newRoute);
    });
});