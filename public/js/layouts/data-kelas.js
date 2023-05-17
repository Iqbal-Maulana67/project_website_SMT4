$(document).ready(function(){
    $('#editDataModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('buttonModal');
        var modal = $('#editDataModal');
        var form = modal.find('#modal-form-kelas');
        var id_kelas = form.find('#id_kelas');
        var nama_kelas = form.find('#nama_kelas');
        id_kelas.val(buttonModal.getAttribute('id-kelas'));
        nama_kelas.val(buttonModal.getAttribute('nama-kelas'));
    });
});