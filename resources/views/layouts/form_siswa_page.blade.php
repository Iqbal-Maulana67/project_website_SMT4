@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($siswa) ? 'Ubah' : 'Tambah' }} Siswa</h1>
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
                        <form action="{{ isset($siswa) ? route('data-siswa.update', $siswa->nisn) : route('data-siswa.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {!! isset($siswa) ? method_field('PUT') : '' !!}
                            
                            <div class="form-group">
                                <label for="nisn" class="col-form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ isset($siswa) ? $siswa->nama : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-form-label col-xl-12">Jenis Kelamin</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin"  value="laki-laki" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->jenis_kelamin == 'laki-laki' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Laki-laki</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin"  value="perempuan" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->jenis_kelamin == 'perempuan' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Perempuan </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ isset($siswa) ? $siswa->alamat : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-form-label">Nomer HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ isset($siswa) ? $siswa->no_hp : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-form-label">Nomer VA</label>
                                <input type="text" name="no_va" id="no_va" class="form-control" value="{{ isset($siswa) ? $siswa->no_va : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-form-label">Password</label>
                                <input type="text" name="password" id="password" class="form-control" value="" {{ isset($siswa) ? '' : 'required' }}>
                            </div>
                            <div class="btn btn-warning float-right" id="next-page-button">Halaman Selanjutnya <i class="fa fa-arrow-right"></i></div>
                    </div> 
                    {{-- Data Sekolah Form --}}
                    <div class="col-xl-12 p-2 m-2 rounded border" id="data-sekolah-form">
                            <div class="form-group">
                                <label for="nisn" class="col-form-label">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control" value="{{ isset($siswa) ? $siswa->nisn : '' }}" {{ isset($siswa) ? 'readonly' : '' }} required>
                            </div>
                            <div class="form-group">
                                <label for="nis" class="col-form-label">NIS</label>
                                <input type="text" name="nis" id="n is" class="form-control" value="{{ isset($siswa) ? $siswa->nis : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Kelas</label>
                                <select class="custom-select" id="id_kelas" name="id_kelas" required>
                                    <option selected value="">Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id_kelas }}" {{ isset($siswa) ? $siswa->id_kelas == $item->id_kelas ? 'selected' : '' : '' }}>{{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun_angkatan" class="col-form-label">Tahun Angkatan</label>
                                <input type="text" name="tahun_angkatan" id="tahun_angkatan" class="form-control" value="{{ isset($siswa) ? $siswa->tahun_angkatan : '' }}" required>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="Status Siswa" class="col-form-label col-xl-12">Status Siswa</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_siswa"  value="aktif" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->status_siswa == 'aktif' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Aktif</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_siswa"  value="tidak_aktif" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->status_siswa == 'tidak_aktif' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Tidak Aktif </label>
                                </div>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="status_alumni" class="col-form-label col-xl-12">Status Alumni Siswa</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_alumni"  value="alumni" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->status_alumni == 'alumni' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Alumni</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_alumni"  value="baru" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->status_alumni == 'baru' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Baru </label>
                                </div>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="Status Siswa" class="col-form-label col-xl-12">Status Pondok</label>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_pondok"  value="pondok" id="radio-jenis-kelamin" {{ isset($siswa) ? $siswa->status_pondok == 'pondok' ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Pondok</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" class="form-check-input" name="status_pondok"  value="normal" id="radio-jenis-kelamin"  {{ isset($siswa) ? $siswa->status_pondok == "normal" ? 'checked' : '' : '' }} required>
                                    <label for="radio-jenis-kelamin" class="form-check-label"> Tidak Pondok </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-form-label">Gambar Siswa  </label>
                                <input type="file" name="gambar_siswa" id="gambar_siswa" class="form-control">
                            </div>
                            <div class="row mt-4 mb-2">
                                <div class="col-xl-6">
                                    <div class="btn btn-warning float-left" id="previous-page-button"><i class="fa fa-arrow-left"></i> Halaman Sebelumnya</div>
                                </div>

                                <div class="col-xl-6">
                                    <button class="btn btn-success float-right" type="submit">Simpan <i class="fa fa-save "></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js-section')
<script src="{{ asset('js/layouts/data-siswa-form.js') }}"></script>
@endsection
