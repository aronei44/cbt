@extends('main')
@section('konten')
    <!-- Sidebar -->
    @include('assets.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('assets.nav')
            <div class="container-fluid">
                <br>
                <!-- Content Start -->
                <div class="container text-center">
                    <img src="img/undraw_profile.svg" class="img-thumbnail rounded-circle" width="200" style="margin: auto;">
                    <h1>{{auth()->user()->name}}</h1>
                </div>
                <div class="container bg-white">
                    <table class="table table-hover">
                        <tr>
                            <th scope="row">Tanggal</th>
                            <td>: {{$absensi['tanggal']}}</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Status Kehadiran                  
                            </th>
                            <td>: <?= $stat;?></td>
                        </tr>
                        <?php if($stat=='Belum Mengisi Kehadiran'): ?>
                            <tr>
                                <th scope="row">Absensi</th>
                                <td>
                                    <form method="post" action="">
                                        @CSRF
                                        <div class="form-group">
                                            <select name="hadir">
                                                <option>Hadir</option>
                                                <option>Sakit</option>
                                                <option>Izin</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif ?>
                    </table>
                </div>
                <!-- End Of Content -->
                <br><br>
            </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection