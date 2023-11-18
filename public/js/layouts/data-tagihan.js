$(document).ready(function (){
    $('#table_tagihan').dataTable();

    $('.btn-edit-modal').on('click', function(){
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-tagihan');
        var id_tagihan = form.find('#id_tagihan');
        var harga_tagihan = form.find('#harga_tagihan');
        id_tagihan.val($(this).data('id-tagihan'));
        harga_tagihan.val($(this).data('harga-tagihan'));

        var newRoute = '/data-tagihan/ubah/' + $(this).data('id-tagihan');

        form.attr('action', newRoute);
        modal.modal('show');
    });

    $('.btn-delete-modal').on('click', function(){
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-tagihan-delete');
        var id_tagihan = form.find('#id_tagihan');
        id_tagihan.val($(this).data('id-tagihan'));

        var newRoute = '/data-tagihan/hapus/' + $(this).data('id-tagihan');

        form.attr('action', newRoute);
        modal.modal('show');
    })
});