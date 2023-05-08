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
                <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-borderless">
                    <tbody>
                        <tr class="d-flex">
                            <td class="col-4">NISN Siswa</td>
                            <td>:</td>
                            <td class="col-auto">NISN Siswa</td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-4">NIS Siswa</td>
                            <td>:</td>
                            <td class="col-auto">NIS Siswa</td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-4">Nama Siswa</td>
                            <td>:</td>
                            <td class="col-auto">Nama Siswa</td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-4">Alamat Siswa</td>
                            <td>:</td>
                            <td class="col-auto">Alamat Siswa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow col-xl-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History Pembayaran</h6>
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
                        <tr>
                            <td>SPP Januari 2023</td>
                            <td>20/01/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card shadow col-xl-7 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Tagihan Siswa</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Tagihan</th>
                            <th>Harga Tagihan</th>
                            <th>Status Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SPP Januari 2023</td>
                            <td>100000</td>
                            <td>Belum Lunas</td>
                            <td><input type="checkbox" name="" id="cb_table_tagihan" class="cb_table_tagihan" cb_nama_tagihan="SPP Januari 2023" cb_harga_tagihan="100000"></td>
                        </tr>
                        <tr>
                            <td>SPP Februari 2023</td>
                            <td>100000</td>
                            <td>Belum Lunas</td>
                            <td><input type="checkbox" name="" id="cb_table_tagihan" class="cb_table_tagihan" cb_nama_tagihan="SPP Februari 2023" cb_harga_tagihan="100000"></td>
                        </tr>
                        <tr>
                            <td>SPP Maret 2023</td>
                            <td>100000</td>
                            <td>Belum Lunas</td>
                            <td><input type="checkbox" name="" id="cb_table_tagihan" class="cb_table_tagihan" cb_nama_tagihan="SPP Maret 2023" cb_harga_tagihan="100000"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow col-xl-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Tagihan Siswa</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-bordered mb-5" id="table_pembayaran_tagihan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="form-group col-xl-12">
                        <label for="recipient-name" class="col-form-label">Total</label>
                        <input type="text" class="form-control" id="detail_total_harga" name="txt_total_harga" value="0" readonly>
                    </div>
                    <div class="form-group col-xl-12">
                        <label for="recipient-name" class="col-form-label">Masukkan Uang</label>
                        <input type="text" class="form-control" id="txt_uang" name="txt_uang" value="0">
                    </div>
                    <div class="form-group col-xl-12">
                        <label for="recipient-name" class="col-form-label">Kembalian</label>
                        <input type="text" class="form-control" id="detail_kembalian" name="txt_kembalian" value="0" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    

</script>
@endsection
