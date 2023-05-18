@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Tagihan</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Informasi Validasi Pembayaran</h6>
            </div>
            <div class="card-body p-3">
                <div class="row float-right">
                    <a href=""><button class="btn btn-success mb-3 text-end mr-2"><i class="fa fa-plus mr-2"></i>Atur Tagihan</button></a>
                </div>

                {{-- Edit Data Modal --}}
                <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Tagihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="table_admin.php" method="POST" id="modal-form-tagihan">
                                    <input type="hidden" id="id_tagihan" name="id_tagihan">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Harga Tagihan</label>
                                        <input type="text" class="form-control" id="harga_tagihan" name="harga_tagihan">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete Data Modal --}}
                <div class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Tagihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="table_admin.php" method="POST" id="modal-form-tagihan-delete">
                                    <input type="hidden" name="id_tagihan" id="id_tagihan">
                                    Apakah anda yakin untuk menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
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
                                        <button class="btn btn-warning" id="buttonModal" data-toggle="modal" data-target="#editDataModal"
                                            id-tagihan="123"
                                            harga-tagihan="20000"
                                        >
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="btn btn-danger" id="deleteButtonModal" data-toggle="modal" data-target="#deleteDataModal"
                                            id-tagihan="123"
                                        >
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
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
