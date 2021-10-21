<?php 

$isian = explode('|', $soal->isi);
unset($isian[count($isian)-1]);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    @include('assets.head')
    <style type="text/css">
        #waktu{
            position: fixed;
            top :20px;
            right: 40px;
            padding: 5px;
        }
    </style>
</head>
<body id="page-top" class="bg-primary">
    <p id="waktu" class="bg-light"></p>
    <div class="container mt-5 mb-5">
        <div class="bg-light" style="padding-top:20px;padding-bottom: 20px;">
            <div class="container">
                <h1>{{$soal->pelajaran}}</h1>
                <h4>Nama Guru : {{$soal->nama}}</h4>
                <p><?php $tanggal = explode(' ', $soal->created_at); echo $tanggal[0]; ?> | Waktu : {{$soal->waktu}} menit</p>
                <p>Jumlah Soal : <?= count($isian);?> Soal Pilihan Ganda</p>
                <br>
                <hr>
                <br>
                <p><strong>Kerjakan dengan teliti!! Lihat batas waktu</strong></p>
                <hr>
                <form action="" method="post">
                    @CSRF
                    <?php $i=0; ?>
                    <?php foreach ($isian as $soalan): ?>
                        <?php $soalan = explode(';', $soalan); ?>
                        <?php 
                            $i++;
                            $abjad = ['a','b','c','d'];
                            $jawaban = explode('@', $soalan[1]);
                         ?>
                        <div class="form-group">
                            <p><strong>Soal No <?= $i;?></strong></p>
                            <div class="bg-dark text-white" style="padding: 10px;">
                                <p> <?= $soalan[0];?></p>
                                <hr class="bg-light">
                                <?php $j=0; ?>
                                <?php foreach ($jawaban as $jawab): ?>
                                    <input type="radio" id="soal_<?= $i;?>_<?= $abjad[$j];?>" name="jawaban<?=$i;?>" value="<?= $abjad[$j];?>" class="ml-3">
                                    <label for="soal_<?= $i;?>_<?= $abjad[$j];?>"> <?= $abjad[$j];?>. <?= $jawab;?></label><br>
                                    <?php $j++; ?>
                                <?php endforeach ?>
                            </div>

                        </div>
                    <?php endforeach ?>
                    <button type="submit" class="btn btn-primary" id='klik'><i class="fas fa-save"></i> Simpan</button>
                </form>

            </div>
        </div>
    </div>
        
    @include('assets.scroll')
    @include('assets.modal')
    
    @include('assets.js')
    <script type="text/javascript">
        const waktu = <?= $soal['waktu'];?>;
        let detik = waktu * 60;
        const pwaktu = document.getElementById('waktu');
        let timer = setInterval(()=>{
            detik-=1;
            let m = Math.floor(detik/60);
            let s = detik%60;
            pwaktu.innerHTML = `Sisa Waktu : ${m}:${s}`;
            if(detik<60){
                pwaktu.classList.add('text-danger');
            }
            if(detik<=0){
                document.getElementById('klik').click();
            }

        },1000);
    </script>

</body>

</html>