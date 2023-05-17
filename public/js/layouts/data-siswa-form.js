$(document).ready(function(){

    document.getElementById('data-sekolah-form').className = "d-none"
    document.getElementById('data-pribadi-toggle').className = "col-auto p-2 data-siswa-toggle-active"
    
        $('#data-pribadi-toggle').on("click", function (){
            document.getElementById('data-diri-form').className = "col-xl-12 p-2 m-2 rounded border"
            document.getElementById('data-sekolah-form').className = "d-none"
            document.getElementById('data-pribadi-toggle').className = "col-auto p-2 data-siswa-toggle-active"
            document.getElementById('data-sekolah-toggle').className = "col-auto p-2 data-siswa-toggle"
        });

        $('#data-sekolah-toggle').on("click", function (){
            document.getElementById('data-diri-form').className = "d-none"
            document.getElementById('data-sekolah-form').className = "col-xl-12 p-2 m-2 rounded border"
            document.getElementById('data-pribadi-toggle').className = "col-auto p-2 data-siswa-toggle"
            document.getElementById('data-sekolah-toggle').className = "col-auto p-2 data-siswa-toggle-active"
        });
});
