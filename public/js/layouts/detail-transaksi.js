
    var checkboxesNamaArray = [];
    var checkboxesHargaArray = [];
    var checkboxes = document.querySelectorAll('.cb_table_tagihan');
    var object_tagihan = Array();
    var total_harga_tagihan = 0;


    $(document).ready(function() {
        datatable = $('#table_pembayaran_tagihan').DataTable({
            paging: false,
            searching: false,
            ordering: false,
            columns: [
                {data: "nama_tagihan"},
                {data: "harga_tagihan"}
            ]

        });

            console.log(reverseFormatNumber('2,500'));
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
                            nama_tagihan : "NA",
                            harga_tagihan : "NA"
                        }
                    ]
                ).draw();     
                setTotalTagihan(0);           
            }
        });
    }

    function fetchcheckboxValue(){
        object_tagihan = new Array();
        for(var checkbox of checkboxes){
            if(checkbox.checked == true){
                checkboxesNamaArray.push(checkbox.getAttribute('cb_nama_tagihan'));
                checkboxesHargaArray.push(checkbox.getAttribute('cb_harga_tagihan'));
            }
        }
        for (let i = 0; i < checkboxesNamaArray.length; i++) {
            object_tagihan.push({
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

