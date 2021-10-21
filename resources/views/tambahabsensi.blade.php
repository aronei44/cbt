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
                    <h1>Tambah Absensi</h1>
                    <div class="container bg-white">
                        <form action="" method="post">
                            @CSRF
                            {{ $alert }}
                            <table class="table table-hover">
                                
                                <tr>
                                    <th scope="row">Tanggal</th>
                                    <td id ="tgl"><?= date("Y/m/d");?></td>
                                    <input type="text" name="tanggal" class="form-control" hidden value="<?= date('Y/m/d');?>">
                                </tr>                               
                                <tr>
                                <?php if(!isset($abs)):?>
                                    <th scope="row">Aksi</th>
                                    <td><button class="btn btn-primary" name="submit"><i class="fas fa-plus"></i> Tambah</button></td>
                                <?php endif;?>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <!-- End Of Content -->
                    <br><br>
                </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection