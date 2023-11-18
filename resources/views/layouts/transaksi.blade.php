@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pembayaran</h1>
    </div>

    <div class="row mb-3">
        <div class="col-xl-12">
            <div class="card shadow">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success text-center">Cari Data Siswa</h6>
                </div>
                <div class="col-xl-12">
                    <form action="{{ route('menu-pembayaran.search_data') }}" method="POST">
                        @csrf
                        <div class="form-group row pt-2">
                            <div class="col-xl-12">
                                <h5>Masukkan Data Siswa</h5>
                            </div>
                            <div class="col-xl-10">
                                <input type="text" name="nisn" id="nisn" class="form-control">
                            </div>
                            <div class="col-xl-1">
                                <input type="submit" name="" id="" class="btn btn-success" value="Cari Data">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (isset($siswa))
        
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> Data yang ditemukan </h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->data_kelas->nama_kelas }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ route('menu-pembayaran.detail', $item->nisn) }}">
                                <div class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>
@endsection
