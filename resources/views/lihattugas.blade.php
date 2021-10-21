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
                <div class="container bg-white" style="overflow:auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Buat</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            <?php foreach($tasks as $task): ?>
                                <?php $i++; ?>
                                <tr>
                                    <th scope="row"><?= $i;?></th>
                                    <td>{{$task->created_at}}</td>
                                    <td>{{$task->pelajaran}}</td>
                                    <td>{{$task->nama}}</td>
                                    <td>{{$task->waktu}} Menit</td>
                                    <td>
                                        <a href="/edit_tugas_{{$task->id}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="/lihat-tugas/hapus/{{$task->id}}" onclick="return confirm('Anda Yakin? ini akan dihapus permanen.')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if(count($tasks)<1): ?>
                                <tr>
                                    <td colspan="6">Belum Ada Apa Apa Disini</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- End Of Content -->
                <br><br>
            </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection