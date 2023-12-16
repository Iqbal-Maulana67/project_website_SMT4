$(document).ready(function (){
    var table = $('#table_tagihan').DataTable({
        serverSide: false
    });

    var table_export = $('#table_export_tagihan').DataTable({
        serverSide: false,
        searching: false,
        lengthMenu: [5, 10, 20]
    });

    function addCommas(value) {
        // Format nilai dengan menambahkan koma setiap 3 digit
        return value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

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
    });

    $('div.filter-dropdown button').on('click', function(e) {
        $('div.filter-dropdown-menu').toggleClass('show');
    });

    $('body').on('click', function (e) {
        if (!$('div.filter-dropdown').is(e.target) 
            && $('div.filter-dropdown').has(e.target).length === 0 
            && $('.show').has(e.target).length === 0
        ) {
            $('div.filter-dropdown-menu').removeClass('show');
        }
    });

    $('#filter_status_tagihan').on('change', function(e){
        if(this.value != "")
        {
            table.column(5).search(this.value).draw();
        }
        else
        {
            table.column(5).search('').draw();
        }
    });

    $('#filter_waktu_tagihan').on('change', function(e){
        if(this.value != "")
        {
            table.column(4).search(this.value).draw();
        }
        else
        {
            table.column(4).search('').draw();
        }
    });

    $('#harga_tagihan').on('input', function(e){
        // Ambil nilai dari input
        let inputValue = $(this).val();

        // Bersihkan nilai dari karakter non-digit
        let cleanedValue = inputValue.replace(/\D/g, '');

        // Format nilai sesuai kebutuhan (misalnya, tambahkan koma setiap 3 digit)
        let formattedValue = addCommas(cleanedValue);

        // Terapkan nilai yang sudah diformat ke input
        $(this).val(formattedValue);
    });

    
});