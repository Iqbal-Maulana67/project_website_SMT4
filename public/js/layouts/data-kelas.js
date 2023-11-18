$(document).ready(function(){
    $('.btn-modal-kelas').on('click', function(){
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-kelas');
        var id_kelas_input = form.find('#id_kelas');
        var nama_kelas_input = form.find('#nama_kelas');
        id_kelas_input.val($(this).data('id-kelas'));
        nama_kelas_input.val($(this).data('nama-kelas'));

        var newRoute = '/data-kelas/edit/' + $(this).data('id-kelas');

        form.attr('action', newRoute);
        $('#editDataModal').modal('show');
    });

    $('.btn-delete-kelas').on('click', function(){
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-kelas-delete');
        var id_kelas = form.find('#id_kelas');
        id_kelas.val($(this).data('id-kelas'));

        var newRoute = '/data-kelas/delete/' + $(this).data('id-kelas');

        form.attr('action', newRoute);
        $('#deleteDataModal').modal('show');
    })

});