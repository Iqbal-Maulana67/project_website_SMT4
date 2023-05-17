$(document).ready(function (){
    $('#table_jenis_tagihan').dataTable();

    $('#editDataModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('buttonModal');
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-admin');
        var username = form.find('#username');
        var nama_admin = form.find('#nama_admin');
        var password = form.find('#password');
        username.val(buttonModal.getAttribute('username'));
        nama_admin.val(buttonModal.getAttribute('nama-admin'));
        password.val(buttonModal.getAttribute('password'));
    });
});