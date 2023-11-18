@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
    </div>

        <div class="card shadow col-xl-12 mr-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail Data Admin</h6>
            </div>
            <div class="card-body p-3">
                <div class="row float-right">
                    <button class="btn btn-success mb-3 text-end mr-2" data-toggle="modal" data-target="#insertDataModal"><i class="fa fa-plus mr-2"></i>Tambah Data Admin</button>
                </div>

                {{-- Insert Data Modal --}}
                <div class="modal fade" id="insertDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('data-admin.store')}}" method="POST" id="modal-form-validasi">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Admin</label>
                                        <input type="text" class="form-control" id="nama_admin" name="nama_admin">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password">
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

                {{-- Edit Data Modal --}}
                <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="modal-form-admin">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Admin</label>
                                        <input type="text" class="form-control" id="nama_admin" name="nama_admin">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password">
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
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="modal-form-admin-delete">
                                    @csrf
                                    <input type="hidden" name="username" id="username">
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
                    <table class="table table-bordered" id="table_admin" width="100%" cellspacing="0">
                        <thead>
                            <th>Username</th>
                            <th>Nama Admin</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        <tbody>
                            @foreach ($admin as $admin)
                            <tr>
                                <td>{{$admin->username}}</td>
                                <td>{{$admin->nama_admin}}</td>
                                <td>{{$admin->password}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-modal-admin" id="buttonModal" onclick=""
                                            data-username="{{$admin->username}}"
                                            data-nama-admin="{{$admin->nama_admin}}"
                                        >
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="btn btn-danger btn-delete-admin" id="deleteButtonModal" onclick=""
                                            data-username="{{$admin->username}}"
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
    <script src="{{ asset('js/layouts/data-admin.js') }}"></script>
@endsection