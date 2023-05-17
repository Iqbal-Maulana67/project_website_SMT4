@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Kelas</h6>
            </div>
            <div class="card-body p-3">
                <div class="row float-right">
                    <button class="btn btn-success mb-3 text-end mr-2" data-toggle="modal" data-target="#insertDataModal"><i class="fa fa-plus mr-2"></i>Tambah Data Kelas</button>
                </div>
                {{-- Insert Modal --}}
                <div class="modal fade" id="insertDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="table_admin.php" method="POST">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Kelas</label>
                                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_jenis_tagihan" width="100%" cellspacing="0">
                        <thead>
                            <th>ID Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        <tbody>
                            <tr>
                                <td>NA</td>
                                <td>NA</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning"><i class="fas fa-edit fa-sm"></i></button>
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
