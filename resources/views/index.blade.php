@extends('main')
@section('konten')
    <!-- Sidebar -->
    @include('assets.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('assets.nav')

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                <br>
                <!-- Content Start -->
                @if(auth()->user()->status != 'Guru')
                    
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/absensi">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Absensi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Isi Absensi</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/tugas">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Tugas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Tugas</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                

                @else
                    
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/lihat-absen">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Absensi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Absensi</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/tambah-absensi">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Absensi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tambah Absensi</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">

                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/lihat-tugas">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Tugas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Tugas</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/tambah-tugas">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Tugas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tambah Tugas</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="/lihat-nilai">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Nilai</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Nilai</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                @endif
                <br><br>
                <hr>
                <br><br>
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/profil">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Profil</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Profil</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/logout" data-toggle="modal" data-target="#logoutModal">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Profil</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Keluar</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- End Of Content -->
                <br><br>
            </div>





        </div>
        
        @include('assets.footer')
    </div>







	
@endsection