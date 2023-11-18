
    var checkboxesNamaArray = [];
    var checkboxesHargaArray = [];
    var checkboxesIDArray = [];
    var checkboxes = document.querySelectorAll('.cb_table_tagihan');
    var object_tagihan = Array();
    var total_harga_tagihan = 0;


    $(document).ready(function() {
        datatable = $('#table_pembayaran_tagihan').DataTable({
            paging: false,
            searching: false,
            ordering: false,
            columns: [
                {data: "id_tagihan"},
                {data: "nama_tagihan"},
                {data: "harga_tagihan"}
            ]

        });
    });

    $('#txt_uang').keydown(function() {
        let value = document.getElementById('txt_uang').value;
        if(value.length > 3) value = reverseFormatNumber(value);
        document.getElementById('txt_uang').value = currencyFormat(value);
        setKembalianTagihan();
    });

    $('#txt_uang').keyup(function() {
        let value = document.getElementById('txt_uang').value;
        if(value.length > 3) value = reverseFormatNumber(value);
        document.getElementById('txt_uang').value = currencyFormat(value);
        setKembalianTagihan();
    });

    for(var checkbox of checkboxes){
        checkbox.addEventListener('click', function(){
            checkboxesNamaArray = [];
            checkboxesHargaArray = [];
            checkboxesIDArray = [];

            fetchcheckboxValue();

            if(object_tagihan.length > 0){
                datatable.clear();
                datatable.rows.add(object_tagihan).draw();
                total_harga_tagihan = 0;
                for (let i = 0; i < object_tagihan.length; i++) {
                    total_harga_tagihan = total_harga_tagihan + parseInt(reverseFormatNumber(object_tagihan[i].harga_tagihan));
                }
                setTotalTagihan(total_harga_tagihan);            
            }else{
                datatable.clear();
                datatable.rows.add(
                    [
                        {
                            id_tagihan : "NA",
                            nama_tagihan : "NA",
                            harga_tagihan : "NA"
                        }
                    ]
                ).draw();     
                setTotalTagihan(0);           
            }

            setKembalianTagihan();
        });
    }

    function fetchcheckboxValue(){
        object_tagihan = new Array();
        for(var checkbox of checkboxes){
            if(checkbox.checked == true){
                checkboxesIDArray.push(checkbox.getAttribute('cb_id_tagihan'));
                checkboxesNamaArray.push(checkbox.getAttribute('cb_nama_tagihan'));
                checkboxesHargaArray.push(checkbox.getAttribute('cb_harga_tagihan'));
            }
        }
        for (let i = 0; i < checkboxesNamaArray.length; i++) {
            object_tagihan.push({
                'id_tagihan' : checkboxesIDArray[i],
                'nama_tagihan' : checkboxesNamaArray[i],
                'harga_tagihan' : currencyFormat(checkboxesHargaArray[i])
            });
        }
    }

    function setTotalTagihan(total){
        total = currencyFormat(total);
        document.getElementById('detail_total_harga').value = total;
    }

    function setKembalianTagihan(){
        total = document.getElementById('detail_total_harga').value;
        uang = document.getElementById('txt_uang').value;

        if (total.length > 3) total = reverseFormatNumber(total);
        if (uang.length > 3) uang = reverseFormatNumber(uang);
        
        hasil_kembalian = uang - total;
        if(hasil_kembalian > 0){
            document.getElementById('detail_kembalian').value = currencyFormat(hasil_kembalian);
        }else{
            document.getElementById('detail_kembalian').value = 0;
        }
    }

    function post_data(){
        total = document.getElementById('detail_total_harga').value;
        uang = document.getElementById('txt_uang').value;

        if (total.length > 3) total = reverseFormatNumber(total);
        if (uang.length > 3) uang = reverseFormatNumber(uang);

        if(uang - total >= 0){
            var tableData = [];

            $('#table_pembayaran_tagihan tbody tr').each(function() {
                var rowData = [];
                $(this).find('td').each(function() {
                    rowData.push($(this).text());
                });
                tableData.push(rowData);
            });

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var nisn = document.getElementById('txt_nisn').value;

            $.ajax({
                url: "/menu-pembayaran/bayar",
                method: 'POST',
                data: {
                    _token: csrfToken,
                    nisn: nisn,
                    tableData: tableData
                },
                success: function (response) {
                    window.location.href = '/menu-pembayaran/detail/' + nisn;
                },
                error: function(xhr, status, error) {
                    // Handle the error
                }
            });
        }else{
            console.log('kureng');
        }
    }

