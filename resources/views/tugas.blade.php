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
                <h2>Semua Tugas</h2>
                <div class="container bg-white" style="overflow:auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach($tasks as $task):?>
                                <?php $i++; ?>
                                <tr>
                                    <th scope="row"><?= $i;?></th>
                                    <td><?php
                                        $tanggal = explode(' ', $task->created_at);
                                        echo $tanggal[0];
                                     ?></td>
                                    <td>{{$task->pelajaran}}</td>
                                    <td>{{$task->nama}}</td>
                                    <td>{{$task->waktu}} Menit</td>
                                    <td>
                                        <?php $status = false; ?>
                                        <?php foreach ($task['fills'] as $fill): ?>
                                            @if($fill['user_id']==auth()->user()->id && $fill['task_id']==$task->id)
                                                    {{$fill['nilai']}}
                                                    <?php $status = True; ?>
                                                
                                                
                                            @endif

                                        <?php endforeach ?>
                                    </td>
                                    <td>
                                        @if($status)
                                            <p>sudah Mengerjakan</p>
                                        @else
                                            <a class='btn btn-primary text-white' href='/kerjakan{{$task->id}}'><i class='fas fa-edit'></i> Kerjakan</a>
                                        @endif
                                        
                                    </td>
                                </tr>
                            
                            <?php endforeach;?>
                            <?php if(count($tasks)<1): ?>
                                <tr class="text-center">
                                    <td colspan="6">Belum Ada Tugas</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <!-- End Of Content -->
                <br><br>
            </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection