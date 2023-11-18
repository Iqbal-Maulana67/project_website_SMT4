$(document).ready(function() {
    $('#table_siswa').DataTable();

    $('.btn-delete-modal').on('click', function(){
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-siswa-delete');
        var id_siswa = form.find('#id_siswa');
        id_siswa.val($(this).data('nisn'))

        var newRoute = '/data-siswa/hapus/' + $(this).data('nisn');

        form.attr('action', newRoute);

        modal.modal('show');
    })
});