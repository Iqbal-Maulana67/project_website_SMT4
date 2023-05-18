@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
            </div>
            <div class="card-body p-3">
                <div class="row float-right">
                    <a href=""><button class="btn btn-success mb-3 text-end mr-2"><i class="fa fa-plus mr-2"></i>Tambah data</button></a>
                </div>

                {{-- Delete Data Modal --}}
                <div class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="table_admin.php" method="POST" id="modal-form-kelas">
                                    <input type="hidden" name="id_kelas" id="id_kelas">
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
                    <table class="table table-bordered" id="table_siswa" width="100%" cellspacing="0">
                        <thead>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas Siswa</th>
                            <th>Jurusan</th>
                            <th>Status Pondok</th>
                            <th>Status Alumni</th>
                            <th>Nomer VA</th>
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
                                        <button class="btn btn-warning"> <i class="fas fa-pen fa-sm"></i> </button>
                                        <button class="btn btn-danger" data-target="#deleteDataModal" data-toggle="modal"><i class="fas fa-trash fa-sm"></i></button>
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
    <script src="js/layouts/data-siswa.js"></script>
@endsection