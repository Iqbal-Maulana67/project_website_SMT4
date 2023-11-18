@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pembayaran</h1>
    </div>
    <div class="row mb-3">
        <div class="card shadow col-xl-7 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Informasi Siswa</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-borderless">
                    <tbody>
                        <tr class="d-flex">
                            <td class="col-4">NISN Siswa</td>
                            <td>:</td>
                            <td class="col-auto">{{ $siswa->nisn }}</td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-4">NIS Siswa</td>
                            <td>:</td>
                            <td class="col-auto">{{ $siswa->nis }}</td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-4">Nama Siswa</td>
                            <td>:</td>
                            <td class="col-auto">{{ $siswa->nama }}</td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-4">Alamat Siswa</td>
                            <td>:</td>
                            <td class="col-auto">{{ $siswa->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow col-xl-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">History Pembayaran</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-history-pembayaran table-hover">
                    <thead>
                        <tr>
                            <th>Tagihan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->data_pembayaran as $item)
                            <tr>
                              <td>{{ $item->data_tagihan->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->data_tagihan->bulan . ' ' . $item->data_tagihan->tahun }}</td>
                              <td>{{ $item->tanggal_pembayaran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card shadow col-xl-7 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">List Tagihan Siswa</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Tagihan</th>
                            <th>Harga Tagihan</th>
                            <th>Status Tagihan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->data_tagihan as $item)
                        @if ($item->status_tagihan == "BELUM BAYAR")
                            <tr>
                                <td>{{ $item->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->bulan . ' ' . $item->tahun}}</td>
                                <td>{{ $item->harga_tagihan }}</td>
                                <td>{{ $item->status_tagihan }}</td>
                                <td><input type="checkbox" name="" id="cb_table_tagihan" class="cb_table_tagihan" cb_nama_tagihan="{{ $item->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->bulan . ' ' . $item->tahun}}" cb_harga_tagihan="{{ $item->harga_tagihan }}" cb_id_tagihan="{{ $item->id_tagihan }}"></td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow col-xl-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">List Tagihan Siswa</h6>
            </div>
            <div class="card-body p-3">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <table class="table table-bordered mb-5" id="table_pembayaran_tagihan" width="100%" cellspacing="0">
                    <thead>
                        <input type="hidden" id="txt_nisn" value="{{ $siswa->nisn }}">
                        <tr>
                            <th>ID Tagihan</th>
                            <th>Nama</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="row">
                    <div class="form-group col-xl-12">
                        <label for="recipient-name" class="col-form-label">Total</label>
                        <input type="text" class="form-control" id="detail_total_harga" name="txt_total_harga" value="0" readonly>
                    </div>
                    <div class="form-group col-xl-12">
                        <label for="recipient-name" class="col-form-label">Masukkan Uang</label>
                        <input type="text" class="form-control" id="txt_uang" name="txt_uang" value="0" >
                    </div>
                    <div class="form-group col-xl-12">
                        <label for="recipient-name" class="col-form-label">Kembalian</label>
                        <input type="text" class="form-control" id="detail_kembalian" name="txt_kembalian" value="0" readonly>
                    </div>
                    <div class="col-xl-12">
                        <button class="btn btn-success col-xl-12" onclick="post_data()">BAYAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-section')
    <script src="{{ asset('js/layouts/detail-transaksi.js') }}"></script>
@endsection

