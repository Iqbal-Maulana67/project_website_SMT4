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
                            <tr>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@section('js-section')
    <script src="js/layouts/laporan-pembayaran.js"></script>
@endsection
