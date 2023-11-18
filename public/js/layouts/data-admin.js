$(document).ready(function (){
    $('#table_jenis_tagihan').dataTable();

    $('.btn-modal-admin').on('click', function(){
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-admin');
        var username_input = form.find('#username');
        var nama_admin_input = form.find('#nama_admin');
        var password_input = form.find('#password');
        username_input.val($(this).data('username'));
        nama_admin_input.val($(this).data('nama-admin'));
        password_input.val($(this).data('password'));

       
        var newRoute = '/data-admin/edit/' + $(this).data('username');

        form.attr('action', newRoute);
        $('#editDataModal').modal('show');

        
    });

    $('.btn-delete-admin').on('click', function(){
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-admin-delete');
        var username = form.find('#username');
        username.val($(this).data('username'));

        var newRoute = '/data-admin/delete/' + $(this).data('username');

        form.attr('action', newRoute);
        $('#deleteDataModal').modal('show');
    })
});