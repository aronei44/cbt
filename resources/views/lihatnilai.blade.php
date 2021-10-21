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
                <?php foreach ($tasks as $task): ?>
                    <h3>Pelajaran : {{$task->pelajaran}}</h3>
                    <?php $tanggal = explode(' ', $task->created_at); ?>
                    <h3>Tanggal   : {{$tanggal[0]}}</h3>
                    <div class="container bg-white mb-5" style="overflow-x: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($task->fills as $fill): ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <th scope="row"><?= $i;?></th>
                                        <td><?= $user->find($fill['user_id'])->name;?></td>
                                        <td class="bg-primary text-white"><?= $fill['nilai'];?></td>
                                        <td><?php echo $fill['nilai']>70 ? 'Lulus':'Belum Lulus'; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                <?php endforeach ?>
                
                <!-- End Of Content -->
                <br><br>
            </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection