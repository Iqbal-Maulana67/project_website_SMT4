@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Validasi Pembayaran</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail Laporan Pembayaran</h6>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_validasi" width="100%" cellspacing="0">
                        <thead>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>ID Tagihan</th>
                            <th>Nama Tagihan</th>
                            <th>Harga Tagihan</th>
                            <th>Status Tagihan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                            @foreach ($validasi as $item)
                            <tr>
                                <td>{{ $item->list_siswa->nisn }}</td>
                                <td>{{ $item->list_siswa->nama }}</td>
                                <td>{{ $item->list_tagihan->id_tagihan }}</td>
                                <td>{{ $item->list_tagihan->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->list_tagihan->bulan . ' ' . $item->list_tagihan->tahun }}</td>
                                <td>{{ $item->list_tagihan->harga_tagihan }}</td>
                                <td>{{ $item->list_tagihan->status_tagihan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-view-modal" id="buttonModal" data-toggle="modal" data-target="#viewModal"
                                            data-nisn="{{ $item->list_siswa->nisn }}"
                                            data-nama-siswa="{{ $item->list_siswa->nama }}"
                                            data-id-tagihan="{{ $item->list_tagihan->id_tagihan }}"
                                            data-nama-tagihan="{{ $item->list_tagihan->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->list_tagihan->bulan . ' ' . $item->list_tagihan->tahun }}"
                                            data-harga-tagihan="{{ $item->list_tagihan->harga_tagihan }}"
                                            data-gambar-pembayaran="{{ $item->gambar_pembayaran }}"
                                        >
                                            <i class="fas fa-eye fa-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Validasi Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('validasi-pembayaran.valid') }}" method="POST" id="modal-form-validasi">
                                        @csrf
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">NISN Siswa</label>
                                            <input type="text" class="form-control" id="nisn" name="nisn" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nama Siswa</label>
                                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">ID Tagihan</label>
                                            <input type="text" class="form-control" id="id_tagihan" name="id_tagihan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nama Tagihan</label>
                                            <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                            <input type="text" class="form-control" id="harga_tagihan" name="harga_tagihan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Bukti Pembayaran</label>
                                            <img src="" alt="" id="gambar_pembayaran" style="width: 100%">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" id="btn-tolak-pembayaran">Tolak Pembayaran</button>
                                    <button type="submit" class="btn btn-success" id="btn-valid-pembayaran">Validasi Pembayaran</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@section('js-section')
    <script src="js/layouts/validasi-pembayaran.js"></script>
@endsection
