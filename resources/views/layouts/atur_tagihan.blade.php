@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Atur Tagihan</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Menu</h6>
            </div>
            <div class="card-body p-3 row">
                <div class="col-xl-12">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Atur Berdasarkan :</label>
                        <select class="custom-select" id="dasar_atur_tagihan" name="dasar_atur_tagihan" required>
                            <option selected value="">Pilihan</option>
                            <option value="siswa">Siswa</option>
                            <option value="status_siswa">Status Siswa</option>
                            <option value="tahun_angkatan">Tahun Angkatan Siswa</option>
                        </select>
                    </div>
                </div>
                {{-- Per Siswa Form --}}
                <div class="col-xl-12 border rounded d-none" id="siswa-form-page">
                    <form action="{{ route('data-tagihan.store_siswa') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Masukkan NISN Siswa</label>
                            <input type="text" name="nisn" id="nisn" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pilih Tagihan</label>
                            <select class="custom-select" id="jangka_waktu_siswa_form" name="jangka_waktu" required>
                                <option selected value="">Tagihan</option>

                                @foreach ($jenis_tagihan as $item)
                                <option value="{{ $item->id_jenis_tagihan }}" jangka_waktu="{{ $item->jangka_waktu }}">{{ $item->nama_jenis_tagihan }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        {{-- Bulanan Formulir --}}
                        <div class="d-none" id="bulanan-siswa-form">
                            <div class="form-group row">
                                <label for="recipient-name" class="col-form-label col-xl-12">Pilih Bulan</label>
                                <div class="col-xl-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Januari" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Januari
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Februari" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Februari
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Maret" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Maret
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="April" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        April
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Mei" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Mei
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Juni" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Juni
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Juli" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Juli
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Agustus" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Agustus
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="September" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            September
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Oktober" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        Oktober
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="November" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            November
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Desember" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Desember
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Pilih Tahun</label>
                                <select class="custom-select" id="tahun_tagihan" name="tahun_tagihan">
                                    <option selected value="">Tahun</option>
                                    <?php
                                        $year = date('Y');
                                        for($i = 0; $i < 5; $i++){
                                            echo('<option value="' . $year - $i . '">' . $year - $i . '</option>');
                                        }
                                    ?>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                <input type="text" class="form-control" id="harga_tagihan" name="harga_tagihan_bulanan">
                            </div>
                        </div>

                        {{-- Bebas Formulir --}}
                        <div class="d-none" id="bebas-siswa-form">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                <input type="text" class="form-control" id="harga_tagihan" name="harga_tagihan_bebas">
                            </div>
                        </div>
                        <button class="btn btn-success mb-3 float-right" type="submit"><i class="fa fa-save"></i> Simpan</button>

                    </form>
                </div>

                {{-- Per Status Siswa Form --}}
                <div class="col-xl-12 border rounded d-none" id="status-siswa-form-page">
                    <form action="{{ route('data-tagihan.store_status') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pilih Status Pondok Siswa</label>
                            <select class="custom-select" id="status_pondok" name="status_pondok" required>
                                <option selected value="">Status Pondok Siswa</option>
                                <option value="pondok">Pondok</option>
                                <option value="normal" >Biasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pilih Tagihan</label>
                            <select class="custom-select" id="jangka_waktu_status_siswa_form" name="jangka_waktu" required>
                                <option selected value="">Tagihan</option>
                                @foreach ($jenis_tagihan as $item)
                                <option value="{{ $item->id_jenis_tagihan }}" jangka_waktu="{{ $item->jangka_waktu }}">{{ $item->nama_jenis_tagihan }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Bulanan Formulir --}}
                        <div class="d-none" id="bulanan-status-siswa-form">
                            <div class="form-group row">
                                <label for="recipient-name" class="col-form-label col-xl-12">Pilih Bulan</label>
                                <div class="col-xl-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Januari" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Januari
                                        </label>
                                    </div>  
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Februari" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Februari
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Maret" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Maret
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="April" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        April
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Mei" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Mei
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Juni" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Juni
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Juli" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Juli
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Agustus" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Agustus
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="September" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            September
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Oktober" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        Oktober
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="November" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            November
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Desember" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Desember
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Pilih Tahun</label>
                                <select class="custom-select" id="jangka_waktu" name="tahun_tagihan">
                                    <option selected value="">Tahun</option>
                                    <?php
                                        $year = date('Y');
                                        for($i = 0; $i < 5; $i++){
                                            echo('<option value="' . $year - $i . '">' . $year - $i . '</option>');
                                        }
                                    ?>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                <input type="text" class="form-control" id="harga_tagihan_bulanan" name="harga_tagihan_bulanan">
                            </div>
                        </div>

                        {{-- Bebas Formulir --}}
                        <div class="d-none" id="bebas-status-siswa-form">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                <input type="text" class="form-control" id="harga_tagihan_bebas" name="harga_tagihan_bebas">
                            </div>
                        </div>
                        <button class="btn btn-success mb-3 float-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                </div>

                {{-- Per Tahun Angkatan Siswa Form --}}
                <div class="col-xl-12 border rounded d-none" id="tahun-angkatan-siswa-form-page">
                    <form action="{{ route('data-tagihan.store_angkatan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pilih Tahun Angkatan Siswa</label>
                            <select class="custom-select" id="tahun_angkatan_siswa" name="tahun_angkatan" required>
                                <option selected value="">Tahun Angkatan Siswa</option>
                                @foreach ($tahun_angkatan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pilih Tagihan</label>
                            <select class="custom-select" id="jangka_waktu_tahun_angkatan_siswa_form" name="jangka_waktu" required>
                                <option selected value="">Tagihan</option>
                                @foreach ($jenis_tagihan as $item)
                                <option value="{{ $item->id_jenis_tagihan }}" jangka_waktu="{{ $item->jangka_waktu }}">{{ $item->nama_jenis_tagihan }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Bulanan Formulir --}}
                        <div class="d-none" id="bulanan-tahun-angkatan-siswa-form">
                            <div class="form-group row">
                                <label for="recipient-name" class="col-form-label col-xl-12">Pilih Bulan</label>
                                <div class="col-xl-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Januari" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Januari
                                        </label>
                                    </div>  
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Februari" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Februari
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Maret" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Maret
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="April" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        April
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Mei" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Mei
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Juni" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Juni
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Juli" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Juli
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Agustus" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Agustus
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="September" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            September
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Oktober" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        Oktober
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="November" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            November
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="Desember" name="bulan_tagihan[]" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Desember
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Pilih Tahun</label>
                                <select class="custom-select" id="jangka_waktu" name="tahun_tagihan">
                                    <option selected value="">Tahun</option>
                                    <?php
                                        $year = date('Y');
                                        for($i = 0; $i < 5; $i++){
                                            echo('<option value="' . $year - $i . '">' . $year - $i . '</option>');
                                        }
                                    ?>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                <input type="text" class="form-control" id="harga_tagihan" name="harga_tagihan_bulanan" >
                            </div>
                        </div>
                        {{-- Bebas Formulir --}}
                        <div class="d-none" id="bebas-tahun-angkatan-siswa-form">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                <input type="text" class="form-control" id="harga_tagihan" name="harga_tagihan_bebas">
                            </div>
                        </div>
                        <button class="btn btn-success mb-3 float-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                </div>
                
            </div>
        </div>
</div>
@endsection

@section('js-section')
<script src="{{ asset('js/layouts/atur-tagihan.js') }}"></script>
@endsection