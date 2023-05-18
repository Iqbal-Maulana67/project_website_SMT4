$(document).ready(function (){
    $('#table_tagihan').dataTable();

    $('#editDataModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('buttonModal');
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-tagihan');
        var id_tagihan = form.find('#id_tagihan');
        var harga_tagihan = form.find('#harga_tagihan');
        id_tagihan.val(buttonModal.getAttribute('id-tagihan'));
        harga_tagihan.val(buttonModal.getAttribute('harga-tagihan'));
    });

    $('#deleteDataModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('deleteButtonModal');
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-tagihan-delete');
        var id_tagihan = form.find('#id_tagihan');
        id_tagihan.val(buttonModal.getAttribute('id-tagihan'));
    })
});