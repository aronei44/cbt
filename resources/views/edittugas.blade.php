@extends('main')
@section('konten')
    <!-- Sidebar -->
    @include('assets.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('assets.nav')
<?php 
$pelajaran = ['IPA','IPS','MTK','Indonesia','PKN'];
$soal      = explode('|', $task->isi);
$akhir     = count($soal);
unset($soal[$akhir-1]);
 ?>
            <div class="container-fluid">
                <br>
                <!-- Content Start -->
                <h1>Tambah Tugas</h1>
                <div class="container bg-white">
                    <form action="" method="post">
                        @CSRF
                        <div class="form-group">
                            <label for="pelajaran">Pelajaran :</label>
                            <select class="form-control" name="pelajaran" id="pelajaran">
                                <?php foreach($pelajaran as $pel):?>
                                    <?php if ($pel == $task->pelajaran): ?>
                                        <option value="<?= $pel;?>" selected><?= $pel;?></option>
                                    <?php endif; ?>
                                    <?php if(!$pel == $task->pelajaran): ?>
                                        <option value="<?= $pel;?>"><?= $pel;?></option>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam">Waktu (menit) :</label>
                            <input type="number" name="jam" id="jam" class="form-control" value="{{$task->waktu}}">
                        </div>
                        <div class="bg-light text-dark" style="padding: 5px;">
                            <p>contoh penulisan soal</p>
                            <p class="bg-dark text-white" style="padding-left: 5px;">Siapakah Presiden pertama? ; Soekarno @ Soeharto @ B.J. Habibie @ Megawati ; a</p>
                            <p>Pisahkan soal, pilihan dan jawaban yang benar dengan tanda ;</p>
                            <p>pisahkan setiap jawaban dengan tanda @</p>
                            <p>Format soal Diatas akan mesin kami ubah menjadi :</p>
                            <p class="bg-dark text-white" style="padding-left: 5px;">Siapakah Presiden pertama?<br>a. Soekarno <br>b. Soeharto <br>c. B.J. Habibie <br>d. Megawati</p>
                            <p>Dengan jawaban yang benar yang mesin kami simpan adalah a</p>
                        </div> 
                        <div id="soal">
                            <?php $i=0; ?>
                            <?php foreach ($soal as $isian): ?>
                                <?php $i++; ?>
                                
                                <div class="form-group">
                                    <label for="soal<?=$i;?>">Soal no <?=$i;?></label>
                                    <textarea class="form-control" id="soal<?=$i;?>" name="soal<?=$i;?>"><?= $isian;?></textarea>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <p class="btn btn-success" onclick="tambahSoal()"><i class="fas fa-plus"></i> Tambah Soal</p>
                        <br><br>
                        <button class="btn btn-primary" name="submit" type="submit"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
                <!-- End Of Content -->
                <script type="text/javascript">
                    let nomor = <?= $i;?>;
                    function tambahSoal(){
                        nomor++;
                        let label = document.createElement('label');
                        label.setAttribute('for',`soal${nomor}`);
                        label.innerHTML = `Soal no ${nomor}`;

                        let input = document.createElement('textarea');
                        input.setAttribute('class','form-control');
                        input.setAttribute('id',`soal${nomor}`);
                        input.setAttribute('name',`soal${nomor}`);


                        let child = document.createElement('div');
                        child.setAttribute('class','form-group');
                        child.appendChild(label);
                        child.appendChild(input);


                        let soal = document.getElementById('soal');
                        soal.appendChild(child); 
                    }

                    
                </script>
                <br><br>
            </div>



        </div>
        
        @include('assets.footer')
    </div>
@endsection