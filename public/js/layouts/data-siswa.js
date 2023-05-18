$(document).ready(function() {
    $('#table_siswa').DataTable();

    $('#deleteDataModal').on('show.bs.modal', function(){
        var buttonModal = document.getElementById('deleteButtonModal');
        var modal = $('#deleteDataModal');
        var form = modal.find('#modal-form-siswa-delete');
        var id_siswa = form.find('#id_siswa');
        id_siswa.val(buttonModal.getAttribute('id-siswa'))

    })
});