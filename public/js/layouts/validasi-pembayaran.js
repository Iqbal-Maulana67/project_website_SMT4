$(document).ready(function(){
    $('#viewModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('buttonModal');
        var modal = $('#viewModal');
        var form = modal.find('#modal-form-validasi');
        var nisn_input = form.find('#nisn');
        var siswa_input = form.find('#nama_siswa');
        var id_tagihan_input = form.find('#id_tagihan');
        var nama_tagihan_input = form.find('#nama_tagihan');
        var harga_tagihan_input = form.find('#harga_tagihan');

        nisn_input.val(buttonModal.getAttribute('nisn-value'));
        siswa_input.val(buttonModal.getAttribute('nama-siswa'));
        id_tagihan_input.val(buttonModal.getAttribute('id-tagihan'));
        nama_tagihan_input.val(buttonModal.getAttribute('nama-tagihan'));
        harga_tagihan_input.val(buttonModal.getAttribute('harga-tagihan'));
        gambar_pembayaran.src = 'img/validasi_image/' + buttonModal.getAttribute('gambar_pembayaran');

    });
});