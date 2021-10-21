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
                <?php foreach ($absen as $absensi):?>
                    <h1><?= $absensi['tanggal'];?></h1>
                    <div class="container bg-white mb-3" style="overflow-x: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Waktu Absen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach($absensi['absen'] as $col): ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <th scope="row"><?= $i;?></th>
                                        <td><?= $col['nama'];?></td>
                                        <td><?= $col['status'];?></td>
                                        <td><?= $col['jam'];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
                
                <!-- End Of Content -->
                <br><br>
            </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection