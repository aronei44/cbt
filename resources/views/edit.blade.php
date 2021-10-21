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
                    <div class="container">
						<div class="container bg-white">
							<br>
							<h1><i class="fas fa-edit"></i> Edit Profil</h1>
							<br>
							<img src="img/{{auth()->user()->image}}" class="rounded-circle mt-3 mb-3" style="width: 300px;"><br>
							<p class="btn btn-primary" onclick="muncul()">Ubah Foto</p>
							<form enctype="multipart/form-data" method="post" action="/editfoto" class="row g-3 hide" id="fotoform">
								@csrf
								<div class="col-auto">
									<input type="file" name="gambar" id="foto" class="form-control" required>
								</div>
								<div class="col-auto">
									
									<button type="submit" class="btn btn-primary">Edit Foto</button>
								</div>
							</form><br>
							<form action="" method="post" >
								@CSRF
								<div class="form-group">
									<label for="nama">Nama :</label>
									<input type="text" name="nama" id="nama" class="form-control" value="{{auth()->user()->name}}" required>
								</div>
								<?php 
									$kelas = ['X','XI','XII'];
								 ?>
								@if(auth()->user()->status != 'Guru')
									<div class="form-group">
										<label for='kelas'>Kelas :</label>
										<select name="kelas" id="kelas" class="form-control" >
											@foreach($kelas as $k)
												@if($k==auth()->user()->kelas)
													<option selected>{{$k}}</option>											
												@else
													<option>{{$k}}</option>											
												@endif											
											@endforeach
										</select>
									</div>
								@endif
								
								<div class="form-group">
									<p>Jenis Kelamin :</p>
									<input type="radio" name="jenis" id="pria" value="L" @if(auth()->user()->jenis_kelamin=='L')checked @endif>
									<label for="pria">Laki - Laki</label>
									<input type="radio" name="jenis" id="wanita" value="P" @if(auth()->user()->jenis_kelamin=='P')checked @endif>
									<label for="wanita">Perempuan</label>
								</div>
								@if(auth()->user()->status != 'Guru')
									<div class="form-group">
										<label for="nisn">NISN :</label>
										<input type="number" name="nisn" id="nisn" class="form-control" value="{{auth()->user()->nisn}}">
									</div>									
								@endif
								<div class="form-group">
									<label for="hp">No HP :</label>
									<input type="text" name="hp" id="hp" class="form-control" value="{{auth()->user()->no_hp}}" required>
								</div>
								<?php 
									$agama = ['Budha','Hindu','Islam','Katolik','Konghuchu','Kristen'];
								 ?>
								<div class="form-group">
									<label for="agama">Agama</label>
									<select class="form-control" id="agama" name="agama">
										<?php foreach($agama as $a):?>
											@if($a==auth()->user()->agama)
												<option selected>{{$a}}</option>
											@else
												<option>{{$a}}</option>
											@endif
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat :</label>
									<textarea class="form-control" id="alamat" name="alamat" required>{{auth()->user()->alamat}}</textarea>
								</div><br>
								<button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-save"></i> Simpan</button>
							</form>
							<br>
						</div>
                    </div>
                    <!-- End Of Content -->
                    <br><br>
                </div>



        </div>
        
        @include('assets.footer')
<script type="text/javascript">
	function muncul(){
		const form = document.getElementById('fotoform')
		form.classList.toggle('hide')	
	}
</script>
    </div>
@endsection
