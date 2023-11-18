@extends('template')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-3">
            <h3>Dashboard</h3>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xl-3">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-xl-8 mb-3">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_siswa}}</div>
                        </div>
                        <div class="col-xl-12">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Siswa Pondok : {{$total_siswa_pondok}}</div>
                            <div class="text-xs font-weight-bold text-success text-uppercase">
                                Siswa Biasa : {{$total_siswa_biasa}}</div>   
                            <input type="hidden" name="" id="total_siswa_pondok" value="{{ $total_siswa_pondok }}"> 
                            <input type="hidden" name="" id="total_siswa_biasa" value=" {{ $total_siswa_biasa }}"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xl-3">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-xl-8 mb-3">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pembayaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_pembayaran}}</div>
                        </div>
                        <div class="col-xl-12">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Lunas : {{$jumlah_pembayaran_lunas}}</div>
                            <div class="text-xs font-weight-bold text-success text-uppercase">
                                Belum Lunas : {{$jumlah_pembayaran_belum_lunas}}</div>    
                            <input type="hidden" name="" id="total_lunas" value="{{ $jumlah_pembayaran_lunas }}">
                            <input type="hidden" name="" id="total_belum_lunas" value="{{ $jumlah_pembayaran_belum_lunas }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xl-3">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-xl-8 mb-3">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Antrian Validasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$antrian_validasi}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->

        <!-- Pie Chart -->
        <div class="col-xl-7 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success"></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body row">
                    <div class="col-xl-6">
                        <center><h5>Status Siswa</h5></center>
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Siswa Pondok
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Siswa Biasa
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <center><h5>Status Siswa</h5></center>
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart2"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Lunas
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Belum Lunas
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-6">
            <div class="card shadow">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">History Pembayaran</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Nama Tagihan</th>
                                    <th>Harga Tagihan</th>
                                    <th>Nama Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histori_pembayaran as $histori_pembayaran)
                                <tr>
                                    <td>{{$histori_pembayaran->data_siswa->nama}}</td>
                                    <td>{{$histori_pembayaran->data_tagihan->list_jenis_tagihan->nama_jenis_tagihan}}</td>
                                    <td>{{$histori_pembayaran->data_tagihan->harga_tagihan}}</td>
                                    <td>{{ isset($histori_pembayaran->data_admin->nama_admin) ? $histori_pembayaran->data_admin->nama_admin : 'Terhapus'}}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection

@section('js-section')
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection