@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Siswa</h1>
    </div>

    <div class="row">
        <div class="card shadow col-xl-8 mr-2">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-auto p-2 data-siswa-toggle" id="data-pribadi-toggle">
                        <span>Data Pribadi</span>
                    </div>
                    <div class="col-auto p-2 data-siswa-toggle" id="data-sekolah-toggle">
                       <span>Data Sekolah</span>
                    </div>
                </div>
                <div class="row">
                    {{-- Data Diri Formulir --}}
                    <div class="col-xl-12 p-2 m-2 rounded border" id="data-diri-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nisn" class="col-form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-form-label col-xl-12">Jenis Kelamin</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin"  value="laki-laki" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Laki-laki</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin"  value="perempuan" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Perempuan </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat </label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-form-label">Nomer HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control">
                            </div>
                        </form>
                    </div> 
                    {{-- Data Sekolah Form --}}
                    <div class="col-xl-12 p-2 m-2 rounded border" id="data-sekolah-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nisn" class="col-form-label">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nis" class="col-form-label">NIS</label>
                                <input type="text" name="nis" id="nis" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Kelas</label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-form-label">Jurusan</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control">
                            </div>
                            <div class="form-group border-bottom">
                                <label for="Status Siswa" class="col-form-label col-xl-12">Status Siswa</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_siswa"  value="aktif" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Aktif</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_siswa"  value="tidak_aktif" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Tidak Aktif </label>
                                </div>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="status_alumni" class="col-form-label col-xl-12">Status Alumni Siswa</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_alumni"  value="aktif" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Aktif</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_alumni"  value="tidak_aktif" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Tidak Aktif </label>
                                </div>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="Status Siswa" class="col-form-label col-xl-12">Status Pondok</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_pondok"  value="pondok" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Pondok</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_pondok"  value="tidak_pondok" id="radio-jenis-kelamin">
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Tidak Pondok </label>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow col-xl-3" style="height: 500px" >
            <div class="card-body p-3">
                <div>
                    <span>Foto Siswa</span>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@section('js-section')
<script src="js/layouts/data-siswa-form.js"></script>
@endsection
