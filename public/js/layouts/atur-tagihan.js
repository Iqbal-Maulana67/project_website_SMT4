$('document').ready(function (){
    document.getElementById('siswa-form-page').className = "d-none"
    document.getElementById('status-siswa-form-page').className = "d-none"
    document.getElementById('tahun-angkatan-siswa-form-page').className = "d-none"
    
    $('#dasar_atur_tagihan').on('change', function(){
        if (this.value == "siswa") {
            document.getElementById('siswa-form-page').className = "col-xl-12 border rounded"
            document.getElementById('status-siswa-form-page').className = "d-none"
            document.getElementById('tahun-angkatan-siswa-form-page').className = "d-none"
        }else if(this.value == "status_siswa"){
            document.getElementById('siswa-form-page').className = "d-none"
            document.getElementById('status-siswa-form-page').className = "col-xl-12 border rounded"
            document.getElementById('tahun-angkatan-siswa-form-page').className = "d-none"
        }else if(this.value == "tahun_angkatan"){
            document.getElementById('siswa-form-page').className = "d-none"
            document.getElementById('status-siswa-form-page').className = "d-none"
            document.getElementById('tahun-angkatan-siswa-form-page').className = "col-xl-12 border rounded"
        }else {
            document.getElementById('siswa-form-page').className = "d-none"
            document.getElementById('status-siswa-form-page').className = "d-none"
            document.getElementById('tahun-angkatan-siswa-form-page').className = "d-none"
        }
    });

    document.getElementById('bulanan-siswa-form').className = "d-none";
    document.getElementById('bebas-siswa-form').className = "d-none";

    $('#jangka_waktu_siswa_form').on('change', function(){
        var selectedOption = this.options[this.selectedIndex];
        if(selectedOption.getAttribute('jangka_waktu') == "bulanan"){
            document.getElementById('bulanan-siswa-form').className = "";
            document.getElementById('bebas-siswa-form').className = "d-none";
        }else if(selectedOption.getAttribute('jangka_waktu') == "bebas"){
            document.getElementById('bulanan-siswa-form').className = "d-none";
            document.getElementById('bebas-siswa-form').className = "";
        }else{
            document.getElementById('bulanan-siswa-form').className = "d-none";
            document.getElementById('bebas-siswa-form').className = "d-none";
        }
    })

    $('#jangka_waktu_status_siswa_form').on('change', function(){
        var selectedOption = this.options[this.selectedIndex];
        if(selectedOption.getAttribute('jangka_waktu') == "bulanan"){
            document.getElementById('bulanan-status-siswa-form').className = "";
            document.getElementById('bebas-status-siswa-form').className = "d-none";
        }else if(selectedOption.getAttribute('jangka_waktu') == "bebas"){
            document.getElementById('bulanan-status-siswa-form').className = "d-none";
            document.getElementById('bebas-status-siswa-form').className = "";
        }else{
            document.getElementById('bulanan-status-siswa-form').className = "d-none";
            document.getElementById('bebas-status-siswa-form').className = "d-none";
        }
    })

    $('#jangka_waktu_tahun_angkatan_siswa_form').on('change', function(){
        var selectedOption = this.options[this.selectedIndex];
        if(selectedOption.getAttribute('jangka_waktu') == "bulanan"){
            document.getElementById('bulanan-tahun-angkatan-siswa-form').className = "";
            document.getElementById('bebas-tahun-angkatan-siswa-form').className = "d-none";
        }else if(selectedOption.getAttribute('jangka_waktu') == "bebas"){
            document.getElementById('bulanan-tahun-angkatan-siswa-form').className = "d-none";
            document.getElementById('bebas-tahun-angkatan-siswa-form').className = "";
        }else{
            document.getElementById('bulanan-tahun-angkatan-siswa-form').className = "d-none";
            document.getElementById('bebas-tahun-angkatan-siswa-form').className = "d-none";
        }
    })

});