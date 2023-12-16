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
                    
                    <button type="button" class="btn btn-success mb-3 text-end mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">Export Data</button>

                    <div class="dropdown filter-dropdown mr-1">
                      <button class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-filter mr-2"></i>Filter Data
                      </button>
                      <div class="dropdown-menu filter-dropdown-menu" style="width: 15rem !important" aria-labelledby="dropdownMenuLink">
                        <h6 class="dropdown-header">Status Tagihan</h6>
                        <div class="dropdown-menu-items">
                            <select class="custom-select" id="filter_status_tagihan">
                                <option selected value="">Pilih Status Tagihan</option>
                                <option value="Belum Bayar">Belum Bayar</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <h6 class="dropdown-header">Waktu Tagihan</h6>
                        <div class="dropdown-menu-items">
                            <select class="custom-select" id="filter_waktu_tagihan">
                                <option selected value="">Pilih Waktu Tagihan</option>
                                <option value="Bulanan">Bulanan</option>
                                <option value="Bebas">Bebas</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <a href="{{ route('data-tagihan.create') }}"><button class="btn btn-success mb-3 text-end mr-2"><i class="fa fa-plus mr-2"></i>Atur Tagihan</button></a>
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
                                <form action="" method="POST" id="modal-form-tagihan">
                                    @csrf
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
                                <form action="" method="POST" id="modal-form-tagihan-delete">
                                    @csrf
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

                {{-- Export modal --}}
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="ExportExcelModal" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-export">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Export Excel Data Tagihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('data-tagihan.export') }}" method="POST" id="modal_export_excel" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-xl-12">
                                            <label for="recipient-name" class="col-form-label">Nama Siswa</label>
                                            <input type="text" class="form-control" id="export_nama_siswa_tagihan" name="export_nama_siswa_tagihan">
                                        </div>
                                        <div class="form-group col-xl-6">
                                            <label for="recipient-name" class="col-form-label">Status Tagihan</label>
                                            <select class="custom-select" id="export_status_tagihan" name="export_status_tagihan">
                                                <option selected value="">Pilih Status Tagihan</option>
                                                <option value="Belum Bayar">Belum Bayar</option>
                                                <option value="Lunas">Lunas</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-6">
                                            <label for="recipient-name" class="col-form-label">Waktu Tagihan</label>
                                            <select class="custom-select" id="export_waktu_tagihan" name="export_status_tagihan">
                                                <option selected value="">Pilih Waktu Tagihan</option>
                                                <option value="Bulanan">Bulanan</option>
                                                <option value="Bebas">Bebas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <table class="table table-bordered" id="table_export_tagihan" width="100%" cellspacing="0">
                                        <thead>
                                            <th>ID Tagihan</th>
                                            <th>Nama Siswa</th>
                                            <th>Nama Tagihan</th>
                                            <th>Harga Tagihan</th>
                                            <th>Waktu Tagihan</th>
                                            <th>Status Tagihan</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($tagihan as $item)
                                            <tr>
                                                <td>{{ $item->id_tagihan }}</td>
                                                <td>{{ $item->list_siswa->nama }}</td>
                                                <td>{{ $item->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->bulan . ' ' . $item->tahun}}</td>
                                                <td>{{ "Rp. " . number_format($item->harga_tagihan) }}</td>
                                                <td>{{ Str::ucfirst($item->list_jenis_tagihan->jangka_waktu) }}</td>
                                                <td>{{ $item->status_tagihan }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Export Data</button>
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
                            <th>Nama Tagihan</th>
                            <th>Harga Tagihan</th>
                            <th>Waktu Tagihan</th>
                            <th>Status Tagihan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                            @foreach ($tagihan as $item)
                            <tr>
                                <td>{{ $item->id_tagihan }}</td>
                                <td>{{ $item->list_siswa->nama }}</td>
                                <td>{{ $item->list_jenis_tagihan->nama_jenis_tagihan . ' ' . $item->bulan . ' ' . $item->tahun}}</td>
                                <td>{{ "Rp. " . number_format($item->harga_tagihan) }}</td>
                                <td>{{ Str::ucfirst($item->list_jenis_tagihan->jangka_waktu) }}</td>
                                <td>{{ $item->status_tagihan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-edit-modal" id="buttonModal"
                                            data-id-tagihan="{{ $item->id_tagihan }}"
                                            data-harga-tagihan="{{ number_format($item->harga_tagihan) }}"
                                        >
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="btn btn-danger btn-delete-modal" id="deleteButtonModal"
                                            data-id-tagihan="{{ $item->id_tagihan }}"
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
<script src="{{ asset('js/layouts/data-tagihan.js') }}"></script>
@endsection
