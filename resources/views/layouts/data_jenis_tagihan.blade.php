@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis Tagihan</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Informasi Jenis Tagihan</h6>
            </div>
            <div class="card-body p-3">
                <div class="row float-right">
                    <button class="btn btn-success mb-3 text-end mr-2" data-toggle="modal" data-target="#insertDataModal"><i class="fa fa-plus mr-2"></i>Tambah Jenis Tagihan</button>
                </div>
                {{-- Insert Modal --}}
                <div class="modal fade" id="insertDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Jenis Tagihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('data-jenis-tagihan.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Tagihan</label>
                                        <input type="text" class="form-control" id="nama_jenis_tagihan" name="nama_jenis_tagihan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jangka Waktu Tagihan</label>
                                        <select class="custom-select" id="jangka_waktu" name="jangka_waktu" required>
                                            <option selected value="">Jangka Waktu</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="bebas">Bebas</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Masukkan Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Edit Modal --}}
                <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Jenis Tagihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="modal-form-jenis-tagihan">
                                    @csrf
                                    <input type="hidden" name="id_jenis_tagihan" id="id_jenis_tagihan">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Tagihan</label>
                                        <input type="text" class="form-control" id="nama_tagihan" name="nama_jenis_tagihan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jangka Waktu Tagihan</label>
                                        <select class="custom-select" id="jangka_waktu" name="jangka_waktu" required>
                                            <option selected value="">Jangka Waktu</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="bebas">Bebas</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Jenis Tagihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="modal-form-jenis-tagihan-delete">
                                    @csrf
                                    <input type="hidden" name="id_jenis_tagihan" id="id_jenis_tagihan">
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
                    <table class="table table-bordered" id="table_jenis_tagihan" width="100%" cellspacing="0">
                        <thead>
                            <th>ID Jenis Tagihan</th>
                            <th>Nama Jenis Tagihan</th>
                            <th>Jangka Waktu Tagihan</th>
                            <th>Aksi</th>
                        <tbody>
                        @foreach ($jenisTagihan as $jenis_tagihan) 
                            <tr>
                                <td>{{$jenis_tagihan->id_jenis_tagihan}}</td>
                                <td>{{$jenis_tagihan->nama_jenis_tagihan}}</td>
                                <td>{{$jenis_tagihan->jangka_waktu}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-modal-jenis-tagihan" id="buttonModal" onclick=""
                                            data-id-jenis-tagihan="{{$jenis_tagihan->id_jenis_tagihan}}"
                                            data-nama-jenis-tagihan="{{$jenis_tagihan->nama_jenis_tagihan}}"
                                            data-jangka-waktu-tagihan="{{$jenis_tagihan->jangka_waktu}}"
                                        >
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="btn btn-danger btn-delete-jenis-tagihan" id="deleteButtonModal" onclick=""
                                            data-id-jenis-tagihan="{{$jenis_tagihan->id_jenis_tagihan}}"
                                        > 
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </div>
                                </td>
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
<script src="js/layouts/data-jenis-tagihan.js"></script>
@endsection