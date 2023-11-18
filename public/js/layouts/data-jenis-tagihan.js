$(document).ready(function (){
    $('#table_jenis_tagihan').dataTable();

    $('.btn-modal-jenis-tagihan').on('click', function(){
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-jenis-tagihan');
        var id_jenis_tagihan_input = form.find('#id_jenis_tagihan');
        var nama_jenis_tagihan_input = form.find('#nama_tagihan');
        var jangka_waktu_tagihan_input = form.find('#jangka_waktu');
        id_jenis_tagihan_input.val($(this).data('id-jenis-tagihan'));
        nama_jenis_tagihan_input.val($(this).data('nama-jenis-tagihan'));
        jangka_waktu_tagihan_input.val($(this).data('jangka-waktu-tagihan'));

        var newRoute = '/data-jenis-tagihan/edit/' + $(this).data('id-jenis-tagihan');

        form.attr('action', newRoute);
        $('#editDataModal').modal('show');
    });

    $('.btn-delete-jenis-tagihan').on('click', function(){
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-jenis-tagihan-delete');
        var id_jenis_tagihan = form.find('#id-jenis-tagihan');
        id_jenis_tagihan.val($(this).data('id-jenis-tagihan'));

        var newRoute = '/data-jenis-tagihan/delete/' + $(this).data('id-jenis-tagihan');

        form.attr('action', newRoute);
        $('#deleteDataModal').modal('show');
    })
});