@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Pembayaran</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail Laporan Pembayaran</h6>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_laporan_pembayaran" width="100%" cellspacing="0">
                        <thead>
                            <th>Nama Siswa</th>
                            <th>Nama Tagihan</th>
                            <th>Harga Tagihan</th>
                            <th>Admin Pengurus</th>
                            <th>Tanggal Pembayaran</th>
                        </thead>
                        <tbody>
                            @foreach ($laporanpembayaran as $laporan_pembayaran)
                                <tr>
                                    <td>{{$laporan_pembayaran->data_siswa->nama}}</td>
                                    <td>{{$laporan_pembayaran->data_tagihan->list_jenis_tagihan->nama_jenis_tagihan}}</td>
                                    <td>{{$laporan_pembayaran->data_tagihan->harga_tagihan}}</td>
                                    <td>{{ isset($laporan_pembayaran->data_admin->nama_admin) ? $laporan_pembayaran->data_admin->nama_admin : 'Terhapus'}}</td>
                                    <td>{{$laporan_pembayaran->tanggal_pembayaran}}</td>
                                </tr> 
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@section('js-section')
    <script src="{{ asset('js/layouts/laporan-pembayaran.js') }}"></script>
@endsection