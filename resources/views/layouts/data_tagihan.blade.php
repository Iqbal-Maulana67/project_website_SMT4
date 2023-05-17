@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Tagihan</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Validasi Pembayaran</h6>
            </div>
            <div class="card-body p-3">
                <div class="row float-right">
                    <a href=""><button class="btn btn-success mb-3 text-end mr-2"><i class="fa fa-plus mr-2"></i>Atur Tagihan</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_tagihan" width="100%" cellspacing="0">
                        <thead>
                            <th>ID Tagihan</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Tagihan</th>
                            <th>Harga Tagihan</th>
                            <th>Sisa Tagihan</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Status Tagihan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@section('js-section')
<script src="js/layouts/data-tagihan.js"></script>
@endsection
