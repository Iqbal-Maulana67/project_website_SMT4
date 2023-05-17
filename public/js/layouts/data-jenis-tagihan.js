$(document).ready(function (){
    $('#table_jenis_tagihan').dataTable();

    $('#editDataModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('buttonModal');
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-jenis-tagihan');
        var id_tagihan = form.find('#id_tagihan');
        var nama_jenis_tagihan = form.find('#nama_tagihan');
        var jangka_waktu_tagihan = form.find('#jangka_waktu');
        id_tagihan.val(buttonModal.getAttribute('id-tagihan'));
        nama_jenis_tagihan.val(buttonModal.getAttribute('nama-jenis-tagihan'));
        jangka_waktu_tagihan.val(buttonModal.getAttribute('jangka-waktu-tagihan'));
    });
});